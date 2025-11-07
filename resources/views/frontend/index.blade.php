@php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
@endphp
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="js">

<head>
    <!--
<script type="application/ld+json">
{
   "@context": "http://schema.org",
   "@type": "WebSite",
   "url": "http://www.englishurdudictionarypk.com/",
   "potentialAction": {
     "@type": "SearchAction",
     "target": "http://www.englishurdudictionarypk.com/search?q={search_term_string}",
     "query-input": "required name=search_term_string"
   }
}
</script> -->





    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>English Urdu Dictionary | انگلش اردو ڈکشنری</title>
    <meta name="description" content="Consult free online English to Urdu dictionary for Urdu to English translation and from English to Urdu meaning, this English Urdu dictionary is authentic and trustworthy for definition, antonyms, synonyms, similar words, meanings, translations and pronunciation.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>

    @include('includes.header_english')
    <link rel="stylesheet" type="text/css" href="{{ $path }}css/pagination.css" />
    <div class="home">
        <div class="responsive_container firstContainer">




            <div class="responsive_row ac_topslot ">
                <div class="responsive_cell_whole  ">
                    <div class="ad_trick_header  ">
                        <div id="ad_topslot" class="am-home ">

                            @include('frontend.includes.banners.728x90')
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
                                            <h1 style="font-size:22px;">English to English and Urdu meaning dictionary, roman Urdu to English dictionary online free translation</h1>
                                            <br>

                                            <script type="text/javascript">
                                                $().ready(function() {
                                                    $("#english_words_1").autocomplete("{{ $path }}includes/wordslist_ajax.php", {
                                                        width: 260,
                                                        matchContains: true,
                                                        //mustMatch: true,
                                                        //minChars: 0,
                                                        //multiple: true,
                                                        //highlight: false,
                                                        //multipleSeparator: ",",
                                                        selectFirst: false
                                                    });

                                                });
                                            </script>



                                            {{-- @include('frontend.includes.banners.468x60') --}}

                                            <hr style="margin-bottom:5px; border: 1px dashed #d3d3d3;">
                                            <div style="margin-bottom:20px;">
                                                <strong>English to Urdu Dictionary</strong> <img style=" float:right; height:30px;" src="{{ $path }}images/english_.png">
                                            </div>

                                            <div class="box">
                                                <form action="{{ $path }}includes/front_controller.php" method="post">

                                                    <input type="text" style="width:60%;" name="search_query" id="english_words_1" placeholder="Type Your English Word">
                                                    <input type="hidden" name="action" value="english_word">
                                                    <input type="submit" value="Search">
                                                </form>

                                            </div>


                                            <center>
                                                <a href="{{ $path }}"><img src="{{ $path }}images/english_btn.png" title="Click English to Urdu Dictionary" alt="Click English to Urdu Dictionary" style="height:35px;"></a>
                                                <a href="{{ $path }}roman.html"><img src="{{ $path }}images/roman_btn.png" title="Click Roman Urdu to English Dictionary" alt="Click Roman Urdu to English Dictionary" style="height:35px;"></a>
                                                <a href="{{ $path }}urdu.html"><img title="Click Urdu to English Dictionary" alt="Click Urdu to English Dictionary" src="{{ $path }}images/urdu_btn.png" style="height:35px;"></a>


                                                <hr style="margin-bottom:5px;">


                                                <a href="{{ $path }}english_words/A.html"><strong>A</strong></a> -

                                                <a href="{{ $path }}english_words/B.html"><strong>B</strong></a> -
                                                <a href="{{ $path }}english_words/C.html"><strong>C</strong></a> -
                                                <a href="{{ $path }}english_words/D.html"><strong>D</strong></a> -
                                                <a href="{{ $path }}english_words/E.html"><strong>E</strong></a> -
                                                <a href="{{ $path }}english_words/F.html"><strong>F</strong></a> -

                                                <a href="{{ $path }}english_words/G.html"><strong>G</strong></a> -
                                                <a href="{{ $path }}english_words/H.html"><strong>H</strong></a> -
                                                <a href="{{ $path }}english_words/I.html"><strong>I</strong></a> -
                                                <a href="{{ $path }}english_words/J.html"><strong>J</strong></a> -
                                                <a href="{{ $path }}english_words/K.html"><strong>K</strong></a> -
                                                <a href="{{ $path }}english_words/L.html"><strong>L</strong></a> -
                                                <a href="{{ $path }}english_words/M.html"><strong>M</strong></a> -
                                                <a href="{{ $path }}english_words/N.html"><strong>N</strong></a> -
                                                <a href="{{ $path }}english_words/O.html"><strong>O</strong></a> -
                                                <a href="{{ $path }}english_words/P.html"><strong>P</strong></a> -
                                                <a href="{{ $path }}english_words/Q.html"><strong>Q</strong></a> -

                                                <a href="{{ $path }}english_words/R.html"><strong>R</strong></a>
                                                <br>
                                                <a href="{{ $path }}english_words/S.html"><strong>S</strong></a> -
                                                <a href="{{ $path }}english_words/T.html"><strong>T</strong></a> -
                                                <a href="{{ $path }}english_words/U.html"><strong>U</strong></a> -
                                                <a href="{{ $path }}english_words/V.html"><strong>V</strong></a> -
                                                <a href="{{ $path }}english_words/W.html"><strong>W</strong></a> -
                                                <a href="{{ $path }}english_words/X.html"><strong>X</strong></a> -


                                                <a href="{{ $path }}english_words/Y.html"><strong>Y</strong></a> -
                                                <a href="{{ $path }}english_words/Z.html"><strong>Z</strong></a>
                                                <hr style="margin-bottom:5px;">
                                            </center>

                                            <p style="font-size:14px; text-align:justify;">
                                                English to Urdu dictionary and Urdu to English dictionary is vital for English learners. In some cases readers need dictionary English to English translation, while in daily life we require Urdu to English translation of some text.






                                            </p>
                                            {{-- <div style="width:336px; height:280px">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- dict_responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7732304816769492"
     data-ad-slot="8708083564"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

</div> --}}
                                            @include('frontend.includes.banners.200x90')

                                            <p>This online dictionary Urdu to English covers Urdu translation, Urdu dictionary with pronunciation, roman Urdu to English online converter and know here what is what means, online.Dictionary is a comparatively huge volume book that contains millions of words of a language with meanings. Moreover, it provides full details about the word origin, pronunciation, meanings, antonyms and synonymous, similar word and some time word used in sentence to clear the meaning to reader. In this era, which is totally camouflaged by electronic media and we all use different medium for our research or office work, while computer is the main medium to solve all our issues online and without consulting others. Now we can search online dictionary just on one click, but main things is that who will provide online quality meanings with description quickly as you want. Dictionary is primary need of all walk of life to check the meaning, spelling, synonyms even selection of more suitable word that you want to write down. All the professional people consult dictionary many times in day most of professionals need this frequently just as if you are a lawyer or judge, a teacher or student, research scholar, translator and a learner of foreign language. It is easy to find an <strong>English dictionary from English to Urdu</strong>, but it tough to estimate the quality and reliability of dictionary, so to avoid all these issues we present online English to Urdu dictionary completely free and easily accessible.
                                            </p>

                                            <p style="font-size:14px;  text-align:justify;">
                                                The administration of englishurdudictionarypk.com is very much pleased to launch a reliable and trustworthy free of coast English to <a href="{{ $path }}urdu.html" title="Urdu to Dictionary">Urdu dictionary </a> with meanings, definitions of words and detailed description. Our Dictionary has a huge number of words, synonyms, phrases, verb, noun, pronoun, adjective and adverb with meanings and references. Our online facility is amazing and very easy to find your desire difficult word for meaning within no time just write your search word in type-in the box and click the meaning in Urdu. Along this index page visitors can press alphabetic of English and Urdu to write their search word quickly. Whenever visitor write a single alphabet in type-in the box and in the same time a series of similar words will be appeared on box related to alphabet. Although Urdu meaning is the main task of visitors, but we have plenty of related word for concerned word. Here, on this website visitors will get classic English with Urdu meanings and a little bit definition of the searched word. On this Englishtourdudictionary.com.pk searcher will get easy and understandable English meanings with Urdu translation. It is also easy to write word by using English and Urdu keyboard available on page.
                                            </p>
                                            <br>
                                            <p style="font-size:14px;  text-align:justify;">
                                                <a href="{{ $path }}" title="englishurdudictionarypk.com"><strong>englishurdudictionarypk.com</strong></a> provides a trustworthy plate form to translate English to Urdu words, Urdu to English translation and <strong><a href="{{ $path }}roman.html" title="Roman Urdu Dictionary">Roman Urdu </a> to English translation</strong>. Same as English to Urdu translation visitors can translate Urdu to English just writing phonetic keyboard. When during word searching your desire word not appeared in the box then you have to check your spelling first or take helps to just writing initial alphabet for required word. Our online Urdu to English dictionary has a huge volume of words and phrase with meanings, all these words and their meanings are precisely selected by language experts. This online dictionary provides standard classic and trusted words accurate in spelling and meanings. This reliable Englishtourdudictionary.com.pk is the source of millions of words picked from International standard dictionaries like oxford and other time tested dictionaries of the world. It is most reliable free online trusted edictionary that will give you a solid and sound meanings from English to Urdu and from <strong>Urdu to English translation</strong>. Search your desire words in quick time with reference and close similar meanings of the written word. This englishurdudictionarypk.com will defiantly fulfill your need and demand in a moment.


                                                <!-- End of DIV -->
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="responsive_row">
                                    <div class="responsive_cell_home_center_half responsive_no_margin_vertical">


                                        <div class="responsive_row rssPanel">
                                            <div class="responsive_cell_home_center_half">
                                                <div class="contentBlock halfBlock purpleBlock">
                                                    <div class="blockBody">
                                                        <h2><a href="{{ $path }}roman.html">Roman Urdu To English Dictionary</a></h2>
                                                        <p style="font-size:13px;">Roman Urdu is commonly used in messages of computer or mobiles, but it is written by the same English alphabet. This method of writing is being used in different people who do not know English properly or grammatically...
                                                        </p>
                                                    </div>
                                                    <div class="readMore"><a href="{{ $path }}roman.html">Click Roman Dictionary
                                                            <span class="icon-arrow-right">&nbsp;</span></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="responsive_cell_home_center_half responsive_no_margin_vertical">
                                        <div class="contentBlock halfBlock purpleBlock">
                                            <div class="blockBody">
                                                <h2><a href="{{ $path }}urdu.html">Urdu To English Dictionary</a></h2>
                                                <p style="font-size:13px;">
                                                    he prime focus of this dictionary is on English to Urdu meanings and from Urdu to English translation. Moreover, visitors can get meaning of English by using Roman Urdu words through English alphabet similarly Urdu words require Urdu keyboard, which is available on the page.
                                                </p>
                                            </div>
                                            <div class="readMore"><a href="{{ $path }}urdu.html">
                                                    Click Urdu Dictionary
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
                                @include('frontend.includes.banners.250x250')
                            </div>
                        </div>


                        {{-- <div class="responsive_row">
    <div class="contentBlock trendingWordsPanel">
                <div class="blockBody">
                                            <div class="trendingWords" data-country="all" style="display:block;">
                            <h2>Learn English</h2>
                            <div class="responsive_columns_2_on_smartphone ">
                                <ul>

								@php
								$eng_cond ="";
								$eng_q = $rdb->db_select("*","sub_categories",$eng_cond);
								while($eng_row=mysql_fetch_array($eng_q))
								{
                                @endphp
<li><a href="{{ $path . "learn-english/". $eng_row['sc_slug'] }}/" title="Click English Course in Urdu">{{ strtolower($eng_row['sc_slug']) }}</a> </li>

<li><a href="{{ $path . "learn-english/" }}" title="Meaning of {{ $eng_row['words'] }}">{{ strtolower($eng_row['article_title']) }}</a> </li>
								@php } @endphp



							</ul>
                            </div>
                        </div>


                </div>
             </div>
</div> --}}



                        <div class="responsive_row">
                            <div class="contentBlock trendingWordsPanel">
                                <div class="blockBody">
                                    <div class="trendingWords" data-country="all" style="display:block;">
                                        <h2>Most Popular Words</h2>
                                        <div class="responsive_columns_2_on_smartphone ">
                                            <ul>

                                                @php
                                                $cond_value = array("status" => "1");
                                                $popular_q = $rdb->db_select_cond("*", "words", "status=:status ORDER BY word_counter DESC LIMIT 38", $cond_value);
                                                @endphp
                                                @foreach ($popular_q['row'] as $popular_row)
                                                    <li><a href="{{ $path . 'meaning/' . $popular_row['word_url'] }}" title="Meaning of {{ $popular_row['words'] }}">{{ strtolower($popular_row['words']) }}</a> </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        @include('frontend.includes.follow_us')



                        <div class="responsive_row ac_houseslot1  responsive_hide_on_hd responsive_hide_on_desktop responsive_hide_on_tablet">
                            <div class="responsive_cell_home_left  ">
                                <div class="responsive_center  ">
                                    <div id="ad_houseslot1" class="am-home ">
                                        @include('frontend.includes.banners.250x250')
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="responsive_row ac_houseslot2  responsive_hide_on_desktop responsive_hide_on_tablet responsive_hide_on_smartphone">

                        </div>

                    </div>

                </div>


                <div class="responsive_cell_home_right">





                    <div class="responsive_row">
                        <div class="contentBlock responsive_cell">
                            @include('frontend.includes.banners.250x250')
                        </div>
                    </div>


                    <div class="responsive_row">
                        <div class="contentBlock responsive_cell">


                            @include('frontend.includes.banners.200x90')

                        </div>
                    </div>

                    {{--
				<div class="responsive_row">
    <div class="contentBlock responsive_cell">

        <div class="gform_body">
                            <ul>
							<form action="{{ $path }}includes/front_controller.php" method="post">
				<li style="display: block;"><label>Type English Word</label><div class="ginput_container"><input name="search_query" type="text" value="" class="medium" >
				</div></li>
					<div class="gform_footer top_label">
		<input type="hidden" name="action" value="contact_us" />
		<input type="submit" class="gform_button button" value="Submit" name="submit" style="display: block;">

<input type="hidden" name="action" value="english_word">
                        </form>
                        </div>


                            </ul></div>


    </div>
</div>


<div class="responsive_row">
    <div class="contentBlock responsive_cell">

        <div class="gform_body">
                            <ul>
							<form action="{{ $path }}includes/front_controller.php" method="post">
				<li style="display: block;"><label>Type English Word</label><div class="ginput_container"><input name="search_query" type="text" value="" class="medium" >
				</div></li>
					<div class="gform_footer top_label">
		<input type="hidden" name="action" value="contact_us" />
		<input type="submit" class="gform_button button" value="Submit" name="submit" style="display: block;">

<input type="hidden" name="action" value="english_word">
                        </form>
                        </div>


                            </ul></div>


    </div>
</div>

		 --}}
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
                                        <td width="14%" class="AlphabetButtons"> <a href="{{ $path }}urdu_words/wowhamza.html"></a></td>
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

                    @include('frontend.includes.roman_alphabets')



                    <div class="responsive_row">
                        <div class="contentBlock trendingWordsPanel">
                            <div class="blockBody">
                                <div class="trendingWords" data-country="all" style="display:block;">
                                    <h2>Recent Updated Words</h2>
                                    <div class="responsive_columns_2_on_smartphone ">
                                        <ul>
                                            @php
                                            $cond_value = array("status" => "1");
                                            $popular_q = $rdb->db_select_cond("*", "words", "status=:status ORDER BY id DESC LIMIT 10", $cond_value);
                                            @endphp
                                            @foreach ($popular_q['row'] as $popular_row)
                                                <li><a href="{{ $path .  "meaning/" . $popular_row['word_url'] }}" title="Meaning of {{ $popular_row['words'] }}">{{ strtolower($popular_row['words']) }}</a> </li>
                                            @endforeach



                                        </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>









                    {{--

 <!--------------------------------------------------->

                <div class="responsive_row" style="padding-top:15px">
    <div class="contentBlock responsive_cell">
@include('frontend.includes.banners.336x280')
    </div>
</div>

<div class="responsive_row">
    <div class="contentBlock responsive_cell">
        <h2>
            <a href="" target="_blank">Newspaper Jobs</a>
        </h2>
        <img src="images/add.jpg" />

    </div>
</div>
 --}}


                    <!------------------------------------------------->
                </div>

            </div>
        </div>
    </div>



    @include('frontend.includes.footer')
