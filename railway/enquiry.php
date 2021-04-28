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

    session_start();
    $_SESSION = array();
    session_destroy();

    ?>
    <div align="center">
        <form action="enquiry_result.php" method="post">
            <div class="container" style="padding-top:10rem;">
                Starting Point: <select id="sp" name="sp" required>

                    <?php

                    require "db.php";

                    $cdquery = "SELECT sname FROM station";
                    $cdresult = mysqli_query($conn, $cdquery);


                    echo " <option value = \"\" >
                    
                </option>";

                    while ($cdrow = mysqli_fetch_array($cdresult)) {
                        $cdTitle = $cdrow['sname'];

                        echo " <option value = \"$cdTitle\" >
                    $cdTitle
                </option>";
                    }
                    ?>

                </select>
                <br><br>

                Destination Point: <select id="dp" name="dp" required>

                    <?php

                    require "db.php";

                    $cdquery = "SELECT sname FROM station";
                    $cdresult = mysqli_query($conn, $cdquery);

                    echo " <option value = \"\" >
                    
                </option>";

                    while ($cdrow = mysqli_fetch_array($cdresult)) {
                        $cdTitle = $cdrow['sname'];

                        echo " <option value = \"$cdTitle\" >
                    $cdTitle
                </option>";
                    }
                    ?>

                </select>
                <br><br>

                Date of Journey: <input type="date" name="doj" required><br><br>
                <input type="submit" type="button" class="btn btn-success">
               
        </form>
        
        <div class="row" style="display: flex; padding: 20px">
            <div class="column" style="flex: 40%;padding: 5px;"></div>
            <div class="column" style="flex: 20%;padding: 5px;">
            <a href="index.htm"  style="text-decoration: none; 
                        display: inline-block;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        color: #ffffff;
                        background-color: rgb(2, 1, 58);
                        border-radius: 50px;
                        outline: whitesmoke;
                        
                        ">Go to Home Page!!!</a></div>
            <div class="column" style="flex: 40%;padding: 5px;"></div>
            </div>
        <!-- <br><br><a href="index.htm">Go to Home Page!!!</a> -->
    </div>
    <div id="footid"></div>
</body>

</html>