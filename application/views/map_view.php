<!DOCTYPE html>
<html>
<?php


$arr = array();
$i=1;
foreach($ads as $ad) {
  $user_id = $ad->user_id;
  $latitude = $ad->latitude;
  $longitude = $ad->longitude;
  $arr[] = array($user_id,$latitude,$longitude,$i);

$i++;
}

$myJsonString=json_encode($arr);
$finalmyJsonString =  str_replace(']"',']',str_replace('"',"",$myJsonString));


?>
<head>
<style>
#map{
	width:100%;
   height:600px;
}
</style>
</head>
<body>
<div id="map"></div>
<script>

    function initMap() {
    	var lat_min = <?= $lat_min; ?>;
		var lat_max = <?= $lat_max; ?>;
		var lng_min = <?= $lng_min; ?>;
		var lng_max = <?= $lng_max; ?>;

       var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: (lat_max + lat_min) / 2.0, lng: (lng_max + lng_min) / 2.0}
       });

    setMarkers(map);
}
    var beaches = <?= $finalmyJsonString; ?>;

    function setMarkers(map) {
    	var icon = {
		    url: "https://ekanatechnologies.in/dev/dental/assets/frontend/images/logo.png", // url
		    scaledSize: new google.maps.Size(70, 70), // scaled size
		    origin: new google.maps.Point(0,0), // origin
		    anchor: new google.maps.Point(0, 0) // anchor
		};
    	
      for (var i = 0; i < beaches.length; i++) {
          var beach = beaches[i];
          var title = beach[0];
          var marker = new google.maps.Marker({
            position: {lat: beach[1], lng: beach[2]},
            icon: icon,
            map: map,
            animation: google.maps.Animation.BOUNCE,
            title: 'MyDental Ad',
            zIndex: beach[3],
            url: "https://ekanatechnologies.in/dev/dental/viewad/medical-equipments/opd-scissior-in-excellent-condition/10"
          });
          google.maps.event.addListener(marker, 'click', function() {
			    window.location.href = this.url;
			});
        }
      }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxVaqdZ9DJzCpdnGmvoi7nvV0bxEMEFKA&callback=initMap">
    </script>
<script>
	
</script>
</body>
</html>