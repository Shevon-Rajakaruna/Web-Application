<?php
$con=mysqli_connect("localhost","root","","cp");
$link = mysqli_select_db($con,'employee_shevon');

$empcode = $_GET['id'];

$query="SELECT * FROM `employee_shevon` WHERE `empcode` = '$empcode'";
$result = mysqli_query($con,$query);

// $rows=mysqli_fetch_assoc($result)
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <title>VIEW EMPLOYEES</title>
	<style>
        table{
            background-color: #4d99ce;
            align-items: center;
            padding-left: 30px;
            padding-right: 30px;
/*             width: 200px; */
            height: 500px;
            padding-top: 0px;
            opacity: 0.8;
        }
        table input[type=text]{
            padding: 3px;
            border:2px solid black;
            font-size: 14px;
            font-family: 'Arial', sans-serif;
            width: 420px;
            border-spacing:20px ;
        }
        table tr td{
            width: 200px;
            font-size: 17px;
        }
        table th{
            text-decoration: underline;
            font-size: 24px;
            font-weight: bold;
        }
        table input[type=submit]{
            float: right;
            background: orange;
            border-radius: 0 5px 5px 0;
            cursor:pointer;
            position: relative;
            padding: 7px;
            font-family: 'Arial', sans-serif;
            border: none;
            font-size: 16px;
            width: 170px;
            border: 2px solid black;
        }
        table  h2{
            font-size: large;
            border: 5px solid deeppink;
            background-color:black;
            color: white;
            width: 200px;
        }
        table h2:hover{
            background-color: white;
            color: deeppink;
        }
    </style>

</head>
<body>
        <?php
            while($rows=mysqli_fetch_assoc($result))
            {
        ?>
    <div class="bg-contact2" style="background-image: url('images/Building.jpg');">
	<div class="container-contact2">
			<div class="wrap-contact2">
    		<form class="contact2-form validate-form" action="viewEmployee.php" method="get">
    			<span class="contact2-form-title">
					VIEW EMPLOYEE: <?php echo $rows['empcode']; ?>
				</span>

    <table align="center">
        <tr>
            <th colspan="2">Personal Details</th>
        </tr>
    <tr></tr>
        
        <tr>
            <td>Employee code :</td>
            <td><input id="Text" type = "text"  name = "empcode" value ="<?php echo $rows['empcode']; ?>" readonly/></td>
        </tr>

        <tr>
            <td>Employee Full Name :</td>
            <td><input id="Text" type="text" name="fullname" value="<?php echo $rows['fullname']; ?>" readonly/></td>
        </tr>

        <tr>
            <td>Address :</td>
            <td><input id="Text" type="text" name="address" value="<?php echo $rows['address']; ?>" readonly/></td>
        </tr>

        <tr>
            <td>Contact Number :</td>
            <td><input id="Text" type="text" name="contact" value="<?php echo $rows['contact']; ?>" readonly/></td>
        </tr>

        <tr>
            <td>Date of Birth :</td>
            <td><input id="Text" type="date" name="dob" value="<?php echo $rows['dob']; ?>" readonly/></td>
        </tr>

        <tr>
            <td>Age :</td>
            <td><input id="Text" type="text" name="age" value="<?php echo $rows['age']; ?>" readonly/></td>
        </tr>

        <tr>
            <td>Marital Status :</td>
            <td><input id="Text" type="text" name="marital" value="<?php echo $rows['marital']; ?>" readonly/></td>
        </tr>

        <tr>
            <th colspan="2" style="font-size: 20px">Job Details</th>
        </tr>
        <tr></tr>
        <tr>
            <td>Basic Salary :</td>
            <td><input id="Text" type="text" name="basicSal" value="<?php echo $rows['basicSal']; ?>" readonly/></td>
        </tr>
        <tr>
            <td>Date appointed :</td>
            <td><input id="Text" type="date" name="appointed" value="<?php echo $rows['appointed']; ?>" readonly/></td>
        </tr>
        <tr>
            <td>Designation :</td>
            <td><input id="Text" type="text" name="designation" value="<?php echo $rows['designation']; ?>" readonly/></td>
        </tr>
        <tr></tr>
        <tr>
        <?php 
            }
        ?>
        </tr>
    </table>
    </form>
    </div>
    </div>
    </div>
</body>
</html>