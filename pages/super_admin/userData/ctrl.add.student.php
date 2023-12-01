<?php
include '../../../includes/session.php';

if (isset($_POST['submit'])) {

    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $midname = mysqli_real_escape_string($conn, $_POST['midname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    if ($password != $password2) {
        $_SESSION['password_unmatch'] = true;
        header('location: ../add.student.php');
    } else {
        $hashpwd = password_hash($password, PASSWORD_BCRYPT);
        $insertUser = mysqli_query($conn, "INSERT INTO tbl_students (img, student_fname, student_lname, student_mname, email, username, password) 
        VALUES ('$image', '$firstname', '$lastname', '$midname', '$email', '$username', '$hashpwd')") or die (mysql_error($conn));
        $_SESSION['success'] = true;
        header('location: ../add.student.php');
    }
}