@php
    $page_title = 'Online Free Personal Loan Emi Calculator';
    $meta_desc = 'With this Calculator you calculate you Personal Loan EMI';
    $heading = 'Free Personal Loan Calculator';
    $body =
        'Personal Loan <strong>Emi Calculator</strong> with this calculator you can get your monthly emi, Total Interest, Interest Percentage, Total Payable Amount and Total Payments. Just Type <strong>Loan Amount Total, No of Months and Rate of Interest (ROI) </strong> and Click Calculate and Get Result';
@endphp

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="js">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>


    <title>{{ $page_title }}</title>

    <meta name="description" content="{{ $meta_desc }}">

    @include('frontend.includes.header_english')

    <div class="home">
        <div class="responsive_container firstContainer">




            <div class="responsive_row ac_topslot ">
                <div class="responsive_cell_whole  ">
                    <div class="ad_trick_header  ">
                        <div id="ad_topslot" class="am-home ">

                            <x-advertisement position="homepage_banner" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="responsive_row">



                <div class="responsive_cell_home_center_plus_left">
                    <div class="responsive_cell_home_center responsive_float_right">

                        <div class="responsive_row">



                            <div class="responsive_cell_home_center">



                                <div class="responsive_row">
                                    <div class="responsive_cell_home_center">
                                        <div class="featuredContent contentBlock">
                                            <header class="entryHeader">
                                                <div class="breadcrumb">
                                                    <ul>
                                                        <li><a href="{{ route('home') }}">home</a></li>
                                                        <li><a href="{{ request()->url() }}">{{ $heading }}</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <!-- End of DIV headpron-->
                                            </header>


                                            <h2><strong>{{ $heading }}</strong></h2>

                                            {{-- @include('frontend.includes.banners.200x90') --}}
                                            <p>{!! $body !!}</p>
                                            <ul>
                                                @if (isset($subcategories) && count($subcategories) > 0)
                                                    @foreach ($subcategories as $subcategory)
                                                        <li><a
                                                                href="{{ route('learn.english.category', ['slug' => $subcategory['sc_slug']]) }}"><u>{{ $subcategory['sub_category'] }}</u></a>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <li>No subcategories available at the moment.</li>
                                                @endif
                                            </ul>


                                        </div>
                                    </div>
                                </div>
                                <div class="responsive_row">
                                    <div class="responsive_cell_home_center_half responsive_no_margin_vertical">


                                        <div class="responsive_row rssPanel">
                                            <div class="responsive_cell_home_center_half">
                                                <div class="contentBlock halfBlock purpleBlock">
                                                    <div class="blockBody">
                                                        <h2><a href="{{ route('learn.english') }}">English to English and Urdu
                                                                Dictionary</a></h2>
                                                        <p style="font-size:13px;">Dictionary is a comparatively huge
                                                            volume book that contains millions of words of a language
                                                            with meanings. Moreover, it provides full details about the
                                                            word origin, meanings, synonymous, similar word and some
                                                            time word used in sentence to clear the meaning to reader.
                                                        </p>
                                                    </div>
                                                    <div class="readMore"><a href="{{ route('learn.english') }}">Click English
                                                            Dictionary
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
                                                    he prime focus of this dictionary is on English to Urdu meanings and
                                                    from Urdu to English translation. Moreover, visitors can get meaning
                                                    of English by using Roman Urdu words through English alphabet
                                                    similarly Urdu words require Urdu keyboard, which is available on
                                                    the page. This dictionary is a classic as well as simple....
                                                </p>
                                            </div>
                                            <div class="readMore"><a href="{{ route('urdu') }}">Click Urdu Dictionary
                                                    <span class="icon-arrow-right">&nbsp;</span></a></div>
                                        </div>


                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="responsive_cell_home_left responsive_float_right responsive_no_margin ad_trick_left">

                        <div class="responsive_row">
                            <div class="contentBlock responsive_cell">
                                <x-advertisement position="sidebar_ad" />
                            </div>
                        </div>

                        <div class="responsive_row">
                            <div class="contentBlock trendingWordsPanel">
                                <div class="blockBody">
                                    <div class="trendingWords" data-country="all" style="display:block;">
                                        <h2>Calculators List</h2>
                                        <div class="responsive_columns_2_on_smartphone ">
                                            <ul>
                                                <li><a href="{{ $path }}calculators/age-calculator.html"
                                                        title="Age Calculator">Age Calculator</a></li>

                                                <li><a href="{{ $path }}calculators/love-calculator.html"
                                                        title="Love Calculator">Love Calculator</a></li>
                                                <li><a href="{{ $path }}calculators/mortgage-calculator.html"
                                                        title="Mortgage Calculator">Mortgage Calculator</a></li>
                                                <li><a href="{{ $path }}calculators/emi-calculator.html"
                                                        title="EMI Calculator">EMI Calculator</a></li>
                                                <li><a href="{{ $path }}calculators/tip-calculator.html"
                                                        title="Tip Calculator">Tip Calculator</a></li>
                                                <li><a href="{{ $path }}calculators/home-loan-calculator.html"
                                                        title="Home Loan Calcualtor">Home Loan Calculator</a></li>
                                                <li><a href="{{ $path }}calculators/car-loan-calculator.html"
                                                        title="Car Loan Calculator">Car Loan Calculator</a></li>
                                                <li><a href="{{ $path }}calculators/personal-loan-calculator.html"
                                                        title="Personal Loan Calculator">Personal Loan Calculator</a>
                                                </li>
                                                <li><a href="{{ $path }}calculators/salary-tax-calculator.html"
                                                        title="Salary Tax Calculator">Salary Tax Calculator</a></li>
                                                {{-- <li><a href="{{ $path }}calculators/percentage-calculator.html">Percentage Calculator</a></li> --}}
                                                <li><a href="{{ $path }}calculators/compound-interest-calculator.html"
                                                        title="Compound Interest Calculator">Compound Interest
                                                        Calculator</a></li>
                                                <li><a href="{{ $path }}calculators/simple-interest-calculator.html"
                                                        title="Simple Interest Calculator">Simple Interest
                                                        Calculator</a></li>



                                            </ul>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        @include('frontend.includes.follow_us')


                        <div
                            class="responsive_row ac_houseslot1  responsive_hide_on_hd responsive_hide_on_desktop responsive_hide_on_tablet">
                            <div class="responsive_cell_home_left  ">
                                <div class="responsive_center  ">
                                    <div id="ad_houseslot1" class="am-home ">
                                        <x-advertisement position="header_ad" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="responsive_row ac_houseslot2  responsive_hide_on_desktop responsive_hide_on_tablet responsive_hide_on_smartphone">
                        </div>
                    </div>
                </div>
                <div class="responsive_cell_home_right">


                    @include('frontend.includes.roman_alphabets')

                    <div class="responsive_row">
                        <div class="contentBlock responsive_cell">
                            <h2> Urdu Alphabets</h2>
                            <table border="0" width="100%" cellspacing="0" cellpadding="6">
                                <tbody>
                                    <tr>

                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'thay']) }}">ٹ</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'tay']) }}">ت</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'pay']) }}">پ</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'bay']) }}">ب</a></td>
                                        <td width="15%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'alif']) }}">ا</a></td>
                                        <td width="15%" class="AlphabetButtons"><a
                                                href="{{ route('urdu.words', ['alphabet' => 'alifmada']) }}">آ</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'dhal']) }}">ڈ</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'dal']) }}">د</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'khay']) }}">خ</a></td>
                                        <td width="15%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'hay']) }}">ح</a></td>
                                        <td width="15%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'jim']) }}">ج</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'say']) }}">ث</a></td>
                                    </tr>
                                    <tr>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'seen']) }}">س</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'zhay']) }}">ژ</a></td>
                                        <td width="15%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'zay']) }}">ز</a></td>
                                        <td width="15%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'rhay']) }}">ڑ</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'ray']) }}">ر</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'zal']) }}">ذ</a></td>
                                    </tr>
                                    <tr>
                                        <td width="14%" class="AlphabetButtons"><a
                                                href="{{ route('urdu.words', ['alphabet' => 'ain']) }}">ع</a></td>
                                        <td width="15%" class="AlphabetButtons"><a
                                                href="{{ route('urdu.words', ['alphabet' => 'zhoy']) }}">ظ</a></td>
                                        <td width="15%" class="AlphabetButtons"><a
                                                href="{{ route('urdu.words', ['alphabet' => 'thoy']) }}">ط</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'duad']) }}">ض</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'suad']) }}">ص</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'sheen']) }}">ش</a></td>
                                    </tr>
                                    <tr>
                                        <td width="15%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'lam']) }}">ل</a></td>
                                        <td width="15%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'gaf']) }}">گ</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'qyaf']) }}">ک</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'qaf']) }}">ق</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'fay']) }}">ف</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'gain']) }}">غ</a></td>
                                    </tr>
                                    <tr>
                                        <td width="15%" class="AlphabetButtons"><a
                                                href="{{ route('urdu.words', ['alphabet' => 'hamza']) }}">ء</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'wowhamza']) }}">ؤ</a>
                                        </td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'wow']) }}">و</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'noongunah']) }}">ں</a>
                                        </td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'noon']) }}">ن</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'mim']) }}">م</a></td>
                                    </tr>
                                    <tr>
                                        <td width="14%" class="AlphabetButtons">&nbsp;</td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'bariya']) }}">ے</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'ya']) }}">ی</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'yahamza']) }}">ئ</a></td>
                                        <td width="14%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'hay3']) }}">ھ</a></td>
                                        <td width="15%" class="AlphabetButtons"> <a
                                                href="{{ route('urdu.words', ['alphabet' => 'hay2']) }}">ہ</a></td>
                                    </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>


                    @include('frontend.includes.english_alphabets')
                    <!--------------------------------------------------->

                    <div class="responsive_row" style="padding-top:15px">
                        <div class="contentBlock responsive_cell">
                            <x-advertisement position="content_bottom" />
                        </div>
                    </div>
                    <!------------------------------------------------->
                </div>

            </div>
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

    @include('frontend.includes.footer')
