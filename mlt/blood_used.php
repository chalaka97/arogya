<?php
include('../connection/connection.php');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  } 

$id = $_GET['id'];



$sql = "UPDATE `blood` SET `blood_status`='used' WHERE blood_id=$id";

($con->query($sql) === TRUE);


header("Location:../mlt/blood_view.php");
?>

