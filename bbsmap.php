<?php session_start();
include("conn.php");
error_reporting(0);
$account = $_SESSION['account'];
$sql = "select bbs.id, data.username, data.sex, bbs.subject, bbs.time, bbs.content from bbs LEFT JOIN data ON data.account=bbs.account order by bbs.id desc";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>
    <title>留言</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bbs.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <style type="text/css">
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /*#map { height: 800px; width: 1000px;}*/
    </style>

    <?php
    $sql = "select bbs.id, data.username, data.sex, bbs.subject, bbs.time, bbs.content, bbs.address from bbs LEFT JOIN data ON data.account=bbs.account order by bbs.id desc";
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

    <script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyAuw24TfmCWVXYt0w5Lsns-7tSfz3EkIw0"
            type="text/javascript"></script>
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
<div class="top">
    <div class="menu">
        <a href="bbsmap.php">地圖留言板</a>
        <a href="index.php">留言板</a>
        <a href="bbs_add.php">填寫留言</a>
        <?php
        if ($_SESSION['account'] == "") {
            echo "<a class=\" letter2\"   <a href=\"login.php\">會員登入</a>";
        }
        if ($_SESSION['account'] != "") {
            echo "<a class=\" letter2\" <a href=\"logout.php\">會員登出</a>";
        } ?>
        <a href="member.php">會員資料</a>
    </div>
    <div class="hello-name">
        <?php
        if ($_SESSION['account'] != null) {
            echo $row[1] . " 你好";
        } else {
            echo "";
        }
        ?>
    </div>
    <div class="comeback pull-right" id="_top">
        <a href="">top</a>
    </div>
</div>
<center>
    <div id="map" style="width: 600px; height: 500px"></div> <!--此為地圖顯示大小-->
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'></script>
    <script type='text/javascript'>
        $(function () {
            $(window).load(function () {
                $(window).bind('scroll resize', function () {
                    var $this = $(this);
                    var $this_Top = $this.scrollTop();

                    //當高度小於100時，關閉區塊
                    if ($this_Top < 100) {
                        $(".top").removeClass("test");
                    }
                    if ($this_Top > 100) {
                        $(".top").addClass("test");
                    }
                }).scroll();
            });
        });
    </script>
    <script type="text/javascript">
        //點擊top跑回頂端
        $(document).ready(function () {
            $('#_top').click(function () {
                $('html,body').animate({scrollTop: 0}, 'slow');
            });
        });
    </script>
    <script type="text/javascript">
        //隱藏top
        $(document).ready(function () {
            $("#_top").hide()
            $(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 1) {//當window的scrolltop距離>1，top淡出，反之淡入
                        $("#_top").fadeIn();
                    } else {
                        $("#_top").fadeOut();
                    }
                });
            });


        });
    </script>
</body>
</html>