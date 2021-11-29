<?php	
	$con = mysqli_connect("localhost", "lawmedi", "fhapel17@@", "lawmedi");
	
	if(mysqli_connect_error($con)){
		echo "오류원인 : ", mysqli_connect_error();
		exit();
	}
		
	$NO = $_POST[NO];
	
	//$sql = "DELETE FROM UDI_TEST WHERE NO = '$NO'";

	//$statement = mysqli_prepare($con, "DELETE FROM UDI_TEST WHERE NO = '$NO'");
	//mysqli_stmt_bind_param($statement, 

	$ret = mysqli_query($con, "DELETE FROM UDI_INFO WHERE NO = $NO");

	$response = array();
	
	if($ret) $response["success"] = true;
	else $response["success"] = false;
	
	echo json_encode(($response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
