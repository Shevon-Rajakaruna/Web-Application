<?php
$con=mysqli_connect("localhost","root","","cp");
$link = mysqli_select_db($con,'employee_shevon');

$empcode = $_GET['id'];


$delete_query = "DELETE FROM `employee_shevon` WHERE `empcode` = '$empcode'";
try{
    $delete_result=mysqli_query($con, $delete_query);
    if($delete_result){
        if(mysqli_affected_rows($con)>0){
            echo "<script type='text/javascript'>alert('Data Deleted Successfully');
                    window.location.href='employeeViewAll.php';</script>";
        }else{
            echo"<script type='text/javascript'>alert('Data Not Deleted');
                    window.location.href='employeeViewAll.php';</script>";
        }
    }
}catch(Exception $ex){
    echo("error in delete".$ex->getMessage());
}
?>