@extends('frontend.layouts.master')

@section('title', 'Roman Urdu to English translation online')
@section('meta_description', 'Translate Roman Urdu into English and get its meaning, definition, related, similar words, antonyms and synonyms.')

@section('header')
    @include('frontend.includes.header_roman')
@endsection

@section('content')
    <div class="responsive_row ac_topslot ">
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
                                    <h1>Roman Urdu to English Translation</h1>
                                    <br>
                                    <hr style="margin-bottom:5px;  border: 1px dashed #d3d3d3;">

                                    <div style="margin-bottom:20px;">
                                        <strong>Roman Urdu to English Dictionary</strong> <img style=" float:right; height:30px;" src="{{ $path }}images/roman_.png">
                                    </div>

                                    <div class="box">
                                        <form action="{{ $path }}includes/front_controller.php" method="post">
                                            @push('scripts')
                                            <script type="text/javascript">
                                                $().ready(function() {
                                                    $("#romans_words_1").autocomplete("{{ $path }}includes/wordlist_roman_ajax.php", {
                                                        width: 260,
                                                        matchContains: true,
                                                        selectFirst: false
                                                    });
                                                });
                                            </script>
                                            @endpush

                                            <input type="text" name="search_query" style="width:60%;" id="romans_words_1" placeholder="Type Your Urdu Word">
                                            <input type="hidden" name="action" value="roman_urdu">
                                            <input type="submit" class="gform_button button">
                                        </form>
                                    </div>

                                    <hr style="margin-bottom:5px;">
                                    <center>
                                        @include('frontend.includes.roman_alphabets')
                                        
                                        <hr style="margin-bottom:5px;">

                                        <a href="{{ $path }}"><img src="{{ $path }}images/english_btn.png" title="Click English to Urdu Dictionary" alt="Click English to Urdu Dictionary" style="height:35px;"></a>
                                        <a href="{{ $path }}roman.html"><img src="{{ $path }}images/roman_btn.png" title="Click Roman Urdu to English Dictionary" alt="Click Roman Urdu to English Dictionary" style="height:35px;"></a>
                                        <a href="{{ $path }}urdu.html"><img title="Click Urdu to English Dictionary" alt="Click Urdu to English Dictionary" src="{{ $path }}images/urdu_btn.png" style="height:35px;"></a>
                                    </center>

                                    <p style="font-size:14px; text-align:justify;">Roman Urdu is commonly used in messages of computer or mobiles, but it is written by the same English alphabet. This method of writing is being used in different people who do not know English properly or grammatically. Roman Urdu words are also being translated into English meaning by the help of this <a href="{{ $path }}" title="English to Urdu Dictionary"> English to Urdu dictionary </a>and for this we have a separate phonetic keyboard as well as common English keyboard. Roman Urdu is very easy in written and reading, but the common thing between English and this mode of language is use of similar keyboard or alphabets.
                                    </p>
                                    <br>

                                    <x-advertisement position="content_top" />
                                    <br>

                                    <p style="font-size:14px; text-align:justify;"> Roman Urdu is becoming familiar in Pakistani and Indian societies to conveying messages through email or just from mobiles phones. Here, visitors can get Roman Urdu translation by simply adding or writing word in given box and then click on translate button. Most of the people want to know <strong>English meaning of Roman Urdu</strong> word for their vocabulary or to understanding meaning to desire word. Roman Urdu is easy in written as compare to pure Urdu language written because in this mode common English alphabet are used. However, Urdu alphabets or Arabic haroof tahjiare difficult to compile to make a complete word. In this dictionary visitors can easily change and translate English to Urdu, <a href="{{ $path }}urdu.html" title="Urdu to English Dictionary">Urdu to English</a> and <strong>Roman Urdu to English meaning</strong>. Roman Urdu is frequently being used in conveying messages through latest electronics devices like mobiles and computer. We have million of words in our dictionary through that visitor can easily translate the meanings of the word and even they can get a detail definition of their searched word. To enhance vocabulary in all three medium of languages like English, Urdu and Roman Urdu consult our trusted and authentic dictionary.</p>

                                </div>
                            </div>
                        </div>
                        
                        <div class="responsive_row">
                            <div class="responsive_cell_home_center_half responsive_no_margin_vertical">
                                <div class="responsive_row rssPanel">
                                    <div class="responsive_cell_home_center_half">
                                        <div class="contentBlock halfBlock purpleBlock">
                                            <div class="blockBody">
                                                <h2><a href="{{ $path }}">English to English and Urdu Dictionary</a></h2>
                                                <p style="font-size:13px;">Dictionary is a comparatively huge volume book that contains millions of words of a language with meanings. Moreover, it provides full details about the word origin, meanings, synonymous, similar word and some time word used in sentence to clear the meaning to reader.</p>
                                            </div>
                                            <div class="readMore"><a href="{{ $path }}">Click English Dictionary
                                                    <span class="icon-arrow-right">&nbsp;</span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="responsive_cell_home_center_half responsive_no_margin_vertical">
                                <div class="contentBlock halfBlock purpleBlock">
                                    <div class="blockBody">
                                        <h2><a href="{{ $path }}urdu.html">Urdu To English Dictionary</a></h2>
                                        <p style="font-size:13px;">
                                            The prime focus of this dictionary is on English to Urdu meanings and from Urdu to English translation. Moreover, visitors can get meaning of English by using Roman Urdu words through English alphabet similarly Urdu words require Urdu keyboard, which is available on the page. This dictionary is a classic as well as simple....
                                        </p>
                                    </div>
                                    <div class="readMore"><a href="{{ $path }}urdu.html">Click Urdu Dictionary
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
                                        $cond_value = array("status_word" => "1");
                                        $popular_q = $rdb->db_select_cond("*", "urdu_dict", "status_word=:status_word ORDER BY word_counter DESC LIMIT 20", $cond_value);
                                        @endphp
                                        @foreach ($popular_q['row'] as $popular_row)
                                            @if(!empty($popular_row['english_word_url']))
                                                <li><a href="{{ route('roman.meaning', ['word' => $popular_row['english_word_url']]) }}" title="Meaning of {{ $popular_row['roman'] }}">{{ strtolower($popular_row['roman']) }}</a> </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('frontend.includes.follow_us')

                <div class="responsive_row">
                    <div class="contentBlock trendingWordsPanel">
                        <div class="blockBody">
                            <div class="trendingWords" data-country="all" style="display:block;">
                                <h2>Recent Updated Words</h2>
                                <div class="responsive_columns_2_on_smartphone ">
                                    <ul>
                                        @php
                                        $cond_value = array("status_word" => "1");
                                        $popular_q = $rdb->db_select_cond("*", "urdu_dict", "status_word=:status_word ORDER BY u_id DESC LIMIT 14", $cond_value);
                                        @endphp
                                        @foreach ($popular_q['row'] as $popular_row)
                                            @if(!empty($popular_row['english_word_url']))
                                                <li><a href="{{ route('roman.meaning', ['word' => $popular_row['english_word_url']]) }}" title="Meaning of {{ $popular_row['roman'] }}">{{ strtolower($popular_row['roman']) }}</a> </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
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

            @include('frontend.includes.roman_alphabets')
            @include('frontend.includes.english_alphabets')
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
@endsection
