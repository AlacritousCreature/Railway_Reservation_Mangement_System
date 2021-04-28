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

    $pwd = $_POST["password"];
    $eid = $_POST["emailid"];
    $mno = $_POST["mobileno"];
    $dob = $_POST["dob"];

    $sql = "INSERT INTO user (password,emailid,mobileno,dob) VALUES ('" . $pwd . "','" . $eid . "','" . $mno . "','" . $dob . "')";
    // echo $sql;

    if ($conn->query($sql) === TRUE) {
        echo "Hi $eid, <a href=\"index.htm\"> Click here </a> to browse through our website!!! ";
    } else {
        echo "Error:" . $conn->error . "<br> <a href=\"new_user_form.html\">Go Back to Login!!!</a> ";
    }

    $conn->close();
    ?>
    <div id="footid"></div>
</body>

</html>