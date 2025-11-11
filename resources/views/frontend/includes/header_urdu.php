<?php include("includes/head_files.php"); ?>

<script type='text/javascript' src='<?php echo $path; ?>js/urdutextbox.js'></script>

<script type="text/javascript">
$().ready(function() {
	$("#urdu_lg").autocomplete("<?php echo $path; ?>includes/wordlist_urdu_ajax.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
		$("#urdu_sms").autocomplete("<?php echo $path; ?>includes/wordlist_urdu_ajax.php", {
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


window.onload = myOnload;

function myOnload(evt){
	MakeTextBoxUrduEnabled(urdu_sm);//enable Urdu in html text box
	
	MakeTextBoxUrduEnabled(urdu_lg);//enable Urdu in html text box
	
	//MakeTextBoxUrduEnabled(txtBox2);//enable Urdu in html text area
}

</script>

<?php include("includes/header_1.php"); ?>

    <div class="mobileSearch">
        <form action="<?php echo $path; ?>includes/front_controller.php" method="post" class="quickLinks">
            <div class="searchBlock">
                 <div class="searchContain">

                      <button class="searchCta" style="float:right"><i class="icon-search icon-fixed-width"></i></button>
                        <div class="searchInput">
                            <input name="search_query" class="q searchBox arabic_input" id="urdu_sm" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" tabindex="1" value="" maxlength="150" placeholder="Type Urdu Word" title="Type Urdu Word" type="search">
							<input type="hidden" name="action" value="urdu_word">
                        </div>
                    
                </div>
            </div>

            
        </form>

    </div>
<?php include("includes/header_2.php"); ?>


            <div class="searchContain">
                                                <form action="<?php echo $path; ?>includes/front_controller.php" method="post" class="quickLinks">

                    
                    
                    <input name="search_query"  class="q searchBox arabic_input"  id="urdu_lg" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" tabindex="1" value="" maxlength="150" placeholder="Type Urdu Word" title="Type Urdu Word" type="search">
					
					<input type="hidden" name="action" value="urdu_word">
					
                    <a id="keyboard_icon" class="icon-keyboard responsive_hide_on_tablet"></a>
                   <?php /*?> <a id="keyboardsListBtn" class="icon-arrow-down responsive_hide_on_tablet"></a><?php */?>
                    <button class="searchCta"><i class="icon-search icon-fixed-width"></i></button>
                </form>
            </div>
<?php include("includes/header_3.php"); ?>