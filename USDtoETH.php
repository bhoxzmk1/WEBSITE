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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
  <script src="https://unpkg.com/lightweight-charts/dist/lightweight-charts.standalone.production.js"></script>
    
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
    body {
    background: url('https://source.unsplash.com/twukN12EN7c/1920x1080') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
}

    /* h2 {
        position: absolute;
        top: 15%;
        left: 10%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 2rem;
        font-weight: 600;
    }

    h4 {
        position: absolute;
        top: 20%;
        left: 15%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 1.75rem;
        font-weight: 600;
    }

    h5 {
        position: absolute;
        top: 25%;
        left: 15%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 1.75rem;
        font-weight: 600;
    }

    h6 {
        position: absolute;
        top: 40%;
        left: 13%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 1.55rem;
        font-weight: 500;
    }

    h7 {
        position: absolute;
        top: 45%;
        left: 13%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 1.55rem;
        font-weight: 400;
    }

    .trade_form {
        position: absolute;
        left: 35%;
        display: flex;
        min-height: 1%;
        flex-direction: column;
        justify-content: center;
        align-items: center;

    } */

    /* .price_form{
    position: absolute;
        top: 37%;
        left: 11%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-weight: 700;
}   */
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
    <!-- <nav class="navbar navbar-dark bg-dark">

        <a class="navbar-brand" href="home.php">Digital Peso</a>

        <button type="button" class="btn btn-light">
            <a href="trade.php" class="btn btn-light">trade</a></button>

        <button type="button" class="btn btn-light">
            <a href="convert.php">convert</a></button>

        <button type="button" class="btn btn-light">
            <a href="deposit.php">Deposit</a></button>

        <button type="button" class="btn btn-light">
            <a href="withdraw.php">Withdraw</a></button>

    </nav> -->


    <!-- 
    <ul class="nav justify-content-center">

  <li class="nav-item">
  
      <a class="nav-link active" aria-current="page" href="USDtoBTC.php">USD~BTC</a>
  </li>

  <li class="nav-item">
  
    <a class="nav-link" aria-current="page" href="#">USD~ETH</a>
  </li>

  <li class="nav-item">

    <a class="nav-link" aria-current="page" href="#">USD~MATIC</a>
  </li>

</ul> -->














    <h2>Wallet balance</h2>
    <h3>USDT: <?php echo $fetch_info['bal_usd'] ?> </h3>
    <h3>ETH: <?php echo $fetch_info['bal_eth'] ?> </h3>



    <!-- <div class="container-md">
    <div class="price_form"> -->

    <!-- <h5 id='priceBTC'></h5> -->


    <!-- <br><br><br> -->
    <!-- <p id="btcprice"></p> -->

    <!-- <h6 id='infotimeBTC'></h6> -->


<!-- <div class="container">
<div class="col-md-3">
    
<h4>1 BTC = </h4>
<h4 id="stock-price" name="stock_price">---</h4>

</div>
</div> -->




<div class="d-flex flex-row bd-highlight mb-3">
  <div class="p-2 bd-highlight"><h4>1 ETH = </h4></div>
  <div class="p-2 bd-highlight"><h4 id="stock-price" name="stock_price">---</h4></div>
  <div class="p-2 bd-highlight"><h4>USDT</h4></div>
</div>



    <!-- </div>
