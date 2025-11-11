<?php include("front_common.php"); 

$q = $rdb->sanitize(strtolower($_GET["q"]));
if (!$q) return;

$q = "%".$q."%";
$cond_value = array("roman"=>$q);
$rsd = $rdb->db_select_cond("roman,u_id","urdu_dict","roman LIKE :roman GROUP BY roman LIMIT 10",$cond_value);
foreach($rsd['row'] as $rs){
    $id = $rs['u_id'];
    $words = $rs['roman'];
    echo "$words|$id\n";
}

?>