<?php
	$error = ""; $success = "";
	if ($_POST) {
		if (!$_POST["email"]) {
			$error .= "An email address is required.<br>";
		}
		if (!$_POST["subject"]) {	
			$error .= "The subject field is required.<br>";
		}
		if (!$_POST["content"]) {	
			$error .= "The content field is required.<br>";
		}
		if (!$_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
			$error .= "The email address is invalid.<br>";
		}
		if ($error != "") {
			$error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>'.$error.'</div>';
		} else {
			$emailTo = "email@email.com";
			$subject = $_POST["subject"];
			$content = $_POST["content"];
			$headers = "From: ".$_POST["email"];
			if (mail($emailTo, $subject, $content, $headers)) {
				$success = '<div class="alert alert-success" role="alert">Your message was sent successfully!</div>';
			} else {
				$error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent - try again later!</div>';
			}
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<title>Hello, world!</title>
</head>
<body>
	<div class="container">
		<h1>Get in touch!</h1>
		<div id="error"><?php echo $error.$success; ?></div>
		<form method="post">
			<div class="form-group">
				<label for="email">Email address</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
				<label for="subject">Subject</label>
				<input type="text" class="form-control" id="subject" name="subject">
			</div>
			<div class="form-group">
				<label for="content">What would you like to ask us?</label>
				<textarea class="form-control" id="content" name="content" rows="3"></textarea>
			</div>
			<button type="submit" id="submit" class="btn btn-primary">Submit</button>
		</form>
	<div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$("form").submit(function(e){
			let error = "";
			if ($("#email").val() == "") {
				error += "The email field is required.<br>";
			}
			if ($("#subject").val() == "") {	
				error += "The subject field is required.<br>";
			}
			if ($("#content").val() == "") {	
				error += "The content field is required.";
			}
			if (error != "") {	
				$("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
				return false;
			} else {
				return true;
			}
		});
	</script>
</body>
</html>