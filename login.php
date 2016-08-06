<?php
session_start();
include("conn.php");
error_reporting(0);
$sql = "select username from data";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登入</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bbs.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/global.css">
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
            echo $row[0] . " 你好";
        } else {
            echo "";
        }
        ?>
    </div>
</div>
<div class="container">
    <div class="top-word">
        <h3>會員登入</h3>
    </div>
    <div class="login-from">
        <form action="login_connect.php" method="post" name="login" >
            <table cellpadding="2" border="0">
                <tr>
                    <td>帳號：</td>
                    <td><input class="form-control" name="account" type="text" size="12"></td>
                </tr>
                <tr>
                    <td>密碼：</td>
                    <td><input class="form-control" name="password" type="password" size="12"></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="submit" value="登入"/> <a href="register.php">註冊會員</a>
        </form>
    </div>
</div>

</body>
</html>

