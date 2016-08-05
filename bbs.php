<?php session_start(); ?>
<html>
<head>
    <title>留言</title>
</head>
<body>
<a href="bbs_add.php">寫寫留言</a><p>
<a href="member.php">會員資料</a><p>
    <?php
    /*error_reporting(0);
    $account = $_SESSION['account'];*/
    include("conn.php");

    $sql="select bbs.id, data.username, data.sex, bbs.subject, bbs.time, bbs.content from bbs LEFT JOIN data ON data.account=bbs.account order by bbs.id desc";
    $result=mysql_query($sql);

    while ($row = mysql_fetch_row($result))
    {
        echo "<br>第".$row[0]."位訪客</br>";
        echo "<br>訪客姓名:".$row[1];
        echo "<br>性別:".$row[2]."生";
        echo "<br>留言主題:".$row[3]."</a>";
        echo "<br>留言時間:".nl2br($row[4]);
        echo "<br>留言內容:".$row[5];
        echo "<hr>";


    }


    ?>
</body>
</html>