<?php session_start();
include("conn.php");
error_reporting(0);
$username = $_SESSION['username'];
$account = $_SESSION['account'];
$sql = "select bbs.id, data.username, data.sex, bbs.subject, bbs.time, bbs.content from bbs LEFT JOIN data ON data.account=bbs.account order by bbs.id desc";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>地圖留言板</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bbs.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <center>
        <div id="map" style="width: 600px; height: 500px"></div>
        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
        <script type="text/javascript">


            function initMap() {
                var URLs = "a.php";
                var geocoder = new google.maps.Geocoder();
                var latlng = new google.maps.LatLng(22.999900, 120.226876);
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: latlng,
                    zoom: 14
                });
                $.ajax({
                    url: URLs,
                    type: "GET",
                    dataType: 'json',
                    success: function (json) {
                        var NumOfjson = json.length;
                        for (var i = 0; i < NumOfjson; i++) {
                            var username = json[i].username;
                            var time = json[i].time;
                            var subject = json[i].subject;
                            var content = json[i].content;
                            var address = json[i].address;

                            geocoder.geocode({'address': address}, function (results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    map.setCenter(results[0].geometry.location);
                                        var marker = new google.maps.Marker({
                                            map: map,
                                            position: results[0].geometry.location,
                                            icon: 'http://maps.gstatic.com/mapfiles/ridefinder-images/mm_20_red.png'
                                        });
                                        var infocontent = "留言者姓名:" + username + "<br>留言時間:" + time + "<br>留言主題:" + subject + "<br>留言內容:" + content + "<br>地址:" + address;
                                        attachinfocontent(marker, infocontent);

                                    function attachinfocontent(marker, infocontent) {
                                        var infowindow = new google.maps.InfoWindow({
                                            content: infocontent
                                        });
                                        marker.addListener('click', function() {
                                            infowindow.open(marker.get('map'), marker);
                                        });
                                    }
                                    }
                                };
                                else if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                                    setTimeout(function () {
                                        Geocode(address);
                                    }, 200);
                                }
                                else {
                                    alert("Geocode was not successful for the following reason: " + status);
                                }
                            }
                        })
                    }
                }
            })

        </script>
    </center>
</head>

<body onload="initMap()">
<div id="map" style="width: 320px; height: 480px;"></div>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuw24TfmCWVXYt0w5Lsns-7tSfz3EkIw0&callback=initMap">
</script>
</body>
</html>