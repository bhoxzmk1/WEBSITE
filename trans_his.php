<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

    <title></title>
</head>
<body>
<nav class="navbar navbar-dark bg-primary shadow-sm">
  <div class="container">
      
    <a class="navbar-brand" href="trans_his.php">
      <img src="wallet.png" alt="" width="30" height="24" class="d-inline-block align-text-top"> TEST WALLET</a>
    <a class="btn btn-sm btn-danger" href="wallet.php">logout</a>
   
  </div>
</nav>

<div class="container">
<div id="menu_bar" class="d-flex justify-content-between col-7 m-auto mt-3">
<button type="button" class="btn btn-primary">
  Wallet <span class="badge bg-secondary"><?=$bal_php?>PHP</span>
</button>

<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#send_money">
Send Money
</button>
</div>








<!-- <div id="trans_list"> -->
<?php
// $user=$_SESSION['userdata'];
// $balance = $user['balance']=getCreditedBalance($user['id'])- getDebitedBalance($user['id']);
// $history = $user['trans_history']=getTransHistory($user['id']);

// foreach($history as $trans){
//   $suffix="";
//     if($trans['from_user_id']==$user['id']){
//         $color="danger";
// $suffix= "to ".getUserById($trans['to_user_id'])['full_name']." (".getUserById($trans['to_user_id'])['mobile'].") " ;
//     }else{
//         $color="success";

// $suffix= "from ".getUserById($trans['from_user_id'])['full_name']." (".getUserById($trans['from_user_id'])['mobile'].") " ;

//     }
    ?>


<!-- <div class="card col-7 shadow rounded m-auto mt-3">
  <div class="card-body d-flex justify-content-between align-items-center">
    <div>
    <h6 class=" mb-2 text-muted"><?=$suffix?></h6>
    <p class="card-text"><?=$trans['created_at']?></p>
</div>
<h4 class="card-title text-<?=$color?>"><b><?=$color=='danger'?'-':'+'?> <?=$trans['amount']?> Rs</b></h4>
  </div>
</div> -->

    <?php
// }

?>



<!-- </div>



</div> -->












<?php
// require_once 'wallet.php';
// require 'connection.php';
// require 'controllerUserData.php';





// if(isset($_SESSION['bal_php'])){
//   echo "balance".($_SESSION['bal_php'])."" ;
// }else{
//   echo "error";
// }












?>







<div class="modal fade" id="send_money" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send Money</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">



      <div>
     <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Email</span>
  <input type="text" class="form-control" id="user_email" placeholder="enter user email..." aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Amount</span>
  <input type="text" class="form-control" id="amount" placeholder="enter amount to send..." aria-label="Username" aria-describedby="basic-addon1">
</div>
</div>
<div class="d-flex justify-content-center">
<div class="spinner-border" role="status"  id="loading" style="display:none">
  <span class="visually-hidden">Loading...</span>
</div>
</div>

<div class="alert alert-success" role="alert" id="s_msg" style="display:none">
</div>
<div class="alert alert-danger" role="alert" id="e_msg" style="display:none">
</div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send Money</button>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>


</body>
</html>




