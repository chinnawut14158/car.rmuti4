<?php
include('connect.php');

if(isset($_POST["action"]))
{

	if($_POST["action"] == 'fetch3')
	{
		$query3 = "SELECT * FROM vehicle GROUP BY vehicle_id";
		$result3 = $conn->query($query3);
		$data3 = array();

		foreach($result3 as $row)
		{
			$data3[] = array(
				'language3'		=>	$row["license_plate"], 
				'total3'			=>	$row["mile"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}

		echo json_encode($data3);
	}
}
?>