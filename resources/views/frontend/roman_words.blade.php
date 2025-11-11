@extends('frontend.layouts.master')

@php
$alphabet = request()->get('alphabet');
$page = request()->get('page');
@endphp

@section('title')
    @if($page)
        Browse Roman Dictionary Starting With Letter {{ $alphabet }} | Page - {{ $page }}
    @else
        Browse Roman Dictionary Starting With Letter {{ $alphabet }}
    @endif
@endsection

@section('meta_description')
    @if($page)
        Roman to English & Urdu Dictionary Words List Starting with Letter | {{ $alphabet }} Page - {{ $page }}
    @else
        Roman to English & Urdu Dictionary Words List Starting with Letter {{ $alphabet }}
    @endif
@endsection

@section('header')
    @include('frontend.includes.header_roman')
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ $path }}css/pagination.css" />
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
                                <div class="responsive_cell_center">
                                    <div class="generalMainContent">
                                        <div class="breadcrumb">
                                            <ul>
                                                <li><a href="{{ route('home') }}">Home</a></li>
                                                <li>Roman Words List</li>
                                                <li>{{ $alphabet }}</li>
                                            </ul>
                                        </div>
                                        
                                        <article class="words">
                                            <div id="firstClickFreeAllowed">
                                                <div class="responsive_hide_on_smartphone pagePanel"></div>
                                                <div>
                                                    <h1 id="pagetitle">Roman Words List "{{ $alphabet }}"</h1>
                                                    <div class="cssBaseOne" id="pageContent">
                                                        <p>Roman Words List Starting with Letter "{{ $alphabet }}"
                                                            @if($page)
                                                                Page - {{ $page }}
                                                            @endif
                                                        </p>

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
                                                        <br>
                                                        
                                                        <hr style="margin-bottom:5px;">
                                                        <center>
                                                            @foreach(range('A', 'Z') as $letter)
                                                                <a href="{{ route('roman.words', ['alphabet' => $letter]) }}"><strong>{{ $letter }}</strong></a>
                                                                @if($letter != 'Z') - @endif
                                                                @if($letter == 'R') <br> @endif
                                                            @endforeach
                                                        </center>
                                                        
                                                        <x-advertisement position="content_top" />
                                                        
                                                        <hr style="margin-bottom:5px;">
                                                        <center>
                                                            <a href="{{ route('home') }}"><img src="{{ $path }}images/english_btn.png" title="Click English to Urdu Dictionary" alt="Click English to Urdu Dictionary" style="height:35px;"></a>
                                                            <a href="{{ route('roman') }}"><img src="{{ $path }}images/roman_btn.png" title="Click Roman Urdu to English Dictionary" alt="Click Roman Urdu to English Dictionary" style="height:35px;"></a>
                                                            <a href="{{ route('urdu') }}"><img title="Click Urdu to English Dictionary" alt="Click Urdu to English Dictionary" src="{{ $path }}images/urdu_btn.png" style="height:35px;"></a>
                                                        </center>

                                                        <p>On This Page Visitor can get a list and Common Searched Word or Familiar Words Related to this Alphabet.</p>
                                                        <p>It Improve Vocabulary and Command on Displayed Word.</p>

                                                        <x-advertisement position="content_bottom" />

                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><strong><em>Roman Words</em></strong></td>
                                                                    <td><strong><em>English Meaning</em></strong></td>
                                                                </tr>

                                                                @if(isset($words) && count($words['data']) > 0)
                                                                    @foreach($words['data'] as $word)
                                                                        <tr>
                                                                            <td>
                                                                                @if(!empty($word['english_word_url']))
                                                                                    <a href="{{ route('roman.meaning', ['word' => $word['english_word_url']]) }}">{{ $word['roman'] }}</a>
                                                                                @else
                                                                                    {{ $word['roman'] }}
                                                                                @endif
                                                                            </td>
                                                                            <td>{{ $word['english_word'] }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                        
                                                        @if(isset($words['pagination']))
                                                            {!! $words['pagination'] !!}
                                                        @endif

                                                        <x-advertisement position="footer_ad" />
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="responsive_hide_on_non_smartphone pagePanel">
                                                    <div style="clear:both;"></div>
                                                </div>
                                            </div>
                                        </article>
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
