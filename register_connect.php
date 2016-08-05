<?php
include("conn.php");
error_reporting(0);
$account1 = trim($_POST[account]);
$password1 = trim($_POST[password]);
$repass1 = trim($_POST[password2]);
$email1 = trim($_POST[email]);

//判斷帳號函數
function check_account($account){
    $Max_strLen_Account = 16;//帳號最大長度
    $Min_strLen_Account = 4;//帳號最小長度
    $AccountChars = "/^\\w+$/";//字符串檢測的正規表達式
    $AccountGood = "帳號檢測正確";//定義返回的字符串變量

    if($account == ""){
        $AccountGood = "帳號不能為空！";
        return $AccountGood;
    }

    if(strlen($account) < $Min_strLen_Account || strlen($account) > $Max_strLen_Account){
        $AccountGood = "帳號長度檢測不正確！";
        return $AccountGood;
    }

    if(!preg_match($AccountChars,$account)){
        $AccountGood = "帳號格式不正確！";
        return $AccountGood;
    }
    return $AccountGood;
}

//判斷密碼函數
function check_password($password){
    $Max_strLen_password = 16;//密碼最大長度
    $Min_strLen_password = 6;//密碼最小長度
    $passwordChars = "/[a-zA-Z]{1,16}/";//密碼字符串檢測正規表達式
    $passwordGood = "密碼檢測正確";//定義返回的字符串變量

    if($password == ""){
        $passwordGood = "密碼不能為空！";
        return $passwordGood;
    }

    if(strlen($password) < $Min_strLen_password || strlen($password) > $Max_strLen_password){
        $passwordGood = "密碼長度檢測不正確！";
        return $passwordGood;
    }

    if(!preg_match($passwordChars,$password)){
        $passwordGood = "密碼格式不正確！";
        return $passwordGood;
    }
    return $passwordGood;
}

//判斷郵箱函數
function check_email($email){
    $emailChars = "/^\\w+((-\\w+)|(\\.\\w+))*\\@[A-Za-z0-9]+((\\.|-)[A-Za-z0-9]+)*\\.[A-Za-z0-9]+$/";//正则表达式判断邮箱地址是否合法
    $emailGood = "郵箱地址檢測正確";

    if($email == ""){
        $emailGood = "郵箱地址不能為空！";
        return $emailGood;
    }

    if(!preg_match($emailChars,$email)){
        $emailGood = "郵箱格式不正確！";
        return $emailGood;
    }
    return $emailGood;
}

//判斷两次输入密碼是否一致
function check_confirmPassword($password,$password2){
    $confirmPasswordGood = "兩次密碼输入一致";
    if($password <> $password2){
        $confirmPasswordGood = "两次密碼输入不一致！";
        return $confirmPasswordGood;
    }
    return $confirmPasswordGood;
}

//調用函數，檢測用戶输入資料
$accountGood = check_account($account1);
$passwordGood = check_password($password1);
$emailGood = check_email($email1);
$confirmPasswordGood = check_confirmPassword($password1,$repass1);
$error = false;//定義變量判斷註冊資料是否出现錯誤
if($accountGood != "帳號檢測正確"){
    $error = true;//改變error的值表示出现了錯誤
    echo "<script type='text/javascript'>alert('{$accountGood}');history.back();</script>";
}

if($passwordGood != "密碼檢測正確"){
    $error = true;
    echo "<script type='text/javascript'>alert('{$passwordGood}');history.back();</script>";
}

if($emailGood != "郵箱地址檢測正確"){
    $error = true;
    echo "<script type='text/javascript'>alert('{$emailGood}');history.back();</script>";
}

if($confirmPasswordGood != "兩次密碼输入一致"){
    $error = true;
    echo "<script type='text/javascript'>alert('{$confirmPasswordGood}');history.back();</script>";
}

//判斷資料庫中帳號和郵箱地址是否已經存在
$sql = mysql_query("select * from data where account = '".$account1."' or email= '".$email1."'");
while(@$rows = mysql_fetch_array($sql)){
    if($rows[account] == $account1){
        $error = true;
        echo "<script type='text/javascript'>alert('帳號已被註冊！請重新填寫。');history.back();</script>";
    }

    if($rows[email] == $email1){
        $error = true;
        echo "<script type='text/javascript'>alert('郵箱地址已被註冊！請重新填寫。');history.back();</script>";
    }
}

//如果資料都合法，就將資料寫入資料庫
if($error == false){
    //$password2 = md5($password1);
    $s="insert into data (account,password,password2,username,sex,birth,mon,dayday,email) values('$account1','$password1','$password1','$_POST[username]','$_POST[sex]','$_POST[birth]','$_POST[mon]','$_POST[dayday]','$email1')";
    mysql_query($s);
    echo "註冊成功";
    echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
?>