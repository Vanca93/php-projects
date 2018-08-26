<?php
	
	if(isset($_POST['submit'])) {
		$first = ($_POST['first']);
		$last = ($_POST['last']);
		$phone = ($_POST['phone']);
		addData($first, $last, $phone);
	} else {
		printForm();
	}
	
	function addData($first, $last, $phone) {
		include("dbinfo.php");
		$query="INSERT INTO `phone_book` (`id`, `first_name`, `last_name`, `telephone_number`) VALUES(null, '".mysqli_real_escape_string($link, $_POST['first'])."', '".mysqli_real_escape_string($link, $_POST['last'])."', '".mysqli_real_escape_string($link, $_POST['phone'])."')";		
		$result = mysqli_query($link, $query);
		include("header.php");
	}
	
	function printForm() {
		$pageTitle = "Add Record";
		include("header.php");
		print_r('<form method="POST">
		  <div class="form-row">
			<div class="form-group col-md-6">
			  <input type="text" name="first" class="form-control" id="firstName" placeholder="First Name" required>
			</div>
			<div class="form-group col-md-6">
			  <input type="text" name="last" class="form-control" id="lastName" placeholder="Last Name" required>
			</div>
		  </div>
		  <div class="form-group">
			<input type="text" name="phone" class="form-control" id="phoneNumber" placeholder="Phone Number" required>
		  </div>
		  <button type="submit" name="submit" class="btn btn-primary">Add This Record</button>
		</form>');
	}
	
	

?>