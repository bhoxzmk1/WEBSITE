<?php 

require_once "controllerUserData.php"; 
        
$email = $_SESSION['email'];
$password = $_SESSION['password'];
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



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Trading</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

    nav {
        padding-left: 50px !important;
        padding-right: 100px !important;
        background: #6665ee;
        font-family: 'Poppins', sans-serif;
    }

    nav a.navbar-brand {
        color: #fff;
        font-size: 30px !important;
        font-weight: 500;
    }

    button a {
        color: #6665ee;
        font-weight: 500;
    }

    button a:hover {
        text-decoration: none;
    }

    /* h2 {
        position: absolute;
        top: 20%;
        left: 10%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 2rem;
        font-weight: 600;
    }

    h3 {
        position: absolute;
        top: 25%;
        left: 10%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 1.75rem;
        font-weight: 600;
    }

    h4 {
        position: absolute;
        top: 30%;
        left: 15%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 1.75rem;
        font-weight: 600;
    } */


    .trade_form {
        display: flex;
        min-height: 100%;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    body {
    background: url('https://source.unsplash.com/twukN12EN7c/1920x1080') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
}

    </style>

</head>

<body>

    <!-- <nav class="navbar">

        <a class="navbar-brand" href="home.php">Digital Peso</a>
        <button type="button" class="btn btn-light"><a href="trade.php">trade</a></button>
        <button type="button" class="btn btn-light"><a href="convert.php">convert</a></button>
        <button type="button" class="btn btn-light"><a href="deposit.php">Deposit</a></button>
        <button type="button" class="btn btn-light"><a href="withdraw.php">Withdraw</a></button>


    </nav> -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php">Digital Peso</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="trade.php">Trade</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="convert.php">Convert</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="deposit.php">Deposit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="withdraw.php">Withdraw</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="logout-user.php">Logout</a>
                </li> -->
            </ul>
        </div>
    </nav>
    



    <h2>Wallet balance</h2>
    <h3>PHP: <?php echo $fetch_info['bal_php'] ?> </h3>
    <h3>USDT: <?php echo $fetch_info['bal_usd'] ?> </h3>


    <br><br><br>

    <div class="container">

        <div class="trade_form">

            <form action="update_convert.php" method="post">

                <div class="row">

                    <div class="col-md-6">
                    <h1>USDT</h1>
                        
                        <input type="text" class="form-control" id="uSd" name="uSd"  placeholder="0" readonly>
                        

                    </div>
                    <div class="col-md-6">

                    <h1>PHP</h1>
                        <input type="text" class="form-control" id="pHp" name="pHp" placeholder="0" readonly>

                    </div>
                </div>
  


        <div class="row">

            <div class="col-md-6">

                <span>=</span>
                
                <input type="text" class="form-control mt-2" id="d"  value="0.02" disabled>
                
                <input type="text" class="form-control mt-2" name="php_c" id="c" placeholder="0">

            </div>

            <div class="col-md-6">

                <span>=</span>
                
                <input type="text" id="a" class="form-control mt-2" value="50" disabled>

                <input type="text" id="b" class="form-control mt-2" name="usd_d" placeholder="0">

                
                
            </div>


            <button type="submit" name="convert" class="btn btn-primary form-control mt-3">Convert</button>
            
        </div>


        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>





    <script>

        $(":input").bind('keyup mouseup', function () {
            $("#pHp").val($("#a").val() * $("#b").val());
            $("#uSd").val($("#c").val() * $("#d").val());
        }
        );

    </script>



</body>

</html>