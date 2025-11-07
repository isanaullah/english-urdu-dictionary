<meta name="msvalidate.01" content="A20CFE3F406262147961300D69B2FE15" />
</head>
    <body class=" ad_trick " data-twttr-rendered="true">
        
                <iframe src="" style="visibility: hidden; display: none;"></iframe>

        
<header id="header" class="responsive_hide_on_smartphone">
    <div class="responsive_container">
        <div class="headerRight">
		
            <ul class="userNav inline">
        <li><a href="<?php echo $path; ?>">Home</a></li>
		<li><a href="<?php echo $path; ?>"><img src="<?php echo $path; ?>images/english_btn.png" title="Click English to Urdu Dictionary" alt="Click English to Urdu Dictionary" style="height:35px;"></a></li>
		<li><a href="<?php echo $path?>roman.html"><img src="<?php echo $path; ?>images/roman_btn.png" title="Click Roman Urdu to English Dictionary" alt="Click Roman Urdu to English Dictionary" style="height:35px;"></a></li>
		<li><a href="<?php echo $path?>urdu.html"><img title="Click Urdu to English Dictionary" alt="Click Urdu to English Dictionary" src="<?php echo $path; ?>images/urdu_btn.png" style="height:35px;"></a></li>
                            </ul>
							
						
							
			<?php 
			$current_page_link = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				if($current_page_link !="http://www.englishurdudictionarypk.com/contact.html")
				{
			 ?>				
							
		
			<?php } ?>
        </div>
        <a href="<?php echo $path;  ?>">
            <img class="logo" src="<?php echo $path; ?>images/logo.png" alt="My Logo">
        </a>
    </div>
</header>
<div style="height:38px;" class="responsive_hide_on_non_smartphone"></div>
<header id="mobileHeader" class="mobileHeader responsive_hide_on_non_smartphone">
    <div class="mobileHeaderBar">
        <div class="headerMenu">
            <div class="mobileHeaderControls">
                <div class="mobileShareSwitch"></div>
                <div class="mobileSearchSwitch"></div>
                <div class="menuButton"></div>
            </div>
            <a href="<?php echo $path;  ?>">
                <img class="mobileLogo" src="<?php echo $path; ?>images/odlogo_mobile.png" alt="English to Urdu Dictionary">
            </a>
        </div>
        <div class="mobileMenu" style="margin-right:50px">
             <ul>
                                                                                                    <li class="hasSub" id="mm-menuarabiclabel">
                        <a href="<?php echo $path; ?>">
                            <i class="icon-arrow-down"></i>
                                                        Dictionaries
                                                    </a>
                                                    <ul>
                                                    <li><a href="<?php echo $path; ?>">English Dictionary</a></li>
													<li><a href="<?php echo $path; ?>roman.html">Roman Dictionary</a></li>
													<li><a href="<?php echo $path; ?>urdu.html">Urdu Dictionary</a></li>

													
                                                            </ul>

                                                     </li>
                                                     

<?php /*?>                 <li class="" id="mm-menugermanlabel"><a href="">German</a></li>

                <li class="hasSub" id="mm-menuspanishlabel">
				<a href=""><i class="icon-arrow-down"></i>Spanish</a><ul>
				<li><a href="">Dictionary</a></li>
				<li class="hasSub"><a href=""><i class="icon-arrow-down"></i>Grammar</a><ul>
				<li><a href="">Home</a></li>
				<li><a href="">Writing in Spanish</a></li>
				<li><a href="">Improve your Spanish</a></li>
				<li><a href="">Grammar A-Z</a></li>
				<li><a href="">On the OxfordWords blog</a></li></ul>
				</li></ul></li>
				<?php */?>
				

				
				<li class="endItem"><a href="<?php echo $path; ?>">Home</a></li>
				<li class="endItem"><a href="<?php echo $path; ?>">About Us</a></li>
				<li class="endItem"><a href="<?php echo $path; ?>contact.html">Contact Us</a></li>

				</div></div>
				<div class="mobileShare"><div class="mobileShareInner"><div>
				<a class="link icon-share-facebook"  onClick="Share.facebook_link('<?php $rdb->current_url(); ?>')" title="Share this page on Facebook"></a>
                <a class="link icon-share-twitter"  onClick="Share.twitter('<?php $rdb->current_url(); ?>')" title="Share this page on Twitter"></a>
                <a class="link icon-share-google-plus" href="https://plus.google.com/share?url=<?php $rdb->current_url(); ?>" target="_blank" title="Share this page on Google+"></a>
                </div>
                
                
            </div>
        </div>