<?php include("admin/includes/db.class.php"); 
$rdb = new db_connect;

header('Content-Type: text/html; charset=utf-8' );

$page_title ="Free Online Easy Age Calculator: helloseekers.com";
$meta_desc ="Online free birthday Age Calculator and Coverter you can calculate your age in days, minuts, seconds";
$heading ="Age Calculator Free Online";
$body ="With Online Age Calculator you can Calculate your age in Year, Months, days, weeks, hours, Minutes, Second.
With this calculator you can know how much days left to your next birthday and also Day of you next Birthday. Just your Birth Date and to date and click calculate.";


if(isset($_POST['submit']))
{
$td=$_POST['td'];
$tm=$_POST['tm'];
$ty=$_POST['ty'];


$dd=$_POST['dd'];
$mm=$_POST['mm'];
$yy=$_POST['yy'];

$today =$td . "-" .$tm. "-" .$ty ;

$birthdate =$dd . "-" .$mm. "-" .$yy  ;

$datetime1 = new DateTime($today);

$datetime2 = new DateTime($birthdate);


$difference = $datetime2->diff($datetime1);

$your_birth_date= 'Your age is: '. $difference->y . ' years,' . $difference->m . ' months,' . $difference->d . ' days ' . '<br>'; 

$birth_in_month=  $difference->y * 12 + $difference->m . " Months" . " " . $difference->d . " Days" . '<br/>' ;

/////////Calculate Days////////////
	 $now =strtotime($today); 
     $your_date = strtotime($birthdate);
     $datediff = $now - $your_date;
     $birth_in_days = floor($datediff/86400) . ' Days<br>';
	 /*$days_between = ceil(abs($end - $start) / 86400);*/

/////////Calculate weeks////////////
	 $diff_weeks = strtotime($today, 0) - strtotime($birthdate, 0);
	 $birth_in_weeks = floor($diff_weeks / 604800) . ' weeks<br>';


/////////Calculate Hours////////////
$birth_in_hour = round((strtotime($today) - strtotime($birthdate))/3600,1) . ' Hour<br>';

/////////Calculate Minutes////////////
$to_time = strtotime($today);
$from_time = strtotime($birthdate);
$birth_in_minutes =round(abs($to_time - $from_time) / 60,2) . " minute<br>";

/////////Calculate Seconds////////////
$birth_in_seconds = strtotime($today) - strtotime($birthdate) . " Seconds<br>";


/////////Birthday days Remaining////////////

$source = $birthdate;
$date = new DateTime($source);
$birthday2 = $date->format('j' . ' ' .'F'/* . ' ' . 'Y'*/);

function days_till_birthday($birth_day_month) {

	$bts = strtotime($birth_day_month." ".date("y"));
	$ts = time();

	if ($bts < $ts) {$bts = strtotime($birth_day_month." ".date("y",strtotime("+1 year")));}

	return round(($bts - $ts) / 86400);
}

$your_next_birthday = days_till_birthday("$birthday2") ." Days Left for Your Next Birthday<br/>";


/////////Birthday day Name////////////
$source_day_name = $birthdate;
$date = new DateTime($source);
$birthday2 = $date->format('j' . ' ' .'F'/* . ' ' . 'Y'*/);

$date = $birthday2;
$day_of_my_next_birthday=date('l', strtotime($date)) . " Day of the next birthday";
/////////Birthday day Name////////////


/////////////////Thousand Separater/////////////////
$example = "12345789";
$subtotal =  number_format($example, 0, '', ',');
/////////////////Thousand Separater/////////////////


}

?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="js">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?=$page_title?></title>
      
        <meta name="description" content="<?=$meta_desc?>">

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>

		<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>css/style.css" />
<?php include("includes/header_english.php"); ?>
<script type="text/javascript" src="<?php echo $path; ?>js/validation.js"></script>

