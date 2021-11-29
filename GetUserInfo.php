<?php
	$con = mysqli_connect("localhost", "lawmedi", "fhapel17@@", "MDP_INFO");

	if(mysqli_connect_error($con))
	{
		echo "연결실패! 원인 : ",mysqli_connect_error();
		exit();
	}

	$ID = $_POST[ID];

	$result = mysqli_query($con, "SELECT * FROM LOGIN_INFO WHERE ID = '$ID'");

	$response = array();

	while($row = mysqli_fetch_array($result)){
		array_push($response, array(NO=>$row[0],
					USER_NAME=>$row[3],
					CR_NUM=>$row[8]));
	}

	echo json_encode(array("response" => $response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
	mysqli_close($con);
