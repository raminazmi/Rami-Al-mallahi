<?php
session_start();
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
<?php include('../NavBar+Header/Header_Navbar.php'); ?>
<?php include("../NavBar+Header/config.php"); ?>

<div class="cont" id="page4">
        <p>LEAVE HISTORY</p>
        <div class="container1">
            <label>Show</label>
            <br>
            <div class="flex">
                <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
                <input type="text" name="search" placeholder="Search Records">
                <i class="fas fa-search"></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>ISNo.</td>
                        <td>Type of Leave<i class="fas fa-chevron-up"></i> <i class="fas fa-chevron-down"></i></td>
                        <td>From <i class="fas fa-chevron-up"></i> <i class="fas fa-chevron-down"></i></td>
                        <td>To <i class="fas fa-chevron-up"></i> <i class="fas fa-chevron-down"></i></td>
                        <td>Description <i class="fas fa-chevron-up"></i> <i class="fas fa-chevron-down"></i></td>
                        <td>Posting Date<i class="fas fa-chevron-up"></i> <i class="fas fa-chevron-down"></i></td>
                        <td>Status<i class="fas fa-chevron-up"></i> <i class="fas fa-chevron-down"></i></td>
                    </tr>
                </thead>
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM `leave` where idleave = '$_SESSION[user_id]' ");
                $i = 1;                
                while ($row = mysqli_fetch_assoc($sql)) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td class='normal_font'>" .$row['Type_Leave']. "</td>";
                    echo "<td>" . $row['From_date'] . "</td>";
                    echo "<td>" . $row['To_date'] . "</td>";
                    echo "<td>" . $row['Descripton'] ."</td>";
                    echo "<td>" . $row['positing_date'] ."</td>";
                    echo "<td>";
                    $Status = $row['Status'];
                    if($Status == "Not Approved"){
                        echo"<span style='color : red'>".$row['Status']."</span>";
                    } elseif($Status == "Approved"){
                        echo"<span style='color : green'>".$row['Status']."</span>";
                    } elseif($Status == "waiting for Approval"){
                        echo"<span style='color: blue'>".$row['Status']."</span>";
                    }
                    echo"</td>";
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
<script src="../../js/Employee.js"></script>
<script>
            document.getElementById("toggle_visibility").style.backgroundColor = "white";
    </script>
</body>
</html>