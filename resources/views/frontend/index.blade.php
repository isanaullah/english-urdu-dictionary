@php
    /*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
@endphp
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="js">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>English Urdu Dictionary | انگلش اردو ڈکشنری</title>
    <meta name="description"
        content="Consult free online English to Urdu dictionary for Urdu to English translation and from English to Urdu meaning, this English Urdu dictionary is authentic and trustworthy for definition, antonyms, synonyms, similar words, meanings, translations and pronunciation.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
    <link rel="stylesheet" type="text/css" href="{{ $path }}css/pagination.css" />

    @include('frontend.includes.header_english')
    <div class="home">
        <div class="responsive_container firstContainer">
            <div class="responsive_row ac_topslot " style="postion:static; top:0;">
                <div class="responsive_cell_whole  ">
                    <div class="ad_trick_header  ">
                        <div id="ad_topslot" class="am-home ">
                            <x-advertisement position="homepage_banner" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="responsive_row">
                <div class="responsive_cell_home_center_plus_left">
                    <div class="responsive_cell_home_center responsive_float_right">
                        <div class="responsive_row">

                            <div class="responsive_cell_home_center">

                                <div class="responsive_row">
                                    <div class="responsive_cell_home_center">
                                        <div class="featuredContent contentBlock">
                                            <h1 style="font-size:22px;">English to English and Urdu meaning dictionary,
                                                roman Urdu to English dictionary online free translation</h1>
                                            <br>

                                            <script type="text/javascript">
                                                $().ready(function() {
                                                    $("#english_words_1").autocomplete("{{ $path }}includes/wordslist_ajax.php", {
                                                        width: 260,
                                                        matchContains: true,
                                                        //mustMatch: true,
                                                        //minChars: 0,
                                                        //multiple: true,
                                                        //highlight: false,
                                                        //multipleSeparator: ",",
                                                        selectFirst: false
                                                    });

                                                });
                                            </script>



                                            {{-- @include('frontend.includes.banners.468x60') --}}

                                            <hr style="margin-bottom:5px; border: 1px dashed #d3d3d3;">
                                            <div style="margin-bottom:20px;">
                                                <strong>English to Urdu Dictionary</strong> <img
                                                    style=" float:right; height:30px;"
                                                    src="{{ $path }}images/english_.png">
                                            </div>

                                            <div class="box">
                                                <form action="{{ $path }}includes/front_controller.php"
                                                    method="post">

                                                    <input type="text" style="width:60%;" name="search_query"
                                                        id="english_words_1" placeholder="Type Your English Word">
                                                    <input type="hidden" name="action" value="english_word">
                                                    <input type="submit" value="Search">
                                                </form>

                                            </div>


                                            <center>
                                                <a href="{{ $path }}"><img
                                                        src="{{ $path }}images/english_btn.png"
                                                        title="Click English to Urdu Dictionary"
                                                        alt="Click English to Urdu Dictionary" style="height:35px;"></a>
                                                <a href="{{ route('roman') }}"><img
                                                        src="{{ $path }}images/roman_btn.png"
                                                        title="Click Roman Urdu to English Dictionary"
                                                        alt="Click Roman Urdu to English Dictionary"
                                                        style="height:35px;"></a>
                                                <a href="{{ route('urdu') }}"><img
                                                        title="Click Urdu to English Dictionary"
                                                        alt="Click Urdu to English Dictionary"
                                                        src="{{ $path }}images/urdu_btn.png"
                                                        style="height:35px;"></a>


                                                <hr style="margin-bottom:5px;">


                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'A']) }}"><strong>A</strong></a>
                                                -

                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'B']) }}"><strong>B</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'C']) }}"><strong>C</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'D']) }}"><strong>D</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'E']) }}"><strong>E</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'F']) }}"><strong>F</strong></a>
                                                -

                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'G']) }}"><strong>G</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'H']) }}"><strong>H</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'I']) }}"><strong>I</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'J']) }}"><strong>J</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'K']) }}"><strong>K</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'L']) }}"><strong>L</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'M']) }}"><strong>M</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'N']) }}"><strong>N</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'O']) }}"><strong>O</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'P']) }}"><strong>P</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'Q']) }}"><strong>Q</strong></a>
                                                -

                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'R']) }}"><strong>R</strong></a>
                                                <br>
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'S']) }}"><strong>S</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'T']) }}"><strong>T</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'U']) }}"><strong>U</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'V']) }}"><strong>V</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'W']) }}"><strong>W</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'X']) }}"><strong>X</strong></a>
                                                -


                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'Y']) }}"><strong>Y</strong></a>
                                                -
                                                <a
                                                    href="{{ route('english.words', ['alphabet' => 'Z']) }}"><strong>Z</strong></a>
                                                <hr style="margin-bottom:5px;">
                                            </center>

                                            <p style="font-size:14px; text-align:justify;">
                                                English to Urdu dictionary and Urdu to English dictionary is vital for
                                                English learners. In some cases readers need dictionary English to
                                                English translation, while in daily life we require Urdu to English
                                                translation of some text.






                                            </p>

                                            <x-advertisement position="content_top" />

                                            <p>This online dictionary Urdu to English covers Urdu translation, Urdu
                                                dictionary with pronunciation, roman Urdu to English online converter
                                                and know here what is what means, online.Dictionary is a comparatively
                                                huge volume book that contains millions of words of a language with
                                                meanings. Moreover, it provides full details about the word origin,
                                                pronunciation, meanings, antonyms and synonymous, similar word and some
                                                time word used in sentence to clear the meaning to reader. In this era,
                                                which is totally camouflaged by electronic media and we all use
                                                different medium for our research or office work, while computer is the
                                                main medium to solve all our issues online and without consulting
                                                others. Now we can search online dictionary just on one click, but main
                                                things is that who will provide online quality meanings with description
                                                quickly as you want. Dictionary is primary need of all walk of life to
                                                check the meaning, spelling, synonyms even selection of more suitable
                                                word that you want to write down. All the professional people consult
                                                dictionary many times in day most of professionals need this frequently
                                                just as if you are a lawyer or judge, a teacher or student, research
                                                scholar, translator and a learner of foreign language. It is easy to
                                                find an <strong>English dictionary from English to Urdu</strong>, but it
                                                tough to estimate the quality and reliability of dictionary, so to avoid
                                                all these issues we present online English to Urdu dictionary completely
                                                free and easily accessible.
                                            </p>

                                            <p style="font-size:14px;  text-align:justify;">
                                                The administration of englishurdudictionarypk.com is very much pleased
                                                to launch a reliable and trustworthy free of coast English to <a
                                                    href="{{ route('urdu') }}" title="Urdu to Dictionary">Urdu
                                                    dictionary </a> with meanings, definitions of words and detailed
                                                description. Our Dictionary has a huge number of words, synonyms,
                                                phrases, verb, noun, pronoun, adjective and adverb with meanings and
                                                references. Our online facility is amazing and very easy to find your
                                                desire difficult word for meaning within no time just write your search
                                                word in type-in the box and click the meaning in Urdu. Along this index
                                                page visitors can press alphabetic of English and Urdu to write their
                                                search word quickly. Whenever visitor write a single alphabet in type-in
                                                the box and in the same time a series of similar words will be appeared
                                                on box related to alphabet. Although Urdu meaning is the main task of
                                                visitors, but we have plenty of related word for concerned word. Here,
                                                on this website visitors will get classic English with Urdu meanings and
                                                a little bit definition of the searched word. On this
                                                Englishtourdudictionary.com.pk searcher will get easy and understandable
                                                English meanings with Urdu translation. It is also easy to write word by
                                                using English and Urdu keyboard available on page.
                                            </p>
                                            <br>
                                            <p style="font-size:14px;  text-align:justify;">
                                                <a href="{{ $path }}"
                                                    title="englishurdudictionarypk.com"><strong>englishurdudictionarypk.com</strong></a>
                                                provides a trustworthy plate form to translate English to Urdu words,
                                                Urdu to English translation and <strong><a href="{{ route('roman') }}"
                                                        title="Roman Urdu Dictionary">Roman Urdu </a> to English
                                                    translation</strong>. Same as English to Urdu translation visitors
                                                can translate Urdu to English just writing phonetic keyboard. When
                                                during word searching your desire word not appeared in the box then you
                                                have to check your spelling first or take helps to just writing initial
                                                alphabet for required word. Our online Urdu to English dictionary has a
                                                huge volume of words and phrase with meanings, all these words and their
                                                meanings are precisely selected by language experts. This online
                                                dictionary provides standard classic and trusted words accurate in
                                                spelling and meanings. This reliable Englishtourdudictionary.com.pk is
                                                the source of millions of words picked from International standard
                                                dictionaries like oxford and other time tested dictionaries of the
                                                world. It is most reliable free online trusted edictionary that will
                                                give you a solid and sound meanings from English to Urdu and from
                                                <strong>Urdu to English translation</strong>. Search your desire words
                                                in quick time with reference and close similar meanings of the written
                                                word. This englishurdudictionarypk.com will defiantly fulfill your need
                                                and demand in a moment.


                                                <!-- End of DIV -->
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="responsive_row">
                                    <div class="responsive_cell_home_center_half responsive_no_margin_vertical">


                                        <div class="responsive_row rssPanel">
                                            <div class="responsive_cell_home_center_half">
                                                <div class="contentBlock halfBlock purpleBlock">
                                                    <div class="blockBody">
                                                        <h2><a href="{{ route('roman') }}">Roman Urdu To
                                                                English Dictionary</a></h2>
                                                        <p style="font-size:13px;">Roman Urdu is commonly used in
                                                            messages of computer or mobiles, but it is written by the
                                                            same English alphabet. This method of writing is being used
                                                            in different people who do not know English properly or
                                                            grammatically...
                                                        </p>
                                                    </div>
                                                    <div class="readMore"><a href="{{ route('roman') }}">Click Roman
                                                            Dictionary
                                                            <span class="icon-arrow-right">&nbsp;</span></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="responsive_cell_home_center_half responsive_no_margin_vertical">
                                        <div class="contentBlock halfBlock purpleBlock">
                                            <div class="blockBody">
                                                <h2><a href="{{ route('urdu') }}">Urdu To English
                                                        Dictionary</a></h2>
                                                <p style="font-size:13px;">
                                                    he prime focus of this dictionary is on English to Urdu meanings and
                                                    from Urdu to English translation. Moreover, visitors can get meaning
                                                    of English by using Roman Urdu words through English alphabet
                                                    similarly Urdu words require Urdu keyboard, which is available on
                                                    the page.
                                                </p>
                                            </div>
                                            <div class="readMore"><a href="{{ route('urdu') }}">
                                                    Click Urdu Dictionary
                                                    <span class="icon-arrow-right">&nbsp;</span></a></div>
                                        </div>


                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="responsive_cell_home_left responsive_float_right responsive_no_margin ad_trick_left">

                        <div class="responsive_row">
                            <div class="contentBlock responsive_cell">
                                <x-advertisement position="sidebar_ad" />
                            </div>
                        </div>

                        <div class="responsive_row">
                            <div class="contentBlock trendingWordsPanel">
                                <div class="blockBody">
                                    <div class="trendingWords" data-country="all" style="display:block;">
                                        <h2>Most Popular Words</h2>
                                        <div class="responsive_columns_2_on_smartphone ">
                                            <ul>

                                                @php
                                                    $cond_value = ['status' => '1'];
                                                    $popular_q = $rdb->db_select_cond(
                                                        '*',
                                                        'words',
                                                        'status=:status ORDER BY word_counter DESC LIMIT 38',
                                                        $cond_value,
                                                    );
                                                @endphp
                                                @foreach ($popular_q['row'] as $popular_row)
                                                    @if (!empty($popular_row['word_url']))
                                                        <li><a href="{{ route('english.meaning', ['word' => $popular_row['word_url']]) }}"
                                                                title="Meaning of {{ $popular_row['words'] }}">{{ strtolower($popular_row['words']) }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        @include('frontend.includes.follow_us')

                        <div
                            class="responsive_row ac_houseslot1  responsive_hide_on_hd responsive_hide_on_desktop responsive_hide_on_tablet">
                            <div class="responsive_cell_home_left  ">
                                <div class="responsive_center  ">
                                    <div id="ad_houseslot1" class="am-home ">
                                        <x-advertisement position="header_ad" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="responsive_row ac_houseslot2  responsive_hide_on_desktop responsive_hide_on_tablet responsive_hide_on_smartphone">
                            <div class="contentBlock responsive_cell">
                                <x-advertisement position="popup_ad" />
                            </div>
                        </div>

                    </div>

                </div>


                <div class="responsive_cell_home_right">





                    <div class="responsive_row">
                        <div class="contentBlock responsive_cell">
                            <x-advertisement position="sidebar_ad" />
                        </div>
                    </div>


                    <div class="responsive_row">
                        <div class="contentBlock responsive_cell">
                            <x-advertisement position="content_bottom" />
                        </div>
                    </div>


                    @include('frontend.includes.english_alphabets')



                    @include('frontend.includes.urdu_alphabets')

                    @include('frontend.includes.roman_alphabets')



                    <div class="responsive_row">
                        <div class="contentBlock trendingWordsPanel">
                            <div class="blockBody">
                                <div class="trendingWords" data-country="all" style="display:block;">
                                    <h2>Recent Updated Words</h2>
                                    <div class="responsive_columns_2_on_smartphone ">
                                        <ul>
                                            @php
                                                $cond_value = ['status' => '1'];
                                                $popular_q = $rdb->db_select_cond(
                                                    '*',
                                                    'words',
                                                    'status=:status ORDER BY id DESC LIMIT 10',
                                                    $cond_value,
                                                );
                                            @endphp
                                            @foreach ($popular_q['row'] as $popular_row)
                                                @if (!empty($popular_row['word_url']))
                                                    <li><a href="{{ route('english.meaning', ['word' => $popular_row['word_url']]) }}"
                                                            title="Meaning of {{ $popular_row['words'] }}">{{ strtolower($popular_row['words']) }}</a>
                                                    </li>
                                                @endif
                                            @endforeach



                                        </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>












                    <!------------------------------------------------->
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Advertisement Section -->
    <div class="responsive_container">
        <div class="responsive_row">
            <div class="responsive_cell_whole">
                <div class="contentBlock responsive_cell" style="text-align: center; padding: 20px 0;">
                    <x-advertisement position="footer_ad" />
                </div>
            </div>
        </div>
    </div>

    @include('frontend.includes.footer')
