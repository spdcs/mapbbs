<?php session_start(); ?>
<?php
include("conn.php");

$password = $_POST['password'];
$password2 = $_POST['password2'];
$username = $_POST['username'];
$birth = $_POST['birth'];
$mon = $_POST['mon'];
$dayday = $_POST['dayday'];
$email = $_POST['email'];

if ($_SESSION['account'] != null && $password != null && $password2 != null && $password == $password2)
{
    $account = $_SESSION['account'];

    $sql = "update data set password = '$password', password2 = '$password2', username = '$username', birth = '$birth', mon = '$mon', dayday = '$dayday', email = '$email' where account = '$account'";
    if (mysql_query($sql))
    {
        echo '修改成功!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
    }
    else
    {
        echo '修改失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
    }
}
else
{
    echo '資料錯誤!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=update.php>';
}
?>
