@extends('frontend.layouts.master')

@section('title')
    {{ $word['roman'] ?? 'Word Not Found' }} is a roman word and its English translation
@endsection

@section('meta_description')
    {{ $word['roman'] ?? 'Word' }} translation from Roman to English, similar words, related words, antonyms, synonyms and its explanations in English.
@endsection

@section('header')
    @include('frontend.includes.header_roman')
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
                                                        <li><a href="{{ route('home') }}">home</a></li>
                                                        <li><a href="{{ route('roman') }}">Roman Urdu to English</a></li>
                                                        <li><a href="{{ url()->current() }}">{{ $word['roman'] ?? $search_query }}</a></li>
                                                    </ul>
                                                </div>
                                                
                                                <div class="responsive_hide_on_smartphone entryPanel">
                                                    @if($count > 0)
                                                        <div style="position:relative;text-align: center;border-radius: 3px;float: right;margin-bottom:20px;margin-left:10px;padding: 0 3px;">
                                                            <x-advertisement position="header_ad" />
                                                        </div>
                                                        <br>
                                                    @else
                                                        <h1 class="pageTitle">{{ $word['roman'] ?? $search_query }}</h1>
                                                        <p>Translation of <strong>({{ $word['roman'] ?? $search_query }})</strong> is not present in our database right now. Our team is updating and soon it will be updated.</p>
                                                    @endif
                                                </div>

                                                <h1 class="pageTitle">{{ $word['roman'] ?? $search_query }}</h1>
                                            </header>

                                            <div>
                                                <div>
                                                    @if($count > 0)
                                                        <section class="se1 senseGroup">
                                                            <x-advertisement position="content_top" />
                                                            <br>
                                                            
                                                            <h2><em>{{ $word['roman'] }}</em> Translation</h2>

                                                            <div class="msDict sense">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><strong><em>Roman Urdu</em></strong></td>
                                                                            <td><strong><em>Urdu</em></strong></td>
                                                                            <td><strong><em>Meaning in English</em></strong></td>
                                                                        </tr>

                                                                        @if(isset($translations) && count($translations) > 0)
                                                                            @foreach($translations as $translation)
                                                                                <tr>
                                                                                    <td>{{ $translation['roman'] }}</td>
                                                                                    <td>{{ $translation['urdu_word'] }}</td>
                                                                                    <td>{{ $translation['english_word'] }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="4">
                                                                                        <a href="{{ $path }}meaning/{{ $translation['english_word_url'] }}" title="Click for {{ $translation['english_word'] }} definition">
                                                                                            <center>Click for <strong>({{ $translation['english_word'] }})</strong> definition</center>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    </tbody>
                                                                </table>

                                                                <hr style="margin-bottom:5px;  border: 1px dashed #d3d3d3;">

                                                                <div style="margin-bottom:20px;">
                                                                    <strong>Roman Urdu to English Dictionary</strong> 
                                                                    <img style=" float:right; height:30px;" src="{{ $path }}images/roman_.png">
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
                                                                    @foreach(range('A', 'Z') as $letter)
                                                                        <a href="{{ route('roman.words', ['alphabet' => $letter]) }}"><strong>{{ $letter }}</strong></a>
                                                                        @if($letter != 'Z') - @endif
                                                                        @if($letter == 'R') <br> @endif
                                                                    @endforeach
                                                                </center>
                                                                <hr>

                                                                <br>
                                                                <table width="100%" height="10%">
                                                                    <tr><td></td></tr>
                                                                    <tr align="center">
                                                                        <td></td>
                                                                    </tr>
                                                                </table>
                                                                
                                                                <strong>Related Words of {{ $word['roman'] }}: </strong>
                                                                <br>

                                                                @if(isset($related_words) && count($related_words) > 0)
                                                                    @foreach($related_words as $related)
                                                                        @if(!empty($related['english_word_url']))
                                                                            <a href="{{ route('roman.meaning', ['word' => $related['english_word_url']]) }}" title="{{ $related['roman'] }} Translation">{{ $related['roman'] }}</a>,
                                                                        @else
                                                                            {{ $related['roman'] }},
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
                                                    <p>Translation of <strong>({{ $word['roman'] ?? $search_query }})</strong> is not present in our database right now. Our team is updating and soon it will be updated.</p>
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
                                                    <div class="readMore"><a href="{{ route('home') }}">Click English Dictionary
                                                            <span class="icon-arrow-right">&nbsp;</span></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="responsive_cell_home_center_half responsive_no_margin_vertical">
                                        <div class="contentBlock halfBlock purpleBlock">
                                            <div class="blockBody">
                                                <h2><a href="{{ route('urdu') }}">Urdu To English Dictionary</a></h2>
                                                <p style="font-size:13px;">
                                                    The prime focus of this dictionary is on English to Urdu meanings and from Urdu to English translation. Moreover, visitors can get meaning of English by using Roman Urdu words through English alphabet similarly Urdu words require Urdu keyboard, which is available on the page. This dictionary is a classic as well as simple....
                                                </p>
                                            </div>
                                            <div class="readMore"><a href="{{ route('urdu') }}">Click Urdu Dictionary
                                                    <span class="icon-arrow-right">&nbsp;</span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="responsive_cell_right secondaryPageContent ad_trick_right">
                                <div class="responsive_row">
                                    <div class="contentBlock responsive_cell">
                                        <x-advertisement position="sidebar_ad" />
                                    </div>
                                </div>

                                @include('frontend.includes.roman_alphabets')
                                @include('frontend.includes.english_alphabets')

                                <div class="responsive_row">
                                    <div class="contentBlock responsive_cell">
                                        <h2> Urdu Alphabets</h2>
                                        <table border="0" width="100%" cellspacing="0" cellpadding="6">
                                            <tbody>
                                                <tr>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/thay.html">ٹ</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/tay.html">ت</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/pay.html">پ</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/bay.html">ب</a></td>
                                                    <td width="15%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/alif.html">ا</a></td>
                                                    <td width="15%" class="AlphabetButtons"><a href="{{ $path }}urdu_words/alifmada.html">آ</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/dhal.html">ڈ</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/dal.html">د</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/khay.html">خ</a></td>
                                                    <td width="15%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/hay.html">ح</a></td>
                                                    <td width="15%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/jim.html">ج</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/say.html">ث</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/seen.html">س</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/zhay.html">ژ</a></td>
                                                    <td width="15%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/zay.html">ز</a></td>
                                                    <td width="15%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/rhay.html">ڑ</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/ray.html">ر</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/zal.html">ذ</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="14%" class="AlphabetButtons"><a href="{{ $path }}urdu_words/ain.html">ع</a></td>
                                                    <td width="15%" class="AlphabetButtons"><a href="{{ $path }}urdu_words/zhoy.html">ظ</a></td>
                                                    <td width="15%" class="AlphabetButtons"><a href="{{ $path }}urdu_words/thoy.html">ط</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/duad.html">ض</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/suad.html">ص</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/sheen.html">ش</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="15%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/lam.html">ل</a></td>
                                                    <td width="15%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/gaf.html">گ</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/qyaf.html">ک</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/qaf.html">ق</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/fay.html">ف</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/gain.html">غ</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="15%" class="AlphabetButtons"><a href="{{ $path }}urdu_words/hamza.html">ء</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/wowhamza.html">ؤ</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/wow.html">و</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/noongunah.html">ں</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/noon.html">ن</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/mim.html">م</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="14%" class="AlphabetButtons">&nbsp;</td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/bariya.html">ے</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/ya.html">ی</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/yahamza.html">ئ</a></td>
                                                    <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/hay3.html">ھ</a></td>
                                                    <td width="15%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/hay2.html">ہ</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
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
