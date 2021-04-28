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

    <form action="new_png.php" method="post">

        <?php

        session_start();

        require "db.php";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $mobile = $_POST["mno"];
        $pwd = $_POST["password"];

        $query = mysqli_query($conn, "SELECT * FROM user WHERE user.mobileno=$mobile AND user.password='" . $pwd . "' ") or die(mysql_error());
        if (mysqli_num_rows($query) == 0) {
            echo "No such login !!! <br> ";
            echo " <br><a href=\"enquiry_result.php\">Go Back!!!</a> <br>";
            die();
        }

        $row = mysqli_fetch_array($query);
        $temp = $row['id'];
        //echo $temp;
        //echo $_SESSION["doj"];
        $_SESSION["id"] = "$temp";
        $tno = $_POST["tno"];
        $_SESSION["tno"] = "$tno";
        $class = $_POST["class"];
        $_SESSION["class"] = "$class";
        $nos = $_POST["nos"];
        $_SESSION["nos"] = "$nos";

        echo "<table>";

        for ($i = 0; $i < $nos; $i++) {
            echo "<tr><td><input type='text' name='pname[]' placeholder=\"Passenger Name\" required></td><br> ";
            echo "<td><input type='text' name='page[]' placeholder=\"Passenger Age\" required></td><br>";
            echo "<td><input type='text' name='pgender[]' placeholder=\"Passenger Gender\" required></td></tr><br> ";
        }

        echo "</table>";

        //Enter Train No: <input type="text" name="tno" required><br>
        //Enter Class: <input type="text" name="class" required><br>

        echo "<a href=\"enquiry.php\">Back to Enquiry</a>";

        $conn->close();

        ?>

        <br><br><input type="submit" value="Book">
        <div id="footid"></div>
</body>

</html>