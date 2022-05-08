<?php
include ('../NavBar+Header/Heder+Navbar.php');
session_start();
$id = $_SESSION['user_id'];
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
    <?php
    if (isset($_POST['CHANGE'])) {
        $password = $_POST['pass_change'];
        $sql = mysqli_query($conn, "UPDATE admin SET password_admin = '$password' where admin_id = '$id' ");
    }
    if (isset($_POST['EDIT_PASS'])) {
        $password = $_POST['password_admin'];
        $sql = mysqli_query($conn, "SELECT * FROM admin where admin_id = '$id' ");
        $a = $_POST['password_admin'];
        $b = $_POST['confirm_password_admin'];
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

    <div class="cont" id="page5">
        <p>CHANGE PASSWORD</p>
        <div class="container1">
            <?php
            $rows = mysqli_query($conn, "SELECT * FROM admin where admin_id = '$id'");
            foreach ($rows as $row) {
            ?>
                <form method="post" action="page5.php">
                    <div class="group">
                        <input type="password" value="<?php echo ".$row[password_admin]."; ?>" readonly>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Old Password</label>
                    </div>
                    <div class="group New">
                        <input type="password" name="password_admin" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Enter New Password</label>
                    </div>
                    <div class="group Confirm">
                        <input type="password" name="confirm_password_admin" required>
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
    <script src="../../js/Admin1.js"></script>
    <script>
        var white4 = document.getElementById("white4");
        white4.style.backgroundColor = "white";

        function goBack() {
            window.location.href = "page5.php";
        }
    </script>
</body>

</html>