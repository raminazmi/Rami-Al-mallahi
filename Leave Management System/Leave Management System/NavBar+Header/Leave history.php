<?php
error_reporting(0);
ini_set('display_errors', 0);
include("config.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="../../style/DASHBOARD.css">
    <link rel="stylesheet" href="../../css/all.min.css">
</head>

<body>
    <div class="cont" id="page1">
        <p><?php
            echo $title;
            ?>
        </p>
        <div class="container1">
            <table>
                <thead>
                    <tr>
                        <td>IS No.</td>
                        <td>Employe Name:</td>
                        <td>Leave Type:</td>
                        <td>Posting Date</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <?php
                $do = isset($_GET['do']) ? $_GET['do'] : 'control';
                if ($do == "control") {
                    $rows = mysqli_query($conn, "SELECT * FROM employee");
                    $i = 1;
                    foreach ($rows as $row) {
                        $sql = mysqli_query($conn, "SELECT * FROM `leave` where idleave = '$row[id]'");
                        foreach ($sql as $sqli) {
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td class='normal_font'>" . $row['First_name'] . " " . $row['Last_name'] . "</td>";
                            echo "<td>" . $sqli['Type_Leave'] . "</td>";
                            echo "<td>" . $sqli['positing_date'] . "</td>";
                            echo "<td>";
                            $Status = $sqli['Status'];
                            if ($Status == "Not Approved") {
                                echo "<span style='color : red'>" . $sqli['Status'] . "</span>";
                            } elseif ($Status == "Approved") {
                                echo "<span style='color : green'>" . $sqli['Status'] . "</span>";
                            } elseif ($Status == "waiting for Approval") {
                                echo "<span style='color: blue'>" . $sqli['Status'] . "</span>";
                            }
                            echo "</td>";
                            echo "<td>
                            <a href='?do=details&emp=".$sqli['Leave_id'] ."'><input type='submit' name='submit' value='VIEW DETAILS'onclick=' myFunction_view_page()'>
                            </td>";
                            echo "</tr>";
                            $i++;
                        }
                    }
                }
                ?>
            </table>
        </div>
    </div>
    <script src="../../js/Admin.js"></script>
    <script src="../../js/Admin1.js"></script>
</body>
</html>
<?php
if ($do == "details") {
    $emp = $_GET['emp'];
    $query = mysqli_query($conn, " SELECT * FROM `leave` WHERE Leave_id = '$emp' ");
    $sql = mysqli_fetch_assoc($query);
    $id = $sql['idleave'];
    $s = mysqli_query($conn, " SELECT * FROM `employee` WHERE id = '$id'");
    $row = mysqli_fetch_assoc($s);
    echo "<div id='page1_view_details'>
                <p>LEAVE DETAILS</p>
        <div class='container1'>
            <table>
                <thead>
                    <tr class='divdiv'>
                        <td>Employe Name:</td>
                        <td class='normal_font'>" . $row['First_name'] . " " . $row['Last_name'] . "</td>
                        <td>Emp UserName</td>
                        <td class='normal_font'>" . $row['Emp_code'] . "</td>
                        <td>Gender:</td>
                        <td class='normal_font'>" . $row['Gender'] . "</td>
                    </tr>
                </thead>
                <tr class='divdiv'>
                    <td>Emp Email:</td>
                    <td class='normal_font'>" . $row['Email'] . "</td>
                    <td>Emp Contact No. :</td>
                    <td class='normal_font'>" . $row['Mobile'] . "</td>
                    <td></td>
                    <td></td>
                </tr>";
                $sql = mysqli_query($conn, "SELECT * FROM `leave` where idleave = '$id' and Leave_id = '$emp'");
                foreach ($sql as $sqli) {
                echo "<tr class='divdiv'>
                    <td>Leave Type:</td>
                    <td class='normal_font'>" . $sqli['Type_Leave'] . "</td>
                    <td>Leave Date:</td>
                    <td class='normal_font'>From" . " " . $sqli['From_date'] . "<br>To" . " " . $sqli['To_date'] . "</td>
                    <td>Positing <br> Date</td>
                    <td class='normal_font'>" . $sqli['positing_date'] . "</td>
                </tr>
                <tr class='divdiv'>
                    <td>Employe Leave<br> Decription:</td>
                    <td class='normal_font'>" . $sqli['Descripton'] . "</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class='divdiv'>
                    <td>leave Status:</td>";
        echo "<td class='normal_font'>";
        $Status = $sqli['Status'];
        if ($Status == "Not Approved") {
            echo "<span style='color : red'>" . $sqli['Status'] . "</span>";
        } elseif ($Status == "Approved") {
            echo "<span style='color : green'>" . $sqli['Status'] . "</span>";
        } elseif ($Status == "waiting for Approval") {
            echo "<span style='color: blue'>" . $sqli['Status'] . "</span>";
        }
        echo "</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>";
    }
?>
<?php
    if (isset($_POST['SUBMIT'])) {
        $Status = $_POST['info'];
        $sql = mysqli_query($conn, "UPDATE `leave` SET Status = '$Status'  WHERE Leave_id = '$emp' ");
    }

    echo "</table>
            <input type='submit' value='TAKE ACTION' onclick='myFunction1_take_action()'>
        </div>
        </div>
</div>";
    echo "<div id='l'>
<div class='cont' id='page1_take_action'>
    <div class='container2' >
        <div class='container3'>
            <i class='fas fa-times'onclick='goBack()'></i>
            <form method='post' action=''>
                <h2>LEAVE TAKE ACTION</h2>
                <select class='_select_' name='info'>
                    <option>Choose Your Option</option>
                    <option>Approved</option>
                    <option>Not Approved</option>
                </select>
                <hr>
                <input type='submit' value='SUBMIT' class='button' name='SUBMIT'>
            </form>
        </div>
    </div>
</div>
</div>
<script src='../../js/Admin.js'></script>
<script src='../../js/Admin1.js'></script>
<script>
        var page1_view_details = document.getElementById('page1_view_details');
        var page1 = document.getElementById('page1');
        page1.style.display = 'none';
        document.getElementById('l').style.display = 'none';
        
    function myFunction_view_page() {
        if (page1_view_details.style.display == 'none') {
            page1_view_details.style.display = 'block';
            page1.style.display = 'none';
        } else {
            page1_view_details.style.display = 'none';
        }
       }
       function goBack() {
        window.location.href = 'page1.php';
    }
        </script>";
}

?>