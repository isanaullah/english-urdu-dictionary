<?php include("front_common.php"); 

$q = $rdb->sanitize(strtolower($_GET["q"]));
if (!$q) return;
 
$q = "%".$q."%";
$cond_value = array("urdu_word"=>$q);
$rsd = $rdb->db_select_cond("u_id,english_word,urdu_word","urdu_dict","urdu_word LIKE :urdu_word GROUP BY urdu_word LIMIT 10",$cond_value);
foreach($rsd['row'] as $rs){
    $id = $rs['u_id'];
    $words = $rs['urdu_word'];
    echo "$words|$id\n";
}

?>