<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="js">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{ $page_title ?? 'Calculator' }}</title>
    <meta name="description" content="{{ $meta_desc ?? 'Free online calculator' }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    @include('frontend.includes.header_english')
    <style type="text/css">
        .calculator_table {
            border-collapse: collapse;
            border-color: #000000;
            border-style: solid;
            border-width: 2px;
            width: 100%;
            margin: 20px 0;
        }
        .calculator_table td, .calculator_table th {
            border-color: #cccccc;
            border-style: solid;
            border-width: 1px;
            padding: 10px;
        }
        .calculator_result {
            background: #f0f8ff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
            border: 2px solid #4CAF50;
        }
        .love-percentage {
            font-size: 48px;
            font-weight: bold;
            color: #e91e63;
            text-align: center;
            margin: 20px 0;
        }
    </style>

<div class="responsive_container firstContainer">
    <div class="responsive_row ac_topslot">
        <div class="responsive_cell_whole">
            <div class="ad_trick_header">
                <div id="ad_topslot" class="am-default">
                    @include('frontend.includes.banners.728x90')
                </div>
            </div>
        </div>
    </div>
    
    <div class="responsive_row">
        <div class="responsive_cell_left ad_trick_left ac_leftslot responsive_hide_on_smartphone">
            <div id="ad_leftslot" class="am-default">
                @include('frontend.includes.banners.160x600')
                @include('frontend.includes.banners.160x6002')
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
                                        <div class="responsive_cell_center_plus generalMainContent">
                                            @yield('calculator-content')
                                            @include('frontend.includes.calculators_links')
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="responsive_cell_home_right">
                                @include('frontend.includes.roman_alphabets')
                                @include('frontend.includes.urdu_alphabets')
                                @include('frontend.includes.english_alphabets')
                                
                                <div class="responsive_row" style="padding-top:15px">
                                    <div class="contentBlock responsive_cell">
                                        @include('frontend.includes.banners.336x280')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>

@include('frontend.includes.footer')
