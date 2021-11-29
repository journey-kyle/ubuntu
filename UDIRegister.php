<?php	
	$con = mysqli_connect("localhost", "lawmedi", "fhapel17@@", "lawmedi");
	
	if(mysqli_connect_error($con)){
		echo "오류원인 : ", mysqli_connect_error();
		exit();
	}
		
	$LOCATION = $_POST[LOCATION];
	$UDI_DI = $_POST[UDI_DI];
	$UDI_PI10 = $_POST[UDI_PI10];
	$UDI_PI11 = $_POST[UDI_PI11];
	$UDI_PI17 = $_POST[UDI_PI17];
	$UDI_PI21 = $_POST[UDI_PI21];
	$GRADE = $_POST[GRADE];
	$CLASSES = $_POST[CLASSES];
	$STANDARD = $_POST[STANDARD];
	$DATE = $_POST[DATE];

	if($DATE == "today")
	{
		$sql =  "INSERT INTO UDI_INFO (LOCATION, UDI_DI, UDI_PI10, UDI_PI11, UDI_PI17, UDI_PI21, DATE, GRADE, CLASSES, STANDARD)
		        VALUES ('$LOCATION', '$UDI_DI', '$UDI_PI10', '$UDI_PI11', '$UDI_PI17', '$UDI_PI21', NOW(), '$GRADE', '$CLASSES', '$STANDARD')";		}
	else
	{	$sql =  "INSERT INTO UDI_INFO (LOCATION, UDI_DI, UDI_PI10, UDI_PI11, UDI_PI17, UDI_PI21, DATE, GRADE, CLASSES, STANDARD) 
			VALUES ('$LOCATION', '$UDI_DI', '$UDI_PI10', '$UDI_PI11', '$UDI_PI17', '$UDI_PI21', '$DATE', '$GRADE', '$CLASSES', '$STANDARD')";
	}
	//$sql = "DELETE FROM `UDI_TEST` WHERE `UDI_TEST`.`NO` = $NO;";

	$ret = mysqli_query($con, $sql);

	if($ret) $response["success"] = true;
	else $response["success"] = false;
	
	echo json_encode(($response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
