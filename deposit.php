<?php require_once "controllerUserData.php"; ?>
<?php 
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
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    nav{
        padding-left: 50px!important;
        padding-right: 100px!important;
        background: #6665ee;
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    button a{
        color: #6665ee;
        font-weight: 500;
    }
    button a:hover{
        text-decoration: none;
    }
    /* h1{
        position: absolute;
        top: 15%;
        left: 30%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 35px;
        font-weight: 600;
    }
    h2{
        position: absolute;
        top: 25%;
        left: 15%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 2rem;
        font-weight: 600;
    }
    h3{
        position: absolute;
        top: 30%;
        left: 15%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 1.75rem;
        font-weight: 600;
    }
    h4{
        position: absolute;
        top: 35%;
        left: 15%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 1.75rem;
        font-weight: 600;
    } */
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



    <h1>Deposit address is: <?php echo $fetch_info['email'] ?> </h1>
    <h2>Wallet balance</h2>
    <h3>PHP: <?php echo $fetch_info['bal_php'] ?> </h3>

    
</body>
</html>