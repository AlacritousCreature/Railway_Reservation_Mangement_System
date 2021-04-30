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
        <div class="row" style="display: flex;">
            <div class="col-6">
                <img style="flex: 50%;" src="public/assets/undraw_Traveling_re_weve.svg">
            </div>
            <div class="col-6">
                <?php
                session_start();
                if ($_POST["id"] == 'admin' and $_POST["password"] == 'admin') {
                    $_SESSION["admin_login"] = True;
                }

                if ($_SESSION["admin_login"] == True) {
                    echo "
                 <br>
                
                <a href=\"insert_into_stations.php\" style=\"text-decoration: none; 
                display: inline-block;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                color: #ffffff;
                background-color: rgb(2, 1, 58);
                border-radius: 50px;
                outline: whitesmoke;
                
                \">Show All Stations</a><br>
                <br><a href=\"show_trains.php\" style=\"text-decoration: none; 
                display: inline-block;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                color: #ffffff;
                background-color: rgb(2, 1, 58);
                border-radius: 50px;
                outline: whitesmoke;
                
                \">Show All Trains </a><br>
                <br><a href=\"show_users.php\" style=\"text-decoration: none; 
                display: inline-block;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                color: #ffffff;
                background-color: rgb(2, 1, 58);
                border-radius: 50px;
                outline: whitesmoke;
                
                \"> Show All Users </a><br>
                
                <br><a href=\"insert_into_train_3.php\" style=\"text-decoration: none; 
                display: inline-block;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                color: #ffffff;
                background-color: rgb(2, 1, 58);
                border-radius: 50px;
                outline: whitesmoke;
                
                \"> Enter New Train </a><br>
                <br><a href=\"insert_into_classseats_3.php\" style=\"text-decoration: none; 
                display: inline-block;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                color: #ffffff;
                background-color: rgb(2, 1, 58);
                border-radius: 50px;
                outline: whitesmoke;
                
                \"> Enter Train Schedule </a><br>
                <br><a href=\"booked.php\" style=\"text-decoration: none; 
                display: inline-block;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                color: #ffffff;
                background-color: rgb(2, 1, 58);
                border-radius: 50px;
                outline: whitesmoke;
                
                \"> View all booked tickets </a><br>
                <br><a href=\"cancelled.php\" style=\"text-decoration: none; 
                display: inline-block;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                color: #ffffff;
                background-color: rgb(2, 1, 58);
                border-radius: 50px;
                outline: whitesmoke;
                
                \"> View all cancelled tickets </a><br> ";
                } else {

                    echo "
                        <form action=\"admin_login.php\" method=\"post\">
                        User ID: <input type=\"text\" name=\"uid\" required><br><br>
                        Password: <input type=\"password\" name=\"password\" required><br><br>
                        <input type=\"submit\" type=\"button\" class=\"btn btn-success\">
                      
                        </form>
                        ";
                }



                ?>
                <br>
                <br>
            </div>

            <div class="row" style="display: flex;">
                <div class="column" style="flex: 40%;padding: 5px;"></div>
                <div class="column" style="flex: 20%;padding: 5px;">
                    <a href="index.htm" style="text-decoration: none; 
                        display: inline-block;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        color: #ffffff;
                        background-color: rgb(0, 102, 0);
                        border-radius: 50px;
                        outline: whitesmoke;
                        
                        ">Go to Home Page!!!</a>
                </div>
                <div class="column" style="flex: 40%;padding: 5px;"></div>
            </div>
            <!-- <br><div align="center"><a href="index.htm">Go to Home Page!!!</a></div> -->
        </div>
    </div>
    <div id="footid"></div>
</body>

</html>