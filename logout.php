<?php session_start(); ?>
<title>登出</title>
<?php
unset($_SESSION['account']);
echo '登出中......';
echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
?>
