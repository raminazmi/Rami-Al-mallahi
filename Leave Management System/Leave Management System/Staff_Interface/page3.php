<?php
include('../NavBar+Header/Header_Navbar.php');
session_start();
if (isset($_POST['Apply'])) {
    $idleave = $_SESSION['user_id'];
    $From_date = $_POST['From_date'];
    $To_date = $_POST['To_date'];
    $Type_Leave = $_POST['Type_Leave'];
    $Descripton = $_POST['Descripton'];
    $Date = new DateTime();
    $positing_date = $Date->format("y-m-j h:i:s");
    $Status = "waiting for Approval";

    if ($From_date > $To_date) {
        echo "
        <div id='l'>
        <div class='cont' id='page1_take_action'>
            <div class='container2'>
                <div class='container3'>
                    <i class='fas fa-times' onclick='goBack()'></i>
                    <div class='red'>
                        <h2>Sorry, the entry date is not correct!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>";
    } else {
        $query = mysqli_query($conn, "INSERT INTO `leave`(idleave,From_date,To_date,Type_Leave,Descripton,positing_date,Status)
                 VALUES ('$idleave','$From_date','$To_date','$Type_Leave','$Descripton','$positing_date','$Status')");

        if ($query) {
            echo "<div id='l'>
            <div class='cont' id='page1_take_action'>
                <div class='container2'>
                    <div class='container3'>
                        <i class='fas fa-times' onclick='goBack()'></i>
                        <div class='green'>
                            <h2>Your request has been sent successfully</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>";
        } else {
            echo "
        <div id='l'>
        <div class='cont' id='page1_take_action'>
            <div class='container2'>
                <div class='container3'>
                    <i class='fas fa-times' onclick='goBack()'></i>
                    <div class='red'>
                        <h2>Please Make Sure That The Information Is Correct!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Employee Leave Mangement System</title>
    <link rel="stylesheet" href="../../Style/Employee.css">
    <link rel="stylesheet" href="../../css/all.min.css">
</head>

<body>
    <div class="cont" id="page3">
        <p>APPLY LEAVE</p>
        <div class="container1">
            <form method="post" action="page3.php">
                <div class="From_To_Date">
                    <div class="group">
                        <input type="date" value="2021-05-18" name="From_date" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>From Date</label>
                    </div>
                    <div class="group">
                        <input type="date" value="2021-06-11" name="To_date" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>To Date</label>
                    </div>
                </div>
                <div class="group New">
                    <select name="Type_Leave" required>
                        <option>Select Leave Type.....</option>
                        <option>Casual Leave</option>
                        <option>Medical Leave Test</option>
                        <option>Restricted Holiday(RH)</option>
                    </select>
                </div>
                <div class="group Confirm">
                    <input type="text" name="Descripton" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Description</label>
                </div>
                <input type="submit" value="APPLY" class="_submit_" name="Apply">
            </form>
        </div>
    </div>
    <script src="../../js/Employee.js"></script>
    <script>
        document.getElementById("toggle_visibility").style.backgroundColor = "white"

        function goBack() {
            window.location.href = "page3.php";
        }
    </script>
</body>

</html>