<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "pojokatas";

  $kon = mysqli_connect($servername, $username, $password, $database);

  if (!$kon) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
?> 