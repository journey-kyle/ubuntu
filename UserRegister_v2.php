<?php	
	$con = mysqli_connect("localhost", "lawmedi", "fhapel17@@", "MDP_INFO");
	
	if(mysqli_connect_error($con)){
		echo "오류원인 : ", mysqli_connect_error();
		exit();
	}
		
	$ID = $_POST[ID];
	$PW = $_POST[PW];
	$USER_NAME = $_POST[USER_NAME];
	$EMAIL = $_POST[EMAIL];
	$KING = $_POST[KING];
	$CR_NUM = $_POST[CR_NUM];
	$COMPANY_NAME = $_POST[COMPANY_NAME];
	$COMPANY_PHONE = $_POST[COMPANY_PHONE];

	$sql =  "INSERT INTO LOGIN_INFO (ID, PW, USER_NAME, EMAIL, KING, DATE, TIME, CR_NUM)
		 VALUES ('$ID', '$PW', '$USER_NAME', '$EMAIL', '$KING', NOW(), NOW(), '$CR_NUM')";

	$ret = mysqli_query($con, $sql);
	;

	if($KING == 1)
	{
		$sql = "INSERT INTO COMPANY_INFO (COMPANY_NAME, CR_NUM, COMPANY_PHONE, DATE, TIME)
			VALUES ('$COMPANY_NAME', '$CR_NUM', '$COMPANY_PHONE', NOW(), NOW())";
		$ret = mysqli_query($con, $sql);
	}

	if($ret) $response["success"] = true;
	else $response["success"] = false;
	
	echo json_encode(($response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
