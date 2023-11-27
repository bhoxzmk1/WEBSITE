<?php 
require_once "controllerUserData.php"; 
require_once "connection.php"; 
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "test6";
// // Create connection
// $con = new mysqli($servername, $username, $password, $database);

// // Check connection
// if ($con->connect_error) {
//   die("Connection failed: " . $con->connect_error);
// }

// echo "Connected successfully";

$email = $_SESSION['email'];

    $USD = $_POST['usd'];
    $BTC = $_POST['btc'];
    $BTC_a = $_POST['a'];
    $USD_b = $_POST['b'];
    $BTC_c = $_POST['c'];
    $USD_d = $_POST['d'];
 
 
    // if(mysqli_query($con, "INSERT INTO trade_his(usdt1, btc1, amount1, usdt2, btc2, amount2) 
    // VALUES('" . $USD_b . "', '" . $BTC_a . "', '" . $BTC . "','".$USD_d."','".$BTC_c."','".$USD."')")) {
    //  echo '1';
    // } else {
    //    echo "Error: " . $sql . "" . mysqli_error($con);
    // }
 
    // mysqli_close($con);



    // if(mysqli_query($con, "INSERT INTO trade_his( usdt1, btc1, amount1, btc2, usdt2, amount2) 
    // VALUES ($USD_b, $BTC_a, $BTC, $USD_d, $BTC_c, $USD)")){
    //         echo '1';
    // }else{
    //     echo "Error: " . $sql . "" . mysqli_error($con);
    // }

    $sql = "INSERT INTO trade_his( usdt1, btc1, amount1, btc2, usdt2, amount2) 
    VALUES ($USD_b, $BTC_a, $BTC, $USD_d, $BTC_c, $USD)";


// $trade_update = "UPDATE `usertable` 
// SET `bal_btc`= " . $row[8] . " - {$BTC_d} WHERE email = '$email'";

// $trade_update_2 = "UPDATE `usertable` 
// SET `bal_usd`= " . $row[7] . " + {$USD} WHERE email = '$email'";

// $trade_update_3 = "UPDATE `usertable` 
// SET `bal_btc`= " . $row[8] . " + {$BTC} WHERE email = '$email'";

// $trade_update_4 = "UPDATE `usertable` 
// SET `bal_usd`= " . $row[7] . " - {$USD_c} WHERE email = '$email'";




    // $sqlUpdate = "UPDATE `usertable` SET `bal_usd`={$USD} 
    // WHERE `email`= '$email'";

    // $sqlUpdate2 = "UPDATE `usertable` SET `bal_btc`={$BTC}
    // WHERE `email`='$email'";

    if (mysqli_query($con, $sql)) {
		echo "New record created successfully";

	} else {
        
		echo json_encode(array("statusCode"=>201));
	}



  
//     if($USD > 0){
//         if(mysqli_query($con, $trade_update) && mysqli_query($con, $trade_update_2)){
            
//             header('location: USDtoBTC.php');
//         }else{
//             echo "Trade Failed";
//         }
//     } else if($BTC > 0){
//         if(mysqli_query($con, $trade_update_3) && mysqli_query($con, $trade_update_4)){
//             header('location: USDtoBTC.php');
//         }else{
//             echo "Trade Failed";
//         }
//     } else {
//         echo "Trade Failed";
//     }
// }




mysqli_close($con);

?>