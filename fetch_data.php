<?php

$con=mysqli_connect("localhost","username","password","database");//connection establish
$query="select * from coordinate_details";// fetching the coordinate details in the data base
$result=mysqli_query($con,$query);

while($row=mysqli_fetch_array($result))
{
	$lat_t[]=$row[1];
	$log_t[]=$row[2];
	$id_t[]=$row[0];
}
fetching_data($lat_t,$log_t,$id_t);   
    
    
    
    
 
?>  
