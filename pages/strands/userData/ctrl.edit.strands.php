<?php
include '../../../includes/session.php';

$strand_id = $_GET['strand_id'];

if (isset($_POST['submit'])) {

    $strand_name = mysqli_real_escape_string($conn, $_POST['strand_name']);
    $strand_def = mysqli_real_escape_string($conn, $_POST['strand_def']);

    $check_double = mysqli_query($conn, "SELECT * FROM tbl_strands
    WHERE strand_name = '$strand_name' AND strand_def = '$strand_def' AND tbl_strands.strand_id") or die(mysqli_error($conn));

    $result = mysqli_num_rows($check_double);

    if ($result == 0) {
        $insertSub = mysqli_query($conn, "UPDATE tbl_strands SET strand_name = '$strand_name', strand_def = '$strand_def' WHERE strand_id = '$strand_id'") or die(mysqli_error($conn));
        $_SESSION['success'] = true;
        header('location: ../edit.strands.php');
    } else {
        $_SESSION['strand_exists'] = true;
        header('location: ../edit.strands.php');
    }
}