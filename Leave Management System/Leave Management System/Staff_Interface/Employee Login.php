<?php
session_start();
include("../NavBar+Header/config.php");
$msg = "";
if(isset($_COOKIE['token'])){
    $token = $_COOKIE['token'];
    $query = "SELECT * FROM auth where token = '$token'";
    if($result = mysqli_query($conn,$query)){
      while($row = mysqli_fetch_assoc($result)){
        $user_id = $row['user_id'];
        $_SESSION['user_id'] = $user_id;
      }
    }
}

if(isset($_SESSION['user_id'])){
    header("Location:page1.php");
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM employee WHERE Email = '$email'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $user_id = $row['id'];
        $user_password = $row['Password'];
        if($password == $user_password ){
          $_SESSION['user_id'] = $user_id;
          if(isset($_POST['remember'])){
            $token = openssl_random_pseudo_bytes(8);
            $token = bin2hex($token);
            setcookie("token",$token,time()+(30*24*60*60),"/");
            $query = "INSERT INTO auth(user_id,token) VALUES ($user_id,'$token')";
            if(mysqli_query($conn,$query)){
              header("Location:page1.php");
            }else{
              echo "            
              <div id='l'>
              <div class='cont' id='page1_take_action'>
              <div class='container2'>
                <div class='container3'>
                    <i class='fas fa-times' onclick='goBack()'></i>
                    <div class='red'>
                        <h2>Error</h2>
                    </div>
                </div>
              </div>
              </div>
              </div>
              </div>";
            }
          }
          header("Location:page1.php");
        }else{
           echo "              
          <div id='l'>
          <div class='cont' id='page1_take_action'>
          <div class='container2'>
            <div class='container3'>
                <i class='fas fa-times' onclick='goBack()'></i>
                <div class='red'>
                    <h2>Incorrect Email or Password!</h2>
                </div>
            </div>
          </div>
          </div>
          </div>
          </div>";
        }
      }
    }else{
      echo "              
      <div id='l'>
      <div class='cont' id='page1_take_action'>
      <div class='container2'>
        <div class='container3'>
            <i class='fas fa-times' onclick='goBack()'></i>
            <div class='red'>
                <h2>Incorrect Email or Password!</h2>
            </div>
        </div>
      </div>
      </div>
      </div>
      </div>";    
    }
  }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>EMPLOYEE LOGIN</title>
    <link rel="stylesheet" href="../../Style/LoginStyle.css">
    <link rel="stylesheet" href="../../css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Leave Management System</h1>
        <form action="" method="post">
            <h2>EMPLOYEE LOGIN</h2>
            <div class="group">
                <input type="email" name="email" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Enter Employee Username</label>
            </div>
            <div class="group">
                <input type="password" name="password" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Enter Password</label>
            </div>
            <div class="remmember">
                <input type="checkbox" name="remember">
            </div>
            <h5>remwmber login?</h5>
            <br>
            <input type="submit" value="LOGIN" name="login" class="button" />
        </form>
    </div>
    <script>
    function goBack() {
        window.location.href = "Employee Login.php";
    }
    </script>
</body>
</html>