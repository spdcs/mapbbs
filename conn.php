<?php

$conn = @ mysql_connect("localhost", "root", "1234") or die("數據庫連接錯誤");
mysql_select_db("forum", $conn);
mysql_query("set names  'UTF8'"); //使用中文編碼;
?>