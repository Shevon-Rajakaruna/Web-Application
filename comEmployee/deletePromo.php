<?php
$con=mysqli_connect("localhost","root","","com_employee");
$link = mysqli_select_db($con,'emppromo');

$empcode = $_GET['id'];


$delete_query = "DELETE FROM `emppromo` WHERE `empcode` = '$empcode'";
try{
    $delete_result=mysqli_query($con, $delete_query);
    if($delete_result){
        if(mysqli_affected_rows($con)>0){
            echo "<script type='text/javascript'>alert('Data Deleted Successfully');
                    window.location.href='empPromoView.php';</script>";
        }else{
            echo"<script type='text/javascript'>alert('Data Not Deleted');
                    window.location.href='empPromoView.php';</script>";
        }
    }
}catch(Exception $ex){
    echo("error in delete".$ex->getMessage());
}
?>