<?php

$con=mysqli_connect("localhost","root","","cp");
mysqli_select_db($con,'emppromo');

if(mysqli_connect_errno()){
    echo"Failed to connect".mysqli_connect_errno();
}

if (isset($_POST['submit'])){
    $empcode = (isset($_POST['empcode']) ? $_POST['empcode'] : '');
    $ddate = (isset($_POST['ddate']) ? $_POST['ddate'] : '');
    $promo_type = (isset($_POST['promo_type']) ? $_POST['promo_type'] : '');
    $promo_sal = (isset($_POST['promo_sal']) ? $_POST['promo_sal'] : '');
    $prom_desig = (isset($_POST['prom_desig']) ? $_POST['prom_desig'] : '');
    $prom_dep = (isset($_POST['prom_dep']) ? $_POST['prom_dep'] : '');
    $reason = (isset($_POST['reason']) ? $_POST['reason'] : '');
    $remarks = (isset($_POST['remarks']) ? $_POST['remarks'] : '');


    $sql="INSERT INTO `emppromo`(`empcode`, `ddate`, `promo_type`, `promo_sal`,`prom_desig`, `prom_dep`,`reason`, `remarks`) VALUES ('$empcode','$ddate','$promo_type','$promo_sal','$prom_desig','$prom_dep' ,'$reason','$remarks')";

    if(!mysqli_query($con,$sql)){
        die('Error:'.mysqli_error($con));
    }
    echo "<script type='text/javascript'>alert('One Record Added');</script>";
}
mysqli_close($con);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
    <title>ENTER EMPLOYEES MOVEMENTS</title>
    <style>
        table{
/*             background-color: #1ebb90;  */
            align-items: center;
            padding-left: 50px;
            padding-right: 50px;
            width: 200px;
            height: 500px;
            padding-top: 20px;
            opacity: 0.8;
        }
        table input[type=text]{
            padding: 3px;
            border:2px solid black;
            font-size: 14px;
            font-family: 'Arial', sans-serif;
            width: 200px;
            border-spacing:20px ;
        }
        table tr td{
            width: 50px;
            font-size: 18px;
            padding-left:15px;
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
    <script type="text/javascript">
        function formValidate() {
                var Name = document.forms["empPromoAdd"]["fullname"].value;
                var Contact_Number = document.forms["empPromoAdd"]["contact"].value;
                var Age = document.forms["empPromoAdd"]["age"].value;
                var Address = document.forms["empPromoAdd"]["address"].value;
                var Basicl_Sal  = document.forms["empPromoAdd"]["basicsal"].value;

                if (isAlphabetic(Name))
                    if (isNumeric(Contact_Number))
                        if (isNumeric(Age))
                            if (AddValidation(Address))
                                if (isEmpty(Basicl_Sal)){
                                    alert("Order  Successful");
                                }
                                else
                                    return false;
                            else
                                return false;
                        else
                            return false;
                    else
                        return false;
                else
                    return false;
            }

        function isEmpty(elemValue, field) {
                if (elemValue == "" || elemValue == null) {
                    alert("You cannot have " + field + " field empty");
                    return true;
                }
                else
                    return false;
            }

            function isAlphabetic(elemValue) {
                var exp = /^[a-zA-Z]+$/;
                if (!isEmpty(elemValue, "fullname")) {
                    if (elemValue.match(exp)) {
                        return true;
                    }
                    else {
                        alert("Enter only Alphabet characters");
                        return false;
                    }
                }
                else
                    return false;
            }

            function isNumeric(elemValue) {
                if (!isEmpty(elemValue, "Contact Number")) {
                    var exp = /^[0-9]+$/;
                    if (elemValue.match(exp)) {
                        return true;
                    }
                    else {
                        alert("Enter a valid contact number");
                        return false;
                    }
                }
                else
                    return false;
            }
            function AddValidation(elemValue) {
                var exp= /^[0-9a-zA-Z]+$/;
                if (!isEmpty(elemValue, "Address")) {
                    if (elemValue.match(exp)) {
                        return true;
                    }
                    else {
                        alert("Enter only Alphabet characters");
                        return false;
                    }
                }
                else
                    return false;
            }

    </script>

</head>
<body>
	<div class="bg-contact2" style="background-image: url('images/webpage.jpg');">
    <div class="container-contact2">
            <div class="wrap-contact3">
            <form class="contact2-form validate-form" id="empPromoAdd" action="empPromoAdd.php" method="post">
                <span class="contact2-form-title">
                    EMPLOYEE MOBILITY INFORMATION
                </span>

    <table align="center">
        <tr>
            <th colspan="2">Movement Details</th>
        </tr>
    <tr></tr>
        <tr>
            <td>Employee code : </td>
            <td><input id="Text" type = "text" placeholder="Enter Employee Code" name = "empcode" required/></td>
			<td></td>
            <td>Date : </td>
            <td><input id="Text" type="date" name="ddate" required/></td>
        </tr>

        <tr>
            <td>Movement Type : </td>
            <td><select name="promo_type">
                    <option value="Promotion">Promotion</option>
                    <option value="Demotion">Demotion</option>
                    <option value="Transfer">Transfer</option>
                </select>
            </td>
            <td></td>
            <td>Moved Salary : </td>
            <td><input id="Text" type="text" placeholder="Enter Salary" name="promo_sal" onchange="formValidate()"/></td>
        </tr>
        <tr>
            <td>Moved Designation: </td>
            <td><input id="Text" type="text" placeholder="Enter Designation" name="prom_desig"/></td>
			<td></td>
            <td>Moved Department: </td>
            <td><input id="Text" type="text" placeholder="Enter Department" name="prom_dep"/></td>
        </tr>
        <tr>
            <td>Reason : </td>
            <td><input id="Text" type="text" placeholder="Enter Reason" name="reason"/></td>
			<td></td>
        	<td>Remarks: </td>
            <td><input id="Text" type="text" placeholder="Enter Remarks" name="remarks"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit" name="submit"></td>
        </tr>
    </table>
    		</form>
    	</div>
    </div>
    </div>
    
    </body>
</html>
