<?php

    function generateReport($fromdate, $todate){
      include 'dbConn.php';
      $output = '';
      $sales_selection_query = "SELECT * 
                              FROM sales 
                              WHERE SalesDate 
                              BETWEEN '$fromdate' and '$todate'";
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
              </tr>';
          }
          return $output;
          mysqli_close($connection); 
      }
  }

  if(isset($_POST["generate_report_btn"])){

    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    require_once('tcpdf/tcpdf.php');  
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $obj_pdf->SetCreator(PDF_CREATOR);  
    $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");  
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $obj_pdf->SetDefaultMonospacedFont('helvetica');  
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $obj_pdf->setPrintHeader(false);  
    $obj_pdf->setPrintFooter(false);  
    $obj_pdf->SetAutoPageBreak(TRUE, 10);  
    $obj_pdf->SetFont('helvetica', '', 11);  
    $obj_pdf->AddPage();  
    $content = '';  
    $content .= '  
    <h4 align="center">Commercial Projetcs Private Limited</h4>
    <h4 align="center">Sales Report  '.$fromdate.'   -   '.$todate.'</h4><br/> 
    <table border="1" cellspacing="0" cellpadding="3">  
          <tr>  
              <th width="15%">Sales ID</th>  
              <th width="15%">Quotation ID</th>
              <th width="15%">EPF No</th>   
              <th width="15%">Sales Value</th>  
              <th width="40%">Sales Date</th>  
          </tr>';

    $content .= generateReport($fromdate, $todate);  
    $content .= '</table>';  
    $obj_pdf->writeHTML($content);
    ob_end_clean();  
    $obj_pdf->Output('Sales Report.pdf', 'I'); 
  }
?>

<?php 
    include('includes/header.php');
    include('includes/navbar.php');
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sales Report</h1>
        </div>

                   
          <!--Sales Record Table -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form action = "" method = "POST" class="form-inline">
                    <label class="sr-only">From Date</label>
                    <input type="date" name = "fromdate" class="form-control mb-2 mr-sm-2">
                    <label class="sr-only">To Date</label>
                    <input type="date" name = "todate" class="form-control mb-2 mr-sm-2">
                    <div class="form-group mx-sm-3 mb-2">
                      <button type="submit" name = "transactions_btn" class="btn btn-primary btn-sm " >Transactions</button>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                    <button type="submit" name = "generate_report_btn" class="btn btn-info btn-sm" >Generate Report</button>
                    </div>
                </form>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sales ID</th>
                      <th>Quotation ID</th>
                      <th>EPF No</th>
                      <th>Sales Value</th>
                      <th>Sales Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if(isset($_POST['transactions_btn']))
                    {
                      $fromdate = $_POST['fromdate'];
                      $todate = $_POST['todate'];
                      echo generateReport($fromdate, $todate);
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        
        
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>