@extends('frontend.layouts.master')

@section('title', 'English to english and Urdu')

@section('meta_description', '')

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
                                                        <li>{{ $search_query ?? 'Word Not Found' }}</li>
                                                    </ul>
                                                </div>
                                                
                                                <div class="responsive_hide_on_smartphone entryPanel">
                                                    <h1 class="pageTitle"></h1>
                                                    <p>Translation of your desired word is not present in our database right now. Our team is updating and soon it will be updated.</p>
                                                </div>

                                                <h1 class="pageTitle">{{ $search_query ?? 'Word Not Found' }}</h1>
                                            </header>
                                            
                                            <div></div>
                                            
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
    @include('frontend.includes.english_alphabets')
    @include('frontend.includes.roman_alphabets')
    
    <div class="responsive_row">
        <div class="contentBlock responsive_cell">
            <h2> Urdu Alphabets</h2>
            <table border="0" width="100%" cellspacing="0" cellpadding="6">
                <tbody>
                    <tr>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'thay']) }}">ٹ</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'tay']) }}">ت</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'pay']) }}">پ</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'bay']) }}">ب</a></td>
                        <td width="15%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'alif']) }}">ا</a></td>
                        <td width="15%" class="AlphabetButtons"><a href="{{ route('urdu.words', ['alphabet' => 'alifmada']) }}">آ</a></td>
                    </tr>
                    <tr>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'dhal']) }}">ڈ</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'dal']) }}">د</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'khay']) }}">خ</a></td>
                        <td width="15%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'hay']) }}">ح</a></td>
                        <td width="15%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'jim']) }}">ج</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'say']) }}">ث</a></td>
                    </tr>
                    <tr>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'seen']) }}">س</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'zhay']) }}">ژ</a></td>
                        <td width="15%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'zay']) }}">ز</a></td>
                        <td width="15%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'rhay']) }}">ڑ</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'ray']) }}">ر</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'zal']) }}">ذ</a></td>
                    </tr>
                    <tr>
                        <td width="14%" class="AlphabetButtons"><a href="{{ route('urdu.words', ['alphabet' => 'ain']) }}">ع</a></td>
                        <td width="15%" class="AlphabetButtons"><a href="{{ route('urdu.words', ['alphabet' => 'zhoy']) }}">ظ</a></td>
                        <td width="15%" class="AlphabetButtons"><a href="{{ route('urdu.words', ['alphabet' => 'thoy']) }}">ط</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'duad']) }}">ض</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'suad']) }}">ص</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'sheen']) }}">ش</a></td>
                    </tr>
                    <tr>
                        <td width="15%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'lam']) }}">ل</a></td>
                        <td width="15%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'gaf']) }}">گ</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'qyaf']) }}">ک</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'qaf']) }}">ق</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'fay']) }}">ف</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'gain']) }}">غ</a></td>
                    </tr>
                    <tr>
                        <td width="15%" class="AlphabetButtons"><a href="{{ route('urdu.words', ['alphabet' => 'hamza']) }}">ء</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'wowhamza']) }}">ؤ</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'wow']) }}">و</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'noongunah']) }}">ں</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'noon']) }}">ن</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'mim']) }}">م</a></td>
                    </tr>
                    <tr>
                        <td width="14%" class="AlphabetButtons">&nbsp;</td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'bariya']) }}">ے</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'ya']) }}">ی</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'yahamza']) }}">ئ</a></td>
                        <td width="14%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'hay3']) }}">ھ</a></td>
                        <td width="15%" class="AlphabetButtons"> <a href="{{ route('urdu.words', ['alphabet' => 'hay2']) }}">ہ</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="responsive_row">
        <div class="responsive_cell_right">
            <div class="contentBlock relatedBlock">
                <br><h3>Most Visited Urdu <strong lang="en">Words</strong></h3>
                @php
                $cond_value = array("status_word" => "1");
                $re_query = $rdb->db_select_cond("*", "urdu_dict", "status_word=:status_word ORDER BY u_id DESC LIMIT 10", $cond_value);
                @endphp
                @foreach($re_query['row'] as $re_row)
                    @if(!empty($re_row['english_word_url']))
                        <a class="translation" href="{{ route('urdu.meaning', ['word' => $re_row['english_word_url']]) }}" title="{{ $re_row['english_word'] }} Translation">{{ $re_row['urdu_word'] }}</a>
                    @else
                        <span class="translation">{{ $re_row['urdu_word'] }}</span>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
