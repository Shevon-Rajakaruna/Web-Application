<?php
$con=mysqli_connect("localhost","root","","cp");
$link = mysqli_select_db($con,'emppromo');

$empcode = $_GET['id'];

$query="SELECT * FROM `emppromo` WHERE `empcode` = '$empcode'";
$result = mysqli_query($con,$query);

// $rows=mysqli_fetch_assoc($result)
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <title>VIEW EMPLOYEE MOVEMENT</title>
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
            /*width: 420px;*/
            /*border-spacing:20px ;*/
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
			<div class="wrap-contact3">
    		<form class="contact2-form validate-form" action="viewEmployee.php" method="get">
    			<span class="contact2-form-title">
					VIEW EMPLOYEE: <?php echo $rows['empcode']; ?>
				</span>

     <table align="center">
        <tr>
            <th colspan="2">Movement Details</th>
        </tr>
    	<tr></tr>
        <tr>
            <td>Employee code : </td>
            <td><input id="code" type = "text" name = "empcode" value ="<?php echo $rows['empcode']; ?>" readonly/></td>
			<td></td>
            <td>Date : </td>
            <td><input id="date" type="date" name="ddate" value ="<?php echo $rows['ddate']; ?>" readonly/></td>
        </tr>

        <tr>
            <td>Movement Type : </td>
            <td><input id="mtype" type="text" name="promo_type" value="<?php echo $rows['promo_type']; ?>" readonly/></td>
            <td></td>
            <td>Moved Salary : </td>
            <td><input id="sal" type="text" name="promo_sal" value="<?php echo $rows['promo_sal']; ?>" readonly/></td>
        </tr>
        <tr>
            <td>Moved Designation: </td>
            <td><input id="desig" type="text" name="prom_desig" value="<?php echo $rows['prom_desig']; ?>" readonly/></td>
			<td></td>
            <td>Moved Department: </td>
            <td><input id="dep" type="text" name="prom_dep" value="<?php echo $rows['prom_dep']; ?>" readonly/></td>
        </tr>
        <tr>
            <td>Reason : </td>
            <td><input id="reason" type="text" name="reason" value="<?php echo $rows['reason']; ?>" readonly/></td>
			<td></td>
        	<td>Remarks: </td>
            <td><input id="remark" type="text" name="remarks" value="<?php echo $rows['remarks']; ?>" readonly/></td>
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