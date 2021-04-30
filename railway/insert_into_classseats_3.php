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
		error_reporting(E_ERROR);
		session_start();

		require "db.php";
		// $_POST["tno"]=0;
		
		if ($_POST["tno"]) {
			$trainno = $_POST["tno"];
			$_SESSION["trainno"] = "$trainno";
			$doj = $_POST["doj"];
			$_SESSION["doj"] = "$doj";

			$cdquery = "SELECT * FROM train where trainno='" . $trainno . "'";
			$cdresult = mysqli_query($conn, $cdquery);
			$cdrow = mysqli_fetch_array($cdresult);

			echo "<table><thead><td>Train_no</td><td>Train_name</td><td>Starting_point</td><td>Starting_time</td><td>Destination_point</td><td>Destination_time</td><td>Day_of_arrival</td><td>Distance</td><td>Date_Of_Journey</td></thead>";
			echo "<tr><td>" . $cdrow[0] . "</td><td>" . $cdrow[1] . "</td><td>" . $cdrow[2] . "</td><td>" . $cdrow[3] . "</td><td>" . $cdrow[4] . "</td><td>" . $cdrow[5] . "</td><td>" . $cdrow[6] . "</td><td>" . $cdrow[7] . "</td><td>" . $doj . "</td></tr></table>";

			$cdquery = "SELECT sname FROM schedule where trainno='" . $trainno . "' ORDER BY distance ASC  ";
			$cdresult = mysqli_query($conn, $cdquery);
			$stations = array();
			$i = 0;
			while ($cdrow = mysqli_fetch_array($cdresult)) {
				$stations[$i] = $cdrow["sname"];
				$i += 1;
			}

			$_SESSION["ns"] = $i - 1;

			$_SESSION["stations"] = $stations;

			echo " <table><thead><td>Starting Point</td><td>Destination Point</td><td>AC1 seats</td><td>AC1 Fare</td><td>AC2 seats</td><td>AC2 Fare</td><td>AC3 seats</td><td>AC3 Fare</td><td>CC seats</td><td>CC Fare</td><td>EC seats</td><td>EC Fare</td><td>SL seats</td><td>SL Fare</td></thead>";

			echo "<form action=\"insert_into_classseats_4.php\" method=\"post\">";
			$temp = 0;

			while ($temp <= $_SESSION["ns"]) {
				$_SESSION["st" . $temp] = $stations[$temp];
				$temp += 1;
			}

			$temp = 0;
			while ($temp < $_SESSION["ns"]) {
				echo " <tr><td>" . $stations[$temp] . "</td>
	<td>" . $stations[$temp + 1] . "</td>
	<td><input type=\"text\" name=\"s1" . $temp . "\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f1" . $temp . "\" value=\"0\" required></td>	
	<td><input type=\"text\" name=\"s2" . $temp . "\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f2" . $temp . "\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"s3" . $temp . "\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f3" . $temp . "\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"s4" . $temp . "\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f4" . $temp . "\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"s5" . $temp . "\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f5" . $temp . "\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"s6" . $temp . "\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f6" . $temp . "\" value=\"0\" required></td>
	</tr>";
				$temp += 1;
			}
			
			echo "</table><input type=\"submit\" type=\"button\" class=\"btn btn-success\"></form>";
		} else {
			echo "
			<form action=\"insert_into_classseats_3.php\" method=\"post\">
			<table>
			<thead><td>Train</td><td>Date Of Journey</td></thead>
			<tr><td><select id=\"tno\" name=\"tno\" required>";

			$query = "SELECT * FROM train";
			$result = mysqli_query($conn, $query);

			while ($row = mysqli_fetch_array($result)) {
				$tno = $row['trainno'];
				$tn = $row['tname'] . " starting at " . $row['sp'];
				echo " <option value = \"$tno\" > $tn </option> ";
			}

			echo "</select></td>
					<td><input type=\"date\" name=\"doj\" required></td></tr>
					</table>
					<input type=\"submit\" type=\"button\" style=\"text-decoration: none; 
					display: inline-block;
					padding: 15px 32px;
					text-align: center;
					text-decoration: none;
					color: #ffffff;
					background-color: rgb(2, 1, 58);
					border-radius: 50px;
					outline: whitesmoke;

					\" value=\"Enter Train Details\">
					";
		}

		echo "<br><br> <a href=\"admin_login.php\" style=\"text-decoration: none; 
						display: inline-block;
						padding: 15px 32px;
						text-align: center;
						text-decoration: none;
						color: #ffffff;
						background-color: rgb(0, 102, 0);
						border-radius: 50px;
						outline: whitesmoke;
						
						\">Go Back to Admin Menu!!!</a> ";

		?>
	</div>
	<div id="footid"></div>
</body>

</html>