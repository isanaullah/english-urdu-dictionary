<?php 

include("classes/security.class.php");

$rdb = new security('localhost', 'mdsgtimy_englishdictionary', 'mdsgtimy_englishdictionary', 'a+%19f%Av_(o');
$path ="https://englishurdudictionarypk.com/";
$loc =$_SERVER['HTTP_REFERER'];
$action = $rdb->sanitize(getvalue("action"));

header('Content-Type: text/html; charset=utf-8' );

switch ($action)
{
	
		case "english_word":
	
		
		$search_query = $_POST['search_query'];
		
		$search_query2 = $rdb->sanitize($search_query);
		
		$search_query2 =str_replace(" ","-",$search_query2);
		
		$cond_value = array("words"=>$search_query2,"status"=>"1");
		$row = $rdb->db_fetch_single("words,word_url","words","words=:words AND status=:status",$cond_value);	
		
		$count = $row['num'];	

		if($count == 0)
		{
		
		$data =array('word'=>$search_query2,'type_id'=>'1');
		
		$rdb->db_insert("words_not_found",$data);
		
		$header_loc ="location:" . $path  . 'meaning/' .$search_query2;
		
		} else {
		
		
		$header_loc ="location:" . $path  . 'meaning/' .$search_query2;

		}
		
		header($header_loc);
			
		break;
		
		case "roman_urdu":
	
	
		$search_query = $_POST['search_query'];
		
		$search_query2 = $rdb->sanitize($search_query);

		$cond_value = array("roman"=>$search_query2,"status_word"=>"1");
		$row = $rdb->db_fetch_single("*","urdu_dict","roman LIKE :roman AND status_word=:status_word",$cond_value);	
		$count = $row['num'];
		
		if($count == 0)
		{
		
		$data =array('word'=>$search_query2,'type_id'=>'2');
		
		$rdb->db_insert("words_not_found",$data);
		
		$header_loc ="location:" . $path . "roman/not-found.html";
		
		} else {
		
		
		$header_loc ="location:" . $path . "roman/" . $row['english_word_url'];
	
		}
	
		header($header_loc);
	

	
		break;


		case "urdu_word":
	
	
		$search_query = $_POST['search_query'];
		
		$search_query2 = $rdb->sanitize($search_query);

		$cond_value = array("urdu_word"=>$search_query2,"status_word"=>"1");
		$row = $rdb->db_fetch_single("*","urdu_dict","urdu_word LIKE :urdu_word AND status_word=:status_word",$cond_value);	
		$count = $row['num'];
		
		if($count == 0)
		{
		
		$data =array('word'=>$search_query2,'type_id'=>'3');
		$rdb->db_insert("words_not_found",$data);
		
		//$rdb->db_insert("words_not_found",$data);
		
		$header_loc ="location:" . $path . "urdu/not-found.html";
		
		
		
		} else {
		
		
		$header_loc ="location:" . $path . "urdu/" . $row['english_word_url'];
	
		
		}
	
		header($header_loc);

	
		break;
		
		case "contact_us":
	
		extract($_POST);


	   if( $_SESSION['security_code'] == $security_code && !empty($_SESSION['security_code'] ) ) {
		unset($_SESSION['security_code']);
		
		$date=date('Y-m-d');

		$data =array('name'=>sanitize($name),'email'=>sanitize($email),'subject'=>sanitize($subject),'message'=>sanitize($message),'date'=>sanitize($date));

		print_r($data);
		
		$rdb->db_insert("contact",$data);
		
		$to ="rashidhussain_1@yahoo.com";
		$headers = "MIME-Version: 1.0" . "\r\n"; 
		$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
		$headers .= "From: " . $email ."\r\nReply-To: " . $email;
		//$headers .=$mail;
		$subject=$subject;
		$msg = $message . "\r\n";
		$msg .= $email . "\r\n";
		$msg .=$name . "\r\n";
		
		mail($to,$subject,$msg,$headers);	
		
		
		
		
		
		$_SESSION['head_message'] = "Thanks your Message Posted";
		
		header('location:' .$loc);
		
   		} else if($security_code == ""){
		
		$_SESSION['msg'] = "Type Security Code";
		
		header('location:' .$loc);
		
		}else {
		// Insert your code for showing an error message here
		$_SESSION['msg'] = "Security Code is Incorect";
		
			header('location:' .$loc);
		}


		break;


		case "suggest":
	
		extract($_POST);
	

		
		$data =array('word_id'=>$word_id,'eng_word'=>$txt_name_en,'roman_word'=>$txt_roman,'urdu_word'=>$urdu_name,'type'=>$eng_dic_type,'comment'=>$comments);
		
		$rdb->db_insert("suggestions",$data);

		echo '<script language="javascript"> 
				<!-- 
				setTimeout("self.close();",5) 
				//--> 
				</script>';


		break;		
		
		
		
		


}

////Function for Action
	function getvalue($action){
		$requestdata = array_merge($_POST,$_GET);
		if(array_key_exists($action,$requestdata))
		{
			return $requestdata[$action];		   
		}
	}
