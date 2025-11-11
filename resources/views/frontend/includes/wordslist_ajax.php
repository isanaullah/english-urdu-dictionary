<?php include("front_common.php"); 

$q = $rdb->sanitize(strtolower($_GET["q"]));
if (!$q) return;

$q = "%".$q."%";
$cond_value = array("words"=>$q);
$rsd = $rdb->db_select_cond("id,words,word_url","words","words LIKE :words GROUP BY words LIMIT 10",$cond_value);
foreach($rsd['row'] as $rs){
    $id = $rs['id'];
    $words = $rs['word_url'];
    echo "$words|$id\n";
}

?>