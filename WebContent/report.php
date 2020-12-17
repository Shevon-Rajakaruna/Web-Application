<?php 
function fetch_data(){
    include 'conn.php';
    $output = '';

    $query = "SELECT * FROM purchas ORDER BY PurchaseId ASC";
    $result = mysqli_query($conn,$query);
    while ($row = mysqli_fetch_array($result)){
        $output .= '
            <tr>
                <td>'.$row["PurchaseId"].'</td>
                <td>'.$row["cust"].'</td>
                <td>'.$row["Amount"].'</td>
                <td>'.$row["purchaset"].'</td>
                <td>'.$row["Date"].'</td>
        ';
    }
    return $output;
    
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
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">ITP PROJECT(ERP SYSTEM) </a>
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
                                    <div class="module">
                                <div class="module-head">
                                    <h3>
                                        DataTables</h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display"
                                        width="100%">
                                        <thead>
                                          <tr>
                                          <th width="10%">PurchaseId</th>
                                          <th width="30%">Customer</th>
                                          <th width="20%">Amount</th>
                                          <th width="20%">Type</th>
                                          <th width="20%">Date</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                          echo fetch_data(); 
                                          ?>  
                                        </tbody>  
                                    </table>
                                </div>
                            </div>
                            <a href="update.php"><button  name="search" class="btn btn-large btn-success">Coverte PDF</button></a>
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
