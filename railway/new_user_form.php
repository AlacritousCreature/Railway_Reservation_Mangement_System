<html>

<body style="">

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

</body>

</html>