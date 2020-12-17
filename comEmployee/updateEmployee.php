<?php
$con=mysqli_connect("localhost","root","","cp");
$link = mysqli_select_db($con,'employee_shevon');

$empcode = $_GET['id'];

$query="SELECT * FROM `employee_shevon` WHERE `empcode` = '$empcode'";
$result = mysqli_query($con,$query);

if (isset($_POST['update'])){
  
    //$empcode = $_POST['empcode'];
    //$empcode = (isset($_POST['empcode']) ? $_POST['empcode'] : '');
    $name = (isset($_POST['fullname']) ? $_POST['fullname'] : '');
    $address = (isset($_POST['address']) ? $_POST['address'] : '');
    $dob = (isset($_POST['dob']) ? $_POST['dob'] : '');
    $age = (isset($_POST['age']) ? $_POST['age'] : '');
    $contact = (isset($_POST['contact']) ? $_POST['contact'] : '');
    $marital = (isset($_POST['marital']) ? $_POST['marital'] : '');
    $basicSal = (isset($_POST['basicSal']) ? $_POST['basicSal'] : '');
    $appointed = (isset($_POST['appointed']) ? $_POST['appointed'] : '');
    $designation = (isset($_POST['designation']) ? $_POST['designation'] : '');


    $update_query = "UPDATE `employee_shevon` SET `fullname`='" . $name . "',`address`='" . $address . "',`dob`='" . $dob . "',`age`=" . $age . ",`contact`=" . $contact . ",`marital`='" . $marital . "',`basicSal`=" . $basicSal . ",`appointed`='" . $appointed . "',`designation`='" . $designation ."' WHERE `empcode` = '$empcode'";
    //print_r($update_query);
    //die();

    try{
        
        
        $update_query=mysqli_query($con, $update_query);
//         print_r($update_query);
//         die();
        if($update_query){
            //echo 'if';
            //die();
            if(mysqli_affected_rows($con)>0){
                echo "<script type='text/javascript'>alert('Data Updated Successfully');
                    window.location.href='employeeViewAll.php';</script>";
                //("Data Updated Successfully!");
            }else{
                echo "<script type='text/javascript'>alert('Data not Updated');
                    window.location.href='employeeViewAll.php';</script>";
                //("Data not Updated");
            }
        }
        
    }catch(Exception $ex){
        echo("error in update".$ex->getMessage());
    }
}
?>
<link rel="stylesheet" type="text/css" href="css/main.css">
<style>
        .bg { 
            background-image: url('images/property.jpg');
        /*  height: 100%;  */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        table{
/*             background-color: #1ebb90;  */
            align-items: center;
            padding-left: 100px;
            padding-right: 100px;
            width: 500px;
            height: 500px;
            padding-top: 20px;
            opacity: 0.8;
        }
        table input[type=text]{
            padding: 3px;
            border:2px solid black;
            font-size: 14px;
            font-family: 'Arial', sans-serif;
            width: 400px;
            border-spacing:20px ;
        }
        table tr td{
            width: 400px;
            font-size: 18px;
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
        //  console.log(document.forms[0]);
              var Name = document.getElementById("name").value;          
              var Contact_Number = document.forms[0]["contact"].value;
              //console.log(Contact_Number);
              var Age = document.forms[0]["age"].value;
              var Address = document.forms[0]["address"].value;
              var Basicl_Sal  = document.forms[0]["basicsal"].value;

              if (isAlphabetic(Name))
              	if (AddValidation(Address))
              		if (isNumeric(Contact_Number))
                      	if (isNumeric(Age))
                              if (isNumeric(Basicl_Sal)){
                                  //alert("Order  Successful");
                              }
                              else
                                  return false;
                          else
                              return false;
                      else
                          return false;
                  //else
                      //return false;
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

        <?php
            while($rows=mysqli_fetch_assoc($result))
            {
        ?>

	<div class="bg-contact2" style="background-image: url('images/webpage.jpg');">
	<div class="container-contact3">
			<div class="wrap-contact2">
    		<form class="contact2-form validate-form" action="updateEmployee.php?id=<?= $empcode ?>" method="post">
    			<span class="contact2-form-title">
					UPDATE EMPLOYEE: <?php echo $rows['empcode']; ?>
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
            <td><input id="Text" type="text" name="fullname" value="<?php echo $rows['fullname']; ?>" onchange = "return formValidate()"/></td>
        </tr>

        <tr>
            <td>Address :</td>
            <td><input id="Text" type="text" name="address" value="<?php echo $rows['address']; ?>" onchange = "return formValidate()"/></td>
        </tr>

        <tr>
            <td>Contact Number :</td>
            <td><input id="Text" type="text" name="contact" value="<?php echo $rows['contact']; ?>" onchange = "return formValidate()"/></td>
        </tr>

        <tr>
            <td>Date of Birth :</td>
            <td><input id="Text" type="date" name="dob" value="<?php echo $rows['dob']; ?>" /></td>
        </tr>

        <tr>
            <td>Age :</td>
            <td><input id="Text" type="text" name="age" value="<?php echo $rows['age']; ?>" onchange = "return formValidate()"/></td>
        </tr>

        <tr>
            <td>Marital Status :</td>
            <td><select name="marital">
            		<option value="<?php echo $rows['marital']; ?>"><?php echo $rows['marital']; ?></option>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                </select>
            </td>
        </tr>

        <tr>
            <th colspan="2" style="font-size: 20px">Job Details</th>
        </tr>
        <tr></tr>
        <tr>
            <td>Basic Salary :</td>
            <td><input id="Text" type="text" name="basicSal" value="<?php echo $rows['basicSal']; ?>" onchange = "return formValidate()"/></td>
        </tr>
        <tr>
            <td>Date appointed :</td>
            <td><input id="Text" type="date" name="appointed" value="<?php echo $rows['appointed']; ?>" /></td>
        </tr>
        <tr>
            <td>Designation :</td>
            <td><input id="Text" type="text" name="designation" value="<?php echo $rows['designation']; ?>" /></td>
        </tr>
        <tr></tr>
        <tr>
        <?php 
            }
        ?>
            <td><input type="submit" value="Update" name="update"></td>
        </tr>
    </table>
    </form>
    </div>
    </div>
    </div>