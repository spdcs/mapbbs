<?php
include("conn.php");
$sql="select bbs.id, data.username, data.sex, bbs.subject, bbs.time, bbs.content, bbs.address, bbs.lat, bbs.lng from bbs LEFT JOIN data ON data.account=bbs.account order by bbs.id desc";
$result=mysql_query($sql);
//$row = mysql_fetch_array($result);
$array = array();
while ($record = mysql_fetch_array($result)) {

    /* $id = $record['address'];
     $account = $record['username'];
     $array['address'][]=$id;
     $array['username'][]=$account;*/
    $array[] = $record;
    //echo '<br>'.$id;

}
//$json = json_encode($array);
//echo "$json";

//Use urlencode to workaround for json_encode without JSON_UNESCAPED_UNICODE
array_walk_recursive($array, function(&$value) {
    if(is_string($value)) {
        $value = urlencode($value);
    }
});
$json = urldecode(json_encode($array));
echo "$json";
?>