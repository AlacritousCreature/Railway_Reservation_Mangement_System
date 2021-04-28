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
    <div class="container" style="padding-top:5rem;">
        <div align="center">

            <?php
            session_start();
            if ($_POST["uid"] == 'admin' and $_POST["password"] == 'admin') {
                $_SESSION["admin_login"] = True;
            }

            if ($_SESSION["admin_login"] == True) {
                echo "
                 <br>
                <a href=\"insert_into_stations.php\">Show All Stations</a><br>
                <br><a href=\"show_trains.php\"> Show All Trains </a><br>
                <br><a href=\"show_users.php\"> Show All Users </a><br>
                <br><a href=\"insert_into_train_3.php\"> Enter New Train </a><br>
                <br><a href=\"insert_into_classseats_3.php\"> Enter Train Schedule </a><br>
                <br><a href=\"booked.php\"> View all booked tickets </a><br>
                <br><a href=\"cancelled.php\"> View all cancelled tickets </a><br> ";
            } else {

                echo "
<form action=\"admin_login.php\" method=\"post\">
User ID: <input type=\"text\" name=\"uid\" required><br>
Password: <input type=\"password\" name=\"password\" required><br>
<input type=\"submit\">
</form>
";
            }


            ?>
            <br><a href="index.htm">Go to Home Page!!!</a>
        </div>
    </div>
    <div id="footid"></div>
</body>

</html>