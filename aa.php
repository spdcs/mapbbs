<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

                var URLs = "a.php";

                $.ajax({
                    url: URLs,
                    type: "GET",
                    dataType: 'json',

                    success: function (msg) {
                        alert(msg);
                    },

                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    }
                });

            }
        )
        ;
    </script>
</head>
<body>
</body>
</html>