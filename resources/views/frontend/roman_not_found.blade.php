@extends('frontend.layouts.master')

@section('title', 'Word Not Found - Roman Urdu Dictionary')
@section('meta_description', 'The word you searched for is not available in our Roman Urdu dictionary.')

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
                                                        <li><a href="{{ route('roman') }}">Roman to English and Urdu</a></li>
                                                    </ul>
                                                </div>
                                                
                                                <div class="responsive_hide_on_smartphone entryPanel">
                                                    <h1 class="pageTitle">{{ $search_query ?? 'Word Not Found' }}</h1>
                                                    <p>Translation of your desired word is not present in our database right now. Our team is updating and soon it will be updated.</p>
                                                </div>
                                            </header>

                                            <div class="responsive_hide_on_non_smartphone entryPanel">
                                                <h1 class="pageTitle">{{ $search_query ?? 'Word Not Found' }}</h1>
                                                <p>Translation of your desired word is not present in our database right now. Our team is updating and soon it will be updated.</p>
                                                <div class="clear">&nbsp;</div>
                                            </div>

                                            <div id="ad_btmslot_csa" class="am-default ">
                                                <x-advertisement position="footer_ad" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="responsive_cell_right secondaryPageContent ad_trick_right">
                                @include('frontend.includes.english_alphabets')
                                @include('frontend.includes.roman_alphabets')
                                
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
