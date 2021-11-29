<?php	

	$con = mysqli_connect("localhost", "lawmedi", "fhapel17@@");
	
	if(mysqli_connect_error($con)){
		echo "오류원인 : ", mysqli_connect_error();
		exit();
	}

	$CR_NUM = $_POST[CR_NUM];

	$ret = mysqli_query($con, "CREATE DATABASE IF NOT EXISTS $CR_NUM");

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
	else  $response["success"] = false;

	$ret = mysqli_query($con, "CREATE TABLE IF NOT EXISTS ITEM_INFO(
				   NO INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				   ITEM_CODE VARCHAR(10) NOT NULL,
				   UDI_DI INT(14),
				   EDI_CODE VARCHAR(8),
				   ITEM_NAME VARCHAR(50) NOT NULL,
				   ITEM_STANDARD VARCHAR(50) NOT NULL,
				   ITEM_UNIT VARCHAR(10) NOT NULL,
				   ITEM_PRICE INT(15) NOT NULL);");

	if($ret) $response["success"] = true;
	else $response["success"] = false;

	$ret = mysqli_query($con, "CREATE TABLE IF NOT EXISTS ACCOUNT_INFO(
				   NO INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				   COMPANY_CODE VARCHAR(10) NOT NULL,
				   COMPANY_NAME VARCHAR(20) NOT NULL,
				   BUSINESS_NUMBER VARCHAR(10) NOT NULL,
				   BANK_NAME VARCHAR(10) NOT NULL,
				   ACCOUNT_NUMBER INT(20) NOT NULL,
				   CONTACT_NUMBER INT(11) NOT NULL,
				   PIC_NAME VARCHAR(10),
				   PIC_PHONE INT(12),
				   DELAY INT(3) NOT NULL,
				   CHARGE_DATE INT(5) NOT NULL);");

	if($ret) $response["success"] = true;
	else $response["success"] = false;

	$ret = mysqli_query($con, "CREATE TABLE IF NOT EXISTS COMPANY_PRICE_INFO(
				   NO INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				   COMPANY_CODE VARCHAR(10) NOT NULL,
				   ITEM_CODE VARCHAR(10) NOT NULL,
				   ZERO_TAX_CHECK INT(1) NOT NULL,
				   ITEM_PRICE1 INT(15),
				   ITEM_PRICE2 INT(15),
				   ITEM_PRICE3 INT(15));");

	if($ret) $response["success"] = true;
        else $response["success"] = false;
	
	echo json_encode(($response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
