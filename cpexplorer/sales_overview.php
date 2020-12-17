<?php
    //SALES DELETE REQUEST
    include 'dbConn.php';
    session_start();
    if(isset($_POST['delete_sales_btn']))
    {
        $sales_id = $_POST['delete_sales_id'];

        $delete_query = "DELETE FROM  sales WHERE SalesId = '$sales_id'";
        $execute_delete_query = mysqli_query($connection,$delete_query);
        if($execute_delete_query){
            $_SESSION['delete_success'] = "Record '$sales_id' Deleted!";
            header('Location: http://localhost:8080/cpexplorer/sales_overview.php');
            exit; 
        }
        else{
            $_SESSION['delete_fail'] = "Deletion Unsuccessful!";
            header('Location: http://localhost:8080/cpexplorer/sales_overview.php');
            exit;
        }
        mysqli_close($connection); 
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
        <h1 class="h3 mb-0 text-gray-800">Sales Overview</h1>
        <a href="http://localhost:8080/cpexplorer/sales_report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
       
          <!--Sales Record Table -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">
                  <?php 
                    if(isset($_SESSION['delete_success']))
                    {
                        echo $_SESSION['delete_success'];
                        unset($_SESSION['delete_success']);
                    }
                  ?>
              </h6>
              <h6 class="m-0 font-weight-bold text-success">
                  <?php 
                    if(isset($_SESSION['insert_success']))
                    {
                        echo $_SESSION['insert_success'];
                        unset($_SESSION['insert_success']);
                    }
                  ?>
              </h6>
              <h6 class="m-0 font-weight-bold text-primary">
                  <?php 
                    if(isset($_SESSION['update_success']))
                    {
                        echo $_SESSION['update_success'];
                        unset($_SESSION['update_success']);
                    }
                  ?>
              </h6>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                 <?php 
                    $connection = mysqli_connect("localhost","root","","commercial_projects");
                    $query = "SELECT * FROM sales"; 
                    $result = mysqli_query($connection, $query);
                 ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sales ID</th>
                      <th>Quotation ID</th>
                      <th>EPF No</th>
                      <th>Sales Value</th>
                      <th>Sales Date</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                          ?>
                    <tr>
                      <td><?php echo $row['SalesId']; ?></td>
                      <td><?php echo $row['QuotationId']; ?></td>
                      <td><?php echo $row['EPFNo']; ?></td>
                      <td>Rs. <?php echo $row['SalesValue']; ?></td>
                      <td><?php echo $row['SalesDate']; ?></td>
                      <td>
                      <form action="sales_edit.php" method="POST">
                          <input type="hidden" name="edit_sales_id" value="<?php echo $row['SalesId']; ?>">
                          <button type="submit" name="edit_sales_btn" class="btn btn-primary btn-block" >Edit</button>
                        </form>
                      </td>
                      <td>
                      <form action="" method="POST">
                        <input type="hidden" name="delete_sales_id" value="<?php echo $row['SalesId']; ?>">
                        <button type="submit" name="delete_sales_btn" class="btn btn-danger btn-block" >Delete</button>
                      </form>
                      </td>
                    </tr>
                    <?php 
                        }
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