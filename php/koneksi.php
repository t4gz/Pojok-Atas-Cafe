<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "pojokatas";

  $konek = mysqli_connect($servername, $username, $password, $database);

  if (!$konek) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // else{
  //   echo "konek cuyh";
  // }
  
?> 