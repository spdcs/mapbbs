<html>
<head>
    <script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyAuw24TfmCWVXYt0w5Lsns-7tSfz3EkIw0"
            type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
        function load() {
            if (GBrowserIsCompatible()) {
                var map = new GMap2(document.getElementById("map"));

                var geocoder = new GClientGeocoder();
                var address;
                var username;
                var time;
                var subject;
                var content;

                <?php //for($i=0;$i < count($array);$i++){
                //foreach ($array as $key){
                ?>
                $(document).ready(function() {
                    var URLs = "a.php";
                    $.ajax({
                        url: URLs,
                        type: "GET",
                        dataType: 'json',
                        success: function(json) {
                            var NumOfjson = json.length;
                            for (var i = 0; i < NumOfjson; i++) {
                                map.addControl(new GSmallMapControl());

                                address = json[i]["address"];//須修正
                                username = json[i]["username"];
                                time = json[i]["time"];
                                subject = json[i]["subject"];
                                content = json[i]["content"];
                                geocoder.getLatLng(address, function (point) {
                                    if (!point) {
                                        alert('Google Maps 找不到該地址，無法顯示地圖！'); //如果Google Maps無法顯示該地址的警示文字
                                    } else {
                                        map.setCenter(point, 13);
                                        var marker = new GMarker(point);
                                        map.addOverlay(marker);
                                        marker.openInfoWindowHtml("留言者姓名:" + username + "<br>留言時間:" + time + "<br>留言主題:" + subject + "<br>留言內容:" + content + "<br>地址:" + address);//須修正
                                    }
                                });
                            }
                        },
                        error: function() {
                            alert("ERROR!!!");
                        }
                    });
                });
                <?php //} ?>
            }
        }


    </script>
</head>
<body onload="load()" onunload="GUnload()">
<center>
    <div id="map" style="width: 600px; height: 500px"></div>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>

</body>
</html>