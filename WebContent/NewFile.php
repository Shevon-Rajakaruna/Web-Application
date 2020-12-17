<?php 
include 'conn.php';

if (isset($_POST['done'])) {
    $pid = $_POST["ornumber"];
    $cname = $_POST["cname"];
    $Amount = $_POST["Amount"];
    $putype= $_POST["putype"];
    $date = $_POST["date"];
    if (filter_has_var(INPUT_POST, 'ornumber')) {
        if(filter_var($Amount, FILTER_VALIDATE_FLOAT)){
            if(strlen($pid) <=3){
                echo'<script> alert("Purchase Id is too short.. plase chack the number")</script>';
            }
            else {
                  $q = "INSERT INTO `purchas`(`PurchaseId`, `cust`, `Amount`, `purchaset`, `Date`) VALUES ('$pid','$cname','$Amount','$putype','$date')";
                  $query = mysqli_query($conn,$q);  
              } 
        }
        else{
            echo'<script>alert("You enterd amount is incorrect")</script>';

            
          }
    }
     mysqli_close($conn); 
   }
 ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
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
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">ITP PROJECT(ERP SYSTEM)  </a>
                    <!-- /.nav-collapse -->
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
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <div class="module-head">
                                    <h3>
                                        ADD DATA</h3>
                                    </div>
                                    <form action="" method="POST" >
                                        <br>
                                        <a>Purchase Id</a><br>
                                        <input class="span8 tip" type="text" name="ornumber" required><br>
                                        <a>Customer name</a><br>
                                        <input class="span8 tip" type="text" name="cname"  required><br>
                                        <a >Amount</a><br>
                                        <input class="span8 tip" type="text" name="Amount" required><br>
                                        <a>purchase type</a><br>
                                        <input class="span8 tip" type="text" name="putype"  required><br>
                                        <a>Date</a><br>
                                        <input class="span8 tip" type="date" name="date" placeholder="date" required><br><br>
                                        <div class=""><button class="btn btn-success col-lg-12" name="done">Add</button><br><br>
                                    </form>
                                    <div class="module">
                                <div class="module-head">
                                    <h3>
                                        DataTables</h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display"
                                        width="100%">
                                          <tr>  <th width="5%">Number</th>
                                                <th width="15%">PurchaseId</th>
                                                <th width="30%">Customer</th>
                                                <th width="20%">Amount</th>
                                                <th width="10%">Type</th>
                                                <th width="20%">Date</th>
                                          </tr>
                                          <?php
                                          include 'conn.php'; 
                                        $query = "SELECT * FROM purchas ORDER BY PurchaseId ASC";
                                        $result = mysqli_query($conn,$query);
                                           while($row =mysqli_fetch_array($result)){?>
                                            <tr>
                                            <th><?php echo $row['num']?></th>
                                            <th><?php echo $row['PurchaseId']?></th>
                                            <th><?php echo $row['cust']?></th>
                                            <th><?php echo $row['Amount']?></th>
                                            <th><?php echo $row['purchaset']?></th>
                                            <th><?php echo $row['Date']?></th>
                                          </tr>       
                                         <?php }
                                          ?>  
                                         
                                    </table>
                                </div>
                            </div>
                            <!--/.module-->
                                    </div>
                                </div>
                            </div>
                            <!--/#btn-controls-->
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
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>
