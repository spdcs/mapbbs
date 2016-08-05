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

    echo "<form action=\"update_finish.php\" method=\"post\">";
    echo "<table style=\"border:2px #cccccc solid;\" cellpadding=\"5\" border='0'>";
    echo "<tr><td>帳號：".$account."</td></tr>";
    echo "<tr><td>密碼：<input type=\"password\" size=\"23\" name=\"password\" value=\"$row[1]\"></td></tr>";
    echo "<tr><td>再次輸入密碼：<input type=\"password\" size=\"18\" name=\"password2\" value=\"$row[2]\"></td></tr>";
    echo "<tr><td>用戶名：<input type=\"text\" size=\"23\" name=\"username\" value=\"$row[3]\"></td></tr>";
    echo "<tr><td>生日：";
    echo "<select name=\"birth\" value=\"$row[5]\">";
    $y=$row[5];
    for($i=1988;$i<2000;$i++) {
        if ($y == $i)
        { echo "<option value=\"" . $i . "\" selected=\"selected\">" . $i . "</option>";}
        else
        { echo "<option value=\"" . $i . "\">" . $i . "</option>";}
    }
    echo "</select>年";

    echo "<select name=\"mon\" value=\"$row[6]\">";
    $m=$row[6];
    for($i=1;$i<13;$i++) {
        if ($m == $i)
        { echo "<option value=\"" . $i . "\" selected=\"selected\">" . $i . "</option>";}
        else
        { echo "<option value=\"" . $i . "\">" . $i . "</option>";}
    }
    echo "</select>月";

    echo "<select name=\"dayday\" vlaue=\"$row[7]\">";
    $d=$row[7];
for($i=1;$i<32;$i++) {
    if ($d == $i)
        { echo "<option value=\"" . $i . "\" selected=\"selected\">" . $i . "</option>";}
    else
        { echo "<option value=\"" . $i . "\">" . $i . "</option>";}
}
    echo "</select>日";

    echo "</td></tr>";
    echo "<tr><td>email：<input typr=\"text\" size=\"25\" name=\"email\" value=\"$row[8]\"></td></tr>";
    echo "</table>";
    echo "<input type=\"submit\" name=\"submit\" value=\"確定\" />";
    echo "</form>";
}
else
{
    echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
?>


