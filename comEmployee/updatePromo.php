<?php
$con=mysqli_connect("localhost","root","","cp");
$link = mysqli_select_db($con,'emppromo');

$empcode = $_GET['id'];

$query="SELECT * FROM `emppromo` WHERE `empcode` = '$empcode'";
$result = mysqli_query($con,$query);

if (isset($_POST['update'])){
  
    $empcode = (isset($_POST['empcode']) ? $_POST['empcode'] : '');
    $ddate = (isset($_POST['ddate']) ? $_POST['ddate'] : '');
    $promo_type = (isset($_POST['promo_type']) ? $_POST['promo_type'] : '');
    $promo_sal = (isset($_POST['promo_sal']) ? $_POST['promo_sal'] : '');
    $prom_desig = (isset($_POST['prom_desig']) ? $_POST['prom_desig'] : '');
    $prom_dep = (isset($_POST['prom_dep']) ? $_POST['prom_dep'] : '');
    $reason = (isset($_POST['reason']) ? $_POST['reason'] : '');
    $remarks = (isset($_POST['remarks']) ? $_POST['remarks'] : '');


    $update_query = "UPDATE `emppromo` SET `empcode`='" . $empcode . "',`ddate`='" . $ddate . "',`promo_type`='" . $promo_type . "',`promo_sal`=" . $promo_sal . ",`prom_desig`='" . $prom_desig . "',`prom_dep`='" . $prom_dep . "',`reason`='" . $reason . "',`remarks`='" . $remarks ."' WHERE `empcode` = '$empcode'";
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
			<div class="wrap-contact3">
    		<form class="contact2-form validate-form" action="updatePromo.php?id=<?= $empcode ?>" method="post">
    			<span class="contact2-form-title">
					UPDATE EMPLOYEE: <?php echo $rows['empcode']; ?>
				</span>

    <table align="center">
        <tr>
            <th colspan="2">Movement Details</th>
        </tr>
    	<tr></tr>
        <tr>
            <td>Employee code : </td>
            <td><input id="code" type = "text" name = "empcode" value ="<?php echo $rows['empcode']; ?>"/></td>
			<td></td>
            <td>Date : </td>
            <td><input id="date" type="date" name="ddate" value ="<?php echo $rows['ddate']; ?>" /></td>
        </tr>

        <tr>
            <td>Movement Type : </td>
            <td><input id="mtype" type="text" name="promo_type" value="<?php echo $rows['promo_type']; ?>" /></td>
            <td></td>
            <td>Moved Salary : </td>
            <td><input id="sal" type="text" name="promo_sal" value="<?php echo $rows['promo_sal']; ?>" /></td>
        </tr>
        <tr>
            <td>Moved Designation: </td>
            <td><input id="desig" type="text" name="prom_desig" value="<?php echo $rows['prom_desig']; ?>" /></td>
			<td></td>
            <td>Moved Department: </td>
            <td><input id="dep" type="text" name="prom_dep" value="<?php echo $rows['prom_dep']; ?>" /></td>
        </tr>
        <tr>
            <td>Reason : </td>
            <td><input id="reason" type="text" name="reason" value="<?php echo $rows['reason']; ?>" /></td>
			<td></td>
        	<td>Remarks: </td>
            <td><input id="remark" type="text" name="remarks" value="<?php echo $rows['remarks']; ?>" /></td>
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