<?php
    //SALES UPDATE REQUEST
    include 'dbConn.php';
    session_start();
    if(isset($_POST['update_btn'])){

        $salesid = $_POST['editsalesid'];
        $editedquotationid = $_POST['editquotationid'];
        $editedepfno = $_POST['editepfno'];
        $editedsalesvalue = $_POST['editsalesvalue'];

        //sales selection query
        $sales_selection_query = "SELECT * FROM sales WHERE QuotationId = '$editedquotationid'"; 
        $sales_result = mysqli_query($connection, $sales_selection_query);

        //quotation selection query
        $quotation_select_query = "SELECT * FROM quotation WHERE QuotationId = '$editedquotationid'"; 
        $quotations_result = mysqli_query($connection, $quotation_select_query);
        //retrieving quotation value
        $quotation = mysqli_fetch_row($quotations_result);
        $quotation_value = $quotation[2];

        //employee selection query
        $employee_select_query = "SELECT * FROM employee e, user u  WHERE e.EPFNo = u.EPFNo AND e.EPFNo = '$editedepfno' AND e.Department = 'SALES'"; 
        $employee_result = mysqli_query($connection, $employee_select_query);

        //check whether sales value matches with quotation value
        if($editedsalesvalue != $quotation_value){
            $_SESSION['ERROR'] = "Invalid Sales Value!";
            header('Location: http://localhost:8080/cpexplorer/sales_edit.php');
            exit();
        }else if(mysqli_num_rows($employee_result) == 0){
            $_SESSION['ERROR'] = "Permission denied for User Id: '$editedepfno'!";
            header('Location: http://localhost:8080/cpexplorer/sales_edit.php');
            exit();
        }
        else{
            $query = "UPDATE sales SET QuotationId = '$editedquotationid', EPFNo = '$editedepfno', SalesValue = '$editedsalesvalue' WHERE SalesId = '$salesid'";
            $execute_query = mysqli_query($connection,$query);
            if($execute_query){
                $_SESSION['update_success'] = "Sales Record '$salesid' Updated!";
                header('Location: http://localhost:8080/cpexplorer/sales_overview.php');
                exit;
            }
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
    <h1 class="h3 mb-0 text-gray-800">Edit Sales</h1>
    </div>

        <!--Sales Record Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">
                  <?php 
                    if(isset($_SESSION['ERROR']))
                    {
                        echo $_SESSION['ERROR'];
                        unset($_SESSION['ERROR']);
                    }
                  ?>
              </h6>
            </div>
            <div class="card-body">
              <?php
                if(isset($_POST['edit_sales_btn'])){
                    $salesid = $_POST['edit_sales_id'];
                    $query = "SELECT * FROM sales WHERE SalesId = '$salesid'";
                    $execute_query = mysqli_query($connection, $query);

                    foreach($execute_query as $row){ 

                        ?>
                    <form action = "" method="POST">
                        <input type="hidden" name="editsalesid" value="<?php echo $row['SalesId'] ?>">
                        <div class="form-group col-md-4"> 
                            <label >Quotaion Id</label>
                            <input type="text" name="editquotationid" class="form-control" value="<?php echo $row['QuotationId'] ?>" required>
                        </div>
                        <div class="form-group col-md-4"> 
                            <label >Sales Value</label>
                            <input type="text" name="editsalesvalue" class="form-control"  value="<?php echo $row['SalesValue'] ?>" required>
                        </div>
                        <div class="form-group col-md-4"> 
                            <label >EPF No</label>
                            <input type="text" name="editepfno" class="form-control" value="<?php echo $row['EPFNo'] ?>" required>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" required>
                            <label class="form-check-label" >Confirm that the above information is correct!</label>
                        </div>
                        <br>
                        <a href="sales_overview.php" class="btn btn-danger">Cancel</a>
                        <button type="submit" name="update_btn" class="btn btn-primary">Update</button>
                    </form>
                    <?php
                    }
                }
                    ?>
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