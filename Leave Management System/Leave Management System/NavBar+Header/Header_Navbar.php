<?php
require_once('config.php');
$user_id= "";
$msg = "";
session_start();
if(isset($_COOKIE['token'])){
    $token = $_COOKIE['token'];
    $query = "SELECT * FROM auth WHERE token ='$token'";
    if($result = mysqli_query($conn,$query)){
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            $_SESSION['user_id'] = $user_id;
        }
    }
}
if(!isset($_SESSION['user_id'])){
    header("Location:Employee Login.php");
}else{
    $user_id = $_SESSION['user_id'];
}

if(isset($_POST['logout'])){
    require_once('config.php');
    session_unset();
    session_destroy();
    setcookie("token","",time()-(30*24*60*60),"/");
    $query = "DELETE FROM auth WHERE user_id = $user_id";
    if(mysqli_query($conn,$query)){
        header("Location:Employee Login.php");
    }else{
        $msg = "failed logout".mysqli_error($conn);
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
    <div class="head">
        Employee Leave Management System
    </div>
    <aside class="list">
        <div class="container">
            <img src="../../img/undraw_profile_pic_ic5t.png">
            <br>
            <div class="info">
            <?php
               echo"<h3>";
                $id = $_SESSION['user_id'];
                $sql = mysqli_query($conn, "SELECT * FROM employee where id = '$id'");
                while ($row = mysqli_fetch_assoc($sql)) {
                    echo"$row[First_name]"." "."$row[Last_name]";
                    echo"</h3>
                <h3>";
                    echo"$row[Emp_code]";
                echo"</h3>";
            }
            ?>
            </div>
            <br><br>
            <a href="page1.php">
                <div class="white" id="white1">
                    <i class="fas fa-portrait"><span>My Profiles</span></i>
                </div>
            </a>
            <a href="page2.php">
                <div class="white" id="white2">
                    <i class="fas fa-align-justify"><span>Change Password</span></i>
                </div>
            </a>
            <div class="white" id="toggle_visibility">
                <div onclick="toggle_visibility()">
                    <i class="fas fa-palette"><span>Leaves</span></i>
                    <i class="fas fa-chevron-right" id="list"></i>
                </div>
                <div id="Expando1">
                    <a href="page3.php">
                        <label>Apply Leave</label>
                        <br><br>
                    </a>
                    <a href="page4.php">
                        <label>Leave History</label>
                        <br><br>
                    </a>
                </div>
            </div>
            <div class="white">
                <i class="fas fa-sign-in-alt">
                    <span>
                        <form method="post" action="">
                                <input type="submit" value="Logout" name="logout">
                        </form>
                    </span>
                </i>
            </div>
        </div>
    </aside>
    <script src="../../js/Employee.js"></script>
</body>

</html>