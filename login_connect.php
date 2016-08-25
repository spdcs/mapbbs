<?php session_start();
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
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
    $_SESSION['username'] = $row[3];
    $_SESSION['sex'] = $row[4];
    $_SESSION['birth'] = $row[5];
    $_SESSION['mon'] = $row[6];
    $_SESSION['dayday'] = $row[7];
    $_SESSION['email'] = $row[8];
}
else
{
    echo '登入失敗!';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
}
?>
