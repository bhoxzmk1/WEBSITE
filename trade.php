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
    /* h2{
        position: absolute;
        top: 15%;
        left: 10%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 2rem;
        font-weight: 600;
    }
    h4{
        position: absolute;
        top: 20%;
        left: 15%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 1.75rem;
        font-weight: 600;
    }
    h5{
        position: absolute;
        top: 25%;
        left: 15%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 1.75rem;
        font-weight: 600; 
    }
    h6{
        position: absolute;
        top: 30%;
        left: 15%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 1.75rem;
        font-weight: 600; 
    }
    h7{
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
            </ul>
        </div>
    </nav>



    <!-- <nav class="navbar">

    <a class="navbar-brand" href="home.php">Digital Peso</a>
    
    <button type="button" class="btn btn-light">
        <a href="trade.php">trade</a></button>

    <button type="button" class="btn btn-light">
        <a href="convert.php">convert</a></button>

    <button type="button" class="btn btn-light">
        <a href="deposit.php">Deposit</a></button>

    <button type="button" class="btn btn-light">
        <a href="withdraw.php">Withdraw</a></button>
    
    </nav> -->


    
    <h2>Wallet balance</h2>
    <h3>USDT: <?php echo $fetch_info['bal_usd'] ?> </h3>
    <h3>BTC: <?php echo $fetch_info['bal_btc'] ?> </h3>
    <h3>ETH: <?php echo $fetch_info['bal_eth'] ?> </h3>
    <h3>MATIC: <?php echo $fetch_info['bal_matic'] ?> </h3>


    <!-- <ul class="nav justify-content-center">

  <li class="nav-item">
  
      <a class="nav-link btn btn-outline-primary col mt-3" aria-current="page" href="USDtoBTC.php">USD~BTC</a>
  </li>

  <li class="nav-item">
  
    <a class="nav-link btn btn-outline-primary col mt-3" aria-current="page" href="USDtoETH.php">USD~ETH</a>
  </li>

  <li class="nav-item">

    <a class="nav-link btn btn-outline-primary col mt-3" aria-current="page" href="USDtoMATIC.php">USD~MATIC</a>
  </li>

</ul> -->

    








<div class="container-xl ">
    <div class="row justify-content-md-end mt-4">
        
    <div class="list-group col-md-8 ">

    <!-- <p id='infotimeBTC'></p>
    <p id='priceBTC'></p>
     -->

     <!-- BTC price: <div id="stock-price" >---</div> -->

  <a href="USDtoBTC.php" class="list-group-item list-group-item-action border border-primary">
      USDT ~ BTC</a>
      
      <!-- <p id='priceETH'></p>
    <p id='infotimeETH'></p> -->

    <!-- ETH price: <div id="ethsudt" >---</div> -->

  <a href="USDtoETH.php" class="list-group-item list-group-item-action border border-primary mt-4">
      USDT ~ ETH</a>

      <!-- <p id='priceMATIC'></p> -->
    <!-- <p id='infotimeMATIC'></p> -->

  <a href="USDtoMATIC.php" class="list-group-item list-group-item-action border border-primary mt-4">
      USDT ~ MATIC</a>


 
</div>

    </div>

</div>











 <!-- <p id='info'></p>
    <p id='infotime'></p> -->



<!-- <script>
    const getBtcData = async() => {
        fetch('https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                document.getElementById("priceBTC").innerHTML = '<b>1 BTC = ' + data.USD + ' USD</b>'
            });
    }
    getBtcData();
    tcount = setInterval(function() {
        tcount++
        if (tcount == 10) {
            getBtcData();
            tcount = 0
        }
        document.getElementById("infotimeBTC").innerHTML = 'Next update in ' + (10 - tcount) + ' seconds'
    }, 1000);
</script> -->







<!-- <script>
    const getBtcData = async() => {
        fetch('https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                document.getElementById("priceETH").innerHTML = '<b>1 ETH = ' + data.USD + ' USD</b>'
            });
    }
    getBtcData();
    tcount = setInterval(function() {
        tcount++
        if (tcount == 10) {
            getBtcData();
            tcount = 0
        }
        document.getElementById("infotimeETH").innerHTML = 'Next update in ' + (10 - tcount) + ' seconds'
    }, 1000);
</script>
 -->





<!-- <script>
    const getBtcData = async() => {
        fetch('https://min-api.cryptocompare.com/data/price?fsym=MATIC&tsyms=USD')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                document.getElementById("priceMATIC").innerHTML = '<b>1 MATIC = ' + data.USD + ' USD</b>'
            });
    }
    getBtcData();
    tcount = setInterval(function() {
        tcount++
        if (tcount == 10) {
            getBtcData();
            tcount = 0
        }
        document.getElementById("infotimeMATIC").innerHTML = 'Next update in ' + (10 - tcount) + ' seconds'
    }, 1000);
</script> -->
















    
        <!-- <h2 id="stock-price" name="stock_price">---</h2> -->

    




    <!-- <script>
        let ws = new WebSocket('wss://stream.binance.com:9443/ws/btcusdt@trade');
        let stockPriceElement = document.getElementById('stock-price');
        let lastPrice = null;

        ws.onmessage = (event) => {
            let stockObject = JSON.parse(event.data);
            let price = parseFloat(stockObject.p).toFixed(2);
            stockPriceElement.innerText = price;
            // console.log(stockObject.p);
            // stockPriceElement.innerText = stockObject.p;

            stockPriceElement.style.color = 
            !lastPrice || lastPrice === price ? 'black' : price > lastPrice ? 'green' : 'red';
            lastPrice = price;
        };
    </script> -->








<!-- <script>
        let ws = new WebSocket('wss://stream.binance.com:9443/ws/ethusdt@trade');
        let stockPriceElement = document.getElementById('ethusdt');
        let lastPrice = null;

        ws.onmessage = (event) => {
            let stockObject = JSON.parse(event.data);
            let price = parseFloat(stockObject.p).toFixed(2);
            stockPriceElement.innerText = price;
            // console.log(stockObject.p);
            // stockPriceElement.innerText = stockObject.p;

            stockPriceElement.style.color = 
            !lastPrice || lastPrice === price ? 'black' : price > lastPrice ? 'green' : 'red';
            lastPrice = price;
        };
    </script>
 -->






    
    
</body>
</html>