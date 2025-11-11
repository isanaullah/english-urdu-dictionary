    
@include('frontend.includes.head_files')

<script type="text/javascript">
$().ready(function() {
	$("#roman_urdu_sm").autocomplete("{{ $path }}includes/wordlist_roman_ajax.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
	
		$("#roman_urdu_lg").autocomplete("{{ $path }}includes/wordlist_roman_ajax.php", {
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

@include('frontend.includes.header_1')

    <div class="mobileSearch">
        <form action="{{ route('search.roman') }}" method="post" class="quickLinks">
            @csrf
            <div class="searchBlock">
                 <div class="searchContain">

                      <button class="searchCta" style="float:right"><i class="icon-search icon-fixed-width"></i></button>
                        <div class="searchInput">
                            <input name="search_query" class="q searchBox" id="roman_urdu_sm" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" tabindex="1" value="" maxlength="150" placeholder="Type Roman Urdu Word" title="Type Roman Urdu Word" type="search">
                        </div>
                    
                </div>
            </div>

            
        </form>

    </div>
@include('frontend.includes.header_2')
            <div class="searchContain">
                                                
												<form action="{{ route('search.roman') }}" method="post" class="quickLinks">
                    @csrf
                    <div class="input_container">
          <input name="search_query" class="q searchBox" id="roman_urdu_lg" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" tabindex="1" value="" maxlength="150" placeholder="Type Roman Urdu Word" title="Type Roman Urdu Word" type="search">
		   
		<!--  <ul id="country_list_id"></ul>-->
		  </div>

                    <button class="searchCta"><i class="icon-search icon-fixed-width"></i></button>
                </form>
            </div>
			
@include('frontend.includes.header_3')
