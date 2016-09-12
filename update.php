<?php session_start(); ?>
<title>修改資料</title>
<?php
include("conn.php");


if ($_SESSION['account'] != null) {
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
} else {
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
        <div>
            <form action="update_finish.php" method="post" class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-sm-2 control-label">帳號</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?= $account ?></p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">密碼</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" id="inputEmail3" size="18" name="password"
                               value=<?= $row[2] ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">再次輸入密碼</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" id="inputEmail3" size="18" name="password2"
                               value=<?= $row[2] ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">用戶名</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="inputEmail3" size="18" name="username"
                               value=<?= $row[3] ?>>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">年</label>
                    <div class="col-sm-3">

                        <select class="form-control" name="birth" value="$row[5]">
                            <?php
                            $y = $row[5];
                            for ($i = 1988; $i < 2000; $i++) {
                                if ($y == $i) {
                                    echo "<option value=\"" . $i . "\" selected=\"selected\">" . $i . "</option>";
                                } else {
                                    echo "<option value=\"" . $i . "\">" . $i . "</option>";
                                }
                            }
                            ?>
                        </select>
                        </div>
                    </div>


                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">月</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="mon" value="$row[6]">
                            <?php
                            $m = $row[6];
                            for ($i = 1; $i < 13; $i++) {
                                if ($m == $i) {
                                    echo "<option value=\"" . $i . "\" selected=\"selected\">" . $i . "</option>";
                                } else {
                                    echo "<option value=\"" . $i . "\">" . $i . "</option>";
                                }
                            }
                            ?>

                        </select>
                    </div>
                </div>


                     

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">日</label>
                        <div class="col-sm-3">
                        <select class="form-control" name="dayday" value="$row[7]">
                            <?php
                            $d = $row[7];
                            for ($i = 1; $i < 32; $i++) {
                                if ($d == $i) {
                                    echo "<option value=\"" . $i . "\" selected=\"selected\">" . $i . "</option>";
                                } else {
                                    echo "<option value=\"" . $i . "\">" . $i . "</option>";
                                }
                            }
                            ?>

                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">信箱</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputEmail3" size="18" name="email"
                               value=<?= $row[8] ?>>
                    </div>
                </div>




    <div class="login1">
        <input type=submit name=submit align="center" value=確定
    </div>
</div>
</div>
</div>
</form>
</body>


