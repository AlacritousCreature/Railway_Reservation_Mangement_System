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

    require "db.php";

    $cdquery = "SELECT * FROM user";
    $cdresult = mysqli_query($conn, $cdquery);
    echo "
<table>
<thead><td>Id</td><td>Email_Id</td><td>Password</td><td>Mobile_no</td><td>Date_Of_Birth</td><td></td><td></td></thead>
";

    while ($cdrow = mysqli_fetch_array($cdresult)) {
        echo "
<tr><td>" . $cdrow[0] . "</td><td>" . $cdrow[1] . "</td><td>" . $cdrow[2] . "</td><td>" . $cdrow[3] . "</td><td>" . $cdrow[4] . "</td><td><a href=\"http://localhost/railway/edit_user.php?id=" . $cdrow[0] . "\"><button>Edit</button></a></td><td><a href=\"http://localhost/railway/delete_user.php?id=" . $cdrow[0] . "\"><button>Delete</button></a></td></tr>
";
    }
    echo "</table>";

    echo " <br><a href=\"new_user_form.html\" style=\"text-decoration: none; 
    display: inline-block;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    color: #ffffff;
    background-color: rgb(2, 1, 58);
    border-radius: 50px;
    outline: whitesmoke;
    
    \"> Add New User </a><br> ";
    echo " <br><a href=\"admin_login.php\" style=\"text-decoration: none; 
    display: inline-block;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    color: #ffffff;
    background-color: rgb(0, 102, 0);
    border-radius: 50px;
    outline: whitesmoke;
    
    \"> Go Back to Admin Menu!!!</a> ";
    ?>
    </div>
    <div id="footid"></div>
</body>

</html>