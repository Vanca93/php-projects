<?php

	include "dbinfo.php";	
	if(isset($_POST['search'])) {
		$search = $_POST['search'];
	}
	
	$sql = "SELECT * FROM phone_book WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR telephone_number LIKE '%$search%' ORDER BY first_name ASC";
	
	if ($result=mysqli_query($link, $sql)) {
		$number=mysqli_num_rows($result);
		$pageTitle="Search Results";
		include "header.php";
		print_r('<h3>Search Results</h3>
			<h4>'.$number.' result(s) found searching for '.$search.'</h4>');
		
		while ($row = mysqli_fetch_array($result)) {
			$id=$row['id'];
			$first=$row['first_name'];
			$last=$row['last_name'];
			$phone=$row['telephone_number'];
		
			print_r('<table class="table table-dark">
					<tbody>
						<tr>
							<td>'.$first.'</td>
							<td>'.$last.'</td>
							<td>'.$phone.'</td>
							<td>
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