@extends('frontend.layouts.master')

@section('title')
    @if(isset($word) && $count > 0)
        {{ $word['urdu_word'] }} into English translation and word in English | ڈکشنری
    @else
        Word Not Found | ڈکشنری
    @endif
@endsection

@section('meta_description')
    @if(isset($word) && $count > 0)
        {{ $word['urdu_word'] }} in English, translation, meaning and English related words.
    @else
        Word not found in dictionary.
    @endif
@endsection

@section('header')
    @include('frontend.includes.header_urdu')
@endsection

@section('content')
    <div class="responsive_row ac_topslot ">
        <div class="responsive_cell_whole  ">
            <div class="ad_trick_header  ">
                <div id="ad_topslot" class="am-default ">
                    <x-advertisement position="homepage_banner" />
                </div>
            </div>
        </div>
    </div>

    <div class="responsive_row">
        <div class="responsive_cell_left ad_trick_left ac_leftslot  responsive_hide_on_smartphone">
            <div id="ad_leftslot" class="am-default ">
                <x-advertisement position="sidebar_ad" />
            </div>
        </div>
        
        <div class="responsive_cell_center_plus_right">
            <article class="english">
                <div id="firstClickFreeAllowed">
                    <div>
                        <div class="responsive_row">
                            <div class="responsive_cell_center">
                                <div class="responsive_row">
                                    <div class="responsive_cell_center">
                                        <div class="entryPageContent">
                                            <header class="entryHeader">
                                                <div class="breadcrumb">
                                                    <ul>
                                                        <li><a href="{{ route('home') }}">Home</a></li>
                                                        <li><a href="{{ route('urdu') }}">Urdu to English and Urdu</a></li>
                                                        <li>
                                                            @if(isset($word) && $count > 0)
                                                                {{ $word['urdu_word'] }}
                                                            @else
                                                                {{ $search_query ?? 'Word Not Found' }}
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                                
                                                <div class="responsive_hide_on_smartphone entryPanel">
                                                    @if($count > 0)
                                                        <div style="position:relative;text-align: center;border-radius: 3px;float: right;margin-bottom:20px;margin-left:10px;padding: 0 3px;">
                                                            {{-- Banner placeholder --}}
                                                        </div>
                                                        <br>
                                                    @else
                                                        <h1 class="pageTitle">{{ $word['urdu_word'] ?? $search_query }}</h1>
                                                        <p>Translation of <strong>({{ $word['urdu_word'] ?? $search_query }})</strong> is not present in our database right now. Our team is updating and soon it will be updated.</p>
                                                    @endif
                                                </div>

                                                <h1 class="pageTitle">{{ $word['urdu_word'] ?? $search_query }}</h1>
                                            </header>
                                            
                                            <div>
                                                <div>
                                                    @if($count > 0)
                                                        <section class="se1 senseGroup">
                                                            <x-advertisement position="content_top" />
                                                            
                                                            <br>
                                                            <h2><em>{{ $word['urdu_word'] }}</em> &nbsp;Translation</h2>

                                                            <div class="msDict sense">
                                                                <br>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><strong><em>Urdu Word</em></strong></td>
                                                                            <td><strong><em>Roman Urdu</em></strong></td>
                                                                            <td><strong><em>Meaning in English</em></strong></td>
                                                                        </tr>

                                                                        @if(isset($translations))
                                                                            @foreach($translations as $translation)
                                                                                <tr>
                                                                                    <td>{{ $translation['urdu_word'] }}</td>
                                                                                    <td>{{ $translation['roman'] }}</td>
                                                                                    <td>{{ $translation['english_word'] }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="4">
                                                                                        @if(!empty($translation['english_word_url']))
                                                                                            <a href="{{ route('english.meaning', ['word' => $translation['english_word_url']]) }}" title="Click for {{ $translation['english_word'] }} definition">
                                                                                                <center>Click for <strong>({{ $translation['english_word'] }})</strong> definition</center>
                                                                                            </a>
                                                                                        @else
                                                                                            <center><strong>({{ $translation['english_word'] }})</strong> definition not available</center>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>

                                                                <hr style="margin-bottom:5px; border: 1px dashed #d3d3d3;">

                                                                <div style="margin-bottom:20px;">
                                                                    <strong>Urdu to English Dictionary</strong> 
                                                                    <img style="float:right; height:30px;" src="{{ $path }}images/urdu_.png">
                                                                </div>

                                                                <div class="box">
                                                                    <form action="{{ $path }}includes/front_controller.php" method="post">
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
                                                                                MakeTextBoxUrduEnabled(txtDesc);
                                                                            }
                                                                        </script>

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

                                                                    @php
                                                                    $urdu_alphabets = [
                                                                        'alifmada' => 'آ', 'alif' => 'ا', 'bay' => 'ب', 'pay' => 'پ', 'tay' => 'ت', 'thay' => 'ٹ',
                                                                        'say' => 'ث', 'jim' => 'ج', 'hay' => 'ح', 'khay' => 'خ', 'dal' => 'د', 'dhal' => 'ڈ',
                                                                        'zal' => 'ذ', 'ray' => 'ر', 'rhay' => 'ڑ', 'zay' => 'ز', 'zhay' => 'ژ', 'seen' => 'س',
                                                                        'sheen' => 'ش', 'suad' => 'ص', 'duad' => 'ض', 'thoy' => 'ط', 'zhoy' => 'ظ', 'ain' => 'ع',
                                                                        'gain' => 'غ', 'fay' => 'ف', 'qaf' => 'ق', 'qyaf' => 'ک', 'gaf' => 'گ', 'lam' => 'ل',
                                                                        'mim' => 'م', 'noon' => 'ن', 'noongunah' => 'ں', 'wow' => 'و', 'wowhamza' => 'ؤ',
                                                                        'hamza' => 'ء', 'hay2' => 'ہ', 'hay3' => 'ھ', 'yahamza' => 'ئ', 'ya' => 'ی', 'bariya' => 'ے'
                                                                    ];
                                                                    @endphp

                                                                    @foreach($urdu_alphabets as $key => $letter)
                                                                        <a href="{{ route('urdu.words', ['alphabet' => $key]) }}"><strong>{{ $letter }}</strong></a>
                                                                        @if(!$loop->last) - @endif
                                                                        @if(in_array($key, ['thay', 'zal', 'zhoy', 'bariya'])) <br> @endif
                                                                    @endforeach

                                                                    <hr style="margin-bottom:5px;">
                                                                </center>

                                                                <br>
                                                                <table width="100%" height="10%">
                                                                    <tr><td></td></tr>
                                                                    <tr align="center"><td></td></tr>
                                                                </table>
                                                                
                                                                <strong>Related Words of {{ $word['urdu_word'] }}: </strong>
                                                                <br>

                                                                @if(isset($related_words) && count($related_words) > 0)
                                                                    @foreach($related_words as $related)
                                                                        @if(!empty($related['english_word_url']))
                                                                            <a href="{{ route('urdu.meaning', ['word' => $related['english_word_url']]) }}" title="{{ $related['urdu_word'] }} Translation">{{ $related['urdu_word'] }}</a>,
                                                                        @else
                                                                            {{ $related['urdu_word'] }},
                                                                        @endif
                                                                    @endforeach
                                                                @endif

                                                                <br><br>
                                                                <p>The searched word gives various related meaning and you can pick most suitable word among these according to your desire or suitability. <br>
                                                                    <a href="{{ route('home') }}">www.englishurdudictionarypk.com</a> provides millions of online free words & meanings keep touch with us.
                                                                </p>
                                                            </div>
                                                        </section>
                                                    @endif

                                                    <x-advertisement position="content_bottom" />
                                                </div>
                                            </div>
                                            
                                            <div class="responsive_hide_on_non_smartphone entryPanel">
                                                @if($count > 0)
                                                    <div style="position:relative;text-align: center;border-radius: 3px;margin-bottom:20px;margin-left:10px;padding: 0 3px;">
                                                        <x-advertisement position="header_ad" />
                                                    </div>
                                                @else
                                                    <h1 class="pageTitle">{{ $search_query }}</h1>
                                                    <p>Translation of <strong>({{ $word['urdu_word'] ?? $search_query }})</strong> is not present in our database right now. Our team is updating and soon it will be updated.</p>
                                                @endif
                                                <div class="clear">&nbsp;</div>
                                            </div>

                                            <div id="ad_btmslot_csa" class="am-default "></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="responsive_row">
                                    <div class="responsive_cell_home_center_half responsive_no_margin_vertical">
                                        <div class="responsive_row rssPanel">
                                            <div class="responsive_cell_home_center_half">
                                                <div class="contentBlock halfBlock purpleBlock">
                                                    <div class="blockBody">
                                                        <h2><a href="{{ route('home') }}">English to English and Urdu Dictionary</a></h2>
                                                        <p style="font-size:13px;">Dictionary is a comparatively huge volume book that contains millions of words of a language with meanings. Moreover, it provides full details about the word origin, meanings, synonymous, similar word and some time word used in sentence to clear the meaning to reader.</p>
                                                    </div>
                                                    <div class="readMore">
                                                        <a href="{{ route('home') }}">Click English Dictionary
                                                            <span class="icon-arrow-right">&nbsp;</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="responsive_cell_home_center_half responsive_no_margin_vertical">
                                        <div class="contentBlock halfBlock purpleBlock">
                                            <div class="blockBody">
                                                <h2><a href="{{ route('roman') }}">Roman Urdu To English Dictionary</a></h2>
                                                <p style="font-size:13px;">Roman Urdu is commonly used in messages of computer or mobiles, but it is written by the same English alphabet. This method of writing is being used in different people who do not know English properly or grammatically. Roman Urdu words...</p>
                                            </div>
                                            <div class="readMore">
                                                <a href="{{ route('roman') }}">Click Roman Dictionary
                                                    <span class="icon-arrow-right">&nbsp;</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
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

@section('sidebar')
    <div class="responsive_row">
        <div class="contentBlock responsive_cell">
            <x-advertisement position="sidebar_ad" />
        </div>
    </div>

    @include('frontend.includes.urdu_alphabets')
    @include('frontend.includes.english_alphabets')
    @include('frontend.includes.roman_alphabets')
@endsection
