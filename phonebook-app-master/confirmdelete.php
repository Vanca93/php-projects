<?php

	require "dbinfo.php";
	if(isset($_POST['delete'])) {
		$sel_record = $_POST['sel_record'];
	}
	
	$sql = "SELECT * FROM `phone_book` WHERE `id` = '$sel_record'";
	
	if ($result=mysqli_query($link, $sql)) {
		while ($record = mysqli_fetch_array($result)) {
			$id=$record['id'];
			$first=$record['first_name'];
			$last=$record['last_name'];
			$phone=$record['telephone_number'];
		}
	}
	
	$pageTitle = "Delete Record";
	include "header.php";
	
	print_r(
		'<h2>Are you sure you want to delete this record permanently?</h2>
		<ul class="list-group">
			<li class="list-group-item">Name: '.$first.' '.$last.'</li>
			<li class="list-group-item">Phone: '.$phone.'</li>
		</ul>
		<p><form method="POST" action="reallydelete.php">
			<div class="form-row">
				<div class="form-group col-md-6">
					<button type="submit" name="reallydelete" class="btn btn-danger">Delete</button>
				</div>
				<div class="form-group col-md-6">
					<input type="hidden" name="id" value="'.$id.'" class="form-control">
				</div>
			</form></p>
	');

?>