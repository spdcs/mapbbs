<?php session_start(); ?>
<?php
include("conn.php");
$account = $_POST['account'];
$password = $_POST['password'];


$sql = "SELECT * FROM data where account = '$account'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);


if($account != null && $password != null && $row[0] == $account && $row[1] == $password)
{
    $_SESSION['account'] = $account;
    echo '登入成功!';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=bbs.php>';
}
else
{
    echo '登入失敗!';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
}
?>
