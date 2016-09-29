<?php session_start();
include("conn.php");
error_reporting(0);
$username = $_SESSION['username'];
if ($_SESSION['account'] != null) {
$account = $_SESSION['account'];
$sql = "SELECT * FROM data where account = '$account'";
$result = mysql_query($sql);
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
<body style="background-image:url('assets/img/20-Twin Peaks.png');">
<div class="top">
    <div class="menu">
        <a href="bbsmap.php">愛心地圖</a>
        <a href="index.php">愛心資訊</a>
        <a href="logout.php">會員登出</a>
        <?php
        if ($_SESSION['account'] != null) {
            ?>
            <a href="update.php">修改資料</a>
            <a href="delete.php">刪除帳號</a>
            <?php
        } else {
            echo "";
        }
        ?>
    </div>
    <div class="hello-name">
        <?php
            if ($_SESSION['account'] != null) {
                echo $username . " 你好";
            } else {
                echo "";
            }
        ?>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
<table class="table table-bordered">
    <tr>
        <td>帳號</td>
        <td>密碼</td>
        <td>用戶名</td>
        <td>生日</td>
        <td>email</td>
    </tr>
    <?php
    while ($row = mysql_fetch_row($result)) {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[3]</td><td>$row[5]/$row[6]/$row[7]</td><td>$row[8]</td></tr>";
    }
    } else {
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    }
    ?>
</table>
    </div>
    </div>


<title>個人資料</title>
