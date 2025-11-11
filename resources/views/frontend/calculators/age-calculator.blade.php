@php
    $page_title = 'Free Online Easy Age Calculator: helloseekers.com';
    $meta_desc = 'Online free birthday Age Calculator and Coverter you can calculate your age in days, minuts, seconds';
    $heading = 'Age Calculator Free Online';
    $body = 'With Online Age Calculator you can Calculate your age in Year, Months, days, weeks, hours, Minutes, Second. With this calculator you can know how much days left to your next birthday and also Day of you next Birthday. Just your Birth Date and to date and click calculate.';
@endphp

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="js">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{ $page_title }}</title>
    <meta name="description" content="{{ $meta_desc }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    @include('frontend.includes.header_english')
    <script type="text/javascript" src="{{ asset('js/validation.js') }}"></script>

<div class="responsive_container firstContainer">
    <div class="responsive_row ac_topslot">
        <div class="responsive_cell_whole">
            <div class="ad_trick_header">
                <div class="responsive_row ac_topslot">
                    <div class="responsive_cell_whole">
                        <div class="ad_trick_header">
                            <div id="ad_topslot" class="am-default">
                                @include('frontend.includes.banners.728x90')
                            </div>
                        </div>
                    </div>
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
                                            <h2><strong>{{ $heading }}</strong></h2>
                                            <p>{{ $body }}</p>
                                            
                                            <form method="post" action="{{ route('calculator.age') }}">
                                                @csrf
                                                <div class="gform_body">
                                                    <ul>
                                                        <li style="display: block;">
                                                            <label><strong>Your Birth Date is</strong></label>
                                                            <div class="ginput_container">
                                                                <select name="dd">
                                                                    @for($birth_dayval = 1; $birth_dayval <= 31; $birth_dayval++)
                                                                        <option value="{{ $birth_dayval }}" {{ (isset($result['dd']) && $result['dd'] == $birth_dayval) ? 'selected' : '' }}>
                                                                            {{ $birth_dayval }}
                                                                        </option>
                                                                    @endfor
                                                                </select>
                                                                
                                                                <select name="mm">
                                                                    <option value="1" {{ (isset($result['mm']) && $result['mm'] == 1) ? 'selected' : '' }}>January</option>
                                                                    <option value="2" {{ (isset($result['mm']) && $result['mm'] == 2) ? 'selected' : '' }}>February</option>
                                                                    <option value="3" {{ (isset($result['mm']) && $result['mm'] == 3) ? 'selected' : '' }}>March</option>
                                                                    <option value="4" {{ (isset($result['mm']) && $result['mm'] == 4) ? 'selected' : '' }}>April</option>
                                                                    <option value="5" {{ (isset($result['mm']) && $result['mm'] == 5) ? 'selected' : '' }}>May</option>
                                                                    <option value="6" {{ (isset($result['mm']) && $result['mm'] == 6) ? 'selected' : '' }}>June</option>
                                                                    <option value="7" {{ (isset($result['mm']) && $result['mm'] == 7) ? 'selected' : '' }}>July</option>
                                                                    <option value="8" {{ (isset($result['mm']) && $result['mm'] == 8) ? 'selected' : '' }}>August</option>
                                                                    <option value="9" {{ (isset($result['mm']) && $result['mm'] == 9) ? 'selected' : '' }}>September</option>
                                                                    <option value="10" {{ (isset($result['mm']) && $result['mm'] == 10) ? 'selected' : '' }}>October</option>
                                                                    <option value="11" {{ (isset($result['mm']) && $result['mm'] == 11) ? 'selected' : '' }}>November</option>
                                                                    <option value="12" {{ (isset($result['mm']) && $result['mm'] == 12) ? 'selected' : '' }}>December</option>
                                                                </select>
                                                                
                                                                <select name="yy" style="width:100px;">
                                                                    @php $birth_year = date('Y'); @endphp
                                                                    @for($birth_dayval = 1900; $birth_dayval <= $birth_year; $birth_dayval++)
                                                                        <option value="{{ $birth_dayval }}" {{ (isset($result['yy']) && $result['yy'] == $birth_dayval) ? 'selected' : '' }}>
                                                                            {{ $birth_dayval }}
                                                                        </option>
                                                                    @endfor
                                                                </select>
                                                                <span id="name_er"></span>
                                                            </div>
                                                        </li>
                                                        
                                                        <li style="display: block;">
                                                            <label><strong>Current Date is</strong></label>
                                                            <div class="ginput_container">
                                                                <select name="td">
                                                                    @php $today_day = date('j'); @endphp
                                                                    @for($dayval = 1; $dayval <= 31; $dayval++)
                                                                        <option value="{{ $dayval }}" {{ ($dayval == $today_day || (isset($result['td']) && $dayval == $result['td'])) ? 'selected' : '' }}>
                                                                            {{ $dayval }}
                                                                        </option>
                                                                    @endfor
                                                                </select>
                                                                
                                                                @php $today_month = date('m'); @endphp
                                                                <select name="tm">
                                                                    <option value="1" {{ ((isset($result['tm']) && $result['tm'] == 1) || $today_month == 1) ? 'selected' : '' }}>January</option>
                                                                    <option value="2" {{ ((isset($result['tm']) && $result['tm'] == 2) || $today_month == 2) ? 'selected' : '' }}>February</option>
                                                                    <option value="3" {{ ((isset($result['tm']) && $result['tm'] == 3) || $today_month == 3) ? 'selected' : '' }}>March</option>
                                                                    <option value="4" {{ ((isset($result['tm']) && $result['tm'] == 4) || $today_month == 4) ? 'selected' : '' }}>April</option>
                                                                    <option value="5" {{ ((isset($result['tm']) && $result['tm'] == 5) || $today_month == 5) ? 'selected' : '' }}>May</option>
                                                                    <option value="6" {{ ((isset($result['tm']) && $result['tm'] == 6) || $today_month == 6) ? 'selected' : '' }}>June</option>
                                                                    <option value="7" {{ ((isset($result['tm']) && $result['tm'] == 7) || $today_month == 7) ? 'selected' : '' }}>July</option>
                                                                    <option value="8" {{ ((isset($result['tm']) && $result['tm'] == 8) || $today_month == 8) ? 'selected' : '' }}>August</option>
                                                                    <option value="9" {{ ((isset($result['tm']) && $result['tm'] == 9) || $today_month == 9) ? 'selected' : '' }}>September</option>
                                                                    <option value="10" {{ ((isset($result['tm']) && $result['tm'] == 10) || $today_month == 10) ? 'selected' : '' }}>October</option>
                                                                    <option value="11" {{ ((isset($result['tm']) && $result['tm'] == 11) || $today_month == 11) ? 'selected' : '' }}>November</option>
                                                                    <option value="12" {{ ((isset($result['tm']) && $result['tm'] == 12) || $today_month == 12) ? 'selected' : '' }}>December</option>
                                                                </select>
                                                                
                                                                <select name="ty">
                                                                    @php $today_year = date('Y'); @endphp
                                                                    @for($yearval = 1900; $yearval <= $today_year; $yearval++)
                                                                        <option value="{{ $yearval }}" {{ $yearval == $today_year ? 'selected' : '' }}>
                                                                            {{ $yearval }}
                                                                        </option>
                                                                    @endfor
                                                                </select>
                                                                <span id="name_er"></span>
                                                            </div>
                                                        </li>
                                                        
                                                        <li style="display: block;">
                                                            <div class="ginput_container">
                                                                <input type="submit" class="gform_button button" value="CALCULATE" name="submit" style="display: block;">
                                                                <span id="name_er"></span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="gform_footer top_label"></div>
                                            </form>
                                            
                                            <style type="text/css">
                                                .calculator_table {
                                                    border-collapse: collapse;
                                                    border-color: #000000;
                                                    border-style: solid;
                                                    border-width: 2px;
                                                }
                                                .calculator_table td {
                                                    border-color: #cccccc;
                                                    border-style: solid;
                                                    border-width: 1px;
                                                }
                                            </style>
                                            
                                            @if($result)
                                                <table class="calculator_table">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2"><strong>Your Age</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Your Age Is</th>
                                                            <td>{{ $result['your_birth_date'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Your Age In Months</th>
                                                            <td>{{ $result['birth_in_month'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Your Age In Days</th>
                                                            <td>{{ $result['birth_in_days'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Your Age In Weeks</th>
                                                            <td>{{ $result['birth_in_weeks'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Your Age In Hours</th>
                                                            <td>{{ $result['birth_in_hour'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Your Age In Minutes</th>
                                                            <td>{{ $result['birth_in_minutes'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Your Age In Seconds</th>
                                                            <td>{{ $result['birth_in_seconds'] }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                                <br/>
                                                <table class="calculator_table">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2"><strong>Next Birthday Days Left</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="{{ asset('images/b-cake.png') }}"></td>
                                                            <td>{{ $result['your_next_birthday'] }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                                <br/>
                                                <table class="calculator_table">
                                                    <tr>
                                                        <td><strong>Next Birthday</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ $result['day_of_my_next_birthday'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ $result['age'] }} Age</td>
                                                    </tr>
                                                </table>
                                            @endif
                                            
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
