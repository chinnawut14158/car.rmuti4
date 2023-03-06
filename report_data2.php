<?php
include('connect.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch2')
	{

		$query2 = "SELECT 
    	user.fname,lname,
    	(SELECT COUNT(*) FROM events WHERE events.driver_id = user.user_id) AS Total2
		FROM user GROUP BY user_id";

		$result2 = $conn->query($query2);

		$data = array();

		foreach($result2 as $row)
		{
			$data[] = array(
				'language2'		=>	$row["fname"]. " " .$row["lname"],
				'total2'			=>	$row["Total2"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}
		echo json_encode($data);
	}
}
?>