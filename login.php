<!DOCTYPE html>
<html lang="en">
<style>
    input {padding:4px 10px; background: #dfdfdf; border:1;
        cursor:pointer;
        -webkit-border-radius: 5px;
        border-radius: 4px; }
</style>
<head>
    <meta charset="UTF-8">
    <title>登入</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<?php
include("conn.php");
?>
<body>
<h2>登入</h2>
<form action="login_connect.php" method="post" name="login">
    <table style="border:2px #cccccc solid;" cellpadding="3" border="0">
        <tr><td>帳號：</td><td><input name="account" type="text" size="12" ></td></tr>
        <tr><td>密碼：</td><td><input name="password" type="password" size="12"></td></tr>

    </table>
    <br>
    <input type="submit" name="submit" value="登入"/> <a href="register.php">註冊會員</a>
</form>
    <br>

<script src="js/jquery.js"></script>
</body>
</html>

