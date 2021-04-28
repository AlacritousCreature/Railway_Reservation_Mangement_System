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

    session_start();

    require "db.php";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $mobile = $_POST["mno"];
    $pwd = $_POST["password"];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE user.mobileno=$mobile AND user.password='" . $pwd . "' ") or die(mysql_error());

    $temp1;
    $temp2;
    if ($row = mysqli_fetch_array($query)) {
        echo "Welcome ";
        $temp1 = $row['emailid'];
        $temp2 = $row['id'];
        echo "$temp1";
        echo "<br><br>";

        $query2 = mysqli_query($conn, " select * from user,resv where user.id=resv.id AND  user.mobileno=$mobile ") or die(mysql_error());

        echo "<table><thead><td>PNR</td><td>Train_no</td><td>Date_Of_Journey</td><td>Total_Fare</td><td>Train_Class</td><td>Seats_Reserved</td><td>Status</td></thead>";

        while ($row = mysqli_fetch_array($query2)) {
            echo "<tr><td>" . $row["pnr"] . "</td><td>" . $row["trainno"] . "</td><td>" . $row["doj"] . "</td><td>" . $row["tfare"] . "</td><td>" . $row["class"] . "</td><td>" . $row["nos"] . "</td><td>" . $row["status"] . "</td></tr>";
        }

        echo "</table>";

        if (mysqli_num_rows($query2) == 0) {
            echo "No Reservations Yet !!! <br><br> ";
        }
    }

    $_SESSION["id"] = $temp2;

    //$rowcount=mysqli_num_rows($result);
    if (mysqli_num_rows($query) == 0) {
        echo "Wrong Combination!!! <br><br> ";
        echo " <a href=\"index.htm\">Home Page</a><br>";
        die();
    }

    ?>

    <form action="cancel.php" method="post">
        Enter PNR for Cancellation: <input type="text" name="cancpnr" required><br><br>
        <input type="submit" value="Cancel"><br><br>
    </form>
    <?php

    echo " <a href=\"index.htm\">Home Page</a><br>";

    $conn->close();

    ?>
    <div id="footid"></div>
</body>

</html>