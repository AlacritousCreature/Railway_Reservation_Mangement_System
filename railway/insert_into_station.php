<html>

<body style="">


    <?php

    require "db.php";

    $sql = "INSERT INTO station(sname) VALUES ('" . $_POST["sname"] . "')";

    if ($conn->query($sql) === TRUE) {
        echo " '" . $_POST["sname"] . "':New record created successfully";
    } else {
        echo "Error:" . $conn->error;
    }

    echo "<br> <a href=\"admin_login.php\">Go Back to Admin Menu!!!</a> ";

    $conn->close();
    ?>

</body>

</html>