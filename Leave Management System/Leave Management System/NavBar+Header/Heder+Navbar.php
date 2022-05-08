<?php
include('config.php');
$user_id= "";
$msg = "";
session_start();
if(isset($_COOKIE['token'])){
    $token = $_COOKIE['token'];
    $query = "SELECT * FROM auth_admin WHERE token ='$token'";
    if($result = mysqli_query($conn,$query)){
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            $_SESSION['user_id'] = $user_id;
        }
    }
}
if(!isset($_SESSION['user_id'])){
    header("Location:Admin_Login.php");
}else{
    $user_id = $_SESSION['user_id'];
}


if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    setcookie("token","",time()-(30*24*60*60),"/");
    $query = "DELETE FROM auth_admin WHERE user_id = $user_id";
    if(mysqli_query($conn,$query)){
        header("Location:Admin_Login.php");
    }else{
        $msg = "failed logout".mysqli_error($conn);
    }

}
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
    <div class="head">
        Employee Leave Management System
    </div>
    <aside class="list">
        <div class="container">
            <img src="../../img/undraw_profile_pic_ic5t.png">
            <br>
            <div class="info">
            <?php
               echo"<h1>";
                $id = $_SESSION['user_id'];
                $sql = mysqli_query($conn, "SELECT * FROM `admin` where admin_id = '$id'");
                while ($row = mysqli_fetch_assoc($sql)) {
                    echo"$row[name_admin]";
                    echo"</h1>";
            }
            ?>
            </div>
            <br><br>
            <a href="page1.php">
                <div class="white" id="white1">
                    <i class="fas fa-tachometer-alt"><span>Dasboard</span></i>
                    <br>
                </div>
            </a>
            <div class="white" id="toggle_visibility1">
                <div onclick="toggle_visibility1()">
                    <i class="fas fa-portrait"><span>Employees</span></i>
                    <i class="fas fa-chevron-right" id="i_ADD_EMPLOYEE"></i>
                </div>
                <div id="Expando1">
                    <a href="page2.php">
                        <div>
                            <label>Add Employee</label>
                            <br><br>
                        </div>
                    </a>
                    <a href="page3.php">
                        <div>
                            <label>Manage Employee</label>
                            <br><br>
                        </div>
                    </a>
                </div>
            </div>
            <div class="white" id="toggle_visibility2">
                <div onclick="toggle_visibility2()">
                    <i class="fas fa-desktop"><span>Leaves Mangement</span></i>
                    <i class="fas fa-chevron-right" id="i_ADD_EMPLOYEE2"></i>
                </div>
                <div id="Expando2">
                    <a href="page4.php">
                        <label>All Leaves</label>
                        <br><br>
                    </a>
                </div>
            </div>
            <a href="page5.php">
                <div class="white" id="white4">
                    <i class="fas fa-palette"><span>Change Password</span></i>
                </div>
            </a>
            <div class="white">
                <i class="fas fa-sign-in-alt">
                    <span>
                        <form method="post">
                            <input type="submit" value="Logout" name="logout">
                        </form>
                    </span>
                </i>
            </div>
            <br>
        </div>
    </aside>
    <script src="../../js/Admin.js"></script>
</body>

</html>