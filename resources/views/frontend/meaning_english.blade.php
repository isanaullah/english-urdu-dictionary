@extends('frontend.layouts.master')

@section('title')
    @if(isset($word) && $count > 0)
        {{ $word['words'] }} in Urdu meaning | englishurdudictionarypk.com
    @else
        {{ $search_query ?? 'Word Not Found' }} in Urdu meaning | englishurdudictionarypk.com
    @endif
@endsection

@section('meta_description')
    @if(isset($word) && $count > 0)
        {{ $word['words'] }} in Urdu, translation, meaning and Urdu related words.
    @else
        Word not found in dictionary.
    @endif
@endsection

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
                                                        <li>
                                                            @if(isset($word) && $count > 0)
                                                                {{ $word['words'] }}
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
                                                    @else
                                                        <h1 class="pageTitle">{{ $search_query ?? 'Word Not Found' }}</h1>
                                                        <p>The meaning of <strong>({{ $search_query ?? 'Word Not Found' }})</strong> is not present in our database right now. Our team is updating and soon it will be updated.</p>
                                                    @endif
                                                </div>

                                                <h1 class="pageTitle">{{ $word['words'] ?? $search_query }}</h1>

                                                @if($count > 0 && isset($word['pronunciation_1']))
                                                    <div class="headpron">Pronunciation: {{ $word['pronunciation_1'] }}</div>
                                                @endif
                                            </header>
                                            
                                            <div>
                                                <div>
                                                    @if($count > 0)
                                                        <section class="se1 senseGroup">
                                                            <x-advertisement position="content_top" />
                                                            
                                                            <br>
                                                            <h2>Meaning of <em>{{ $word['words'] }}</em> in Urdu:</h2>

                                                            <h3 class="partOfSpeechTitle">
                                                                <div class="msDict sense">
                                                                    <div class="senseInnerWrapper">
                                                                        <span class="definition">
                                                                            <p>
                                                                                @if(isset($meanings) && count($meanings) > 0)
                                                                                    @foreach($meanings as $index => $meaning)
                                                                                        <strong>{{ $index + 1 }}.</strong>
                                                                                        @if(!empty($meaning['identification']))
                                                                                            <strong>[{{ $meaning['identification'] }}]</strong>
                                                                                        @endif
                                                                                        <strong>{{ $meaning['meaning_urdu'] }}</strong>
                                                                                        <br>
                                                                                    @endforeach
                                                                                @else
                                                                                    The Urdu Meaning of ("{{ $word['words'] }}") is not present in our database at this time soon it will be updated. Extremely sorry you this type of disturbance.
                                                                                @endif
                                                                            </p>
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <h2>Definition of <em>{{ $word['words'] }}</em> in English:</h2>

                                                                <div class="msDict sense">
                                                                    @if(!empty($word['partsofspeech']))
                                                                        <span class="partOfSpeech">{{ $word['partsofspeech'] }}</span>
                                                                    @endif
                                                            </h3>

                                                            <div class="senseInnerWrapper">
                                                                <span class="definition">
                                                                    <p>
                                                                        @if(!empty($word['defination']))
                                                                            {{ $word['defination'] }}
                                                                        @else
                                                                            The definition of <strong>({{ $word['words'] }})</strong> is not present in our database right now. A team is updating and soon it will be updated.
                                                                        @endif
                                                                    </p>
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <script type="text/javascript">
                                                            $().ready(function() {
                                                                $("#english_words_1").autocomplete("{{ $path }}includes/wordslist_ajax.php", {
                                                                    width: 260,
                                                                    matchContains: true,
                                                                    selectFirst: false
                                                                });
                                                            });
                                                        </script>

                                                        <hr style="margin-bottom:5px; border: 1px dashed #d3d3d3;">
                                                        <div style="margin-bottom:20px;">
                                                            <strong>English to Urdu Dictionary</strong> 
                                                            <img style="float:right; height:30px;" src="{{ $path }}images/english_.png">
                                                        </div>

                                                        <div class="box">
                                                            <form action="{{ $path }}includes/front_controller.php" method="post">
                                                                <input type="text" style="width:60%;" name="search_query" id="english_words_1" placeholder="Type Your English Word">
                                                                <input type="hidden" name="action" value="english_word">
                                                                <input type="submit" value="Search">
                                                            </form>
                                                        </div>

                                                        <hr style="margin-bottom:5px;">

                                                        <center>
                                                            @foreach(range('A', 'Z') as $letter)
                                                                <a href="{{ route('english.words', ['alphabet' => $letter]) }}"><strong>{{ $letter }}</strong></a>
                                                                @if($letter != 'Z') - @endif
                                                                @if($letter == 'R') <br> @endif
                                                            @endforeach
                                                        </center>

                                                        <table width="100%" height="10%">
                                                            <tr align="center">
                                                                <td></td>
                                                            </tr>
                                                        </table>

                                                        <strong>Related Word of {{ $word['words'] }}: </strong>
                                                        <br>
                                                        @if(isset($related_words) && count($related_words) > 0)
                                                            @foreach($related_words as $related)
                                                                @if(!empty($related['word_url']))
                                                                    <a href="{{ route('english.meaning', ['word' => $related['word_url']]) }}" title="{{ $related['words'] }} in Urdu">{{ $related['words'] }}</a>,
                                                                @else
                                                                    {{ $related['words'] }},
                                                                @endif
                                                            @endforeach
                                                        @endif

                                                        <br>
                                                        <p>The searched word gives various related meaning and you can pick most suitable word among these according to your desire or suitability. <br>
                                                            <a href="{{ route('home') }}">www.englishurdudictionarypk.com</a> provides millions of online free words & meanings keep touch with us.
                                                        </p>
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
                                                <h1 class="pageTitle">{{ $search_query ?? 'Word Not Found' }}</h1>
                                                <p>The meaning of <strong>({{ $search_query ?? 'Word Not Found' }})</strong> is not present in our database right now. Our team is updating and soon it will be updated.</p>
                                            @endif
                                            <div class="clear">&nbsp;</div>
                                        </div>

                                        <div id="ad_btmslot_csa" class="am-default "></div>
                                    </div>
                                </div>
                            </div>
                            
                            <center>
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
                            </center>
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
