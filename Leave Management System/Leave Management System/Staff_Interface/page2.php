<?php
include ('../NavBar+Header/Header_Navbar.php');
include ('../NavBar+Header/config.php'); 
session_start();
$id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Employee Leave Mangement System</title>
    <link rel="stylesheet" href="../../style/Employee.css">
    <link rel="stylesheet" href="../../css/all.min.css">
</head>

<body>
    <?php
    if (isset($_POST['CHANGE'])) {
        $password = $_POST['pass_change'];
        $sql = mysqli_query($conn, "UPDATE employee SET Password = '$password' where id = '$id'");
    }
    if (isset($_POST['EDIT_PASS'])) {
        $password = $_POST['password_emp'];
        $sql = mysqli_query($conn, "SELECT * FROM employee where id = '$id' ");
        $a = $_POST['password_emp'];
        $b = $_POST['confirm_password_emp'];
        if ($a != $b) {
            echo "<div id='l'>
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
        } else {
            echo "
    <div id='l'>
    <div class='cont' id='page1_take_action'>
        <div class='container2'>
            <div class='container4'>
                <i class='fas fa-times' onclick='goBack()' ></i>
                <div class='green'>
                    <h2>Are you sure?</h2>
                    <form method='POST' action=''>
                    <input type='hidden' name='pass_change' value ='$password'>
                    <button class='_submit_ADD_MPLOYEE' name='CHANGE'>CHANGE</button>
                    </form>
                    <button class='_submit_CANCEL_MPLOYEE' onclick='goBack()'>CANCEL</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>";
        }
    }

    ?>

    <div class="cont" id="page2">
        <p>CHANGE PASSWORD</p>
        <div class="container1">
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM employee where id = '$id'");
            foreach ($rows as $row) {
            ?>
                <form method="post" action="page2.php">
                    <div class="group">
                        <input type="password" value="<?php echo "$row[Password]"; ?>" readonly >
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Old Password</label>
                    </div>
                    <div class="group New">
                        <input type="password" name="password_emp" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Enter New Password</label>
                    </div>
                    <div class="group Confirm">
                        <input type="password" name="confirm_password_emp" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Enter Confirm Password</label>
                    </div>
                    <input type="submit" value="CHANGE" class="_submit" name="EDIT_PASS">
                </form>
            <?php
            }
            ?>
        </div>
    </div>
    <script src="../../js/Employee.js"></script>
    <script>
        var white2 = document.getElementById("white2");
        white2.style.backgroundColor = "white";
    </script>   
    <script>
        function goBack() {
            window.location.href = "page2.php";
        }
    </script>
</body>

</html>