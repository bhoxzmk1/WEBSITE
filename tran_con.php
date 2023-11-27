<?php

session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();

if(isset($_POST['wlogin'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $check_email = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if(password_verify($password, $fetch_pass)){
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if($status == 'verified'){
                $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                  $_SESSION['bal_php'] = $bal_php;~
                  $_SESSION['bal_usd'] = $bal_usd;
                  $_SESSION['id']= $id;
                  $_SESSION['bal_btc']= $bal_btc;
                  $_SESSION['bal_eth']= $bal_eth;
                  $_SESSION['bal_matic']= $bal_matic;
              
              $_SESSION['id']= $id;
                header('location: tran_wallet.php');
            }else{
                $info = "It's look like you haven't still verify your email - $email";
                $_SESSION['info'] = $info;
                header('location: user-otp.php');
            }
        }else{
            $errors['email'] = "Incorrect email or password!";
        }
    }else{
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}

if(isset($_POST['login-now'])){
    header('Location: login-user.php');
}






?>