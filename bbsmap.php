<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>
    <title>留言</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/global.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <style type="text/css">
        html, body { height: 100%; margin: 0; padding: 0; }
        /*#map { height: 800px; width: 1000px;}*/
    </style>

    <?php
    //..
    include("conn.php");
    $sql="select bbs.id, data.username, data.sex, bbs.subject, bbs.time, bbs.content, bbs.address from bbs LEFT JOIN data ON data.account=bbs.account order by bbs.id desc";
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
    $json = json_encode($array);
    //print_r($json);
    ?>


    <script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyAuw24TfmCWVXYt0w5Lsns-7tSfz3EkIw0" type="text/javascript"></script>
    <script type="text/javascript">
            function load() {
                if (GBrowserIsCompatible()) {
                    var map = new GMap2(document.getElementById("map"));

                    var geocoder = new GClientGeocoder();
                    var address;

                    <?php //for($i=0;$i < count($array);$i++){
                    foreach ($array as $key){

                    ?>
                    map.addControl(new GSmallMapControl());

                    address = "<?php  echo $key['address'] ?>";//須修正
                        geocoder.getLatLng(address, function (point) {
                            if (!point) {
                                alert('Google Maps 找不到該地址，無法顯示地圖！'); //如果Google Maps無法顯示該地址的警示文字
                            } else {
                                map.setCenter(point, 13);
                                var marker = new GMarker(point);
                                map.addOverlay(marker);
                               marker.openInfoWindowHtml("<?php echo "留言者姓名:" . $key['username'] . "<br>留言時間:" . $key['time'] . "<br>留言主題:" . $key['subject'] . "<br>留言內容:" . $key['content'] . "<br>地址:" . $key['address']  ?>");//須修正
                            }
                        });
<?php } ?>
                }
            }
    </script>
</head>
<body onload="load()" onunload="GUnload()">
<a href="bbs_add.php">寫寫留言</a><p>
<a href="member.php">會員資料</a><p>
<center>
<div id="map" style="width: 600px; height: 500px"></div> <!--此為地圖顯示大小-->
</body>
</html>