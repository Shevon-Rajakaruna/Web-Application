<?php
    //SALES INSERT REQUEST
    include 'dbConn.php';
    session_start();
    if(isset($_POST['submit_sales_btn']))
    {   
        //initialization of variables
        $quotationid =   "";
        $epfno =   "";
        $salesvalue =  "";
        $quotation_value = "";

        //retrieving values
        $quotationid =   $_POST['quotationid'];
        $epfno =   $_POST['epfno'];
        $salesvalue =  $_POST['salesvalue'];

        //sales selection query
        $sales_selection_query = "SELECT * FROM sales WHERE QuotationId = '$quotationid'"; 
        $sales_result = mysqli_query($connection, $sales_selection_query);
        
        //quotation selection query
        $quotation_select_query = "SELECT * FROM quotation WHERE QuotationId = '$quotationid'"; 
        $quotations_result = mysqli_query($connection, $quotation_select_query);
        //retrieving quotation value
        $quotation = mysqli_fetch_row($quotations_result);
        $quotation_value = $quotation[2];

        //employee selection query
        $employee_select_query = "SELECT * FROM employee e, user u  WHERE e.EPFNo = u.EPFNo AND e.EPFNo = '$epfno' AND e.Department = 'SALES'"; 
        $employee_result = mysqli_query($connection, $employee_select_query);

        
        //check whether sale already exists
        if(mysqli_num_rows($sales_result) > 0){
            $_SESSION['ERROR'] = "A sales record already exists with Quotation Id: '$quotationid'!";
            header('Location: http://localhost:8080/cpexplorer/sales_insert.php');
            exit();
        }
        else if(!is_numeric($salesvalue)){
            $_SESSION['ERROR'] = "Enter a numeric value!";
            header('Location: http://localhost:8080/cpexplorer/sales_insert.php');
            exit();
        }
        //check whether sales value matches with quotation value
        else if($salesvalue != $quotation_value)
        {
            $_SESSION['ERROR'] = "Invalid Sales Value!";
            header('Location: http://localhost:8080/cpexplorer/sales_insert.php');
            exit();
        }else if(mysqli_num_rows($employee_result) == 0){
            $_SESSION['ERROR'] = "Permission denied for User Id: '$epfno'!";
            header('Location: http://localhost:8080/cpexplorer/sales_insert.php');
            exit();
        }
        else{
            $insert_query = "INSERT INTO sales (QuotationId, EPFNo, SalesValue) VALUES('$quotationid', '$epfno', '$salesvalue')";
            $execute_insert_query = mysqli_query($connection, $insert_query);
            if($execute_insert_query){
                $_SESSION['insert_success'] = "Record Inserted Successfully!";
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
        <h1 class="h3 mb-0 text-gray-800">Record Sales</h1>
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
                    //Values for quotations 
                    $connection = mysqli_connect("localhost","root","","commercial_projects");
                    $quotations_select_query = "SELECT * FROM quotation"; 
                    $quotations = mysqli_query($connection, $quotations_select_query);
                ?>

                <form action="" method="POST" >
                    <div class="form-group col-md-4"> 
                        <label >Quotation Id</label>
                        <select class="form-control" name="quotationid"  required>
                            <option selected></option>
                            <?php 
                            if(mysqli_num_rows($quotations) > 0){
                                while($row = mysqli_fetch_assoc($quotations)){
                            ?>
                            <option value="<?php echo $row['QuotationId']; ?>">Quotation Id: <?php echo $row['QuotationId']; ?> Date: <?php echo $row['ApprovedDate']; ?></option>
                            <?php
                                }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4"> 
                        <label >Sales Value</label>
                        <input type="text" name="salesvalue" class="form-control" placeholder="Sales Value" required>
                    </div>
                    <div class="form-group col-md-4"> 
                        <label >EPF No</label>
                        <input type="text" name="epfno" class="form-control" placeholder="EPF No" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" required>
                        <label class="form-check-label" >Confirm that the above information is correct!</label>
                    </div>
                    <br>
                    <button type="submit" name="submit_sales_btn" class="btn btn-success">Submit</button>
                    <a href="sales_overview.php" class="btn btn-danger">Cancel</a>
                </form>
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