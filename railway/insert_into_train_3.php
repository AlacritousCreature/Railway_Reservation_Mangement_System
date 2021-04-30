<html>

<head>
	<title>IRRMS</title>
	<link rel="stylesheet" type="text/css" href="public/css/main.css">
	<link rel="icon" href="public/assets/rail.png" sizes="40x40" type="image/svg">
	<!-- Link to Bootstrap-->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

	<!-- Link to font awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script>
		$(function() {
			$("#navid").load("partials/header.php");
			$("#footid").load("partials/footer.php");
		});
	</script>
</head>

<body style="background-image: linear-gradient(-225deg, #B7F8DB 0%, #50A7C2 100%);">
	<div id="navid"></div>
	<div class="container" style="padding-top:10rem;">
	<?php
	echo "Enter a new Train Details!";
	session_start();

	require "db.php";

	if (isset($_POST["ns"])) {
		$ns = $_POST["ns"];
		$tname = $_POST["tname"];
		$_SESSION["tname"] = "$tname";
		$sp = $_POST["sp"];
		$_SESSION["sp"] = "$sp";
		$st = $_POST["st"];
		$_SESSION["st"] = "$st";
		$dp = $_POST["dp"];
		$_SESSION["dp"] = "$dp";
		$dt = $_POST["dt"];
		$_SESSION["dt"] = "$dt";
		$dd = $_POST["dd"];
		$_SESSION["dd"] = "$dd";
		$ns = $_POST["ns"];
		$_SESSION["ns"] = "$ns";
		$ds = $_POST["ds"];
		$_SESSION["ds"] = "$ds";

		echo "<table><thead><td>Train_name</td><td>Starting_point</td><td>Starting_time</td><td>Destination_point</td><td>Destination_time</td><td>Day_of_arrival</td><td>No_of_stations</td><td>Distance</td></thead>";
		echo "<tr><td>" . $tname . "</td><td>" . $sp . "</td><td>" . $st . "</td><td>" . $dp . "</td><td>" . $dt . "</td><td>" . $dd . "</td><td>" . $ns . "</td><td>" . $ds . "</td></tr></table>";

		echo " <table><thead><td>Station</td><td>Arrival_Time</td><td>Departure_Time</td><td>Distance</td></thead>";
		echo " <tr><td>" . $sp . "</td><td>" . $st . "</td><td>" . $st . "</td><td>0</td></tr>";

		echo "<form action=\"insert_into_train_4.php\" method=\"post\">";
		$temp = 1;
		while ($temp <= $ns) {
			echo " <tr><td><select id=\"stn" . $temp . "\" name=\"stn" . $temp . "\"required> ";

			$cdquery = "SELECT sname FROM station";
			$cdresult = mysqli_query($conn, $cdquery);

			echo " <option value = \"\" > </option>";

			while ($cdrow = mysqli_fetch_array($cdresult)) {
				$cdTitle = $cdrow['sname'];
				echo " <option value = \"$cdTitle\" > $cdTitle </option>";
			}

			echo "
	</select></td>
	<td><input type=\"text\" name=\"st" . $temp . "\" required></td>
	<td><input type=\"text\" name=\"dt" . $temp . "\" required></td>
	<td><input type=\"text\" name=\"ds" . $temp . "\" required></td>	
	</tr>";
			$temp += 1;
		}

		echo " <tr><td>" . $dp . "</td><td>" . $dt . "</td><td>" . $dt . "</td><td>" . $ds . "</td></tr></table>";
		echo "<input type=\"submit\">";
	} else if ($ns == 0) {
		echo "
<form action=\"insert_into_train_3.php\" method=\"post\">
<table>
<tr><td>Train Name </td><td> <input type=\"text\" name=\"tname\" required></td></tr>
<tr><td>Starting Point </td><td> <select id=\"sp\" name=\"sp\" required>
";

		$cdquery = "SELECT sname FROM station";
		$cdresult = mysqli_query($conn, $cdquery);

		while ($cdrow = mysqli_fetch_array($cdresult)) {
			$cdTitle = $cdrow['sname'];
			echo " <option value = \"$cdTitle\" > $cdTitle </option>";
		}

		echo "

</select></td></tr>

<tr><td>Starting Time </td><td> <input type=\"time\" name=\"st\" required></td></tr>

<tr><td>Destination Point </td><td> <select id=\"dp\" name=\"dp\" required>

";

		$cdquery = "SELECT sname FROM station";
		$cdresult = mysqli_query($conn, $cdquery);

		while ($cdrow = mysqli_fetch_array($cdresult)) {
			$cdTitle = $cdrow['sname'];
			echo " <option value = \"$cdTitle\" > $cdTitle </option>";
		}

		echo "
</select></td></tr>

<tr><td>Destination Time </td><td> <input type=\"time\" name=\"dt\" required></td></tr>

<tr><td>Distance </td><td> <input type=\"text\" name=\"ds\" required></td></tr>

<tr><td>No Of Intermediate stations</td><td><input type=\"text\" name=\"ns\" required></td></tr>

<tr><td>Day of Arrival </td><td> <input type=\"text\" name=\"dd\" required></td></tr>
</table>
<input type=\"submit\" value=\"Enter Train Details\">
";
	}

	echo "<br><br> <a href=\"admin_login.php\">Go Back to Admin Menu!!!</a> ";

	?>
	</div>
	<div id="footid"></div>
</body>

</html>