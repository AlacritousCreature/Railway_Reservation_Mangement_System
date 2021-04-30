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
		session_start();


		require "db.php";

		$stations = $_SESSION["stations"];

		$temp = 0;
		while ($temp < $_SESSION["ns"]) {
			if ($_POST["s1" . $temp] > 0) {
				$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('" . $_SESSION["trainno"] . "','" . $_SESSION["st" . $temp] . "','" . $_SESSION["st" . ($temp + 1)] . "','" . $_SESSION["doj"] . "','AC1','" . $_POST["s1" . $temp] . "','" . $_POST["f1" . $temp] . "')";
				$flag = ($conn->query($sql));
			}
			if ($_POST["s2" . $temp] > 0) {
				$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('" . $_SESSION["trainno"] . "','" . $_SESSION["st" . $temp] . "','" . $_SESSION["st" . ($temp + 1)] . "','" . $_SESSION["doj"] . "','AC2','" . $_POST["s2" . $temp] . "','" . $_POST["f2" . $temp] . "')";
				$flag = ($conn->query($sql));
			}
			if ($_POST["s3" . $temp] > 0) {
				$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('" . $_SESSION["trainno"] . "','" . $_SESSION["st" . $temp] . "','" . $_SESSION["st" . ($temp + 1)] . "','" . $_SESSION["doj"] . "','AC3','" . $_POST["s3" . $temp] . "','" . $_POST["f3" . $temp] . "')";
				$flag = ($conn->query($sql));
			}
			if ($_POST["s4" . $temp] > 0) {
				$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('" . $_SESSION["trainno"] . "','" . $_SESSION["st" . $temp] . "','" . $_SESSION["st" . ($temp + 1)] . "','" . $_SESSION["doj"] . "','CC','" . $_POST["s4" . $temp] . "','" . $_POST["f4" . $temp] . "')";
				$flag = ($conn->query($sql));
			}
			if ($_POST["s5" . $temp] > 0) {
				$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('" . $_SESSION["trainno"] . "','" . $_SESSION["st" . $temp] . "','" . $_SESSION["st" . ($temp + 1)] . "','" . $_SESSION["doj"] . "','EC','" . $_POST["s5" . $temp] . "','" . $_POST["f5" . $temp] . "')";
				$flag = ($conn->query($sql));
			}
			if ($_POST["s6" . $temp] > 0) {
				$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('" . $_SESSION["trainno"] . "','" . $_SESSION["st" . $temp] . "','" . $_SESSION["st" . ($temp + 1)] . "','" . $_SESSION["doj"] . "','SL','" . $_POST["s6" . $temp] . "','" . $_POST["f6" . $temp] . "')";
				$flag = ($conn->query($sql));
			}

			$temp += 1;
		}

		if ($flag === TRUE) {
			echo "New seat arrangement added successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		echo "<br> <a href=\"admin_login.php\" style=\"display: inline-block;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		color: #ffffff;
		background-color: rgb(0, 102, 0);
		border-radius: 50px;
		outline: whitesmoke;\">Go Back to Admin Menu!!!</a> ";

		?>
	</div>
	<div id="footid"></div>
</body>

</html>