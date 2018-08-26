<?php
	$weather = "";
	$error = "";
	if (array_key_exists('city', $_GET)) {
		$city = str_replace(' ', '', $_GET['city']);
		$file_headers = @get_headers("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
		if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
			$error = "That city could not be found.";
		} else {
		$forecastPage = file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
		$pageArray = explode ('Weather Today </h2>(1&ndash;3 days)</span><p class="b-forecast__table-description-content"><span class="phrase">', $forecastPage);
			if (sizeof($pageArray) > 1) {
				$secondPageArray = explode ('</span>', $pageArray[1]);
				if (sizeof($secondPageArray) > 1) {
					$weather = $secondPageArray[0];
				} else {
					$error = "That city could not be found.";
				}
			} else {
				$error = "That city could not be found.";
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
    <title>Weather checker</title>
	<style type="text/css">
		html { 
			background: url(https://images.unsplash.com/photo-1524410411359-24e9a0aa7076?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=00ae8ec957379832eb16396ddcb43c36&auto=format&fit=crop&w=750&q=80) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		body {
			background: none;
		}
		.container {
			text-align: center;
			margin-top: 100px;
			width: 450px;
		}
		input {	
			margin: 20px 0;
		}
		#weather {	
			margin-top: 15px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Check The Weather?</h1>
		<form>
			<div class="form-group">
				<label for="city">Enter the name of a city.</label>
				<input type="text" class="form-control" id="city" name="city" placeholder="Eg. London, Tokyo" value="<?php if (array_key_exists('city', $_GET)) { echo $_GET['city']; } ?>">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<div id="weather">
			<?php if ($weather) { echo '<div class="alert alert-success" role="alert">'.$weather.'</div>'; } else if ($error) { echo '<div class="alert alert-danger" role="alert">'.$error.'</div>'; } ?>
		</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>