<div class="responsive_container firstContainer">
            
                            <div class="responsive_row ac_topslot ">
                                        <div class="responsive_cell_whole  ">
                                        <div class="ad_trick_header  ">
                            <div class="responsive_row ac_topslot ">
                                        <div class="responsive_cell_whole  ">
                                        <div class="ad_trick_header  ">
                            <div id="ad_topslot" class="am-default ">
                           
						   <?php include("includes/banners/728x90.php"); ?>
						   
                                </div>
        </div>        </div>        </div>
        </div>        </div>        </div>        <div class="responsive_row">
                
    
                 
                                                
                            <div class="responsive_cell_left ad_trick_left ac_leftslot  responsive_hide_on_smartphone">
                                            <div id="ad_leftslot" class="am-default ">
                            <?php include("includes/banners/160x600.php"); ?>
							<?php include("includes/banners/160x6002.php"); ?>
                                </div>
        </div>
		
		                            <div class="responsive_cell_center_plus_right">
                        
            <article class="english">
                                              <div id="firstClickFreeAllowed">
                        <div><div class="responsive_row">
						<div class="responsive_cell_center">
						<div class="responsive_row">
						<div class="responsive_cell_center">
						
						<div class="responsive_cell_center_plus generalMainContent ">
                    <h2><strong><?=$heading?></strong></h2>
					<p><?=$body?></p>
					
               <form method="post" action="#">
                        <div class="gform_body">
                            <ul>
							
				<li style="display: block;"><label><strong>Your Birth Date is</strong></label>
				  <div class="ginput_container">
					<select name="dd">
							<?php
							$birth_day =date('j');
							
							 for($birth_dayval =1; $birth_dayval <=31; $birth_dayval++) {?>
							
						<option value="<?php echo $birth_dayval; ?>" <?php if($birth_dayval == $dd) { echo "selected"; } ?>  ><?php echo $birth_dayval; ?></option>
				 <?php } ?>
					 </select>
					 
					 <select name="mm">
						<option value="1" <?php if($mm ==1) { echo "selected"; }?> >January</option>
						<option value="2" <?php if($mm ==2) { echo "selected"; }?> >Febuary</option>
						<option value="3" <?php if($mm ==3) { echo "selected"; }?> >March</option>
						<option value="4" <?php if($mm ==4) { echo "selected"; }?> >April</option>
						<option value="5" <?php if($mm ==5) { echo "selected"; }?> >May</option>
						<option value="6" <?php if($mm ==6) { echo "selected"; }?> >June</option>
						<option value="7" <?php if($mm ==7) { echo "selected"; }?> >July</option>
						<option value="8" <?php if($mm ==8) { echo "selected"; }?> >August</option>
						<option value="9" <?php if($mm ==9) { echo "selected"; }?> >September</option>
						<option value="10" <?php if($mm ==10) { echo "selected"; }?> >October</option>
						<option value="11" <?php if($mm ==11) { echo "selected"; }?> >November</option>
						<option value="12" <?php if($mm ==12) { echo "selected"; }?> >December</option>
			 		</select>
					
					<select name="yy" style="width:100px;">
						<?php
						$birth_year =date('Y');
						
						 for($birth_dayval =1900; $birth_dayval <= $birth_year; $birth_dayval++) {?>
						
						<option value="<?php echo $birth_dayval; ?>" <?php if($birth_dayval == $yy) { echo "selected"; } ?>  ><?php echo $birth_dayval; ?></option>
					 <?php } ?>
					</select>
				  <span id="name_er"></span>
				  </div>
			   </li>
			   
			   <li style="display: block;"><label><strong>Current Date is</strong></label>
				  <div class="ginput_container">
					<select name="td" >
						<?php
						$today_day =date('j');
						
						 for($dayval =1; $dayval <=31; $dayval++) {?>
						
						<option value="<?php echo $dayval; ?>" <?php if($dayval == $today_day || $dayval == $td) { echo "selected"; } ?>  ><?php echo $dayval; ?></option>
			 <?php } ?>
					 </select>
					 
					 <?php $today_month =date('m');;?>
					<select name="tm" >
						<option value="1" <?php if($tm==1 or $today_month ==1) { echo "selected"; }?> >January</option>
						<option value="2" <?php if($tm==2 or $today_month ==2) { echo "selected"; }?> >Febuary</option>
						<option value="3" <?php if($tm==3 or $today_month ==3) { echo "selected"; }?> >March</option>
						<option value="4" <?php if($tm==4 or $today_month ==4) { echo "selected"; }?> >April</option>
						<option value="5" <?php if($tm==5 or $today_month ==5) { echo "selected"; }?> >May</option>
						<option value="6" <?php if($tm==6 or $today_month ==6) { echo "selected"; }?> >June</option>
						<option value="7" <?php if($tm==7 or $today_month ==7) { echo "selected"; }?> >July</option>
						<option value="8" <?php if($tm==8 or $today_month ==8) { echo "selected"; }?> >August</option>
						<option value="9" <?php if($tm==9 or $today_month ==9) { echo "selected"; }?> >September</option>
						<option value="10" <?php if($tm==10 or $today_month ==10) { echo "selected"; }?> >October</option>
						<option value="11" <?php if($tm==11 or $today_month ==11) { echo "selected"; }?> >November</option>
						<option value="12" <?php if($tm==12 or $today_month ==12) { echo "selected"; }?> >December</option>
					 </select>
					
					<select name="ty">
						<?php
						$today_year =date('Y');
						
						 for($yearval =1900; $yearval <=$today_year; $yearval++) {?>
						
						<option value="<?php echo $yearval; ?>" <?php if($yearval == $today_year) { echo "selected"; } ?>  ><?php echo $yearval; ?></option>
			 <?php } ?>
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
			   
				
                            </ul></div>
        <div class="gform_footer top_label">

              </form>
