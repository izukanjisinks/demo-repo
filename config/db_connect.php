<?php 
  $host = 'localhost';
  $user = 'izukanji';
  $password = '12345678';
  $database = 'ninja_pizza';

  $conn = mysqli_connect($host, $user, $password, $database);

  if($conn){
    
  }else{
   echo 'connection error: ' . mysqli_connect_error();
  }

?>