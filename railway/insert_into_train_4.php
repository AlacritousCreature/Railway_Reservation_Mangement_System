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

        $sql = "INSERT INTO train (tname,sp,st,dp,dt,dd,distance) VALUES ('" . $_SESSION["tname"] . "','" . $_SESSION["sp"] . "','" . $_SESSION["st"] . "','" . $_SESSION["dp"] . "','" . $_SESSION["dt"] . "','" . $_SESSION["dd"] . "','" . $_SESSION["ds"] . "')";

        if ($conn->query($sql) === TRUE) {
            echo "New Train record created successfully<br><br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $cdquery = "SELECT trainno FROM train where tname='" . $_SESSION["tname"] . "' AND sp='" . $_SESSION["sp"] . "' AND dp='" . $_SESSION["dp"] . "'";
        $cdresult = mysqli_query($conn, $cdquery);
        $cdrow = mysqli_fetch_array($cdresult);
        $trainno = $cdrow['trainno'];

        $sql = "INSERT INTO schedule (trainno,sname,arrival_time,departure_time,distance) VALUES ('" . $trainno . "','" . $_SESSION["sp"] . "','" . $_SESSION["st"] . "','" . $_SESSION["st"] . "','0')";
        $flag = ($conn->query($sql));
        $temp = 1;
        while ($temp <= $_SESSION["ns"]) {
            $sql = "INSERT INTO schedule (trainno,sname,arrival_time,departure_time,distance) VALUES ('" . $trainno . "','" . $_POST["stn" . $temp] . "','" . $_POST["st" . $temp] . "','" . $_POST["dt" . $temp] . "','" . $_POST["ds" . $temp] . "')";
            $flag = ($conn->query($sql));
            $temp += 1;
        }
        $sql = "INSERT INTO schedule (trainno,sname,arrival_time,departure_time,distance) VALUES ('" . $trainno . "','" . $_SESSION["dp"] . "','" . $_SESSION["dt"] . "','" . $_SESSION["dt"] . "','" . $_SESSION["ds"] . "')";
        $flag = ($conn->query($sql));

        if ($flag === TRUE) {
            echo "New schedule added successfully<br><br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        echo "<br> <a href=\"admin_login.php\" style=\"text-decoration: none; 
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