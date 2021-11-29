:<?php	
	$con = mysqli_connect("localhost", "lawmedi", "fhapel17@@");
	
	if(mysqli_connect_error($con)){
		echo "오류원인 : ", mysqli_connect_error();
		exit();
	}
	
	$CR_NUM = $_POST[CR_NUM];	

	$ret = mysqli_query($con, "CREATE DATABASE $CR_NUM");

	$ret = mysqli_query($con, "USE $CR_NUM");
	
	$ret = mysqli_query($con, "CREATE TABLE IF NOT EXISTS UDI_INFO(
		    		   NO INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		        	   LOCATION VARCHAR(30) NOT NULL,
				   UDI_DI VARCHAR(30) NOT NULL,
				   UDI_PI10 VARCHAR(30),
				   UDI_PI11 VARCHAR(30),
				   UDI_PI17 VARCHAR(30),
				   UDI_PI21 VARCHAR(30),
				   DATE DATE NOT NULL,
				   GRADE INT(1) NOT NULL,
				   CLASSES VARCHAR(30) NOT NULL,
				   STANDARD VARCHAR(30) NOT NULL,
				   USER_NAME VARCHAR(10) NOT NULL);");
	 
	if($ret) $response["success"] = true;
	else $response["success"] = false;
	
	echo json_encode(($response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
