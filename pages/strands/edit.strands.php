<?php
require '../../includes/session.php';

$strand_id = $_GET['strand_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Strands | BED Taguig</title>

    <?php include '../../includes/links.php'; ?>

</head>

<body class="hold-transition layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <?php include '../../includes/navbar.php' ?>

        <?php include '../../includes/sidebar.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Edit Strands</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"></a></li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <form action="userData/ctrl.edit.strands.php?strand_id=<?php echo $strand_id ?>"
                                    enctype="multipart/form-data" method="POST">
                                    <div class="card-header">
                                        <h3 class="card-title">Strands Info</h3>
                                        <div class="card-tools">
                                        </div>
                                    </div>
                                    <?php
                                    $subject_info = mysqli_query($conn, "SELECT * FROM tbl_strands WHERE strand_id = '$strand_id'");
                                    while ($row = mysqli_fetch_array($subject_info)) {
                                        ?>
                                        <div class="card-body">
                                            <div class="row mb-4 mt-4 ">
                                                <div class="input-group col-md-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>Strand ID</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="strand_id"
                                                        placeholder="Enter Strand Code"
                                                        value="<?php echo $row['strand_id'] ?>" required>
                                                </div>


                                                <div class="input-group col-md-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>Strand
                                                                Definition</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="strand_def"
                                                        placeholder="Enter Strand Description"
                                                        value="<?php echo $row['strand_def'] ?>" required>
                                                </div>

                                            </div>
                                            <div class="row mb-4 mt-4 ">

                                                <div class="input-group col-md-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>Strand Name</b></span>
                                                    </div>
                                                    <select class="form-control select2 select2-info custom-select"
                                                        data-dropdown-css-class="select2-info"
                                                        data-placeholder="Select Strand" name="strand_name" required>
                                                        <option value="<?php echo $row['strand_name']; ?>">
                                                            <?php echo $row['strand_name']; ?>
                                                        </option>
                                                        <?php
                                                        $query = mysqli_query($conn, "SELECT * from tbl_strands WHERE strand_id NOT IN ('$row[strand_id]')");
                                                        while ($row2 = mysqli_fetch_array($query)) {
                                                            echo '<option value="' . $row2['strand_id'] . '">' . $row2['strand_name'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm float-right ml-2"
                                            name="submit">Submit
                                        </button>
                                    </div>
                                </form>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include '../../includes/footer.php'; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php include '../../includes/script.php'; ?>
</body>

</html>