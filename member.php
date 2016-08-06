<?php session_start();
include("conn.php");
error_reporting(0);

if($_SESSION['account'] != null)
{
    echo '<a href="logout.php">登出</a>    ';
    echo '<a href="update.php">修改</a>    ';
    echo '<a href="delete.php">刪除</a>    ';
    echo '<a href="bbs.php">寫寫留言</a>    <br><br>';


    $account = $_SESSION['account'];
    $sql = "SELECT * FROM data where account = '$account'";
    $result = mysql_query($sql);
    echo "<table style=\"border:2px #cccccc solid;\" cellpadding=\"3\" border=\"0\">";
    echo "<tr><td>帳號</td><td>│&nbsp密碼</td><td>│用戶名</td><td>│&nbsp生日</td><td>│email</td></tr>";
    while($row = mysql_fetch_row($result))
    {
        echo "<tr><td>$row[0]</td><td>│&nbsp$row[1]</td><td>│$row[3]</td><td>│&nbsp$row[5]/$row[6]/$row[7]</td><td>│$row[8]</td></tr>";
    }
}
else
{
    echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>

<title>個人資料</title>