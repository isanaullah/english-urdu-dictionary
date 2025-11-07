<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);	
if (!isset($_COOKIE['Seen']) || $_COOKIE['Seen'] != 'true') {
    setcookie('Seen', 'false');
}
?>
	 	<meta name="apple-mobile-web-app-title" content="Dictionary">
          <link type="text/css" rel="stylesheet" media="screen" href="<?php echo $path; ?>css/common.css">
        
        <link rel="icon" type="image/x-icon" href="<?php echo $path; ?>images/favicon.png">
        <link rel="apple-touch-icon" href="<?php echo $path; ?>images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $path; ?>images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $path; ?>images/apple-touch-icon-114x114.png">
		<link rel="stylesheet" href="<?php echo $path; ?>css/style.css" />
		
		<!--<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script> 
		<script type='text/javascript' src='<?php echo $path; ?>js/jquery.js'></script> -->
		
		<script type='text/javascript' src='<?php echo $path; ?>js/jquery.min.js'></script>
		<script type='text/javascript' src='<?php echo $path; ?>js/jquery.autocomplete.js'></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>css/jquery.autocomplete.css" />
        <script type="text/javascript">
            document.getElementsByTagName('html')[0].className = 'js'
            var pageDictCode = "";
            var homePageOdo = false;
            

			</script>
<script>
	function launchClient(link) 
	{
	var width = 550;
	var height = 500;
	var x = ((screen.width / 2) - (width/2));
	var y = ((screen.height / 2) - (height/2));
	window.open(link, "FindRef", "width=" + width + ",height=" + height + ",left=" + x + ",top=" + y + ",directories=no,location=no,menubar=no,personalbar=no,resizable=no,scrollbars=yes,status=no,toolbar=no");
	}

</script>




<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-7732304816769492",
          enable_page_level_ads: true
     });
</script>