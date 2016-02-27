<!-- This code can be used to find 3 nearest coordinates to the given coordinate -->
<html
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Get Three Nearest Coordinate Details</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
          </head> 
<body>
    <div id="map" style="width:60%;height:80%;"></div>

	
<?php
$x1=$_POST['x'];
$y1=$_POST['y'];

$con=mysqli_connect("localhost","db_username","password","db_name");//connection establish
$query="select * from coordinate_details";// fetching the coordinate details in the data base
$result=mysqli_query($con,$query);

while($row=mysqli_fetch_array($result))
{
	$lat_t[]=$row[5];
	$log_t[]=$row[6];
	$id_t[]=$row[0];
	$name_t[]=$row[1];

}

	for($j=0;$j<count($lat_t);$j++){
	$dist[]=distance($x1,$y1,$lat_t[$j],$log_t[$j]);
	$dist1[]=distance($x1,$y1,$lat_t[$j],$log_t[$j]);
	}

	for($j=1;$j<count($dist);$j++){
		$k=$dist[$j];
		$l=$j-1;
		while($l>=0&&$dist[$l]>$k)
		{
			$dist[$l+1]=$dist[$l];
			$l=$l-1;
			}
		$dist[$l+1]=$k;
			}




	for($j=0;$j<count($dist);$j++){
		if($dist1[$j]==$dist[0])
		{
			$m1=$j;
			}
		if($dist1[$j]==$dist[1])
		{
			$m2=$j;
			}
		if($dist1[$j]==$dist[3])
		{
			$m3=$j;
			}

			}
			
		
		$taxi_lat=array($lat_t[$m1],$lat_t[$m2],$lat_t[$m3]);
		$taxi_log=array($log_t[$m1],$log_t[$m2],$log_t[$m3]);
	?>
<table border="1">
 
    <tr>
    <th>Minimum</th>
    <th>ID</th>
    <th>Name</th>
    <th>Distance</th>
    </tr>
    <tr>
    <th><?php echo "Coordinate 1 1";?></th>
	<td><?php echo $id_t[$m1];?></td>
	<td><?php echo $name_t[$m1];?></td>
	<td><?php echo $dist[0];?></td>
    </tr>


    <tr>
    <th><?php echo "Coordinate 2";?></th>
	<td><?php echo $id_t[$m2];?></td>
	<td><?php echo $name_t[$m2];?></td>
	<td><?php echo $dist[1];?></td>
    </tr>



    <tr>
    <th><?php echo "Coordinate 3";?></th>
	<td><?php echo $id_t[$m3];?></td>
	<td><?php echo $name_t[$m3];?></td>
	<td><?php echo $dist[2];?></td>
    </tr>
</table>
    <br/><br/>


    <?php 

function distance($lat1,$log1,$lat2,$log2)
{
	$theta=$log1-$log2;
	$dist=sin(deg2rad($lat1))*sin(deg2rad($lat2))+cos(deg2rad($lat1))*cos(deg2rad($lat2))*cos(deg2rad($theta));
	$dist=acos($dist);
	$dist=rad2deg($dist);
	$miles=($dist*60*1.1515);
	return($miles*0.8684);
	}

?>
</body>


  <script type="text/javascript">
  alert("knkmkzxa");
  var cplat="<?php echo $x1?>";
  var cplong="<?php echo $y1?>";
  var a1lat="<?php echo $taxi_lat[0]?>";
  var a1long="<?php echo $taxi_log[0]?>";
  var a2lat="<?php echo $taxi_lat[1]?>";
  var a2long="<?php echo $taxi_log[1]?>";
  var a3lat="<?php echo $taxi_lat[2]?>";
  var a3long="<?php echo $taxi_log[2]?>";
    var locations = [
      ['Root Coordinate', cplat, cplong, 4],
      ['Coordinate  1', a1lat, a1long, 1],
	  ['Coordinate  2', a2lat, a2long, 2],
	  ['Coordinate 3', a3lat, a3long, 3]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 18,
     // center: new google.maps.LatLng(-33.92, 151.25),
	 center: new google.maps.LatLng(21.2088774, 81.37806320000),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
	
  </script>


</html>
