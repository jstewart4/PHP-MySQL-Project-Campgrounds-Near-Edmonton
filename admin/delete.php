<?php
session_start();
// to reverse the login of any statement, we can use the ! char
if (!isset($_SESSION['jaergijnaeir444'])) {
	//echo "NOT logged in";
	header("Location:login.php");
}
include ("../includes/mysql_connect.php");

// retrieve the query string variable that decides which character we are editing. This is MOST important!

$cid = $_GET['cid'];

if (isset($cid)) {
	mysqli_query($con, "DELETE FROM campgrounds WHERE cid = '$cid'") or die(mysqli_error($con));
}


header("Location:edit.php"); // ONLY do this if you have tested delete successfully

?>