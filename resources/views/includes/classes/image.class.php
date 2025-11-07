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
include("date_time.class.php");
class image extends date_time {

  /// METHOD FOR CALL PARENT CONSTRUCTOR ///
	public function __construct(string $host, string $db, string $user, string $pass){
		parent::__construct($host, $db, $user, $pass);
	}
	/// METHOD FOR CALL PARENT CONSTRUCTOR ///

	/// METHOD FOR DELETE PICTURE FROM FOLDER ///
    function delete_picture($table,$cond,$field,$path){
      $query = "SELECT * FROM " . $table . " " . $cond;
      $query2 =  mysql_query($query) or die(mysql_error());
      
      $row = mysql_fetch_array($query2);
      
      if($row[$field] != '') {
        $del = $path . $row[$field];
        unlink($del);
      }
    }
  /// METHOD FOR DELETE PICTURE FROM FOLDER ///

  /// METHOD FOR AUTO RESIZE IMAGE ///
    function image_resize($target,$newcopy,$w,$h,$ext) {
      list($w_orig,$h_orig)=getimagesize($target);
      $scale_ratio=$w_orig/$h_orig;

      if(($w/$h)>$scale_ratio){
        $w=$h*$scale_ratio;
      } else {
        $h=$w/$scale_ratio;
      }

      $img="";
      $ext=strtolower($ext);

      if ($ext=="gif") {
        $img=imagecreatefromgif($target);
      } elseif ($ext=="png"){
        $img=imagecreatefrompng($target);
      } else {
        $img=imagecreatefromjpeg($target);
      }

      $tci=imagecreatetruecolor($w,$h);
      imagecopyresampled($tci,$img,0,0,0,0,$w,$h,$w_orig,$h_orig);

      if ($ext=="gif") {
        imagegif($tci,$newcopy);
      } elseif($ext=="png") {
        imagepng($tci,$newcopy);
      } else {
        imagejpeg($tci,$newcopy);
      }
    }
  /// METHOD FOR AUTO RESIZE IMAGE ///

  /// METHOD FOR SELECT IMAGE ///	
    function uploadimg($imgname,$loc){

      $fname = $_FILES[$imgname]['name'];
      $ftype = $_FILES[$imgname]['type'];
      $fsize = $_FILES[$imgname]['size'];
      $ftmp  = $_FILES[$imgname]['tmp_name'];
      $ferror = $_FILES[$imgname]['error'];
      
      // Set max size of upload image //
      $fsize_limit = '8388608';
      // Set accepted format of image //
      $allowed = array('jpg','jpeg','png','gif');
      // Explode image after dot //
      $ext = strtolower(end(explode('.',$fname)));
      
      // Crete array variable to save all images properties //
      $img_array =array();
      // Save image exte in array //
      $img_array['ext'] = $ext;
      // Create image temp name with ext //
      $pname = time()+rand().".".$ext;
      // Save image temp name in array //
      $img_array['pname'] =$pname;

        if($fsize > $fsize_limit){
          //$_SESSION['error'] = "Size is more than 8 MB";
          $img_array['error'] ="Size is more than 8 MB";
          //header('Location:'.$loc);			
        } else if(in_array($ext,$allowed) === false) {
          $img_array['error'] ="</br>Not Image File";
          //$_SESSION['error'] = "</br>Not Image File";
          //header('Location:'.$loc);
        } else if($ferror==false){
          $upload = move_uploaded_file($ftmp,$loc.$pname);	
        } 
                
        return $img_array;
    }
  /// METHOD FOR SELECT IMAGE ///	 
  
  /// METHOD FOR CRAWL IMAGE TO ANOTHER WEBSITE ///
    // takes URL of image and Path for the image as parameter
    function download_image1($image_url, $image_file){
      $fp = fopen ($image_file, 'w+');              // open file handle

      $ch = curl_init($image_url);
      // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // enable if you want
      curl_setopt($ch, CURLOPT_FILE, $fp);          // output to file
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_TIMEOUT, 1000);      // some large value to allow curl to run for a long time
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
      // curl_setopt($ch, CURLOPT_VERBOSE, true);   // Enable this line to see debug prints
      curl_exec($ch);

      curl_close($ch);                              // closing curl handle
      fclose($fp);                                  // closing file handle
    }
  /// METHOD FOR CRAWL IMAGE TO ANOTHER WEBSITE ///

} // end class
?>