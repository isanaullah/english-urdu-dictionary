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
   "@@context": "http://schema.org",
   "@@type": "WebSite",
   "url": "http://www.englishurdudictionarypk.com/",
   "potentialAction": {
     "@@type": "SearchAction",
     "target": "http://www.englishurdudictionarypk.com/search?q={search_term_string}",
     "query-input": "required name=search_term_string"
   }
}
</script> -->

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>@yield('title', 'English Urdu Dictionary | انگلش اردو ڈکشنری')</title>
    <meta name="description" content="@yield('meta_description', 'Consult free online English to Urdu dictionary for Urdu to English translation and from English to Urdu meaning, this English Urdu dictionary is authentic and trustworthy for definition, antonyms, synonyms, similar words, meanings, translations and pronunciation.')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
    <link rel="stylesheet" type="text/css" href="{{ $path }}css/pagination.css" />

    @yield('header')

    @stack('styles')
</head>

<body>
    <div class="home">
        <div class="responsive_container firstContainer">
            @yield('content')
        </div>
    </div>

    @include('frontend.includes.footer')

    @stack('scripts')
</body>

</html>
