<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "pojok_atas_cafe";

  $konek = mysqli_connect($servername, $username, $password, $database);

  if (!$konek) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // else{
  //   echo "konek cuyh";
  // }
  
?> 