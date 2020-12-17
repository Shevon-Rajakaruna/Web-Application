<?php 
session_start();
include 'conn.php';           
if (isset($_POST['delete'])){
    $da ="DELETE FROM purchas WHERE PurchaseId = $_POST[ornumber] ";
    $query = mysqli_query($conn,$da);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edmin</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">ITP PROJECT(ERP SYSTEM) </a>
            </div>
        </div>
        <!-- /navbar-inner -->
    </div>
    <!-- /navbar -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="sidebar">
                        <ul class="widget widget-menu unstyled">
                             <li class="active"><a href="report.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                        </ul>
                        <!--/.widget-nav-->
                        <ul class="widget widget-menu unstyled">
                                <li><a href="search.php"><i class="menu-icon icon-bold"></i>Search </a></li>
                                <li><a href="NewFile.php"><i class="menu-icon icon-paste"></i>Add data</a></li>
                                <li><a href="report.php"><i class="menu-icon icon-table"></i>Report </a></li>
                            </ul>
                        <!--/.widget-nav-->
                        
                    </div>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <h3>
                                    Search</h3>
                            </div>
                            <div class="module-body">
                                
                                   <form action="" method="POST">
                                    <input class="span8 tip" type="text" name="ornumber" placeholder="Purchase Id" required ><br><br>
                                    <button  name="search" class="btn btn-large btn-success"> Search </button>
                                    <button  name="delete" class="btn btn-large btn-success" > Delete </button>
                                </form><br><br>
                                <?php
                                    include 'conn.php';
                                    if(isset($_POST['search'])){
                                        $pid =$_POST['ornumber'];
                                        $query ="SELECT * FROM purchas WHERE PurchaseId ='$pid'";
                                        $query_run = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($query_run)){
                                            ?>
                                              <form method="POST">
                                              <a class="alert alert-success" >Record Number : <?php echo $row['num']?></a><br><br>
                                              <input class="span8 tip"type="hidden" name="num" value="<?php echo $row['num']?>"  required>
                                              <a>Purchase Id</a><br>
                                              <input class="span8 tip"type="text" name="PurchaseId" value="<?php echo $row['PurchaseId']?>"  required><br>
                                              <a>Customer name</a><br>
                                              <input class="span8 tip"type="text" name="cust" value="<?php echo $row['cust']?>"  required><br>
                                              <a >Amount</a><br>
                                              <input class="span8 tip"type="text" name="Amount" value="<?php echo $row['Amount']?>"  required><br>
                                              <a>purchase type</a><br>
                                              <input class="span8 tip"type="text" name="purchaset" value="<?php echo $row['purchaset']?>"  required><br>
                                              <a>Date</a><br>
                                              <input class="span8 tip"type="date" name="Date"  value="<?php echo $row['Date']?>"  required><br><br>
                                              <br><br>
                                              <button class="btn btn-large btn-success" name="up">Update</button>
                                              <br>
                                              </form>
                                            <?php
                                            } 
                                        }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; ITP group project - Purhace traking system</b>  J.A.pawantha chathuranga.
        </div>
    </div>
    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>

<?php
include 'conn.php';
if (isset($_POST['up'])){
  $num = $_POST['num'];
  $Pid = $_POST['PurchaseId'];
  $custm = $_POST['cust'];
  $amount = $_POST['Amount'];
  $purchase = $_POST['purchaset'];
  $date= $_POST['Date'];
  if (filter_has_var(INPUT_POST, 'PurchaseId')) {
    if(filter_var($amount, FILTER_VALIDATE_FLOAT)){  
                    $q2 ="UPDATE purchas SET PurchaseId = '$Pid' , cust = '$custm' , Amount = '$amount' , purchaset = '$purchase' , Date = '$date' WHERE num = $num";
                    $query_run2 = mysqli_query($conn,$q2);
                      if ($query_run2) {
                        echo'<script> alert("Data updated")</script>';
                        }else{
                          echo'<script> alert("Data not updated... check the error ")</script>';
                        }
                  }
                
    else{
      echo'<script>alert("You enterd amount is incorrect")</script>';
    }

 }
}

 ?>



