<?php
include 'connection.php';
$query="select * from trade_his order by id desc limit 20"; // Fetch all the data from the table customers
$result=mysqli_query($con,$query);

// $result_rev = array_reverse($result, preserve_keys:true);

?>