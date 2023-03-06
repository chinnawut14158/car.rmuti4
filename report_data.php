<?php
include('connect.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		$query = "SELECT 
    	vehicle.vehicle_name,license_plate,
    	(SELECT COUNT(*) FROM events WHERE events.vehicle_id = vehicle.vehicle_id) AS Total
		FROM vehicle GROUP BY vehicle_id";

		$result = $conn->query($query);

		$data2 = array();

		foreach($result as $row)
		{								
			$data2[] = array(
				'language'		=>	$row["vehicle_name"] . " " . $row["license_plate"],
				'total'			=>	$row["Total"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}
		echo json_encode($data2);
	}
}
?>