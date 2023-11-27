<?php 
require_once "controllerUserData.php"; 
require_once "connection.php"; 


$email = $_SESSION['email'];

    $USD = $_POST['usd'];
    $BTC = $_POST['btc'];
    $BTC_a = $_POST['a'];
    $USD_b = $_POST['b'];
    $BTC_c = $_POST['c'];
    $USD_d = $_POST['d'];
 
 


    $sql = "INSERT INTO trade_histo( usdt1, matic1, amount1, matic2, usdt2, amount2) 
    VALUES ($USD_b, $BTC_a, $BTC, $USD_d, $BTC_c, $USD)";




    if (mysqli_query($con, $sql)) {
		echo "New record created successfully";

	} else {
        
		echo json_encode(array("statusCode"=>201));
	}






mysqli_close($con);

?>