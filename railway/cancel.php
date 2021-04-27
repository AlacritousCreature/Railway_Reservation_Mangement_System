<html>

<body style="">

    <?php

    session_start();

    require "db.php";

    $pnr = $_POST["cancpnr"];
    $uid = $_SESSION["id"];
    //echo "$uid";

    $sql = " UPDATE resv SET status ='CANCELLED' WHERE resv.pnr='" . $pnr . "' AND resv.id='" . $uid . "' ";

    if ($conn->query($sql) === TRUE) {
        echo "Cancellation Successful!!!";
    } else {
        echo "<br><br>Error:" . $conn->error;
    }

    echo " <br><br><a href=\"index.htm\">Home Page</a><br>";

    $conn->close();
    ?>

</body>

</html>