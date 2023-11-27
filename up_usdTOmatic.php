<?php 

require_once "controllerUserData.php"; 
      


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $USD = $_POST['USD'];
    $BTC = $_POST['BTC'];
    $USD_c = $_POST['USD_c'];
    $BTC_d = $_POST['BTC_b'];
   


    $email_check = "SELECT * FROM usertable WHERE email = '{$_SESSION['email']}'";
    $res = mysqli_query($con, $email_check);
    $row = $res->fetch_row();


        $trade_update = "UPDATE `usertable` 
        SET `bal_matic`= " . $row[10] . " - {$BTC_d} WHERE email = '{$_SESSION['email']}'";

        $trade_update_2 = "UPDATE `usertable` 
        SET `bal_usd`= " . $row[7] . " + {$USD} WHERE email = '{$_SESSION['email']}'";

        $trade_update_3 = "UPDATE `usertable` 
        SET `bal_matic`= " . $row[10] . " + {$BTC} WHERE email = '{$_SESSION['email']}'";
        
        $trade_update_4 = "UPDATE `usertable` 
        SET `bal_usd`= " . $row[7] . " - {$USD_c} WHERE email = '{$_SESSION['email']}'";


      
        if($USD > 0){
            if(mysqli_query($con, $trade_update) && mysqli_query($con, $trade_update_2)){
                
                header('location: USDtoBTC.php');
            }else{
                echo "Trade Failed";
            }
        } else if($BTC > 0){
            if(mysqli_query($con, $trade_update_3) && mysqli_query($con, $trade_update_4)){
                header('location: USDtoBTC.php');
            }else{
                echo "Trade Failed";
            }
        } else {
            echo "Trade Failed";
        }
    }




?>