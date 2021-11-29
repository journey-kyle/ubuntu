<?php
	$DB_NAME = $_POST[DB_NAME];

	$con = mysqli_connect("localhost", "lawmedi", "fhapel17@@", $DB_NAME);
	
	if(mysqli_connect_error($con))
	{
		echo "오류원인 : ", mysql_connect_error();
		exit();
	}
	/*
	$UDI_DI = $_POST[UDI_DI];
	$UDI_PI10 = $_POST[UID_PI10];
	$UDI_PI11 = $_POST[UID_PI11];
	$UDI_PI17 = $_POST[UDI_PI17];
	$UDI_PI21 = $_POST[UID_PI21];
	*/
	$LOCATION = $_POST[LOCATION];
	$UDI_DI = $_POST[UDI_DI];
	$GRADE = $_POST[GRADE];
	$CLASSES = $_POST[CLASSES];
	$STANDARD = $_POST[STANDARD];
	$START_DATE = $_POST[START_DATE];
	$END_DATE = $_POST[END_DATE];
	/*
	$sql = "INSERT INTO UDI_TEST (LOCATION, UDI_DI, UDI_PI10, UDI_PI11, UDI_PI17, UDI_PI21, DATE)
		VALUES ('$LOCATION', '$UDI_DI', '$UDI_PI10', '$UDI_PI11', '$UDI_PI17', '$UDI_PI21', NOW())";
	*/
	
	if($UDI_DI != "")
	{	if($LOCATION == '전체')
		{
			$result = mysqli_query($con, "SELECT * FROM UDI_INFO WHERE DATE >= '$START_DATE' AND DATE <= '$END_DATE' AND UDI_DI = '$UDI_DI' ORDER BY UDI_DI;");
		}
		else
		{
			$result = mysqli_query($con, "SELECT * FROM UDI_INFO WHERE DATE >= '$START_DATE' AND DATE <= '$END_DATE' AND LOCATION = '$LOCATION' AND UDI_DI = '$UDI_DI' ORDER BY UDI_DI;");
		}
	}
	else
	{
		if($LOCATION == '전체')
		{
			$result = mysqli_query($con, "SELECT * FROM UDI_INFO WHERE DATE >= '$START_DATE' AND DATE <= '$END_DATE' ORDER BY UDI_DI;");
		}
		else
		{
			$result = mysqli_query($con, "SELECT * FROM UDI_INFO WHERE DATE >= '$START_DATE' AND DATE <= '$END_DATE' AND LOCATION = '$LOCATION' ORDER BY UDI_DI;");
		}
	}
	//$result = mysqli_query($con, "SELECT * FROM UDI_INFO WHERE LOCATION = '9988병원충남점' AND DATE = '2021-07-14';");
	$response = array();
	
 	
	while($row = mysqli_fetch_array($result)){
		array_push($response, array(NO=>$row[0],
					LOCATION=>$row[1], 
					UDI_DI=>$row[2], 	
					DATE=>$row[7],
					GRADE=>$row[8],
					CLASSES=>$row[9],
					STANDARD=>$row[10],
					UDI_PI10=>$row[3],
					UDI_PI11=>$row[4],
					UDI_PI17=>$row[5],
					UDI_PI21=>$row[6],
					USER_NAME=>$row[11]
					));
	}
	 
	//echo array($response);
	echo json_encode(array("response" => $response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
	mysqli_close($con);

?>
