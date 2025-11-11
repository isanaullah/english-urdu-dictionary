<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
  /**
   * Initialize legacy database connection
   *
   * @return \security|null
   */
  private function initializeLegacyDb()
  {
    $classesPath = resource_path('views/frontend/includes/classes');

    // Load security class if not already loaded
    if (!class_exists('security', false)) {
      $securityFile = $classesPath . '/security.class.php';
      if (file_exists($securityFile)) {
        $oldDir = getcwd();
        chdir($classesPath);

        try {
          require_once $securityFile;
        } catch (\Exception $e) {
          return null;
        }

        chdir($oldDir);
      }
    }

    // Create database instance
    if (class_exists('security', false)) {
      try {
        $dbHost = config('database.connections.mysql.host', 'localhost');
        $dbName = config('database.connections.mysql.database', 'base');
        $dbUser = config('database.connections.mysql.username', 'root');
        $dbPass = config('database.connections.mysql.password', '');

        return new \security($dbHost, $dbName, $dbUser, $dbPass);
      } catch (\Exception $e) {
        return null;
      }
    }

    return null;
  }

  /**
   * Load main site index page
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $title = "Welcome to my App";
    return view('frontend.index', compact('title'));
  }

  /**
   * Load Roman Urdu dictionary page
   *
   * @return \Illuminate\Http\Response
   */
  public function roman()
  {
    return view('frontend.roman');
  }

  /**
   * Load Urdu dictionary page
   *
   * @return \Illuminate\Http\Response
   */
  public function urdu()
  {
    return view('frontend.urdu');
  }

  /**
   * Load Roman words list by alphabet
   *
   * @param string $alphabet
   * @return \Illuminate\Http\Response
   */
  public function romanWords($alphabet)
  {
    // Initialize legacy database connection
    $rdb = $this->initializeLegacyDb();
    if (!$rdb) {
      abort(500, 'Database connection failed');
    }
    $path = url('/') . '/assets/';

    $alphabet = strtoupper($alphabet);
    $page = request()->get('page', 1);
    $per_page = 50; // Words per page
    $offset = ($page - 1) * $per_page;

    // Get total count
    $count_cond_value = array("alphabet" => $alphabet, "status_word" => "1");
    $count_result = $rdb->db_select_cond("COUNT(*) as total", "urdu_dict", "left(roman, 1) = :alphabet AND status_word = :status_word", $count_cond_value);
    $total_words = $count_result['row'][0]['total'] ?? 0;

    // Get words for current page
    $cond_value = array("alphabet" => $alphabet, "status_word" => "1");
    $words_result = $rdb->db_select_cond("*", "urdu_dict", "left(roman, 1) = :alphabet AND status_word = :status_word ORDER BY roman ASC LIMIT $per_page OFFSET $offset", $cond_value);
    $words_data = $words_result['row'] ?? [];

    // Simple pagination
    $total_pages = ceil($total_words / $per_page);
    $pagination = '';

    if ($total_pages > 1) {
      $pagination .= '<div class="pagination">';

      // Previous page
      if ($page > 1) {
        $prev_page = $page - 1;
        if ($prev_page == 1) {
          $pagination .= '<a href="' . route('roman.words', ['alphabet' => $alphabet]) . '">« Previous</a> ';
        } else {
          $pagination .= '<a href="' . route('roman.words.page', ['alphabet' => $alphabet, 'page' => $prev_page]) . '">« Previous</a> ';
        }
      }

      // Page numbers
      for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
          $pagination .= '<span class="current">' . $i . '</span> ';
        } else {
          if ($i == 1) {
            $pagination .= '<a href="' . route('roman.words', ['alphabet' => $alphabet]) . '">' . $i . '</a> ';
          } else {
            $pagination .= '<a href="' . route('roman.words.page', ['alphabet' => $alphabet, 'page' => $i]) . '">' . $i . '</a> ';
          }
        }
      }

      // Next page
      if ($page < $total_pages) {
        $next_page = $page + 1;
        $pagination .= '<a href="' . route('roman.words.page', ['alphabet' => $alphabet, 'page' => $next_page]) . '">Next »</a>';
      }

      $pagination .= '</div>';
    }

    $words = [
      'data' => $words_data,
      'pagination' => $pagination,
      'total' => $total_words,
      'current_page' => $page,
      'total_pages' => $total_pages
    ];

    return view('frontend.roman_words', compact('alphabet', 'page', 'words'));
  }

  /**
   * Load Roman word meaning page
   *
   * @param string $word
   * @return \Illuminate\Http\Response
   */
  public function meaningRoman($word)
  {
    // Initialize legacy database connection
    $rdb = $this->initializeLegacyDb();
    if (!$rdb) {
      abort(500, 'Database connection failed');
    }

    $search_query = $word;
    $search_query2 = filter_var($search_query, FILTER_SANITIZE_STRING);

    $cond_value = array("english_word_url" => $search_query2, "status_word" => "1");
    $cond = "english_word_url=:english_word_url AND status_word=:status_word";
    $result = $rdb->db_fetch_single("*", "urdu_dict", $cond, $cond_value);
    $count = $result['num'];

    if ($count < 1) {
      // Log word not found
      $data = array('word' => $search_query2, 'type_id' => '2');
      $rdb->db_insert("words_not_found", $data);

      return view('frontend.roman_not_found', compact('search_query', 'search_query2'));
    } else {
      // Update word counter
      $counter = $result['word_counter'];
      $plus_counter = $counter + 1;
      $u_id = $result['u_id'];

      $cond_value = array("u_id" => $u_id);
      $cond = "u_id=:u_id";
      $rdb->db_update_counter("urdu_dict", "word_counter", $plus_counter, $cond, $cond_value);

      // Get translations
      $cond_value = array("roman" => $result['roman'], "status_word" => "1");
      $query = $rdb->db_select_cond("*", "urdu_dict", "roman=:roman AND status_word=:status_word", $cond_value);
      $translations = $query['row'];

      // Get related words
      $com_romanword = "%" . $result['roman'] . "%";
      $cond_value = array("roman" => $com_romanword, "roman2" => $result['roman'], "status_word" => "1");
      $query_related = $rdb->db_select_cond("DISTINCT roman,english_word,english_word_url", "urdu_dict", "roman LIKE :roman AND roman <> :roman2 AND status_word=:status_word LIMIT 15", $cond_value);
      $related_words = $query_related['row'];

      return view('frontend.meaning_roman', [
        'word' => $result,
        'count' => $count,
        'search_query' => $search_query,
        'translations' => $translations,
        'related_words' => $related_words
      ]);
    }
  }

  /**
   * Load Roman word not found page
   *
   * @return \Illuminate\Http\Response
   */
  public function romanNotFound()
  {
    $search_query = request()->get('word', '');
    return view('frontend.roman_not_found', compact('search_query'));
  }

  /**
   * Load Urdu words list by alphabet
   *
   * @param string $alphabet
   * @return \Illuminate\Http\Response
   */
  public function urduWords($alphabet)
  {
    // Initialize legacy database connection
    $rdb = $this->initializeLegacyDb();
    if (!$rdb) {
      abort(500, 'Database connection failed');
    }
    $path = url('/') . '/assets/';

    $page = request()->get('page', 1);
    $per_page = 50; // Words per page
    $offset = ($page - 1) * $per_page;

    // Map alphabet parameter to Urdu character
    $alphabet_map = [
      'alif' => 'ا', 'alifmada' => 'آ', 'bay' => 'ب', 'pay' => 'پ', 'tay' => 'ت', 'thay' => 'ٹ',
      'say' => 'ث', 'jim' => 'ج', 'hay' => 'ح', 'khay' => 'خ', 'dal' => 'د', 'dhal' => 'ڈ',
      'zal' => 'ذ', 'ray' => 'ر', 'rhay' => 'ڑ', 'zay' => 'ز', 'zhay' => 'ژ', 'seen' => 'س',
      'sheen' => 'ش', 'suad' => 'ص', 'duad' => 'ض', 'thoy' => 'ط', 'zhoy' => 'ظ', 'ain' => 'ع',
      'gain' => 'غ', 'fay' => 'ف', 'qaf' => 'ق', 'qyaf' => 'ک', 'gaf' => 'گ', 'lam' => 'ل',
      'mim' => 'م', 'noon' => 'ن', 'noongunah' => 'ں', 'wow' => 'و', 'wowhamza' => 'ؤ',
      'hamza' => 'ء', 'hay2' => 'ہ', 'hay3' => 'ھ', 'yahamza' => 'ئ', 'ya' => 'ی', 'bariya' => 'ے'
    ];

    $alphabet_display = $alphabet_map[$alphabet] ?? $alphabet;

    // Determine condition based on alphabet type
    if (in_array($alphabet, ['alifmada', 'yahamza', 'wowhamza'])) {
      $cond_par = "left(urdu_word, 2) = '$alphabet_display'";
    } else {
      $cond_par = "left(urdu_word, 1) = '$alphabet_display'";
    }

    // Get total count
    $count_cond_value = array("status_word" => "1");
    $count_result = $rdb->db_select_cond("COUNT(*) as total", "urdu_dict", "$cond_par AND status_word = :status_word", $count_cond_value);
    $total_words = $count_result['row'][0]['total'] ?? 0;

    // Get words for current page
    $cond_value = array("status_word" => "1");
    $words_result = $rdb->db_select_cond("*", "urdu_dict", "$cond_par AND status_word = :status_word ORDER BY urdu_word ASC LIMIT $per_page OFFSET $offset", $cond_value);
    $words_data = $words_result['row'] ?? [];

    // Simple pagination
    $total_pages = ceil($total_words / $per_page);
    $pagination = '';

    if ($total_pages > 1) {
      $pagination .= '<div class="pagination">';

      // Previous page
      if ($page > 1) {
        $prev_page = $page - 1;
        if ($prev_page == 1) {
          $pagination .= '<a href="' . route('urdu.words', ['alphabet' => $alphabet]) . '">« Previous</a> ';
        } else {
          $pagination .= '<a href="' . route('urdu.words.page', ['alphabet' => $alphabet, 'page' => $prev_page]) . '">« Previous</a> ';
        }
      }

      // Page numbers
      for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
          $pagination .= '<span class="current">' . $i . '</span> ';
        } else {
          if ($i == 1) {
            $pagination .= '<a href="' . route('urdu.words', ['alphabet' => $alphabet]) . '">' . $i . '</a> ';
          } else {
            $pagination .= '<a href="' . route('urdu.words.page', ['alphabet' => $alphabet, 'page' => $i]) . '">' . $i . '</a> ';
          }
        }
      }

      // Next page
      if ($page < $total_pages) {
        $next_page = $page + 1;
        $pagination .= '<a href="' . route('urdu.words.page', ['alphabet' => $alphabet, 'page' => $next_page]) . '">Next »</a>';
      }

      $pagination .= '</div>';
    }

    $words = [
      'data' => $words_data,
      'pagination' => $pagination,
      'total' => $total_words,
      'current_page' => $page,
      'total_pages' => $total_pages
    ];

    return view('frontend.urdu_words', compact('alphabet', 'alphabet_display', 'page', 'words'));
  }

  /**
   * Load Urdu word meaning page
   *
   * @param string $word
   * @return \Illuminate\Http\Response
   */
  public function meaningUrdu($word)
  {
    // Initialize legacy database connection
    $rdb = $this->initializeLegacyDb();
    if (!$rdb) {
      abort(500, 'Database connection failed');
    }

    $search_query = $word;
    $search_query2 = filter_var($search_query, FILTER_SANITIZE_STRING);

    $cond_value = array("english_word_url" => $search_query2, "status_word" => "1");
    $cond = "english_word_url=:english_word_url AND status_word=:status_word";
    $result = $rdb->db_fetch_single("*", "urdu_dict", $cond, $cond_value);
    $count = $result['num'];

    if ($count < 1) {
      // Log word not found
      $data = array('word' => $search_query2, 'type_id' => '3');
      $rdb->db_insert("words_not_found", $data);

      return view('frontend.urdu_not_found', compact('search_query', 'search_query2'));
    } else {
      // Update word counter
      $counter = $result['word_counter'];
      $plus_counter = $counter + 1;
      $u_id = $result['u_id'];

      $cond_value = array("u_id" => $u_id);
      $cond = "u_id=:u_id";
      $rdb->db_update_counter("urdu_dict", "word_counter", $plus_counter, $cond, $cond_value);

      // Get translations
      $cond_value = array("urdu_word" => $result['urdu_word'], "status_word" => "1");
      $query = $rdb->db_select_cond("*", "urdu_dict", "urdu_word=:urdu_word AND status_word=:status_word", $cond_value);
      $translations = $query['row'];

      // Get related words
      $com_word = "%" . $result['urdu_word'] . "%";
      $cond_value = array("urdu_word" => $com_word, "urdu_word2" => $result['urdu_word'], "status_word" => "1");
      $query_related = $rdb->db_select_cond("DISTINCT urdu_word,english_word,english_word_url", "urdu_dict", "urdu_word LIKE :urdu_word AND urdu_word <> :urdu_word2 AND status_word=:status_word LIMIT 15", $cond_value);
      $related_words = $query_related['row'];

      return view('frontend.meaning_urdu', [
        'word' => $result,
        'count' => $count,
        'search_query' => $search_query,
        'translations' => $translations,
        'related_words' => $related_words
      ]);
    }
  }

  /**
   * Load Urdu word not found page
   *
   * @return \Illuminate\Http\Response
   */
  public function urduNotFound()
  {
    $search_query = request()->get('word', '');
    return view('frontend.urdu_not_found', compact('search_query'));
  }

  /**
   * Load English words list by alphabet
   *
   * @param string $alphabet
   * @return \Illuminate\Http\Response
   */
  public function englishWords($alphabet)
  {
    // Initialize legacy database connection
    $rdb = $this->initializeLegacyDb();
    if (!$rdb) {
      abort(500, 'Database connection failed');
    }
    $path = url('/') . '/assets/';

    $alphabet = strtoupper($alphabet);
    $page = request()->get('page', 1);
    $per_page = 50; // Words per page
    $offset = ($page - 1) * $per_page;

    // Get total count
    $count_cond_value = array("alphabet" => $alphabet, "status" => "1");
    $count_result = $rdb->db_select_cond("COUNT(*) as total", "words", "left(words, 1) = :alphabet AND status = :status", $count_cond_value);
    $total_words = $count_result['row'][0]['total'] ?? 0;

    // Get words for current page
    $cond_value = array("alphabet" => $alphabet, "status" => "1");
    $words_result = $rdb->db_select_cond("*", "words", "left(words, 1) = :alphabet AND status = :status ORDER BY words ASC LIMIT $per_page OFFSET $offset", $cond_value);
    $words_data = $words_result['row'] ?? [];

    // Simple pagination
    $total_pages = ceil($total_words / $per_page);
    $pagination = '';

    if ($total_pages > 1) {
      $pagination .= '<div class="pagination">';

      // Previous page
      if ($page > 1) {
        $prev_page = $page - 1;
        if ($prev_page == 1) {
          $pagination .= '<a href="' . route('english.words', ['alphabet' => $alphabet]) . '">« Previous</a> ';
        } else {
          $pagination .= '<a href="' . route('english.words.page', ['alphabet' => $alphabet, 'page' => $prev_page]) . '">« Previous</a> ';
        }
      }

      // Page numbers
      for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
          $pagination .= '<span class="current">' . $i . '</span> ';
        } else {
          if ($i == 1) {
            $pagination .= '<a href="' . route('english.words', ['alphabet' => $alphabet]) . '">' . $i . '</a> ';
          } else {
            $pagination .= '<a href="' . route('english.words.page', ['alphabet' => $alphabet, 'page' => $i]) . '">' . $i . '</a> ';
          }
        }
      }

      // Next page
      if ($page < $total_pages) {
        $next_page = $page + 1;
        $pagination .= '<a href="' . route('english.words.page', ['alphabet' => $alphabet, 'page' => $next_page]) . '">Next »</a>';
      }

      $pagination .= '</div>';
    }

    $words = [
      'data' => $words_data,
      'pagination' => $pagination,
      'total' => $total_words,
      'current_page' => $page,
      'total_pages' => $total_pages
    ];

    return view('frontend.english_words', compact('alphabet', 'page', 'words'));
  }

  /**
   * Load English word meaning page
   *
   * @param string $word
   * @return \Illuminate\Http\Response
   */
  public function meaningEnglish($word)
  {
    // Initialize legacy database connection
    $rdb = $this->initializeLegacyDb();
    if (!$rdb) {
      abort(500, 'Database connection failed');
    }

    $search_query = $word;
    $search_query2 = filter_var($search_query, FILTER_SANITIZE_STRING);

    $cond_value = array("word_url" => $search_query2, "status" => "1");
    $cond = "word_url=:word_url AND status=:status";
    $result = $rdb->db_fetch_single("*", "words", $cond, $cond_value);
    $count = $result['num'];

    if ($count < 1) {
      // Log word not found
      $data = array('word' => $search_query2, 'type_id' => '1');
      $rdb->db_insert("words_not_found", $data);

      return view('frontend.english_not_found', compact('search_query', 'search_query2'));
    } else {
      // Update word counter
      $counter = $result['word_counter'];
      $plus_counter = $counter + 1;
      $id = $result['id'];

      $cond_value = array("id" => $id);
      $cond = "id=:id";
      $rdb->db_update_counter("words", "word_counter", $plus_counter, $cond, $cond_value);

      // Get meanings
      $word_id = $result['id'];
      $cond_value = array("word_id" => $word_id, "status" => "1");
      $query_meanings = $rdb->db_select_cond("*", "meanings", "word_id=:word_id AND meaning_status=:status", $cond_value);
      $meanings = $query_meanings['row'];

      // Get related words
      $words_like = "%" . $result['words'] . "%";
      $cond_value = array("words" => $words_like, "words2" => $result['words'], "status" => "1");
      $query_related = $rdb->db_select_cond("DISTINCT words,word_url,status", "words", "words LIKE :words AND words <> :words2 AND status=:status LIMIT 15", $cond_value);
      $related_words = $query_related['row'];

      return view('frontend.meaning_english', [
        'word' => $result,
        'count' => $count,
        'search_query' => $search_query,
        'meanings' => $meanings,
        'related_words' => $related_words
      ]);
    }
  }

  /**
   * Load English word not found page
   *
   * @return \Illuminate\Http\Response
   */
  public function englishNotFound()
  {
    $search_query = request()->get('word', '');
    return view('frontend.english_not_found', compact('search_query'));
  }

  /**
   * Load main learn english page
   *
   * @return \Illuminate\Http\Response
   */
  public function mainLearnEnglish()
  {
    // Initialize legacy database connection
    $rdb = $this->initializeLegacyDb();
    $subcategories = [];

    if ($rdb) {
      try {
        $result = $rdb->db_select_all("*", "sub_categories");

        if ($result && isset($result['row']) && is_array($result['row'])) {
          $subcategories = $result['row'];
        }
      } catch (\Exception $e) {
        // Log error if needed
      }
    }

    return view('frontend.main_learn_english', compact('subcategories'));
  }

  /**
   * Load learn english category page
   *
   * @param string $slug
   * @return \Illuminate\Http\Response
   */
  public function learnEnglishCategory($slug)
  {
    // Initialize legacy database connection
    $rdb = $this->initializeLegacyDb();
    if (!$rdb) {
      abort(500, 'Database connection failed');
    }

    // Get category details
    $cond_value = array("sc_slug" => $slug, "status" => "1");
    $category_result = $rdb->db_select_cond("*", "sub_categories", "sc_slug=:sc_slug AND status=:status", $cond_value);

    if (empty($category_result['row'])) {
      abort(404, 'Category not found');
    }

    $category = $category_result['row'][0];

    return view('frontend.learn_english_category', compact('category', 'slug'));
  }

  /**
   * Handle general search
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function search(Request $request)
  {
    $searchQuery = $request->input('search_query');

    if (empty($searchQuery)) {
      return redirect()->back()->with('error', 'Please enter a search term');
    }

    // Default to English search
    return $this->searchEnglish($request);
  }

  /**
   * Handle English word search
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function searchEnglish(Request $request)
  {
    $searchQuery = $request->input('search_query');

    if (empty($searchQuery)) {
      return redirect()->back()->with('error', 'Please enter an English word to search');
    }

    // Clean and format the search query
    $searchQuery = trim(strtolower($searchQuery));
    $wordUrl = str_replace(' ', '-', $searchQuery);

    // Initialize legacy database connection
    $rdb = $this->initializeLegacyDb();
    if (!$rdb) {
      return redirect()->route('english.not.found')->with('search_query', $searchQuery);
    }

    // Search for the word in the database
    $cond_value = array("word_url" => $wordUrl, "status" => "1");
    $word_result = $rdb->db_select_cond("*", "words", "word_url=:word_url AND status=:status", $cond_value);

    if (!empty($word_result['row'])) {
      // Word found, redirect to meaning page
      return redirect()->route('english.meaning', ['word' => $wordUrl]);
    } else {
      // Word not found, redirect to not found page
      return redirect()->route('english.not.found')->with('search_query', $searchQuery);
    }
  }

  /**
   * Handle Urdu word search
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function searchUrdu(Request $request)
  {
    $searchQuery = $request->input('search_query');

    if (empty($searchQuery)) {
      return redirect()->back()->with('error', 'Please enter an Urdu word to search');
    }

    // Initialize legacy database connection
    $rdb = $this->initializeLegacyDb();
    if (!$rdb) {
      return redirect()->route('urdu.not.found')->with('search_query', $searchQuery);
    }

    // Normalize and clean the search query
    $normalizedQuery = $this->normalizeUrduText($searchQuery);
    $cleanQuery = trim($normalizedQuery);
    
    // Try multiple search strategies for better matching
    $searchResult = $this->performUrduSearch($rdb, $cleanQuery);
    
    if ($searchResult) {
      // Word found, create URL-friendly version and redirect to meaning page
      $wordUrl = $searchResult['english_word_url'] ?? $this->createUrduWordUrl($searchResult['english_word'] ?? $cleanQuery);
      
      // Ensure we have a valid word URL
      if (empty($wordUrl)) {
        $wordUrl = $this->createUrduWordUrl($cleanQuery);
      }
      
      return redirect()->route('urdu.meaning', ['word' => $wordUrl]);
    } else {
      // Log the search attempt for analysis
      $this->logUrduSearchAttempt($rdb, $cleanQuery);
      
      // Word not found, redirect to not found page
      return redirect()->route('urdu.not.found')->with('search_query', $searchQuery);
    }
  }

  /**
   * Normalize Urdu text for better searching
   *
   * @param string $text
   * @return string
   */
  private function normalizeUrduText($text)
  {
    // Remove extra whitespace
    $text = trim(preg_replace('/\s+/', ' ', $text));
    
    // Normalize common Urdu character variations
    $normalizations = [
      'ي' => 'ی',  // Yeh variations
      'ك' => 'ک',  // Kaf variations
      'ء' => 'ٔ',  // Hamza variations
      'ة' => 'ہ',  // Teh marbuta to heh
    ];
    
    foreach ($normalizations as $from => $to) {
      $text = str_replace($from, $to, $text);
    }
    
    return $text;
  }

  /**
   * Perform comprehensive Urdu word search with multiple strategies
   *
   * @param object $rdb Database connection
   * @param string $query Search query
   * @return array|null
   */
  private function performUrduSearch($rdb, $query)
  {
    // Strategy 1: Exact match on urdu_word field
    $cond_value = array("urdu_word" => $query, "status_word" => "1");
    $result = $rdb->db_select_cond("*", "urdu_dict", "urdu_word = :urdu_word AND status_word = :status_word LIMIT 1", $cond_value);
    
    if (!empty($result['row'])) {
      return $result['row'][0];
    }

    // Strategy 2: Try with URL-encoded version (for existing data compatibility)
    $wordUrl = str_replace(' ', '-', strtolower($query));
    $cond_value = array("english_word_url" => $wordUrl, "status_word" => "1");
    $result = $rdb->db_select_cond("*", "urdu_dict", "english_word_url = :english_word_url AND status_word = :status_word LIMIT 1", $cond_value);
    
    if (!empty($result['row'])) {
      return $result['row'][0];
    }

    // Strategy 3: Partial match on urdu_word (starts with)
    $queryStart = $query . '%';
    $cond_value = array("urdu_word" => $queryStart, "status_word" => "1");
    $result = $rdb->db_select_cond("*", "urdu_dict", "urdu_word LIKE :urdu_word AND status_word = :status_word ORDER BY LENGTH(urdu_word) ASC LIMIT 1", $cond_value);
    
    if (!empty($result['row'])) {
      return $result['row'][0];
    }

    // Strategy 4: Contains match (anywhere in the word)
    $queryContains = '%' . $query . '%';
    $cond_value = array("urdu_word" => $queryContains, "status_word" => "1");
    $result = $rdb->db_select_cond("*", "urdu_dict", "urdu_word LIKE :urdu_word AND status_word = :status_word ORDER BY LENGTH(urdu_word) ASC LIMIT 1", $cond_value);
    
    if (!empty($result['row'])) {
      return $result['row'][0];
    }

    // Strategy 5: Search in roman transliteration as fallback
    $cond_value = array("roman" => $query, "status_word" => "1");
    $result = $rdb->db_select_cond("*", "urdu_dict", "roman = :roman AND status_word = :status_word LIMIT 1", $cond_value);
    
    if (!empty($result['row'])) {
      return $result['row'][0];
    }

    return null;
  }

  /**
   * Create URL-friendly version of Urdu word
   *
   * @param string $word
   * @return string
   */
  private function createUrduWordUrl($word)
  {
    // Clean and format for URL
    $word = trim($word);
    
    // Handle empty input
    if (empty($word)) {
      return 'unknown-word';
    }
    
    // Replace spaces with hyphens
    $word = str_replace(' ', '-', $word);
    
    // For Urdu text, we need to preserve the characters but make them URL-safe
    // Convert to lowercase (this works for English parts)
    $word = mb_strtolower($word, 'UTF-8');
    
    // Remove only truly problematic characters, preserve Urdu characters
    $word = preg_replace('/[^\p{L}\p{N}\-_]/u', '', $word);
    
    // Ensure we don't have empty result
    if (empty($word)) {
      return 'urdu-word-' . time();
    }
    
    return $word;
  }

  /**
   * Log unsuccessful search attempts for analysis
   *
   * @param object $rdb Database connection
   * @param string $query Search query
   * @return void
   */
  private function logUrduSearchAttempt($rdb, $query)
  {
    try {
      $data = array(
        'word' => $query,
        'type_id' => '3', // Urdu search type
        'search_date' => date('Y-m-d H:i:s')
      );
      $rdb->db_insert("words_not_found", $data);
    } catch (\Exception $e) {
      // Silently handle logging errors to prevent breaking the search flow
    }
  }

  /**
   * Handle Roman Urdu word search
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function searchRoman(Request $request)
  {
    $searchQuery = $request->input('search_query');

    if (empty($searchQuery)) {
      return redirect()->back()->with('error', 'Please enter a Roman Urdu word to search');
    }

    // Initialize legacy database connection
    $rdb = $this->initializeLegacyDb();
    if (!$rdb) {
      return redirect()->route('roman.not.found')->with('search_query', $searchQuery);
    }

    // Normalize and clean the search query
    $normalizedQuery = $this->normalizeRomanText($searchQuery);
    $cleanQuery = trim($normalizedQuery);
    
    // Try multiple search strategies for better matching
    $searchResult = $this->performRomanSearch($rdb, $cleanQuery);
    
    if ($searchResult) {
      // Word found, create URL-friendly version and redirect to meaning page
      $wordUrl = $searchResult['english_word_url'] ?? $this->createRomanWordUrl($searchResult['english_word'] ?? $cleanQuery);
      
      // Ensure we have a valid word URL
      if (empty($wordUrl)) {
        $wordUrl = $this->createRomanWordUrl($cleanQuery);
      }
      
      return redirect()->route('roman.meaning', ['word' => $wordUrl]);
    } else {
      // Log the search attempt for analysis
      $this->logRomanSearchAttempt($rdb, $cleanQuery);
      
      // Word not found, redirect to not found page
      return redirect()->route('roman.not.found')->with('search_query', $searchQuery);
    }
  }

  /**
   * Normalize Roman Urdu text for better searching
   *
   * @param string $text
   * @return string
   */
  private function normalizeRomanText($text)
  {
    // Remove extra whitespace
    $text = trim(preg_replace('/\s+/', ' ', $text));
    
    // Convert to lowercase for consistent matching
    $text = strtolower($text);
    
    // Normalize common Roman Urdu variations
    $normalizations = [
      'ph' => 'f',     // Phone -> fone
      'gh' => 'g',     // Ghair -> gair (optional)
      'kh' => 'k',     // Khana -> kana (optional)
      'th' => 't',     // Thana -> tana (optional)
      'sh' => 's',     // Sher -> ser (optional)
      'ch' => 'c',     // Chay -> cay (optional)
    ];
    
    // Apply normalizations selectively (you may want to comment out some)
    foreach ($normalizations as $from => $to) {
      // Only apply if it makes sense contextually
      // $text = str_replace($from, $to, $text);
    }
    
    return $text;
  }

  /**
   * Perform comprehensive Roman Urdu word search with multiple strategies
   *
   * @param object $rdb Database connection
   * @param string $query Search query
   * @return array|null
   */
  private function performRomanSearch($rdb, $query)
  {
    // Strategy 1: Exact match on roman field
    $cond_value = array("roman" => $query, "status_word" => "1");
    $result = $rdb->db_select_cond("*", "urdu_dict", "roman = :roman AND status_word = :status_word LIMIT 1", $cond_value);
    
    if (!empty($result['row'])) {
      return $result['row'][0];
    }

    // Strategy 2: Case-insensitive exact match
    $cond_value = array("roman" => $query, "status_word" => "1");
    $result = $rdb->db_select_cond("*", "urdu_dict", "LOWER(roman) = LOWER(:roman) AND status_word = :status_word LIMIT 1", $cond_value);
    
    if (!empty($result['row'])) {
      return $result['row'][0];
    }

    // Strategy 3: Try with URL-encoded version (for existing data compatibility)
    $wordUrl = str_replace(' ', '-', strtolower($query));
    $cond_value = array("english_word_url" => $wordUrl, "status_word" => "1");
    $result = $rdb->db_select_cond("*", "urdu_dict", "english_word_url = :english_word_url AND status_word = :status_word LIMIT 1", $cond_value);
    
    if (!empty($result['row'])) {
      return $result['row'][0];
    }

    // Strategy 4: Partial match on roman field (starts with)
    $queryStart = $query . '%';
    $cond_value = array("roman" => $queryStart, "status_word" => "1");
    $result = $rdb->db_select_cond("*", "urdu_dict", "roman LIKE :roman AND status_word = :status_word ORDER BY LENGTH(roman) ASC LIMIT 1", $cond_value);
    
    if (!empty($result['row'])) {
      return $result['row'][0];
    }

    // Strategy 5: Contains match (anywhere in the word)
    $queryContains = '%' . $query . '%';
    $cond_value = array("roman" => $queryContains, "status_word" => "1");
    $result = $rdb->db_select_cond("*", "urdu_dict", "roman LIKE :roman AND status_word = :status_word ORDER BY LENGTH(roman) ASC LIMIT 1", $cond_value);
    
    if (!empty($result['row'])) {
      return $result['row'][0];
    }

    // Strategy 6: Search in English word as fallback
    $cond_value = array("english_word" => $query, "status_word" => "1");
    $result = $rdb->db_select_cond("*", "urdu_dict", "LOWER(english_word) = LOWER(:english_word) AND status_word = :status_word LIMIT 1", $cond_value);
    
    if (!empty($result['row'])) {
      return $result['row'][0];
    }

    return null;
  }

  /**
   * Create URL-friendly version of Roman Urdu word
   *
   * @param string $word
   * @return string
   */
  private function createRomanWordUrl($word)
  {
    // Clean and format for URL
    $word = trim($word);
    
    // Handle empty input
    if (empty($word)) {
      return 'unknown-word';
    }
    
    // Replace spaces with hyphens
    $word = str_replace(' ', '-', $word);
    
    // Convert to lowercase
    $word = strtolower($word);
    
    // Remove problematic characters, keep only letters, numbers, hyphens, underscores
    $word = preg_replace('/[^a-z0-9\-_]/i', '', $word);
    
    // Ensure we don't have empty result
    if (empty($word)) {
      return 'roman-word-' . time();
    }
    
    return $word;
  }

  /**
   * Log unsuccessful Roman search attempts for analysis
   *
   * @param object $rdb Database connection
   * @param string $query Search query
   * @return void
   */
  private function logRomanSearchAttempt($rdb, $query)
  {
    try {
      $data = array(
        'word' => $query,
        'type_id' => '2', // Roman search type
        'search_date' => date('Y-m-d H:i:s')
      );
      $rdb->db_insert("words_not_found", $data);
    } catch (\Exception $e) {
      // Silently handle logging errors to prevent breaking the search flow
    }
  }
}
