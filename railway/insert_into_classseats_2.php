<html>

<body style="">


    <?php

    require "db.php";

    $sql = "INSERT INTO classseats (trainno,doj,class,seatsleft,fare) VALUES ('" . $_POST["tno"] . "','" . $_POST["doj"] . "','" . $_POST["class"] . "','" . $_POST["seatsleft"] . "','" . $_POST["fps"] . "')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    echo "<br><br><a href=\"admin_login.php\">Go Back to Admin Menu!!!</a> ";

    $conn->close();
    ?>

</body>

</html>