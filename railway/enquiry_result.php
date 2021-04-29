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

        $doj = $_POST["doj"];
        $_SESSION["doj"] = "$doj";
        $sp = $_POST["sp"];
        $_SESSION["sp"] = "$sp";
        $dp = $_POST["dp"];
        $_SESSION["dp"] = "$dp";

        $query = mysqli_query($conn, "SELECT t.trainno,t.tname,c.sp,s1.departure_time,c.dp,s2.arrival_time,t.dd,c.class,c.fare,c.seatsleft FROM train as t,classseats as c, schedule as s1,schedule as s2 where s1.trainno=t.trainno AND s2.trainno=t.trainno AND s1.sname='" . $sp . "' AND s2.sname='" . $dp . "' AND t.trainno=c.trainno AND c.sp='" . $sp . "' AND c.dp='" . $dp . "' AND c.doj='" . $doj . "' ");

        echo "<table><thead><td>Train No</td><td>Train_Name</td><td>Starting_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Day</td><td>Train_Class</td><td>Fare</td><td>Seats_Left</td></thead>";

        while ($row = mysqli_fetch_array($query)) {
            echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td><td>" . $row[7] . "</td><td>" . $row[8] . "</td><td>" . $row[9] . "</td></tr>";
        }
        echo "</table>";

        //$rowcount=mysqli_num_rows($query);
        if (mysqli_num_rows($query) == 0) {
            echo "<h5>No such train <h5><br><br><br> ";
        }
        ?>

        <h3>If you wish to proceed with booking fill in the following details:</h3><br><br>
        <form action="resvn.php" method="post">
            <h6>Registered Mobile No: <input type="text" name="mno" required><br><br>
                Password: <input type="password" name="password" required><br><br>
                Enter Train No: <input type="text" name="tno" required><br><br>
                Enter Class: <input type="text" name="class" required><br><br>
                No. of Seats: <input type="text" name="nos" required><br><br></h6>
            <input type="submit" value="Proceed with Booking" type="button" class="btn btn-warning"><br><br>
        </form>

        <?php

        echo " <a href=\"enquiry.php\">More Enquiry</a> <br>";

        $conn->close();
        ?>

        <br>

        <div class="row" style="display: flex; padding: 20px">
            <div class="column" style="flex: -10%;padding: 5px;"></div>
            <div align="left" class="column" style="flex: 50%;padding: 5px;">
            <a href="index.htm"  style="text-decoration: none; 
                        display: inline-block;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        color: #ffffff;
                        background-color: rgb(2, 1, 58);
                        border-radius: 50px;
                        outline: whitesmoke;
                        
                        ">Go to Home Page!!!</a></div>
            </div>
            </div>

            
    </div>
    <div id="footid"></div>

</body>

</html>