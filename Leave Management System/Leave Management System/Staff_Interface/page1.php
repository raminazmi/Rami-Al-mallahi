<?php
include ('../NavBar+Header/Header_Navbar.php'); 
include ("../NavBar+Header/config.php");
session_start();
$id = $_SESSION['user_id'];
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
    <?php 
    if (isset($_POST['Submit'])) {
            $gender = $_POST['Gender'];
            $birthday = $_POST['Birthday'];
            $fname = $_POST['First_name'];
            $lname = $_POST['Last_name'];
            $info = $_POST['info'];
            $country = $_POST['Country'];
            $email = $_POST['Email'];
            $city = $_POST['City'];
            $mobile = $_POST['Mobile'];
            $sql = mysqli_query($conn, "UPDATE employee SET  Gender ='$gender' ,
            Birthday = '$birthday' , First_name = '$fname' , Last_name = '$lname',
            info = '$info' , Country = '$country' , Email = '$email',City = '$city' ,
             Mobile = '$mobile' WHERE id = '$id' ");
            if ($sql) {
                echo "
            <div id='l'>
            <div class='cont' id='page1_take_action'>
                <div class='container2'>
                    <div class='container3'>
                        <i class='fas fa-times' onclick='goBack()'></i>
                        <div class='green'>
                            <h2>Employee has been edit successfully</h2>
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
?>
    <div class="cont" id="page1">
        <p>UPDATE EMPLOYEE DETALIS</p>
        <form method="post">
            <div class="container1">
                <div class="group">
                    <?php
                $sql = mysqli_query($conn, "SELECT * FROM employee where id = '$id'");
                $i = 1;
                while ($row = mysqli_fetch_assoc($sql)) {
                    ?>
                    <input type="text" value="<?php echo"$row[Emp_code]";?>" name="Emp_code" readonly>
                    <?php
                    }
                    ?>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Emploee Username</label>
                </div>
                <div class="group">
                    <select name="Gender">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="group">
                    <input type="date" value="2021-05-18" name="Birthday">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Date of Birth</label>
                </div>
                <br><br>
                <div class="F_L_Name">
                    <div class="group ">
                        <input type="text" name="First_name" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>First Name</label>
                    </div>
                    <div class="group ">
                        <input type="text" name="Last_name" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Last Name</label>
                    </div>
                </div>
                <div class="group">
                    <select name="info">
                        <option>information technology</option>
                        <option>operations</option>
                        <option>human resources</option>
                    </select>
                </div>
                <div class="group">
                    <input type="text" name="Country">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Country</label>
                </div>
                <br><br>
                <div class="group _email">
                    <input type="email" class="" name="Email" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Email</label>
                </div>
                <div class="group City_Town">
                    <input type="text" name="City">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>City/Town</label>
                </div>
                <br><br>
                <div></div>
                <div class="group Mobile_Number">
                    <input type="phone" maxlength="10" autocomplete="off" name="Mobile" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Mobile Number</label>
                </div>
                <input type="submit" value="UPDATE" class="_submit" name="Submit">
            </div>
        </form>
    </div>
    <script src="../../js/Employee.js"></script>
    <script>
    var white1 = document.getElementById("white1");
    white1.style.backgroundColor = "white";

    function goBack() {
        window.location.href = "page1.php";
    }
    </script>
</body>

</html>