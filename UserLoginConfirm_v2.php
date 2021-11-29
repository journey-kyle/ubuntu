<?php
	$con = mysqli_connect("localhost", "lawmedi", "fhapel17@@", "MDP_INFO");

	if(mysqli_connect_error($con))
        {
               echo "오류원인 : ", mysql_connect_error();
               exit();
	}
	
	$ID = $_POST[ID];
	$PW = $_POST[PW];

	$result = mysqli_query($con, "SELECT * FROM LOGIN_INFO WHERE ID = '$ID' AND PW = '$PW'");

	$response = array();
	$response["success"] = false;

	while(mysqli_fetch_array($result))
	{
		$response["success"] = true;
	}
	//while($row = mysqli_fetch_array($result)) array_push($response, array(ID => $row[1]));

	echo json_encode(array("response" => $response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
	mysqli_close($con);

