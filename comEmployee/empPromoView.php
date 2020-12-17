<?php
$con=mysqli_connect("localhost","root","","cp");
$link = mysqli_select_db($con,'emppromo');

$query="SELECT `empcode`, `ddate`, `promo_type`, `reason` FROM `emppromo`";
$result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html>
<head>
	
    <title>INTERNAL MOBILITIES</title>

    <style>
        .bg { 
            background-image: url("images/362046.jpg");
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
            color: #185472;
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
            left: 980px;
            top: 20px;
        }

    </style>
</head>
<body>
 <h2 style="color: #1ebb90; font-size:40px; padding-left:350px;">INTERNAL MOBILITY LIST</h2>

    <form id="empPromoView" method="post" action="empPromoView.php">
    <div class="bg">
    
    <input class="buttona" type="button" onclick="location.href='empPromoAdd.php';" value="Create Movement" />
    <br>
    <br>
    <table align="center">
        <tr>
            <th>Employee code</th>
            <th>Date</th>
            <th>Movement Type</th>
            <th>Reason</th>
        </tr>
        <?php
            while($rows=mysqli_fetch_assoc($result))
            {
        ?>
        <tr>
            <td style="text-align:center"><?php echo $rows['empcode']; ?></td>
            <td style="text-align:center"><?php echo $rows['ddate']; ?></td>
            <td style="text-align:center"><?php echo $rows['promo_type']; ?></td>
            <td style="text-align:center"><?php echo $rows['reason']; ?></td>
            <td style="width: 1000px;"><input class="button" type="button" onclick="location.href='viewPromo.php?id=<?php echo $rows['empcode'];?>';" value="View" />
            							<input class="button" type="button" onclick="location.href='updatePromo.php?id=<?php echo $rows['empcode'];?>';" value="Update" />
            							<input class="button" type="button" onclick="location.href='deletePromo.php?id=<?php echo $rows['empcode'];?>';" value="Delete" />
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
