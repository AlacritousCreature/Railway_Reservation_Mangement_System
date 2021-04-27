<html>

<body style="">

    <?php

    require "db.php";

    $sql = "DELETE from user where id= ('" . $_GET["id"] . "')";
    echo $_GET["id"];

    if ($conn->query($sql) === TRUE) {
        echo " '" . $_POST["sname"] . "': Record deleted successfully";
    } else {
        echo "Error:" . $conn->error;
    }

    echo "<br> <a href=\"admin_login.php\">Go Back to Admin Menu!!!</a> ";

    $conn->close();
    ?>

</body>

</html>