</div> -->






    <!-- exchange rate checker -->
    <!-- https://blockchain.info/ticker -->
    <!-- exchange rate example -->
    <!-- https://blockchain.info/tobtc?currency=USD&value=500 -->








    <div class="container-fluid ">
        <form action="up_usdTOeth.php" id="post_get" method="post" >

            <div class="row">
                <div class="col-md-4">
                    <!-- <span>=</span>
                    <input type="text" id="a" class="form-control mt-2" value="0.0000253802" disabled>
                    <input type="text" class="form-control mt-2" name="USD_c" id="c" value="0"> -->
                </div>

                <div class="col-md-4 ">
                    
                    <div class="row">
                        <div class="col">
                            <h1>ETH</h1>
                            <input type="text" id="BTC" name="BTC" class="form-control" readonly>
                            <span>=</span>
                            <input type="text" id="a" name="BTC_a"class="form-control mt-2 mb-2" value="0.000333" disabled>
                            
                            <input type="text" id="c"  name="USD_c" class="form-control mb-2" placeholder="0">
                        </div>

                        <div class="col">
                            <h1>USDT</h1>
                            <input type="text"  id="USD" name="USD" class="form-control" readonly>
                            <span>=</span>
                            <input type="text" id="d" name="USD_d"class="form-control mt-2 mb-2" placeholder="0">
                            
                            <input type="text" id="b"  name="BTC_b" class="form-control mt-2 mb-2" placeholder="0">
                        </div>
                    </div>
                    <!-- <span id="btcprice" class="form-control mt-2" name="d"></span> -->
                   
                    <button type="submit" id="store" name="trade" class="btn btn-primary btn-lg float-left mt-5">Trade</button>

                    
                </div>
</form>
                

                
                
               





                <div class="col-md-4">
                    <ul class="list-group">
                        <!-- <li class="list-group-item">An active item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A fourth item</li>
                        <li class="list-group-item">And a fifth one</li> -->
                    </ul>
                </div>   
</div>



<br>
<div id="tvcharteth"></div>



            
             


                <!-- <canvas width="1280" height="720" id="canvas"></canvas>
                <script>
var candlestickStream = new CandlestickStream( "btceur" , "5m" );
candlestickStream.start();
</script> -->

                     
<!-- <h2 id="stock-price" name="stock_price">---</h2> -->


                    <!-- <div id="chartContainer"> -->


<!-- <div id="chart"></div> -->
                    


                    <!-- <canvas id="chart" width="600" height="400"></canvas> -->
                



<div class="container mt-2 mt-2 bg-secondary text-white bg-gradient-25">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>TRADE HISTORY</h2>
            </div>
            <table class="table mt-2 bg-secondary text-white bg-gradient-25">
              <thead>
                <tr>
                  <!-- <th scope="col">#</th> -->
                  <th scope="col">USDT</th>
                  <th scope="col">ETH</th>
                  <th scope="col">AMOUNT</th>
                  <th scope="col">ETH</th>
                  <th scope="col">USDT</th>
                  <th scope="col">AMOUNT</th>
                  <th scope="col">DATE & TIME</th>
                </tr>
              </thead>
              <tbody>
                <?php include 'retrieve-data-eth.php'; ?>
                <?php if ($result->num_rows > 0): ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <!-- <th scope="row"><?php echo $array[0];?></th> -->
                    <td><?php echo $array[4];?></td>
                    <td><?php echo $array[2];?></td>
                    <td><?php echo $array[3];?></td>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[5];?></td>
                    <td><?php echo $array[6];?></td>
                    <td><?php echo $array[7];?></td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                   <td colspan="3" rowspan="1" headers="">No Data Found</td>
                </tr>
                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
              </tbody>
            </table>
        </div>
    </div>        
