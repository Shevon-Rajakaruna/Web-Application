<?php

$con=mysqli_connect("localhost","root","","cp");
mysqli_select_db($con,'employee_shevon');

if(mysqli_connect_errno()){
    echo"Failed to connect".mysqli_connect_errno();
}

if (isset($_POST['submit'])){
    $empcode = (isset($_POST['empcode']) ? $_POST['empcode'] : '');
    $name = (isset($_POST['fullname']) ? $_POST['fullname'] : '');
    $address = (isset($_POST['address']) ? $_POST['address'] : '');
    $dob = (isset($_POST['dob']) ? $_POST['dob'] : '');
    $age = (isset($_POST['age']) ? $_POST['age'] : '');
    $contact = (isset($_POST['contact']) ? $_POST['contact'] : '');
    $marital = (isset($_POST['marital']) ? $_POST['marital'] : '');
    $basicSal = (isset($_POST['basicSal']) ? $_POST['basicSal'] : '');
    $appointed = (isset($_POST['appointed']) ? $_POST['appointed'] : '');
    $designation = (isset($_POST['designation']) ? $_POST['designation'] : '');
    
    
    //validations
    
    
    $sql="INSERT INTO `employee_shevon`(`empcode`, `fullname`, `address`, `dob`, `age`, `contact`,`marital`,`basicSal`,`appointed`,`designation`)VALUES('$empcode','$name','$address','$dob', '$age', '$contact','$marital','$basicSal', '$appointed','$designation')";
    
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
    <title>ENTER EMPLOYEES</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
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
    <script type="text/javascript">
//        function formValidate() {
//          //  console.log(document.forms[0]);
//                var Name = document.getElementById("name").value;          
//                var Contact_Number = document.forms[0]["contact"].value;
//                var Age = document.forms[0]["age"].value;
//                var Address = document.forms[0]["address"].value;
//                var Basicl_Sal  = document.forms[0]["basicsal"].value;
//
//                if (isAlphabetic(Name))
//                	if (AddValidation(Address))
//                		if (isNumeric(Contact_Number))
//                        	if (isNumeric(Age))
//                                if (isNumeric(Basicl_Sal)){
//                                    alert("Order  Successful");
//                                }
//                                else
//                                    return false;
//                            else
//                                return false;
//                        else
//                            return false;
//                    //else
//                        //return false;
//                else
//                    return false;
//            }

//        function isEmpty(elemValue, field) {
//                if (elemValue == "" || elemValue == null) {
//                    alert("You cannot have " + field + " field empty");
//                    return true;
//                }
//                else
//                    return false;
//            }
//
//            function isAlphabetic(elemValue) {
//                //return true;
//                var exp = /^[a-zA-Z]+$/;
//                if (!isEmpty(elemValue, "fullname")) {
//                    if (elemValue.match(exp)) {
//                        return true;
//                    }
//                    else {
//                        alert("Enter only Alphabet characters");
//                        return false;
//                    }
//                }
//                else
//                    return false;
//            }
//
//            function isNumeric(elemValue) {
//                //return true;
//                if (!isEmpty(elemValue, "Contact Number")) {
//                    var exp = /^[0-9]+$/;
//                    if (elemValue.match(exp)) {
//                        return true;
//                    }
//                    else {
//                        alert("Enter a valid contact number");
//                        return false;
//                    }
//                }
//                else
//                    return false;
//            }
//            function AddValidation(elemValue) {
//                //return true;
//                var exp= /^[0-9a-zA-Z]+$/;
//                if (!isEmpty(elemValue, "Address")) {
//                    if (elemValue.match(exp)) {
//                        return true;
//                    }
//                    else {
//                        alert("Enter only Alphabet characters");
//                        return false;
//                    }
//                }
//                else
//                    return false;
//            }
            
            //$(document).ready(function(){

                //$("#dob").change(function(){
            function calculateAge(){
                //alert('123');
                var dob = document.getElementById("dob").value;
                //alert('dob');
//                 var date = dob.replace('/', '-');
//                 var newDate = date("dd-mm-yyyy", strtotime(date));
                
//                 var now = new date();
//                 var age =0;

//                 age = (now.getFullYear() - newDate.getFullYear());
// 				console.log(age);
                //$('#age').val(age);
               

                var today = new Date();
                var date = dob.replace('/', '-');
                var birthDate = new Date(date);
                console.log("today", today);
                console.log("bday", dob);
                var age = today.getFullYear() - birthDate.getFullYear();
                var m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                document.getElementById("age").value = age;
                document.getElementById("age").focus();
            }
            

    </script>
    
</head>
<body>
    <div class="bg-contact2" style="background-image: url('images/property.jpg');">
    <div class="container-contact2">
            <div class="wrap-contact2">
<!--            " -->
            <form class="contact2-form validate-form"  action="employeeAdd.php"  onsubmit="return validateForm();"  method="post">
                <span class="contact2-form-title">
                    EMPLOYEE INFORMATION
                </span>
    <table align="center">
        <tr></tr>
        <tr><th colspan="2">Personal Details</th></tr>
        <tr></tr>
        <tr>
            <td>Employee code : </td>
            <td><input id="empcode" type = "text" placeholder="Enter Employee Code" name = "empcode" required/></td>
        </tr>

        <tr>
            <td>Employee Full Name : </td>
            <td><input id="name" type="text" placeholder="Enter Name" name="fullname" required/></td>
        </tr>

        <tr>
            <td>Address : </td>
            <td><input id="address" type="text" placeholder="Enter Address" name="address" /></td>
        </tr>

        <tr>
            <td>Contact Number : </td>
            <td><input id="contact" type="text" placeholder="Enter Telephone Number" name="contact" /></td>
        </tr>

        <tr>
            <td>Date of Birth : </td>
            <td><input id="dob" type="date" name="dob" onchange="calculateAge()" max="2003-01-01" required/></td>
        </tr>

        <tr>
            <td>Age : </td>
            <td><input id="age" type="text" placeholder="Enter Age" name="age"/></td>
        </tr>

        <tr>
            <td>Marital Status : </td>
            <td><select id="marital" name="marital">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                </select>
            </td>
        </tr>
        <tr></tr>
        <tr><th colspan="2" style="font-size: 20px">Job Details</th></tr>
        <tr></tr>
        <tr>
            <td>Basic Salary : </td>
            <td><input id="basicsal" type="text" placeholder="Enter Basic Salary" name="basicSal" onchange = "return formValidate()" required/></td>
        </tr>
        <tr>
            <td>Date appointed : </td>
            <td><input id="appointed" type="date" name="appointed" min="2019-01-01" required/></td>
        </tr>
        <tr>
            <td>Designation : </td>
            <td><select name="designation">
                    <option value="Director">Director</option>
                    <option value="Marketing Manager">Marketing Manager</option>
                    <option value="other">other</option>
                </select></td>
        </tr>
        <tr></tr>
        <tr>
        	
            <td style="padding-top: 20px"><input type="submit" id='btn' value="Submit" name="submit"></td>
        </tr>
    </table>
    </form>
    </div>
    </div>
    </div>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/mvc/3.0/jquery.validate.unobtrusive.min.js"></script>
  	<script src='index.js'></script>
    </body>
</html>
    