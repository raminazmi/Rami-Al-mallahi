<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>LEAVE MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="../../style/DASHBOARD.css">
    <link rel="stylesheet" href="../../css/all.min.css">
</head>

<body>
    <?php include('../NavBar+Header/Heder+Navbar.php'); ?>
    <?php include("../NavBar+Header/config.php"); ?>
    <div class="cont" id="page2">
        <p>ADD EMPLOYEE</p>
        <form method="POST" action="page2.php">
            <div class="container1">
                <div class="group">
                    <input type="text" name="Emp_code" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Employee Code (Must be unique)</label>
                </div>
                <div class="group">
                    <select name="Gender">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="group">
                    <input type="date" value="2021-05-18" name="Birthday" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Birthdate</label>
                </div>
                <br><br>
                <div class="F_L_Name">
                    <div class="group">
                        <input type="text" name="First_name" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>First Name</label>
                    </div>
                    <div class="group">
                        <input type="text" name="Last_name" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Last Name</label>
                    </div>
                </div>
                <div class="group">
                    <select class="_select_" name="info">
                        <option>information</option>
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
                    <input type="text" class="" name="City">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>City/Town</label>
                </div>
                <div class="group _Address">
                    <input type="text" class="" name="Address">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Address</label>
                </div>
                <br><br>
                <div class="group _Password">
                    <input type="password" class="" name="Password" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Password</label>
                </div>
                <div class="group Mobile_Number_ADD_MPLOYEE">
                    <input type="text" name="Mobile">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Mobile Number</label>
                </div>
                <br><br>
                <div></div>
                <div class="group Confirm_Password">
                    <input type="password" class="" name="confirm_password" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Confirm Password</label>
                </div>
                <input type="submit" value="ADD" class="_submit_ADD_MPLOYEE" name="submit">
            </div>
        </form>
    </div>
    <script src="../../js/Admin.js"></script>
    <script src="../../js/Admin1.js"></script>
    <script>
        document.getElementById("toggle_visibility1").style.backgroundColor = "white";
        function goBack() {
            window.location.href = "page2.php";
        }
    </script>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
        $password = $_POST['Password'];
        $confirm_password = $_POST['confirm_password'];
        if ($password != $confirm_password) {
            echo "              
    <div id='l'>
    <div class='cont' id='page1_take_action'>
        <div class='container2'>
            <div class='container3'>
                <i class='fas fa-times' onclick='goBack()'></i>
                <div class='red'>
                    <h2>Passwords don't match !</h2>
                </div>
            </div>
        </div>
    </div>
</div>
</div>";
    }
    elseif($password == $confirm_password){
        $empid = $_POST['Emp_code'];
        $gender = $_POST['Gender'];
        $birthday = $_POST['Birthday'];
        $fname = $_POST['First_name'];
        $lname = $_POST['Last_name'];
        $info = $_POST['info'];
        $country = $_POST['Country'];
        $email = $_POST['Email'];
        $city = $_POST['City'];
        $address = $_POST['Address'];
        $mobile = $_POST['Mobile'];
        $Date = new DateTime();
        $Reg_date = $Date->format("y-m-j h:i:s");
        $sql = mysqli_query($conn, "INSERT INTO employee(Emp_code,Gender,Birthday,First_name,Last_name,info,Country,Email,City,Address,Password,Mobile,Reg_date)
        VALUES('$empid','$gender','$birthday','$fname','$lname','$info','$country','$email','$city','$address',$password,'$mobile','$Reg_date')");
        if ($sql) {
        echo "<div id='l'>
        <div class='cont' id='page1_take_action'>
            <div class='container2'>
                <div class='container3'>
                    <i class='fas fa-times' onclick='goBack()'></i>
                    <div class='green'>
                        <h2>Employee has been added successfully</h2>
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