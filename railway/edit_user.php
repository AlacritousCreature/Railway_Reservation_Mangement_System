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

	<?php
	require "db.php";

	if ($_POST["emailid"] == "") {

		$cdquery = "SELECT * FROM user WHERE id='" . $_GET["id"] . "'";
		$cdresult = mysqli_query($conn, $cdquery);
		$cdrow = mysqli_fetch_array($cdresult);

		echo "
<table>
<thead><td>Id</td><td>Email_Id</td><td>Password</td><td>Mobile_no</td><td>Date_Of_Birth</td></thead>
";
		echo "
<tr><td>" . $cdrow["id"] . "</td>
<form action=\"edit_user.php?id=" . $_GET["id"] . "\" method=\"post\">
<td><input type=\"text\" name=\"emailid\" value=\"" . $cdrow["emailid"] . "\" required></td>
<td><input type=\"text\" name=\"password\" value=\"" . $cdrow["password"] . "\" required></td>
<td><input type=\"text\" name=\"mobileno\" value=\"" . $cdrow["mobileno"] . "\" required></td>
<td><input type=\"date\" name=\"dob\" value=\"" . $cdrow["dob"] . "\" required></td></tr>
";
		echo "</table><input value='Update Record' type=\"submit\"></form>";
	} else {
		$sql = "UPDATE `user` SET `emailid`='" . $_POST["emailid"] . "',`password`='" . $_POST["password"] . "',`mobileno`='" . $_POST["mobileno"] . "',`dob`='" . $_POST["dob"] . "' WHERE id='" . $_GET["id"] . "'";

		if ($conn->query($sql) === TRUE) {
			echo "User details updated successfully";
		} else {
			echo "Error:" . $conn->error;
		}
	}

	echo " <br><br><a href=\"show_users.php\">Go Back to User Menu!!!</a><br> ";
	echo " <br><a href=\"admin_login_1.php\">Go Back to Admin Menu!!!</a> ";

	$conn->close();
	?>

	<div id="footid"></div>
</body>

</html>