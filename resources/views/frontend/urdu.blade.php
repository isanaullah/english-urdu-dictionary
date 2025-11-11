@extends('frontend.layouts.master')

@section('title', 'Urdu to English Translation free dictionary | ڈکشنری')
@section('meta_description', 'Translate Urdu word into English, Urdu word with English meaning, definition, related, antonyms and synonyms, words from englishurdudictionarypk.com')

@section('header')
    @include('frontend.includes.header_urdu')
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
                                    <h1>Urdu to English Translation</h1>
                                    <br>
                                    <hr style="margin-bottom:5px; border: 1px dashed #d3d3d3;">

                                    <div style="margin-bottom:20px;">
                                        <strong>Urdu to English Dictionary</strong> <img style=" float:right; height:30px;" src="{{ $path }}images/urdu_.png">
                                    </div>

                                    <div class="box">
                                        <form action="{{ $path }}includes/front_controller.php" method="post">
                                            @push('scripts')
                                            <script type='text/javascript' src='{{ $path }}js/urdutextbox.js'></script>
                                            <script language="javascript" src="{{ $path }}js/keyboard.js" type="text/javascript"></script>
                                            <script type="text/javascript">
                                                $().ready(function() {
                                                    $("#txtDesc").autocomplete("{{ $path }}includes/wordlist_urdu_ajax.php", {
                                                        width: 260,
                                                        matchContains: true,
                                                        selectFirst: false
                                                    });
                                                });

                                                window.onload = myOnload;

                                                function myOnload(evt) {
                                                    MakeTextBoxUrduEnabled(txtDesc); //enable Urdu in html text box
                                                }
                                            </script>
                                            @endpush

                                            <input type="text" name="search_query" style="width:60%;" id="txtDesc" dir="rtl" class="inputtext" placeholder="Type Your Urdu Word">
                                            <input type="hidden" name="action" value="urdu_word">
                                            <input type="submit" value="Search">
                                        </form>
                                    </div>

                                    <center>
                                        <br>
                                        <div align="center">
                                            <map name="FPMap0">
                                                <area shape="RECT" coords="3,3,26,26" href="javascript:hurf('zal')">
                                                <area shape="RECT" coords="32,3,57,26" href="javascript:hurf('dhal')">
                                                <area shape="RECT" coords="62,3,85,27" href="javascript:hurf('dal')">
                                                <area shape="RECT" coords="90,4,114,27" href="javascript:hurf('khay')">
                                                <area shape="RECT" coords="119,4,146,27" href="javascript:hurf('hay1')">
                                                <area shape="RECT" coords="148,3,172,27" href="javascript:hurf('chay')">
                                                <area shape="RECT" coords="177,3,201,27" href="javascript:hurf('jim')">
                                                <area shape="RECT" coords="205,3,231,26" href="javascript:hurf('say')">
                                                <area shape="RECT" coords="234,3,261,27" href="javascript:hurf('thay')">
                                                <area shape="RECT" coords="264,3,291,27" href="javascript:hurf('tay')">
                                                <area shape="RECT" coords="295,3,320,27" href="javascript:hurf('pay')">
                                                <area shape="RECT" coords="324,3,350,27" href="javascript:hurf('bay')">
                                                <area shape="RECT" coords="352,3,377,27" href="javascript:hurf('alif')">
                                                <area shape="RECT" coords="382,3,406,27" href="javascript:hurf('alifmada')">
                                                <area shape="RECT" coords="3,32,26,55" href="javascript:hurf('qaf')">
                                                <area shape="RECT" coords="33,32,55,54" href="javascript:hurf('fay')">
                                                <area shape="RECT" coords="60,31,85,55" href="javascript:hurf('gain')">
                                                <area shape="RECT" coords="91,32,115,56" href="javascript:hurf('ain')">
                                                <area shape="RECT" coords="119,32,143,56" href="javascript:hurf('zhoy')">
                                                <area shape="RECT" coords="149,31,171,55" href="javascript:hurf('thoy')">
                                                <area shape="RECT" coords="177,32,200,55" href="javascript:hurf('duad')">
                                                <area shape="RECT" coords="206,31,228,55" href="javascript:hurf('suad')">
                                                <area shape="RECT" coords="235,31,260,57" href="javascript:hurf('sheen')">
                                                <area shape="RECT" coords="266,32,289,56" href="javascript:hurf('seen')">
                                                <area shape="RECT" coords="297,32,318,55" href="javascript:hurf('zhay')">
                                                <area shape="RECT" coords="325,33,347,55" href="javascript:hurf('zay')">
                                                <area shape="RECT" coords="355,32,376,54" href="javascript:hurf('rahy')">
                                                <area shape="RECT" coords="383,32,404,53" href="javascript:hurf('ray')">
                                                <area shape="RECT" coords="4,60,25,84" href="javascript:hurf('bariya')">
                                                <area shape="RECT" coords="33,60,55,84" href="javascript:hurf('ya')">
                                                <area shape="RECT" coords="63,61,83,84" href="javascript:hurf('yamada')">
                                                <area shape="RECT" coords="91,61,113,84" href="javascript:hurf('dochachmihay')">
                                                <area shape="RECT" coords="119,62,144,84" href="javascript:hurf('hay')">
                                                <area shape="RECT" coords="149,61,172,83" href="javascript:hurf('hamza')">
                                                <area shape="RECT" coords="177,62,201,84" href="javascript:hurf('wowmada')">
                                                <area shape="RECT" coords="207,62,229,85" href="javascript:hurf('wow')">
                                                <area shape="RECT" coords="236,61,259,84" href="javascript:hurf('gunah')">
                                                <area shape="RECT" coords="266,61,290,85" href="javascript:hurf('noon')">
                                                <area shape="RECT" coords="297,61,318,84" href="javascript:hurf('mim')">
                                                <area shape="RECT" coords="325,64,345,84" href="javascript:hurf('lam')">
                                                <area shape="RECT" coords="354,63,377,83" href="javascript:hurf('gaf')">
                                                <area shape="RECT" coords="382,62,405,83" href="javascript:hurf('kaf')">
                                                <area shape="RECT" coords="356,91,406,113" href="javascript:hurf('entr')">
                                                <area shape="RECT" coords="73,92,241,113" href="javascript:hurf('space')">
                                                <area shape="RECT" coords="267,91,346,112" href="javascript:hurf('bspace')">
                                                <area shape="RECT" coords="31,90,56,114" href="javascript:hurf('dash')">
                                                <area shape="RECT" coords="2,90,26,113" href="javascript:hurf('Allah')">
                                            </map>
                                            <img src="{{ $path }}images/keyboard.gif" usemap="#FPMap0" border="0" width="409" height="117">
                                        </div>

                                        <hr style="margin-bottom:5px;">

                                        <a href="{{ $path }}"><img src="{{ $path }}images/english_btn.png" title="Click English to Urdu Dictionary" alt="Click English to Urdu Dictionary" style="height:35px;"></a>
                                        <a href="{{ $path }}roman.html"><img src="{{ $path }}images/roman_btn.png" title="Click Roman Urdu to English Dictionary" alt="Click Roman Urdu to English Dictionary" style="height:35px;"></a>
                                        <a href="{{ $path }}urdu.html"><img title="Click Urdu to English Dictionary" alt="Click Urdu to English Dictionary" src="{{ $path }}images/urdu_btn.png" style="height:35px;"></a>

                                        <br>
                                        <hr style="margin-bottom:5px;">

                                        {{-- Urdu Alphabets Links --}}
                                        <a href="{{ $path }}urdu_words/alifmada.html"><strong>آ</strong></a> -
                                        <a href="{{ $path }}urdu_words/alif.html"><strong>ا</strong></a> -
                                        <a href="{{ $path }}urdu_words/bay.html"><strong>ب</strong></a> -
                                        <a href="{{ $path }}urdu_words/pay.html"><strong>پ</strong></a> -
                                        <a href="{{ $path }}urdu_words/tay.html"><strong>ت</strong></a> -
                                        <a href="{{ $path }}urdu_words/thay.html"><strong>ٹ</strong></a> -
                                        <a href="{{ $path }}urdu_words/say.html"><strong>ث</strong></a> -
                                        <a href="{{ $path }}urdu_words/jim.html"><strong>ج</strong></a> -
                                        <a href="{{ $path }}urdu_words/hay.html"><strong>ح</strong></a> -
                                        <a href="{{ $path }}urdu_words/khay.html"><strong>خ</strong></a> -
                                        <a href="{{ $path }}urdu_words/dal.html"><strong>د</strong></a> -
                                        <a href="{{ $path }}urdu_words/dhal.html"><strong>ڈ</strong></a> -
                                        <a href="{{ $path }}urdu_words/zal.html"><strong>ذ</strong></a> -
                                        <a href="{{ $path }}urdu_words/ray.html"><strong>ر</strong></a> -
                                        <a href="{{ $path }}urdu_words/rhay.html"><strong>ڑ</strong></a> -
                                        <a href="{{ $path }}urdu_words/zay.html"><strong>ز</strong></a> -
                                        <a href="{{ $path }}urdu_words/zhay.html"><strong>ژ</strong></a> -
                                        <a href="{{ $path }}urdu_words/seen.html"><strong>س</strong></a> -
                                        <a href="{{ $path }}urdu_words/sheen.html"><strong>ش</strong></a> -
                                        <a href="{{ $path }}urdu_words/suad.html"><strong>ص</strong></a> -
                                        <a href="{{ $path }}urdu_words/duad.html"><strong>ض</strong></a> -
                                        <a href="{{ $path }}urdu_words/thoy.html"><strong>ط</strong></a> -
                                        <a href="{{ $path }}urdu_words/zhoy.html"><strong>ظ</strong></a> -
                                        <a href="{{ $path }}urdu_words/ain.html"><strong>ع</strong></a> -
                                        <a href="{{ $path }}urdu_words/gain.html"><strong>غ</strong></a> -
                                        <a href="{{ $path }}urdu_words/fay.html"><strong>ف</strong></a> -
                                        <a href="{{ $path }}urdu_words/qaf.html"><strong>ق</strong></a> -
                                        <a href="{{ $path }}urdu_words/qyaf.html"><strong>ک</strong></a> -
                                        <a href="{{ $path }}urdu_words/gaf.html"><strong>گ</strong></a> -
                                        <a href="{{ $path }}urdu_words/lam.html"><strong>ل</strong></a> -
                                        <a href="{{ $path }}urdu_words/mim.html"><strong>م</strong></a> -
                                        <a href="{{ $path }}urdu_words/noon.html"><strong>ن</strong></a> -
                                        <a href="{{ $path }}urdu_words/noongunah.html"><strong>ں</strong></a> -
                                        <a href="{{ $path }}urdu_words/wow.html"><strong>و</strong></a> -
                                        <a href="{{ $path }}urdu_words/wowhamza.html"><strong>ؤ</strong></a> -
                                        <a href="{{ $path }}urdu_words/hamza.html"><strong>ء</strong></a> -
                                        <a href="{{ $path }}urdu_words/hay2.html"><strong>ہ</strong></a> -
                                        <a href="{{ $path }}urdu_words/hay3.html"><strong>ھ</strong></a> -
                                        <a href="{{ $path }}urdu_words/yahamza.html"><strong>ئ</strong></a> -
                                        <a href="{{ $path }}urdu_words/ya.html"><strong>ی</strong></a> -
                                        <a href="{{ $path }}urdu_words/bariya.html"><strong>ے</strong></a>

                                        <hr>
                                    </center>

                                    <p style="font-size:14px; text-align:justify;">
                                        The prime focus of this dictionary is on <a href="{{ $path }}" title="English to Urdu Dictionary"> English to Urdu meanings </a> and from Urdu to English meaning, translation. Moreover, visitors can get meaning of English by using <a href="{{ $path }}roman.html" title="Roman Urdu Dictionary">Roman Urdu </a> words through English alphabet similarly Urdu words require Urdu keyboard, which is available on the page.
                                    </p>
                                    <br>

                                    <x-advertisement position="content_top" />
                                    <br>
                                    
                                    <p style="font-size:14px; text-align:justify;">
                                        This dictionary is a classic as well as simple for newcomers, all the professionals and students can get advantages from this equally. This dictionary is a bank of vocabulary and it contains millions of words as compare to others. It is impossible that we have missed any word during compiling, but if yes, then write it on given box we will clear it within hours automatically. Fortunately, it is totally free online modern computerized dictionary and we have taken all words from the reputable language dictionaries of the world. Englishto urdudictionary.com.pk is the reliable source for getting words <strong>meanings in Urdu and Urdu translation</strong>. We not only display the meaning of the word, but at the same time definition of the searched word. This dictionary is very helpful for the English language beginners, competitive exam students, researchers, lawyers, scholars, professors and for office users. The query, suggestion and ideas from the visitors side will be welcome for the betterment of this dictionary.
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
                                        <h2><a href="{{ $path }}roman.html">Roman Urdu To English Dictionary</a></h2>
                                        <p style="font-size:13px;">Roman Urdu is commonly used in messages of computer or mobiles, but it is written by the same English alphabet. This method of writing is being used in different people who do not know English properly or grammatically. Roman Urdu words...
                                        </p>
                                    </div>
                                    <div class="readMore"><a href="{{ $path }}roman.html">Click Roman Dictionary
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
                                                <li><a href="{{ route('urdu.meaning', ['word' => $popular_row['english_word_url']]) }}" title="Meaning of {{ $popular_row['urdu_word'] }}">{{ $popular_row['urdu_word'] }}</a> </li>
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
                                        $popular_q = $rdb->db_select_cond("*", "urdu_dict", "status_word=:status_word ORDER BY word_counter DESC LIMIT 14", $cond_value);
                                        @endphp
                                        @foreach ($popular_q['row'] as $popular_row)
                                            @if(!empty($popular_row['english_word_url']))
                                                <li><a href="{{ route('urdu.meaning', ['word' => $popular_row['english_word_url']]) }}" title="Meaning of {{ $popular_row['urdu_word'] }}">{{ $popular_row['urdu_word'] }}</a> </li>
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

            @include('frontend.includes.english_alphabets')
            @include('frontend.includes.roman_alphabets')
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
