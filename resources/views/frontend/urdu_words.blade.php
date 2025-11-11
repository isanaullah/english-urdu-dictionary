@extends('frontend.layouts.master')

@section('title')
    @if(request()->get('page'))
        Browse Urdu Dictionary Starting With Letter {{ $alphabet_display }} | Page - {{ request()->get('page') }}
    @else
        Browse Urdu Dictionary Starting With Letter {{ $alphabet_display }}
    @endif
@endsection

@section('meta_description')
    @if(request()->get('page'))
        Roman to English & Urdu Dictionary Words List Starting with Letter | {{ $alphabet_display }} Page - {{ request()->get('page') }}
    @else
        Roman to English & Urdu Dictionary Words List Starting with Letter {{ $alphabet_display }}
    @endif
@endsection

@section('header')
    @include('frontend.includes.header_urdu')
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ $path }}css/pagination.css" />
@endpush

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
                                                <li>Urdu Words List</li>
                                                <li>{{ $alphabet }}</li>
                                            </ul>
                                        </div>
                                        
                                        <article class="words">
                                            <div id="firstClickFreeAllowed">
                                                <div class="responsive_hide_on_smartphone pagePanel"></div>
                                                <div>
                                                    <h1 id="pagetitle">Urdu Words List "{{ $alphabet_display }}"</h1>

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

                                                                function myOnload(evt){
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
                                                        
                                                        <x-advertisement position="content_top" />
                                                        
                                                        <hr style="margin-bottom:5px;">

                                                        <a href="{{ route('home') }}"><img src="{{ $path }}images/english_btn.png" title="Click English to Urdu Dictionary" alt="Click English to Urdu Dictionary" style="height:35px;"></a>
                                                        <a href="{{ route('roman') }}"><img src="{{ $path }}images/roman_btn.png" title="Click Roman Urdu to English Dictionary" alt="Click Roman Urdu to English Dictionary" style="height:35px;"></a>
                                                        <a href="{{ route('urdu') }}"><img title="Click Urdu to English Dictionary" alt="Click Urdu to English Dictionary" src="{{ $path }}images/urdu_btn.png" style="height:35px;"></a>

                                                        <br>
                                                        <hr style="margin-bottom:5px;">

                                                        @foreach(range('A', 'Z') as $letter)
                                                            <a href="{{ route('urdu.words', ['alphabet' => strtolower($letter)]) }}"><strong>{{ $letter }}</strong></a>
                                                            @if($letter != 'Z') - @endif
                                                            @if($letter == 'R') <br> @endif
                                                        @endforeach

                                                        <hr>
                                                    </center>

                                                    <div class="cssBaseOne" id="pageContent">
                                                        <p>Urdu Words List Starting with Letter "{{ $alphabet_display }}"
                                                            @if(request()->get('page'))
                                                                Page - {{ request()->get('page') }}
                                                            @endif
                                                        </p>

                                                        <p>On This Page Visitor can get a list and Common Searched Word or Familiar Words Related to this Alphabet.</p>
                                                        <p>It Improve Vocabulary and Command on Displayed Word.</p>

                                                        <x-advertisement position="content_bottom" />

                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td><strong><em>Urdu Words</em></strong></td>
                                                                    <td><strong><em>English Meaning</em></strong></td>
                                                                </tr>

                                                                @if(isset($words) && count($words['data']) > 0)
                                                                    @foreach($words['data'] as $word)
                                                                        <tr>
                                                                            <td>
                                                                                @if(!empty($word['english_word_url']))
                                                                                    <a href="{{ route('urdu.meaning', ['word' => $word['english_word_url']]) }}">{{ $word['urdu_word'] }}</a>
                                                                                @else
                                                                                    {{ $word['urdu_word'] }}
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

@section('sidebar')
    @include('frontend.includes.english_alphabets')
    @include('frontend.includes.roman_alphabets')
    @include('frontend.includes.urdu_alphabets')
@endsection
