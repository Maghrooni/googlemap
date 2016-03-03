<!-- This code can be used to find 3 nearest coordinates to the given coordinate -->
<html
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Get Three Nearest Coordinate Details</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
          </head> 
<body>
<?php
    $x1=$_POST['x'];
    $y1=$_POST['y'];
    include 'fetch_data.php';//To fetch data from the database
    function fetching_data($lat_t,$log_t,$id_t)
    {
        $lat_t[]=$lat_t;
        $log_t[]=$log_t;
        $id_t[]=$id_t;
    }
    for($j=0;$j<count($lat_t);$j++)
    {
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
    <h1><u>Details and marking of 3 nearest coordinates in the database w.r.t. Coordinate: <?php echo $x1; ?> , <?php echo $y1; ?></u></h1>
    <pre><i>This code can be used to track and identify 3 nearest cabs, ambulances, police vans etc to a victim identified by a coordinate.<br>This code shall be useful for beginners who have just started working on maps and are interested in implementing it for real time problem solving.</i></pre>
<table border="1" style="width:60%;">
 
    <tr>
    <th>S_NO</th>
    <th>ID</th>
    <th>Distance</th>
    </tr>
    <tr>
    <th><?php echo "Coordinate  1";?></th>
	<td><?php echo $id_t[$m1];?></td>
	
	<td><?php echo $dist[0];?></td>
    </tr>


    <tr>
    <th><?php echo "Coordinate 2";?></th>
	<td><?php echo $id_t[$m2];?></td>
	
	<td><?php echo $dist[1];?></td>
    </tr>



    <tr>
    <th><?php echo "Coordinate 3";?></th>
	<td><?php echo $id_t[$m3];?></td>

	<td><?php echo $dist[2];?></td>
    </tr>
</table>

<div id="map" style="width:60%;height:80%;"></div>

	




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
      zoom: 10,
     // center: new google.maps.LatLng(-33.92, 151.25),
	 center: new google.maps.LatLng(<?php echo $x1; ?>, <?php echo $y1; ?>),
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
