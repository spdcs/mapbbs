<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>註冊會員</title>
</head>

<!--include("conn.php");
if (isset($_POST['submit'])){
    if("$_POST[password]"!="$_POST[password2]" || "$_POST[account]"=="" || "$_POST[password]"=="" || "$_POST[password2]"=="" || "$_POST[email]"=="" )
    {echo "<font color=\"#ff0000\">資料填寫有誤</font>";}
    elseif (preg_match('/^([.0-9a-z]+)@([0-9a-z]+).([.0-9a-z]+)$/i',$_POST['email']) == false)
    {echo "<font color=\"#ff0000\">無效的 email 格式！</font>";}
    else
    {$sql="insert into data (account,password,password2,username,sex,birth,mon,dayday,email) values ('$_POST[account]','$_POST[password]','$_POST[password2]','$_POST[username]','$_POST[sex]','$_POST[birth]','$_POST[mon]','$_POST[dayday]','$_POST[email]')";
        mysql_query($sql);
        echo "註冊成功";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
    }
}-->

<body>
<h2>註冊會員</h2>
<form action="register_connect.php" method="post">
    <table style="border:2px #cccccc solid;" cellpadding="5" border='0'>
        <tr><td>帳號：<input type="text" size="23" name="account"></td></tr>
        <tr><td>密碼：<input type="password" size="23" name="password"></td></tr>
        <tr><td>再次輸入密碼：<input type="password" size="18" name="password2"></td></tr>
        <tr><td>用戶名：<input type="text" size="23" name="username"></td></tr>
        <tr><td>性別：女生<input type="radio" name="sex" value="女" checked>男生<input type="radio" name="sex" value="男"></td></tr>
        <tr><td>生日：
                <select name="birth">
                    <?php
                    for($i=1988;$i<2000;$i++)
                    { echo "<option value=\"" . $i . "\">" . $i . "</option>";}
                    ?>
                </select>年
                <select name="mon">
                    <?php
                    for($i=1;$i<13;$i++)
                    { echo "<option value=\"" . $i . "\">" . $i . "</option>";}
                    ?>
                </select>月
                <select name="dayday">
                    <?php
                    for($i=1;$i<32;$i++)
                    { echo "<option value=\"" . $i . "\">" . $i . "</option>";}
                    ?>
                </select>日
            </td></tr>
        <tr><td>email：<input type="email" size="25" name="email"></td></tr>
    </table>
    <br>
    <input type="submit" name="submit" value="送出資料" />
    <input type="reset" value="清空重填">

</form>
</body>
</html>