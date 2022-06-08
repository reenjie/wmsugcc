<?php 
session_start();
include 'connect.php';
if(isset($_POST['del'])){
	$id = $_POST['id'];

	$delteupdate = "DELETE FROM `updte_pages` WHERE pageID = '$id' ";
	mysqli_query($con,$delteupdate);
	
}

 ?>