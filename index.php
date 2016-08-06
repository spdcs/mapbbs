<?php session_start();
include("conn.php");
error_reporting(0);
$account = $_SESSION['account'];
$sql = "select bbs.id, data.username, data.sex, bbs.subject, bbs.time, bbs.content from bbs LEFT JOIN data ON data.account=bbs.account order by bbs.id desc";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
//while ($row = mysql_fetch_row($result)) {
//    echo "<br>第" . $row[0] . "位訪客</br>";
//    echo "<br>訪客姓名:" . $row[1];
//    echo "<br>性別:" . $row[2] . "生";
//    echo "<br>留言主題:" . $row[3] . "</a>";
//    echo "<br>留言時間:" . nl2br($row[4]);
//    echo "<br>留言內容:" . $row[5];
//    echo "<hr>";
//
//}

?>
<html>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>留言</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bbs.css">
    <link rel="stylesheet" href="assets/css/reset.css">
</head>
<body>
<div class="top">
    <div class="menu">
        <a href="index.php">留言板</a>
        <a href="bbs_add.php">填寫留言</a>
        <a href="login.php">會員登入</a>
        <a href="member.php">會員資料</a>
        <a href="logout.php">會員登出</a>
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
<div class="container a">
    <?php while ($row = mysql_fetch_row($result)): ?>
        <br>第<?= $row[0] ?>位訪客
        <br>訪客姓名:<?= $row[1] ?>
        <br>性別:<?= $row[2] ?>生
        <br>留言主題:<?= $row[3] ?>
        <br>留言時間:<?= nl2br($row[4]) ?>
        <br>留言內容:<?= $row[5] ?><br>
    <?php endwhile; ?>
</div>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'></script>
<script type='text/javascript'>
    $(function () {
        $(window).load(function () {
            $(window).bind('scroll resize', function () {
                var $this = $(this);
                var $this_Top = $this.scrollTop();

                //當高度小於100時，關閉區塊
                if ($this_Top < 50) {
                    $(".top").removeClass("test");
                }
                if ($this_Top > 50) {
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