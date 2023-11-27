<?php





require_once "controllerUserData.php"; 
require "connection.php";   

$email = $_SESSION['email'];
$password = $_SESSION['password'];
$balx_php = $_SESSION['bal_php'];

echo $balx_php;

if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
       }else{
            header('Location: user-otp.php');
        }
    }
}else{
   header('Location: login-user.php');
}


// $name = "";
// $cname = "";
// $bal_php = "";
$errors = array();

$sql = "SELECT * FROM usertable WHERE email = '$email'";
$run_Sql = mysqli_query($con, $sql);

$fetch_info = mysqli_fetch_assoc($run_Sql);
$balance = $fetch_info['bal_php'];

if(isset($_POST['send_money'])){
   
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $bal_php = mysqli_real_escape_string($con, $_POST['balance_php']);

    

    $email_check = "SELECT * FROM usertable WHERE email = '{$email}'";
    $res = mysqli_query($con, $email_check);
    // $row = mysqli_fetch_row($res);
    $row = $res->fetch_row();

    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is valid!";
        
     }
    
        $update_data = "UPDATE `usertable` 
        SET `bal_php`= " . $row[6] . " + {$_POST['balance_php']} WHERE email = '{$_POST['email']}'"; // after ito
        
        $update_data_2 = "UPDATE `usertable` 
        SET `bal_php`= " . $fetch_info['bal_php'] . " - {$_POST['balance_php']} WHERE email = '{$_SESSION['email']}'"; // ito una
        
        // $update_data = "UPDATE `usertable` SET `bal_php`=  '".$fetch_info['bal_php']."' - {$_POST['balance_php']} WHERE email = '{$_POST['email']}'";
        $data_check = mysqli_query($con, $update_data);
        $data_check_2 = mysqli_query($con, $update_data_2);
        // print_r($data_check);
       
        if($data_check){
            
            

             header('Location: tran_wallet.php');
            //$errors['data-check error'] = "error while checking";
        }else{
             $errors['db-error'] = "Failed while inserting data into database!";
        }

}
else{
    $errors['submit-error'] = "error 2";
}
mysqli_close($con);





?>






