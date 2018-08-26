<?php

	require "dbinfo.php";
	$sql="SELECT * FROM `phone_book` ORDER BY first_name ASC";
	$pageTitle = "Open Phonebook";
	include("header.php");
	
	if ($result=mysqli_query($link, $sql)) {
		print_r('<div class="table-responsive-md"><table class="table table-bordered table-dark">
					<thead>
						<tr class="d-flex">
							<th class="col-3">First Name</th>
							<th class="col-3">Last Name</th>
							<th class="col-6">Phone Number</th>
						</tr>
					</thead>
				</table></div>');
		while ($row = mysqli_fetch_array($result)) {
			$id = $row['id'];
			$first = $row['first_name'];
			$last = $row['last_name'];
			$phone = $row['telephone_number'];
			print_r('<table class="table table-dark">
					<tbody>
						<tr class="d-flex">
							<td class="col-3">'.$first.'</td>
							<td class="col-3">'.$last.'</td>
							<td class="col-3">'.$phone.'</td>
							<td class="col-3">
								<form method="POST" action="confirmdelete.php">
								<input type="hidden" name="sel_record" value="'.$id.'">
								<input type="submit" name="delete" value="Delete">
								</form>
							</td>
						</tr>
					</tbody>
				</table>');
		}
	}
	
?>