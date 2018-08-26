<?php
	
	include "dbinfo.php";
	if(isset($_POST['reallydelete'])) {
		$id = $_POST['id'];
	}
	
	$sql = "SELECT * FROM `phone_book` WHERE `id` = '$id'";	
	
	if ($result=mysqli_query($link, $sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$id=$row['id'];
			$first=$row['first_name'];
			$last=$row['last_name'];
			$phone=$row['telephone_number'];
		}
	}
	
	include "header.php";
	print_r('<h4>'.$first.' '.$last.' '.$phone.' has been permanently deleted.</h4>');
	
	$sql="DELETE FROM `phone_book` WHERE `id` = '$id'";
	$result=mysqli_query($link, $sql);
	
?>