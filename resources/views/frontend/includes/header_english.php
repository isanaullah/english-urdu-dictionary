    
<?php include("includes/head_files.php"); ?>


<script type="text/javascript">
$().ready(function() {
	$("#english_search_lg").autocomplete("<?php echo $path; ?>includes/wordslist_ajax.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
		$("#english_search_sm").autocomplete("<?php echo $path; ?>includes/wordslist_ajax.php", {
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


<?php include("includes/header_1.php"); ?>

    <div class="mobileSearch">
        <form action="<?php echo $path; ?>includes/front_controller.php" method="post" class="quickLinks">
            <div class="searchBlock">
                 <div class="searchContain">

                      <button class="searchCta" style="float:right"><i class="icon-search icon-fixed-width"></i></button>
                        <div class="searchInput">
                            <input name="search_query" class="q searchBox" id="english_search_sm" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" tabindex="1" value="" maxlength="150" placeholder="Type English Word" title="Type English Word" type="search">
							<input type="hidden" name="action" value="english_word">
                        </div>
                    
                </div>
            </div>

            
        </form>

    </div>
<?php include("includes/header_2.php"); ?>

            <div class="searchContain">
                                                
												<form action="<?php echo $path; ?>includes/front_controller.php" method="post" class="quickLinks">
                    <div class="input_container">
          <input name="search_query" class="q searchBox" id="english_search_lg" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" tabindex="1" value="" maxlength="150" placeholder="Type English Word" title="Type English Word" type="search"> 
		<!--  <ul id="country_list_id"></ul>-->
		  </div>

                    <button class="searchCta"><i class="icon-search icon-fixed-width"></i></button>
					<input type="hidden" name="action" value="english_word">
                </form>
            </div>
			
<?php include("includes/header_3.php"); ?>