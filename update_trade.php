<?php 

// require_once "controllerUserData.php"; 
      


// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     $pHp = $_POST['pHp'];
//     $uSd = $_POST['uSd'];
//     $php_c = $_POST['php_c'];
//     $usd_d = $_POST['usd_d'];

//     $email_check = "SELECT * FROM usertable WHERE email = '{$_SESSION['email']}'";
//     $res = mysqli_query($con, $email_check);
//     $row = $res->fetch_row();


//         $trade_update = "UPDATE `usertable` 
//         SET `bal_usd`= " . $row[7] . " - {$usd_d} WHERE email = '{$_SESSION['email']}'";
//         $trade_update_2 = "UPDATE `usertable` 
//         SET `bal_php`= " . $row[6] . " + {$pHp} WHERE email = '{$_SESSION['email']}'";

//         $trade_update_3 = "UPDATE `usertable` 
//         SET `bal_usd`= " . $row[7] . " + {$uSd} WHERE email = '{$_SESSION['email']}'";
//         $trade_update_4 = "UPDATE `usertable` 
//         SET `bal_php`= " . $row[6] . " - {$php_c} WHERE email = '{$_SESSION['email']}'";

//         if($pHp > 0){
//             if(mysqli_query($con, $trade_update) && mysqli_query($con, $trade_update_2)){
//                 header('location: trade.php');
//             }else{
//                 echo "Trade Failed";
//             }
//         } else if($uSd > 0){
//             if(mysqli_query($con, $trade_update_3) && mysqli_query($con, $trade_update_4)){
//                 header('location: trade.php');
//             }else{
//                 echo "Trade Failed";
//             }
//         } else {
//             echo "Trade Failed";
//         }
// }

?>