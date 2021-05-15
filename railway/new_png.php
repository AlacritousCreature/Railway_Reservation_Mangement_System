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
    error_reporting(E_ERROR);
    session_start();

    require "db.php";

    $pname = $_POST["pname"];
    $page = $_POST["page"];
    $pgender = $_POST["pgender"];

    $tno = $_SESSION["tno"];
    $doj = $_SESSION["doj"];
    $sp = $_SESSION["sp"];
    $dp = $_SESSION["dp"];
    $class = $_SESSION["class"];
    //echo "$tno $doj $class";

    $query = " SELECT fare FROM classseats WHERE trainno='" . $tno . "' AND class='" . $class . "' AND doj='" . $doj . "' AND sp='" . $sp . "' AND dp='" . $dp . "'  ";
    $result = mysqli_query($conn, $query) or die(mysql_error());

    $row = mysqli_fetch_array($result);
    $fare = $row[0];
    //echo "$fare";
    $tempfare = 0;
    $temp = 0;

    for ($i = 0; $i < $_SESSION["nos"]; $i++) {
      if ($page[$i] >= 18) {
        $temp++;
        $tempfare += $fare;
      } else if ($page[$i] < 18)
        $tempfare += 0.5 * $fare;
      else if ($page[$i] >= 60)
        $tempfare += 0.5 * $fare;
    }
    //echo "   $tempfare";

    if ($temp == 0) {
      echo "<br><br>Atleast one adult must accompany!!!";
      echo "<br><br><a href=\"enquiry.php\">Back to Enquiry</a> <br>";
      die();
    }

    echo "<h3>Total fare is Rs." . $tempfare . "/-</h3>";

    $sql = "INSERT INTO resv(id,trainno,sp,dp,doj,tfare,class,nos) VALUES ('" . $_SESSION["id"] . "','" . $_SESSION["tno"] . "','" . $_SESSION["sp"] . "','" . $_SESSION["dp"] . "','" . $_SESSION["doj"] . "','" . $tempfare . "','" . $_SESSION["class"] . "','" . $_SESSION["nos"] . "' )";

    if ($conn->query($sql) === TRUE) {
      echo "<br><br>Reservation Successful";
    } else {
      echo "<br><br>Error: " . $conn->error;
    }

    $tid = $_SESSION["id"];
    $ttno = $_SESSION["tno"];
    $tdoj = $_SESSION["doj"];

    $query = " Select pnr from resv where id='" . $tid . "' AND trainno='" . $ttno . "' AND doj='" . $tdoj . "' ";
    $result = mysqli_query($conn, $query) or die(mysql_error());

    //echo "HI,here's your ticket details";
    //print_r($result);

    $row = mysqli_fetch_array($result);
    $rpnr = $row['pnr'];
    //echo " $rpnr ";

    $tpname = $_POST['pname'];
    //$ntpname = count($_REQUEST['pname']);
    $tpage = $_POST["page"];
    $tpgender = $_POST["pgender"];

    for ($i = 0; $i < $_SESSION["nos"]; $i++) {
      $sql = "INSERT INTO pd(pnr,pname,page,pgender) VALUES  ('" . $rpnr . "','" . $tpname[$i] . "','" . $tpage[$i] . "','" . $tpgender[$i] . "')";

      if ($conn->query($sql) === TRUE) {
        echo "<br><br>Passenger details added!!!";
      } else {
        echo "<br><br>Error: " . $conn->error;
      }

      //echo "Enter Passanger Name: <input type='text' name='pname[]' required> ";
      //echo "Enter Passanger Age: <input type='text' name='page[]' required>";
      //echo "Enter Passanger Gender: <input type='text' name='pgender[]' required> <br> ";
    }

    echo "<br><br><a href=\"index.htm\">Go Back!!!</a> <br>";

    $conn->close();
    ?>
  </div>
  <div id="footid"></div>
</body>

</html>