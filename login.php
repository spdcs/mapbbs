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
    <link rel="stylesheet" href="assets/css/global.css">
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("button").click(function() {
                if(confirm($("input:text").val()))
                {

                }
                else
                {
                    return false
                }
            });
        });
    </script>
</head>
<body style="background-image:url('assets/img/10-Flamingo.png');">
<div class="top">
    <div class="menu">
        <a href="bbsmap.php">愛心地圖</a>
        <a href="index.php">愛心資訊</a>
        <a href="login.php">會員登入</a>
        <a href="register.php">註冊會員</a>
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

<div >
    <center>
    <h2 class="login10">會員登入</h2>
    </center>
</div>

        <div class="container2">
            <div>
            </div>
            <div>
                <form action="login_connect.php" method="post" name="login" class="form-horizontal" role="form" >
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">帳號</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="account" id="inputEmail3" placeholder="輸入帳號" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">密碼</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control"name="password" id="inputEmail3" placeholder="輸入密碼">
                        </div>
                    </div>

                    <div class="login5">
                        <button type="submit" class="btn btn-default">登入</button>
                    </div>
                </form>
            </div>
        </div>



</body>
</html>

