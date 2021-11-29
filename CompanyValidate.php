<?php

	$con = mysqli_connect("localhost", "lawmedi", "fhapel17@@", "MDP_INFO");

        if(mysqli_connect_error($con))
        {
               echo "오류원인 : ", mysql_connect_error();
               exit();
	}

	$CR_NUM = $_POST[CR_NUM];

	$result = mysqli_query($con, "SELECT * FROM COMPANY_INFO WHERE CR_NUM = '$CR_NUM';");

	$response = array();
	$response["success"] = true;
	
	while($row = mysqli_fetch_array($result))
	{
		$response["success"] = false;
		
		array_push($response, array(NO => $row[0],
			COMPANY_NAME => $row[1],
			CR_NUM => $row[2],
			COMPANY_PHONE => $row[3],
			DATE => $row[4]));
	}
	
	echo json_encode(array("response" => $response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
	mysqli_close($con);

