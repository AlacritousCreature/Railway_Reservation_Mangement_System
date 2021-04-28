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

    echo "
<table>
<thead><td>Train_no</td><td>Starting_Point</td><td>Destination_Point</td></thead>
<tr><td>" . $_GET["trainno"] . "</td><td>" . $_GET["sp"] . "</td><td>" . $_GET["dp"] . "</td></tr>
</table>
";

    echo "
<table>
<thead><td>Train_Class</td><td>Seats_Left</td><td>Fare_Per_Seat</td></thead>
";

    $cdquery = "SELECT classseats.class,classseats.seatsleft,classseats.fare FROM classseats WHERE classseats.trainno='" . $_GET["trainno"] . "' AND classseats.sp='" . $_GET["sp"] . "' AND classseats.dp='" . $_GET["dp"] . "'";
    $cdresult = mysqli_query($conn, $cdquery);

    while ($cdrow = mysqli_fetch_array($cdresult)) {
        echo "
<tr><td>" . $cdrow[0] . "</td><td>" . $cdrow[1] . "</td><td>" . $cdrow[2] . "</td></tr>
";
    }
    echo "</table>";

    echo " <br><a href=\"schedule.php?trainno=" . $_GET['trainno'] . "\">Go Back to Schedule!!!</a><br> ";
    echo " <br><a href=\"show_trains.php\">Go Back to Train Menu!!!</a><br> ";
    echo " <br><a href=\"admin_login.php\">Go Back to Admin Menu!!!</a> ";
    ?>
    <div id="footid"></div>
</body>

</html>