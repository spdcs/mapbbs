<?php session_start();
include("conn.php");
error_reporting(0);
$account = $_SESSION['account'];
$sql = "select bbs.id, data.username, data.sex, bbs.subject, bbs.time, bbs.content from bbs LEFT JOIN data ON data.account=bbs.account order by bbs.id desc";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script>
        $(document).ready(function () {

            var URLs = "a.php";
            var NumOfJData = json.length;

            $.ajax({
                url: URLs,
                type: "GET",
                dataType: 'json',

                success: function(json) {
                    for (var i = 0; i < NumOfJData; i++) {
                        alert(json[i]["id"]);  
                        alert(json[i]["username"]);
                        alert(json[i]["sex"]);
                    }

                },

                error: function() {
                    alert("ERROR!!!");
                }
            });

        });
    </script>

</head>
<body>
</body>
</html>