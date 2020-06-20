<?php

$connect = mysqli_connect("localhost","root","root","HNG");
 //CHECK CONNECTION
 if (!$connect) {
     die('could not connect to server' . mysqli_error());
 } 
  if (mysqli_connect_errno()){
     echo "failed to connect to MYSQL:" . mysqli_connect_error();
  }




  ?>
