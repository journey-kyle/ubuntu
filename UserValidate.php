<?php
	$con = mysqli_connect("localhost", "lawmedi", "fhapel17@@", "MDP_INFO");

	if(mysqli_connect_error($con))
        {
               echo "오류원인 : ", mysql_connect_error();
               exit();
	}
	
	$ID = $_POST[ID];

	$result = mysqli_query($con, "SELECT * FROM LOGIN_INFO WHERE ID = '$ID';");

	$response = array();
	$response["success"] = true;

	while(mysqli_fetch_array($result))
	{
		$response["success"] = false;
	}
	//while($row = mysqli_fetch_array($result)) array_push($response, array(ID => $row[1]));

	echo json_encode(array("response" => $response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
	mysqli_close($con);

