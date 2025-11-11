@extends('frontend.layouts.master')

@section('title', 'English Word Not Found | englishurdudictionarypk.com')

@section('meta_description', 'The English word you searched for was not found in our dictionary.')

@section('header')
    @include('frontend.includes.header_english')
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
                                                        <li><a href="{{ route('home') }}">English to English and Urdu</a></li>
                                                        <li>{{ $search_query ?? 'Word Not Found' }}</li>
                                                    </ul>
                                                </div>
                                                
                                                <div class="responsive_hide_on_smartphone entryPanel">
                                                    <h1 class="pageTitle"></h1>
                                                    <p>The meaning of <strong>({{ $search_query ?? 'this word' }})</strong> is not present in our database right now. Our team is updating and soon it will be updated.</p>
                                                </div>

                                                <h1 class="pageTitle">{{ $search_query ?? 'Word Not Found' }}</h1>
                                            </header>
                                            
                                            <div></div>
                                            
                                            <div class="responsive_hide_on_non_smartphone entryPanel">
                                                <h1 class="pageTitle">{{ $search_query ?? 'Word Not Found' }}</h1>
                                                <p>The meaning of <strong>({{ $search_query ?? 'this word' }})</strong> is not present in our database right now. Our team is updating and soon it will be updated.</p>
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
    @include('frontend.includes.urdu_alphabets')
    
    <div class="responsive_row">
        <div class="responsive_cell_right">
            <div class="contentBlock relatedBlock">
                <br><h3>Most Visited English <strong lang="en">Words</strong></h3>
                @php
                $cond_value = array("status" => "1");
                $re_query = $rdb->db_select_cond("*", "words", "status=:status ORDER BY id DESC LIMIT 10", $cond_value);
                @endphp
                @foreach($re_query['row'] as $re_row)
                    @if(!empty($re_row['word_url']))
                        <a class="translation" href="{{ route('english.meaning', ['word' => $re_row['word_url']]) }}" title="{{ $re_row['words'] }} Translation">{{ $re_row['words'] }}</a>
                    @else
                        <span class="translation">{{ $re_row['words'] }}</span>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
