<?php session_start(); ?>
<?php
include("conn.php");
if($_SESSION['account'] != null)
{
    $account = $_SESSION['account'];
    $sql = "delete from data where account='$account'";
    if(mysql_query($sql))
    {
        echo '刪除成功!';
        unset($_SESSION['account']);
        echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
    }
}
else
{
    echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
?>