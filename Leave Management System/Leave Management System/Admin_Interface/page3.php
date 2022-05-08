<?php include("../NavBar+Header/config.php"); ?>
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

    <?php
    if (isset($_POST['EDIT'])) {
        $password = $_POST['Password'];
        $confirm_password = $_POST['confirm_password'];
        if ($password != $confirm_password) {
            echo "              
        <div id='l'>
        <div class='cont' id='page1_take_action'>
            <div class='container2'>
                <div class='container3'>
                    <i class='fas fa-times' onclick='myFunction1_take_action()'></i>
                    <div class='red'>
                        <h2>Passwords don't match !</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>";
        } elseif ($password == $confirm_password) {
            $id = $_POST['emp'];
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
            $sql = mysqli_query($conn, "UPDATE employee SET Emp_code = '$empid' , Gender ='$gender' ,
            Birthday = '$birthday' , First_name = '$fname' , Last_name = '$lname',
            info = '$info' , Country = '$country' , Email = '$email',City = '$city' ,
            Address = '$address' , Password = '$password' , Mobile = '$mobile' WHERE id = '$id' ");
            if ($sql) {
                echo "
            <div id='l'>
            <div class='cont' id='page1_take_action'>
                <div class='container2'>
                    <div class='container3'>
                        <i class='fas fa-times' onclick='myFunction1_take_action()'></i>
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
                    <i class='fas fa-times' onclick='myFunction1_take_action()'></i>
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
    if (isset($_GET['row_edit'])) {
        $id = $_GET['row_edit'];
        $sql = mysqli_query($conn, "SELECT * FROM employee where id = '$id' ");
        while ($row = mysqli_fetch_assoc($sql)) {
            echo "<div class='cont' id = 'page2'> 
        <p>UPDATE EMPLOYEE DETAILS</p>
        <form method='POST' action='page3.php'>
        <input type='hidden' name='emp' value ='$id'>
            <div class='container1'>
                <div class='group'>
                    <input type='text' name='Emp_code' required>
                    <span class='highlight'></span>
                    <span class='bar'></span>
                    <label>Employee Code (Must be unique)</label>
                </div>
                <div class=' group'>
                    <select name='Gender'>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class='group'>
                    <label>Birthdate</label>
                    <input type='date' value='2021-05-18' name='Birthday' required>
                </div>
                <br><br>
                <div class='F_L_Name'>
                    <div class='group'>
                        <input type='text' name='First_name' required>
                        <span class='highlight'></span>
                        <span class='bar'></span>
                        <label>First Name</label>
                    </div>
                    <div class='group'>
                        <input type='text' name='Last_name' required>
                        <span class='highlight'></span>
                        <span class='bar'></span>
                        <label>Last Name</label>
                    </div>
                </div>
                <div class='group'>
                    <select class='_select_' name='info'>
                        <option>information</option>
                        <option>operations</option>
                        <option>human resources</option>
                    </select>
                </div>
                <div class='group'>
                    <input type='text' name='Country'>
                    <span class='highlight'></span>
                    <span class='bar'></span>
                    <label>Country</label>
                </div>
                <br><br>
                <div class='group _email'>
                    <input type='email' name='Email' required>
                    <span class='highlight'></span>
                    <span class='bar'></span>
                    <label>Email</label>
                </div>
                <div class='group City_Town'>
                    <input type='text' name='City'>
                    <span class='highlight'></span>
                    <span class='bar'></span>
                    <label>City/Town</label>
                </div>
                <div class='group _Address'>
                    <input type='text' name='Address'>
                    <span class='highlight'></span>
                    <span class='bar'></span>
                    <label>Address</label>
                </div>
                <br><br>
                <div class='group _Password'>
                    <input type='password' name='Password' required>
                    <span class='highlight'></span>
                    <span class='bar'></span>
                    <label>Password</label>
                </div>
                <div class='group Mobile_Number_ADD_MPLOYEE'>
                    <input type='text' name='Mobile'>
                    <span class='highlight'></span>
                    <span class='bar'></span>
                    <label>Mobile Number</label>
                </div>
                <br><br>
                <div></div>
                <div class='group Confirm_Password'>
                    <input type='password' name='confirm_password' required>
                    <span class='highlight'></span>
                    <span class='bar'></span>
                    <label>Confirm Password</label>
                </div>
                <input type='submit' value='EDIT' class='_submit_ADD_MPLOYEE' name='EDIT'>
                <button value='CANCEL' class='_submit_CANCEL_MPLOYEE' onclick='goBack()'>CANCEL</button>
            </div>
            </form>
            <br>
        </div>";
        }
    } elseif (isset($_GET['row_del'])) {
        $id = $_GET['row_del'];
        $sql = mysqli_query($conn, " SELECT * from employee where id = $id ");
        $row = mysqli_fetch_assoc($sql);
        if (isset($_POST['DEL'])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $sql = mysqli_query($conn, "DELETE FROM employee WHERE id = $id");
                mysqli_close($conn);
                header("location:page3.php");
            }
        }
        echo "
        <div id='l'>
        <div class='cont' id='page1_take_action'>
            <div class='container2'>
                <div class='container4'>
                    <i class='fas fa-times' onclick='goBack()'></i>
                    <div class='green'>
                        <h2>The employee will be removed.are you sure?</h2>
                        <form method='POST' action=''>
                        <button class='_submit_ADD_MPLOYEE' name='DEL'>DELETE</button>
                        </form>
                        <button class='_submit_CANCEL_MPLOYEE' onclick='goBack()'>CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>";
    }
    ?>
    <div class="cont" id="page3">
        <p>MANAGE EMPLOYEE</p>
        <div class="container1">
            <label>Show</label>
            <br>
            <div class="flex">
                <select>
                    <option>1</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
                <input type="search" name="search" placeholder="Search Records">
                <i class="fas fa-search"></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>ISNo.</td>
                        <td>Emp id <i class="fas fa-chevron-up"></i> <i class="fas fa-chevron-down"></i></td>
                        <td>Emp Name <i class="fas fa-chevron-up"></i> <i class="fas fa-chevron-down"></i></td>
                        <td>Department <i class="fas fa-chevron-up"></i> <i class="fas fa-chevron-down"></i></td>
                        <td>Status <i class="fas fa-chevron-up"></i> <i class="fas fa-chevron-down"></i></td>
                        <td>RegDate <i class="fas fa-chevron-up"></i> <i class="fas fa-chevron-down"></i></td>
                        <td>Action</i></td>
                    </tr>
                </thead>
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM employee");
                $i = 1;
                while ($row = mysqli_fetch_assoc($sql)) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td class='normal_font'>" . $row['Emp_code'] . "</td>";
                    echo "<td>" . $row['First_name'] . " " . $row['Last_name'] . "</td>";
                    echo "<td>" . $row['info'] . "</td>";
                    echo "<td><span style='color:green'>Active</span></td>";
                    echo "<td>" . $row['Reg_date'] . "</td>";
                    echo "<td>
                            <div class='exist_edit'>
                            <a href='page3.php?row_edit=" . $row['id'] . "'><i class='fas fa-pen'></i></a>
                            <a href='?row_del=" . $row['id'] . "'><i class='fas fa-times'></i></a>
                            </div>
                            </td>";
                    echo "</tr>";
                    $i++;
                }
                ?>
            </table>
            <br>
            <div class="flex">
                <h3>Showing 1 to 2 of 2 entries</h3>
                <div class="Count">
                    <i class="fas fa-chevron-left"></i>
                    <h2>1</h2>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/Admin1.js"></script>
    <script>
    document.getElementById("toggle_visibility1").style.backgroundColor = "white";
    </script>
    <script>
    function goBack() {
        window.location.href = "page3.php";
    }
    </script>
</body>

</html>