</div>















                </body>


                <script src="charteth.js"></script>


                <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
  <script src="https://unpkg.com/lightweight-charts/dist/lightweight-charts.standalone.production.js"></script> -->













  <!-- <script>
        $(document).ready(function() {
 
            $("#post_get").click(function() {
 
                var USD = $("#USD").val();
                var BTC = $("#BTC").val();
                var BTC_a = $("a").val();
                var USD_b = $("b").val();
                var BTC_c = $("c").val();
                var USD_d = $("d").val();
 
            
 
                $.ajax({
                    type: "POST",
                    url: "store_btc.php",
                    data: {
                        USD: USD,
                        BTC: BTC,
                        BTC_a: BTC_a,
                        USD_b: USD_b,
                        BTC_c: BTC_c,
                        USD_d: USD_d
                    },
                    cache: false,
                    success: function(data) {
                        alert(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
                 
            });
 
        });
    </script> -->








                <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                    crossorigin="anonymous"></script>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
                    crossorigin="anonymous"></script>


                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <script>
                $(":input").bind('keyup mouseup', function() {
                    $("#USD").val($("#b").val() * $("#d").val());
                    $("#BTC").val($("#c").val() * $("#a").val());
                });

              


                $("#store").click(function(){
                    var a = $("#a").val();
                    var b = $("#b").val();
                    var c = $("#c").val();
                    var d = $("#d").val();
                    var usd = $("#USD").val();
                    var btc = $("#BTC").val();
                        $.ajax({
                            type: "POST",
                            url: "store_eth.php",
                            data: {
                                a: a,
                                b: b,
                                c: c,
                                d: d,
                                usd: usd,
                                btc: btc
                            },
                            cache: false,
                            success: function(data) {
                              location.reload();
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr);
                            }
                        });
                });



                </script>





 <!-- <script>
    $(document).ready(function() {
 
 $("#trade").click(function() {

    
     var USDT = $("#USDT").val();
     var BTC = $("#BTC").val();
     var USD_a = $("a").val();
     var BTC_b = $("b").val();
     var USD_c = $("c").val();
     var BTC_d = $("d").val();
    


     $.ajax({
         type: "POST",
         url: "store_btc.php",
         data: {
             
             USD: USD,
             BTC: BTC,
             USD_a: USD_a,
             BTC_b: BTC_b,
             USD_c: USD_c,
             BTC_d: BTC_d
         },
         cache: false,
         success: function(data) {
             alert(data);
         },
         error: function(xhr, status, error) {
             console.error(xhr);
         }
     });
      
 });

});
</script> -->














<!-- <script>
        $(document).ready(function() {
 
            $("#submit").click(function() {
 
                var firstName = $("#firstName").val();
                var lastName = $("#lastName").val();
                var email = $("#email").val();
                var message = $("#message").val();
 
                if(firstName==''||lastName==''||email==''||message=='') {
                    alert("Please fill all fields.");
                    return false;
                }
 
                $.ajax({
                    type: "POST",
                    url: "store.php",
                    data: {
                        firstName: firstName,
                        lastName: lastName,
                        email: email,
                        message: message
                    },
                    cache: false,
                    success: function(data) {
                        alert(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
                 
            });
 
        });
    </script> -->








                <!-- <p id='info'></p>
    <p id='infotime'></p> -->



                <!-- <script>
                const getBtcData = async () => {
                    fetch('https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD')
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            document.getElementById("priceBTC").innerHTML = '<b>1 BTC = ' + data.USD +
                                ' USDT</b>'

                        });
                }
                getBtcData();
                tcount = setInterval(function() {
                    tcount++
                    if (tcount == 10) {
                        getBtcData();
                        tcount = 0
                    }
                    document.getElementById("infotimeBTC").innerHTML = 'Next update in ' + (10 - tcount) +
                        ' seconds'
                }, 1000);
                </script> -->







        <!-- <h1>hello
        <h2 id="stock-price" name="stock_price">---</h2>

    </h1> -->




                <script>
        let ws = new WebSocket('wss://stream.binance.com:9443/ws/ethusdt@trade');
        let stockPriceElement = document.getElementById('stock-price');
        let lastPrice = null;

        ws.onmessage = (event) => {
            let stockObject = JSON.parse(event.data);
            let price = parseFloat(stockObject.p).toFixed(2);
            stockPriceElement.innerText = price;
            // console.log(stockObject.p);
            // stockPriceElement.innerText = stockObject.p;

            stockPriceElement.style.color = !lastPrice || lastPrice === price ? 'black' : price > lastPrice ? 'green' : 'red';
            lastPrice = price;
        };
    </script>










<!-- <canvas id="chart" width="600" height="400"></canvas>




<script>
    let LINEDATA = [];
let data = [];
let labels = [];

graph();
setInterval("graph()", 30000);

function graph() {
    axios.get(`https://api.coindesk.com/v1/bpi/historical/close.json?start=${moment(new Date()).subtract(1, 'month').format('YYYY-MM-DD')}&end=${moment(new Date()).format('YYYY-MM-DD')}`)
    .then((response) => {
    LINEDATA = { ...response.data.bpi };
    data = Object.keys(LINEDATA).map(key => LINEDATA[key]);
    labels = Object.keys(LINEDATA);
      console.log(data);
      console.log(labels);
    new Chart(document.getElementById("chart"), {
      type: 'line',
      data: {
        labels: labels,
        datasets: [
          {
            label: 'Bitcoin',
            data: data,
            borderColor: "#3e95cd",
          }
        ]
      }
    });
  });
}
</script> -->









                <!-- <script type="text/javascript">

                window.onload = function() {

                    var chart = new CanvasJS.Chart("chartContainer", {

                        title: {
                            text: "USDT TO BTC"
                        },
                        axisX: {
                            title: "timeline",
                            // gridThickness: 1
                        },
                        axisY: {
                            title: "BTC PRICE"
                        },
                        data: [{
                            type: "area",
                            dataPoints: [ //array
                                {x: new Date(2022, 03, 1),y: 3},
                                {x: new Date(2022, 03, 2),y: 28},
                                {x: new Date(2022, 03, 3),y: 38},
                                {x: new Date(2022, 03, 4),y: 43},
                                {x: new Date(2022, 03, 5),y: 29},
                                {x: new Date(2022, 03, 6),y: 41},
                                {x: new Date(2022, 03, 7),y: 54},
                                {x: new Date(2022, 03, 8),y: 66},
                                {x: new Date(2022, 03, 9),y: 60},
                                {x: new Date(2022, 03, 10),y: 53},
                                {x: new Date(2022, 03, 11),y: 60},
                                {x: new Date(2022, 03, 12),y: 60},
                                {x: new Date(2022, 03, 13),y: 60},
                                {x: new Date(2022, 03, 14),y: 60},
                                {x: new Date(2022, 03, 15),y: 60},
                                {x: new Date(2022, 03, 16),y: 60},
                                {x: new Date(2022, 03, 17),y: 60},
                                {x: new Date(2022, 03, 18),y: 60},
                                {x: new Date(2022, 03, 19),y: 60},
                                {x: new Date(2022, 03, 20),y: 60},
                                {x: new Date(2022, 03, 21),y: 60},
                                {x: new Date(2022, 03, 22),y: 60},
                                {x: new Date(2022, 03, 23),y: 60},
                                {x: new Date(2022, 03, 24),y: 60},
                                {x: new Date(2022, 03, 25),y: 100},
                                {x: new Date(2022, 03, 26),y: 13444},
                                {x: new Date(2022, 03, 27),y: 1224},
                                {x: new Date(2022, 03, 28),y: 4574},
                                {x: new Date(2022, 03, 29),y: 23445},
                                {x: new Date(2022, 03, 30),y: 30000 }

                            ]
                        }]
                    });

                    chart.render();
                }
                </script> -->



                <!-- <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->




                <!-- <script>


                //var binanceSocket = new WebSocket("wss://stream.binance.com:9443/ws/btcusdt@trade");
                // var tradeDiv = document.getElementById('trades')

              //  binanceSocket.onmessage = function(event){
                 //   console.log(event.data);
                //    var messageObject = JSON.parse(event.data)
                 //   tradeDiv.append(messageObject.p)
              // }




</script> -->














        


  















    <!-- <script>
        let LINEDATA = [];
let data = [];
let labels = [];

graph();
setInterval("graph()", 30000);

function graph() {
  axios
    .get(
      `https://api.coindesk.com/v1/bpi/historical/close.json?start=${moment(
        new Date()
      )
        .subtract(1, "month")
        .format("YYYY-MM-DD")}&end=${moment(new Date()).format("YYYY-MM-DD")}`
    )
    .then((response) => {
      LINEDATA = { ...response.data.bpi };
      data = Object.keys(LINEDATA).map((key) => LINEDATA[key]);
      labels = Object.keys(LINEDATA);
      console.log(data);
      console.log(labels);
      new Chart(document.getElementById("chart"), {
        type: "line",
        data: {
          labels: labels,
          datasets: [
            {
              label: "Bitcoin",
              data: data,
              borderColor: "#3e95cd"
            }
          ]
        }
      });
    });
}

    </script> -->



    <!-- <canvas width="1280" height="720" id="canvas"></canvas> -->
<!-- <script>
var candlestickStream = new CandlestickStream( "btceur" , "5m" );
candlestickStream.start();
</script> -->




<!-- <script>


    pingpoliCandlestickChart.prototype.addTechnicalIndicator = function( indicator )
{
    indicator.onInit( this );
    this.technicalIndicators.push( indicator );
}



function MovingAverage( samples , color , lineWidth )
{
    this.samples = samples;
    this.color = color;
    this.lineWidth = lineWidth;
    this.data = [];
}



// gets triggered whenever the technical indicator is added to the chart class
MovingAverage.prototype.onInit = function( candlestickChart )
{
    for ( var i = 0 ; i < candlestickChart.candlesticks.length ; ++i )
    {
        // average the number of samples
        var avg = 0;
        var counter = 0;
        for ( var j = i ; j > i-this.samples && j >= 0 ; --j )
        {
            avg += candlestickChart.candlesticks[j].close;
            ++counter;
        }
        avg /= counter;
        this.data.push( avg );
    }
}



// gets triggered whenever a new candlestick is added
MovingAverage.prototype.onAddCandlestick = function( candlestickChart , candlestickID )
{
    // average the number of samples
    var avg = 0;
    var counter = 0;
    for ( var i = candlestickID ; i > candlestickID-this.samples && i >= 0 ; --i )
    {
        avg += candlestickChart.candlesticks[i].close;
        ++counter;
    }
    avg /= counter;
    this.data.push( avg );
}



// gets triggered whenever a candlestick is updated
MovingAverage.prototype.onUpdateCandlestick = function( candlestickChart , candlestickID )
{
    // average the number of samples
    var avg = 0;
    var counter = 0;
    for ( var i = candlestickID ; i > candlestickID-this.samples && i >= 0 ; --i )
    {
        avg += candlestickChart.candlesticks[i].close;
        ++counter;
    }
    avg /= counter;
    this.data[candlestickID] = avg;
}



// gets triggered whenever the chart is redrawn
MovingAverage.prototype.draw = function( candlestickChart )
{
    var oldLineWidth = candlestickChart.context.lineWidth;
    candlestickChart.context.lineWidth = this.lineWidth;
    for ( var i = candlestickChart.zoomStartID ; i < this.data.length-1 ; ++i )
    {
        candlestickChart.drawLine( candlestickChart.xToPixelCoords( candlestickChart.candlesticks[i].timestamp ) , candlestickChart.yToPixelCoords( this.data[i] ) , candlestickChart.xToPixelCoords( candlestickChart.candlesticks[i+1].timestamp ) , candlestickChart.yToPixelCoords( this.data[i+1] ) , this.color );
    }
    candlestickChart.context.lineWidth = oldLineWidth;
}






/*
Copyright 2022 Christian Behler

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
var _candlestickStream;

function CandlestickStream( symbol , interval )
{
    this.symbol = symbol;
    this.interval = interval;
    this.candlestickChart = new pingpoliCandlestickChart( "canvas" );
    this.webSocketConnected = false;
    this.webSocketHost = "wss://stream.binance.com:9443/ws/"+this.symbol+"@kline_"+this.interval;
    _candlestickStream = this;
}

CandlestickStream.prototype.start = function()
{
    // get a few recent candlesticks before starting the stream
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open( "GET" , "https://api.binance.com/api/v3/klines?symbol="+this.symbol.toUpperCase()+"&interval="+this.interval+"&limit=500" );
    xmlhttp.onreadystatechange = function()
    {
        if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) 
        {
            var json = JSON.parse( xmlhttp.responseText );

            for ( var i = 0 ; i < json.length ; ++i )
            {
                _candlestickStream.candlestickChart.addCandlestick( new pingpoliCandlestick( json[i][0] , json[i][1] , json[i][4] , json[i][2] , json[i][3] ) );
            }
            _candlestickStream.candlestickChart.addTechnicalIndicator( new MovingAverage( 5 , "#ffff00" , 2 ) );
            _candlestickStream.candlestickChart.draw();

            // start the websocket stream
            if ( !_candlestickStream.webSocketConnected )
            {
                _candlestickStream.webSocket = new pingpoliWebSocket( _candlestickStream.webSocketHost , _candlestickStream.onOpen , _candlestickStream.onMessage , _candlestickStream.onClose );
                _candlestickStream.webSocket.setOnErrorCallback( _candlestickStream.onWebSocketError );
            }
        }
    }
    xmlhttp.setRequestHeader( 'Content-Type' , 'application/x-www-form-urlencoded' );
    xmlhttp.send();
}

CandlestickStream.prototype.close = function()
{
    this.webSocket.close();
}

CandlestickStream.prototype.onOpen = function()
{
    this.webSocketConnected = true;
    console.log( "websocket connected" );
}

CandlestickStream.prototype.onMessage = function( msg )
{
    var json = JSON.parse( msg.data );
    var candlestick = json.k;
    var lastChartCandlestick = _candlestickStream.candlestickChart.candlesticks[_candlestickStream.candlestickChart.candlesticks.length-1];
    // check if the candlestick already exists in the chart
    if ( lastChartCandlestick.timestamp == candlestick.t )
    {
        // update the candlestick
        _candlestickStream.candlestickChart.updateCandlestick( _candlestickStream.candlestickChart.candlesticks.length-1 , candlestick.o , candlestick.c , candlestick.h , candlestick.l );
    }
    else
    {
        // if the candlestick does not exist in the chart, add a new one
        _candlestickStream.candlestickChart.addCandlestick( new pingpoliCandlestick( candlestick.t , candlestick.o , candlestick.c , candlestick.h , candlestick.l ) );
    }
    // update the chart
    _candlestickStream.candlestickChart.draw();
}

CandlestickStream.prototype.onClose = function()
{
    if ( this.webSocketConnected )
    {
        this.webSocketConnected = false;
        console.log( "websocket closed" );
    }
}

CandlestickStream.prototype.onWebSocketError = function( event )
{
    this.webSocketConnected = false;
    console.log( "custom websocket error function:" );
    console.log( event );
}


</script>
 -->








<!-- <script>    

        // URL connection
        const allTickers = new WebSocket("wss://testnet-dex.binance.org/api/ws/$all@allTickers");

// Or Subscribe method
const conn = new WebSocket("wss://testnet-dex.binance.org/api/ws");
conn.onopen = function(evt) {
    conn.send(JSON.stringify({ method: "subscribe", topic: "allTickers", symbols: ["$all"] }));
}

    {
  "stream": "allTickers",
  "data": [
    {
      "e": "24hrTicker",  // Event type
      "E": 123456789,     // Event time
      "s": "ABC_0DX-BNB",      // Symbol
      "p": "0.0015",      // Price change
      "P": "250.00",      // Price change percent
      "w": "0.0018",      // Weighted average price
      "x": "0.0009",      // Previous day's close price
      "c": "0.0025",      // Current day's close price
      "Q": "10",          // Close trade's quantity
      "b": "0.0024",      // Best bid price
      "B": "10",          // Best bid quantity
      "a": "0.0026",      // Best ask price
      "A": "100",         // Best ask quantity
      "o": "0.0010",      // Open price
      "h": "0.0025",      // High price
      "l": "0.0010",      // Low price
      "v": "10000",       // Total traded base asset volume
      "q": "18",          // Total traded quote asset volume
      "O": 0,             // Statistics open time
      "C": 86400000,      // Statistics close time
      "F": "0",           // First trade ID
      "L": "18150",       // Last trade Id
      "n": 18151          // Total number of trades
    },
    {
      ...
    }]
}

</script>



 -->



















    
  
  









<!-- </body> -->




</html>