<style type="text/css">

.calculator_table
{
border-collapse:collapse; 
border-color:#000000; 
border-style:solid; 
border-width:2px;
}

.calculator_table td
{
border-color:#cccccc; /*grey*/
border-style:solid; 
border-width:1px;
}


</style>
			  
			  <?php 
if (isset($_POST['submit'])) {
?>

<table class="calculator_table">
<tbody>
<tr>
<td colspan="2" ><strong>Your Age</strong></td>
</tr>

<tr>
<th>Your Age Is</th>
<td><?php echo $your_birth_date; ?></td>
</tr>
<tr>
<th>Your Age In Months</th>
<td><?php echo $birth_in_month; ?></td>
</tr>
<tr>
<th>Your Age In Days</th>
<td><?php echo $birth_in_days; ?></td>
</tr>
<tr>
<th>Your Age In Weeks</th>
<td><?php echo $birth_in_weeks; ?></td>
</tr>
<tr>
<th>Your Age In Hours</th>
<td><?php echo $birth_in_hour; ?></td>
</tr>
<tr>
<th>Your Age In Minutes</th>
<td><?php echo $birth_in_minutes; ?></td>
</tr>
<tr>
<th>Your Age In Seconds</th>
<td><?php echo $birth_in_seconds; ?></td>
</tr>
</tbody>
</table>

<br/>
<table class="calculator_table">

<tbody>
<tr>
<td colspan="2" ><strong>Next Birthday Days Left</strong></td>
</tr>
<tr>
<td><img src="<?php echo $path; ?>images/b-cake.png"></td>
<td><?php echo $your_next_birthday; ?></td>
</tr>

</tbody>
</table>

<br/>

<table class="calculator_table">

<tr>
<td><strong>Next Birthday</strong></td>
</tr>
<tr>
<td><?php echo $day_of_my_next_birthday; ?></td>
</tr>
<tr>
<td><?php echo $difference->y . " Age" ?></td>
</tr>

</table>

<?php 
}
?>
<?php include("includes/calculators_links.php"); ?>


                        </div>
                    <br>
                </div>
						
						<!-- End of DIV entryPageContent-->
					</div><!-- End of DIV $responsive_cell_center-->
					</div><!-- End of DIV responsive_row-->
					</div><!-- End of DIV $responsive_cell_center-->
					
					<div class="responsive_cell_home_right">
		

				<?php include("includes/roman_alphabets.php"); ?>
		
				<div class="responsive_row">
    <div class="contentBlock responsive_cell">
        <h2> Urdu Alphabets</h2>
        <table border="0" width="100%" cellspacing="0" cellpadding="6">
                    <tbody><tr>

                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/thay.html">ٹ</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/tay.html">ت</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/pay.html">پ</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/bay.html">ب</a></td>
                      <td width="15%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/alif.html">ا</a></td>
                      <td width="15%" class="AlphabetButtons"><a href="<?php echo $path; ?>urdu_words/alifmada.html">آ</a></td>
                    </tr>
                    <tr>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/dhal.html">ڈ</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/dal.html">د</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/khay.html">خ</a></td>
                      <td width="15%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/hay.html">ح</a></td>
                      <td width="15%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/jim.html">ج</a></td>
					  <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/say.html">ث</a></td>
                    </tr>
                    <tr>
					  <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/seen.html">س</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/zhay.html">ژ</a></td>
                      <td width="15%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/zay.html">ز</a></td>
                      <td width="15%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/rhay.html">ڑ</a></td>
					  <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/ray.html">ر</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/zal.html">ذ</a></td>
                    </tr>
                    <tr>
                      <td width="14%" class="AlphabetButtons"><a href="<?php echo $path; ?>urdu_words/ain.html">ع</a></td>
                      <td width="15%" class="AlphabetButtons"><a href="<?php echo $path; ?>urdu_words/zhoy.html">ظ</a></td>
                      <td width="15%" class="AlphabetButtons"><a href="<?php echo $path; ?>urdu_words/thoy.html">ط</a></td>
					  <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/duad.html">ض</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/suad.html">ص</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/sheen.html">ش</a></td>
					</tr>
                    <tr>
					  <td width="15%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/lam.html">ل</a></td>
                      <td width="15%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/gaf.html">گ</a></td>
					  <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/qyaf.html">ک</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/qaf.html">ق</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/fay.html">ف</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/gain.html">غ</a></td>
					</tr>
                    <tr>
                      <td width="15%" class="AlphabetButtons"><a href="<?php echo $path; ?>urdu_words/hamza.html">ء</a></td>
					  <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/wowhamza.html">ؤ</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/wow.html">و</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/noongunah.html">ں</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/noon.html">ن</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/mim.html">م</a></td>
					</tr>
					<tr>
					  <td width="14%" class="AlphabetButtons">&nbsp;</td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/bariya.html">ے</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/ya.html">ی</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/yahamza.html">ئ</a></td>
                      <td width="14%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/hay3.html">ھ</a></td>
                      <td width="15%" class="AlphabetButtons"> <a href="<?php echo $path; ?>urdu_words/hay2.html">ہ</a></td>
					 </tr>
					
                  </tbody></table>

        
    </div>
</div>
				

						<?php include("includes/english_alphabets.php"); ?>









                               
                                
								
								
 <!--------------------------------------------------->	
 							
                <div class="responsive_row" style="padding-top:15px">
    <div class="contentBlock responsive_cell">
<?php include("includes/banners/336x280.php"); ?>
    </div>
</div>

<?php /*?><div class="responsive_row">
    <div class="contentBlock responsive_cell">
        <h2>
            <a href="" target="_blank">Newspaper Jobs</a>
        </h2>
        <img src="images/add.jpg" />
        
    </div>
</div>
<?php */?>


<!------------------------------------------------->
            </div>
					<!-- End of DIV responsive_cell_right secondaryPageContent ad_trick_right--></div><!-- End of DIV responsive_row--></div><!-- End of DIV -->
                        <div style="clear:both;"></div>
                    </div>
                                            </article>
            
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>