<?php
	$con = mysqli_connect("localhost", "lawmedi", "fhapel17@@", "lawmedi");

        if(mysqli_connect_error($con)){
		echo "오류원인 : ", mysqli_connect_error();
                exit();
        }
	
	$NO = $_POST[NO];
	$LOCATION = $_POST[LOCATION];
	$DATE = $_POST[DATE];
	$UDI_PI10 = $_POST[UDI_PI10];
	$UDI_PI21 = $_POST[UDI_PI21];

	$ret = mysqli_query($con, "UPDATE UDI_INFO SET LOCATION = '$LOCATION', DATE = '$DATE', UDI_PI10 = '$UDI_PI10', UDI_PI21 = '$UDI_PI21' WHERE NO = '$NO'");

	if($ret) $response["success"] = true;
        else $response["success"] = false;

        echo json_encode(($response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);

        mysqli_close($con);

