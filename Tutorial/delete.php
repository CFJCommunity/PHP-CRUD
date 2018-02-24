<?php
error_reporting(E_ALL ^ E_NOTICE);
// include Database connection file 
include "./config/config.inc.php";

$nim = $_GET['id'];
$query = "DELETE FROM mahasiswa WHERE nim = '$nim'";

if (!$result = mysqli_query($con,$query)) exit(mysqli_error());
header('location: index.php');
?>