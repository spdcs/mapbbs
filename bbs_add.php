<?php session_start();
include("conn.php");
error_reporting(0);
$username = $_SESSION['username'];
$sql = "select username from data";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$time = date("Y:m:d H:i:s",time()+21600);
$account = $_SESSION['account'];
$_POST['account'] = $_SESSION['account'];
$address = $_POST[address];
$lat = $_POST[lat];
$lng = $_POST[lng];
if ($_SESSION['account'] != null) {
    if (isset($_POST['button'])) {
        if ("$_POST[account]" != "$account")
        {echo "<font color=\"#ff0000\">帳號錯誤</font>";}
        elseif ("$_POST[subject]" == null || "$_POST[content]" == null)
        {echo "<font color=\"#ff0000\">欄位不能空白</font>";}
        else {
            $subject = htmlspecialchars($_POST[subject], ENT_NOQUOTES);
            $content = htmlspecialchars($_POST[content], ENT_NOQUOTES);
            $sql = "insert into bbs (id,account,subject,content,time,address,lat,lng) value('','$account','$subject','$content','$time','$address','$lat','$lng')";
            mysql_query($sql);
            echo "發布成功";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=bbsmap.php>';
        }
    }
}
else
{
    echo "<center><font color=\"#ff0000\" size=\"20\">尚未登入</font></center>";
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>我要留言</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/bbs.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
    <script src="http://maps.google.com/maps?file=api&v=3&key=AIzaSyBpJwO8jbJW5ZbVBaz_UxYLf2aAUurFR0w"
            type="text/javascript"></script>
</head>
<body style="background-image:url('data:image/jpeg;base64,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');">

<div class="top">
    <div class="menu">
        <a href="bbsmap.php">愛心地圖</a>
        <a href="index.php">事件</a>
        <a href="bbs_add.php">填寫留言</a>
        <?php
        if($_SESSION['account'] == ""){
            echo "<a class=\" letter2\"         <a href=\"login.php\">會員登入</a>";
        }
        if($_SESSION['account'] != ""){
            echo "<a class=\" letter2\" <a href=\"logout.php\">會員登出</a>";
        }?>

        <a href="member.php">會員資料</a>

    </div>
    <div class="hello-name">
        <?php

        if ($_SESSION['account'] != null) {
            echo $username . " 你好";
        }
        else
        {
            echo "";
        }
        ?>
    </div>
</div>
<div>
    <h3 class="login10">為愛發聲</h3>
</div>
<div class="container">
    <div class="top-word">
        <h3>編輯事件</h3>
    </div>
    <form id="form1" name="form1" method="post" onsubmit="return checkInput(this);" class="form-horizontal">
        <div class="form-group">
            <label for="account" class="col-sm-4 control-label"></label>
            <div class="col-sm-6">
                <input type="hidden" class="form-control" name="account" id="account" />
            </div>
        </div>
        <div class="form-group">
            <label for="subject" class="col-sm-4 control-label">主旨：</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="subject" id="subject"/>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-sm-4 control-label">所在地址：</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address" id="address"/>
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="col-sm-4 control-label">詳細內容：</label>
            <div class="col-sm-6">
                <textarea class="form-control" name="content" id="content" rows="5"></textarea>
            </div>
        </div>
        <div class="col-sm-6">
        <input type="hidden" name="lat" class="form-control">
        </div>
        <div class="col-sm-6">
        <input type="hidden" name="lng" class="form-control">
        </div>
        <div class="button">
            <input type="submit" name="button" id="button" value="送出" class="btn"/>
        </div>
    </form>

    <script type="text/javascript">
        $(document).ready(function() {
            var geocoder = new google.maps.Geocoder();
            $("input[name=address]").blur(function(){
                address = $("input[name=address]").val();
                if(address){
                    geocoder.geocode({'address': address}, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            $("input[name=lat]").val(results[0].geometry.location.lat());
                            $("input[name=lng]").val(results[0].geometry.location.lng());
                        }
                        else {alert("地址格式錯誤");}
                    })
                }

            });
        });

        function checkInput(form){
            //驗證標題是否為空
            if(form.subject.value == ''){
                alert('標題不能為空');
                form.subject.focus();
                return false;
            }

            //驗證輸入内容是否為空
            if(form.content.value == ''){
                alert('請說點什麼');
                form.content.focus();
                return false;
            }
            //驗證地址是否為空
            if(form.address.value == ''){
                alert('請輸入地址');
                form.address.focus();
                return false;
            }

            return true;
        }
    </script>
</body>
</html>