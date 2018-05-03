<?php

// Connect to DB: Since all files depend on this, this will be included in our header, which is then included in all files.
$con = mysqli_connect("localhost", "(DATABASE_USERNAME)", "(DATABASE_PASSWORD)", "jstewart39_2025");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//This stops SQL Injection in POST vars 
  foreach ($_POST as $key => $value) { 
    $_POST[$key] = mysqli_real_escape_string($con, $value); 
  } 

  //This stops SQL Injection in GET vars 
  foreach ($_GET as $key => $value) { 
    $_GET[$key] = mysqli_real_escape_string($con, $value); 
  }

  // using a constant (basically the same as a variable (stores a value)) to set the Base URL.
  define("BASE_URL", "http://jstewart39.dmitstudent.ca/dmit2025/catalogproject/");

  //error_reporting(E_ALL);// will show unindexed variables; you can declare them first (if(isset($myvar))) to remove this error.
  //error_reporting(E_ALL ^ E_NOTICE); to report everything except notice. Somewhat sloppy, but minimizes the work.
  error_reporting(E_ALL ^ E_NOTICE);
?>