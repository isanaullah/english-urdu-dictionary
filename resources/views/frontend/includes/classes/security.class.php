<?php

/************************************************************************************
	Author		:	Bilal Shah       															*
	File Name 	:	image.class.php													*
 ************************************************************************************/
/************************************************************************************
 *

	FUNCTIONS LIST:
	function delete_picture()
	function iamge_resize()
	function uploadimg()
	function downloadiamge1()

 *
 ************************************************************************************/
include("image.class.php");
class security extends image
{

  /// METHOD FOR CALL PARENT CONSTRUCTOR ///
  public function __construct(string $host, string $db, string $user, string $pass)
  {
    parent::__construct($host, $db, $user, $pass);
  }
  /// METHOD FOR CALL PARENT CONSTRUCTOR ///

  /// METHOD FOR CLEAN INPUT ///
  function cleanInput($input)
  {
    $search = array(
      '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
      '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
      '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
      '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
    );

    $output = preg_replace($search, '', $input);
    return $output;
  }

  function sanitize($input)
  {

    if (is_array($input)) {
      foreach ($input as $var => $val) {
        $output[$var] = sanitize($val);
      }
    } else {

      $input = stripslashes($input);


      $input = $this->cleanInput($input);
      $output = $input;
      // $output = mysql_real_escape_string($input); // no need in pdo
    }

    $output_final = preg_replace("/<.*?>/", "", $output);
    return $output_final;
  }
  /// METHOD FOR CLEAN INPUTs ///

} // end class
