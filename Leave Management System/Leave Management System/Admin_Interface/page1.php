<?php
include('../NavBar+Header/Heder+Navbar.php');
include ("../NavBar+Header/config.php");
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>LEAVE MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="../../style/DASHBOARD.css">
    <link rel="stylesheet" href="../../css/all.min.css">
</head>

<body>
    <div class="cont" id="page">
        <div class="top">
            <div class="div_top">
                <h3>TOTLE &nbsp; REGD&nbsp; EMPLOYEE</h3>
                <?php
                $result = mysqli_query($conn ,"SELECT * FROM employee ");
                $num_rows = mysqli_num_rows($result);
                echo"<h2> $num_rows </h2>";
                ?>
            </div>
            <div class="div_top">
                <h3>TOTLE &nbsp; DEPARTMENTS</h3>
                <?php
                $result = mysqli_query($conn ,"SELECT * FROM `admin` ");
                $num_rows = mysqli_num_rows($result);
                echo"<h2> $num_rows </h2>";
                ?>
            </div>
            <div class="div_top">
                <h3>TOTLE &nbsp; LEAVE&nbsp; APPLECATION</h3>
                <?php
                $result = mysqli_query($conn ,"SELECT * FROM `leave` ");
                $num_rows = mysqli_num_rows($result);
                echo"<h2> $num_rows </h2>";
                ?>
            </div>
        </div>
        <br>
        <?php
        $title = "LATEST LEAVE APPLECATION";
        include('../NavBar+Header/Leave history.php');
        ?>
    </div>
    <script>
    document.getElementById("white1").style.backgroundColor = "white";
    </script>
</body>

</html>