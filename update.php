<?php session_start(); ?>
<title>修改資料</title>
<?php
include("conn.php");


if($_SESSION['account'] != null)
{
    //將$_SESSION['account']丟給$account
    //這樣在下SQL語法時才可以給搜尋的值
    $account = $_SESSION['account'];
    $sql = "SELECT * FROM data where account='$account'";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);



    echo "</select>";

    echo "</td></tr>";

    echo "</table>";

    echo "</form>";
}
else
{
    echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bbs.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/global.css">
</head>
<body>
<div class="top">
    <div class="menu">
        <a href="bbsmap.php">地圖留言板</a>
        <a href="index.php">留言板</a>
        <a href="bbs_add.php">填寫留言</a>
        <a href="member.php">會員資料</a>
        <a href="logout.php">會員登出</a>
    </div>
    </div>
<div class="container-fluid">
    <div class="container">
<div >
<form action="update_finish.php" method="post" >
    <table class="table">
        <tr><td>帳號：<?= $account?></td></tr>
        <tr><td>密碼：<input type="password" name="password" value=<?=$row[1]?>></td></tr>
        <tr><td>再次輸入密碼：<input type="password" size="18" name="password2" value=<?=$row[2]?>></td></tr>
        <tr><td>用戶名：<input type="text"  name="username" value=<?=$row[3]?>></tr>
        <tr><td>生日：
                <?php
                echo "<select name=\"birth\" value=\"$row[5]\">";
                $y=$row[5];
                for($i=1988;$i<2000;$i++) {
                    if ($y == $i)
                    { echo "<option value=\"" . $i . "\" selected=\"selected\">" . $i . "</option>";}
                    else
                    { echo "<option value=\"" . $i . "\">" . $i . "</option>";}
                }
                ?>
                <select>年
                    <?php
                    echo "<select name=\"mon\" value=\"$row[6]\">";
                    $m=$row[6];
                    for($i=1;$i<13;$i++) {
                        if ($m == $i)
                        { echo "<option value=\"" . $i . "\" selected=\"selected\">" . $i . "</option>";}
                        else
                        { echo "<option value=\"" . $i . "\">" . $i . "</option>";}
                    }
                    ?>
                </select>月
                <?php
                echo "<select name=\"dayday\" vlaue=\"$row[7]\">";
                $d=$row[7];
                for($i=1;$i<32;$i++) {
                    if ($d == $i)
                    { echo "<option value=\"" . $i . "\" selected=\"selected\">" . $i . "</option>";}
                    else
                    { echo "<option value=\"" . $i . "\">" . $i . "</option>";}
                }
                ?>
                </select>日
            </td></tr>
        <tr><td>email：<input typr=text size=25 name=email value=<?=$row[8]?>></td></tr>

    </table>
    </div>

    <div class="login1">
        <input type=submit name=submit align="center" value=確定
    </div>
</div>
    </div>
</div>
</form>
    </body>


