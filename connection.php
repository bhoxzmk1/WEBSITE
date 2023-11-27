<?php 
//   $servername='localhost';
//   $username='root';
//   $password='';
//   $dbname = "my_db_mk2";
//   $conn=mysqli_connect($servername,$username,$password,"$dbname");
//     if(!$conn){
//         die('Could not Connect MySql Server:' .mysqli_error());

//       }


$servername = "localhost";
$username = "root";
$password = "";
$database = "test";
// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// echo "Connected successfully";




// $con = mysqli_connect('localhost', 'root', '', 'test6');
?>

