<?php
$con=mysqli_connect("localhost","root","","cp");
$link = mysqli_select_db($con,'employee_shevon');

$query="SELECT `empcode`,`fullname`,`basicSal`,`designation` FROM `employee_shevon`";
$result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>EMPLOYEES</title>

    <style>
        .bg { 
            background-image: url("images/webpage.jpg");
            height: 500px;
            /* width:1000px; */
            background-position: right;
            background-repeat: no-repeat;
            background-size: cover;
            /*padding: 100px; */
        }
        table{
            /*background-color: #1ebb90;  */
            align-items: right;
            padding-left: 200px;
            padding-right: 50px;
            width: 1100px; 
            /*height: 600px; */
            padding-top: 50px;
            opacity: 0.8;
        }
        table tr td{
            width: 600px;
            font-size: 18px;
        }
        table th{
            text-decoration: underline;
            font-size: 20px;
            font-weight: bold;
            color: black;
        }
        .button{
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
            border-radius: 4px;
            background-color: #4CAF50;
            color: black;
            font-size: 18px;
        }
        .buttona{
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
            border-radius: 4px;
            background-color: orange;
            color: black;
            font-size: 20px;
            padding: 5px 20px;
            position: relative;
            left: 900px;
            top: 20px;
        }
    </style>
</head>
<body>
 <h2 style="color: #1ebb90; font-size:40px; padding-left:350px;">EMPLOYEE LIST</h2>

    <form id="employeeVIewAll" method="post" action="employeeVIewAll.php">
    <div class="bg">
    <input class="buttona" type="button" onclick="location.href='empPromoView.php';" value="Employee Mobility" />
    <input class="buttona" type="button" onclick="location.href='employeeAdd.php';" value="Create Employee" />
    <br>
    <br>
    <table align="center">
        <tr>
            <th>Employee code</th>
            <th>Employee Name</th>
            <th>Basic Salary</th>
            <th>Designation</th>
        </tr>
        <?php
            while($rows=mysqli_fetch_assoc($result))
            {
        ?>
        <tr>
            <td style="text-align:center"><?php echo $rows['empcode']; ?></td>
            <td style="text-align:center"><?php echo $rows['fullname']; ?></td>
            <td style="text-align:center"><?php echo $rows['basicSal']; ?></td>
            <td style="text-align:center"><?php echo $rows['designation']; ?></td>
            <td style="width: 1000px;"><input class="button" type="button" onclick="location.href='viewEmployee.php?id=<?php echo $rows['empcode'];?>';" value="View" />
            							<input class="button" type="button" onclick="location.href='updateEmployee.php?id=<?php echo $rows['empcode'];?>';" value="Update" />
            							<input class="button" type="button" onclick="location.href='deleteEmployee.php?id=<?php echo $rows['empcode'];?>';" value="Delete" />
            </td>
            
        </tr>
        <?php 
            }
        ?>
    </table>
    <!-- </form> -->
    </div>
    </form>
</body>
</html>
