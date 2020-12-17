<?php


function generateReport($fromdate, $todate){
    include 'dbConn.php';
    $output = '';  
    $dtfrom = new DateTime($fromdate);
    $dtto = new DateTime($todate);

    $from_date = $dtfrom -> format('Y/m/d');
    $to_date = $dtto -> format('Y/m/d');

    $sales_selection_query = "SELECT * 
                            FROM sales 
                            WHERE SalesDate 
                            BETWEEN '2019-10-03' and '2019-10-06'";
    $sales_selection_query_result = mysqli_query($connection, $sales_selection_query);
    
    if(mysqli_num_rows($sales_selection_query_result) > 0)
    {  
        while($row = mysqli_fetch_array($sales_selection_query_result)){
            $output .= 
            '<tr>
                <td>'.$row['SalesId'].'</td>
                <td>'.$row['QuotationId'].'</td>
                <td>'.$row['EPFNo'].'</td>
                <td>Rs. '.$row['SalesValue'].'</td>
                <td>'.$row['SalesDate'].'</td>
                <td>
            </tr>';
            
        }
        return $output;
        mysqli_close($connection); 
    }

}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<form action = "" method = "POST" class="form-inline">
                    <label class="sr-only">From Date</label>
                    <input type="date" name = "fromdate" class="form-control mb-2 mr-sm-2">
                    <label class="sr-only">To Date</label>
                    <input type="date" name = "todate" class="form-control mb-2 mr-sm-2">
                    <button type="submit" name = "transactions_btn" class="btn btn-primary mb-2">Transactions</button>
                </form>
                <?php
                    if(isset($_POST['transactions_btn']))
                    {
                      echo generateReport('2019-10-03','2019-10-06');
                    }
                    ?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

