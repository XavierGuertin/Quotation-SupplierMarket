<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_POST['add'])) {
    $subjectTitle = $_POST['subject'];
    $description = $_POST['descriptionBox'];

    if(empty($subjectTitle) || empty($description))
    {
        header("Location: ../../userRequestForm.php");
        exit();
    }

    require_once './dbh.php';
    $username = $_SESSION['userName'];
    $group = $_SESSION['groups'];
    $status = "pending";
    $createdDate = date("Y-m-d");

    $sql = "INSERT INTO heroku_8714cfa5818f328.requests (created_by, subject, description, groupAssigned, status, created_at, modified_at, supplierAssigned) VALUES ('$username','$subjectTitle','$description','$group','$status','$createdDate', '$createdDate', '')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../userRequestForm.php?creation=success");
        exit();
    }
    else {
        header("Location: ../../userRequestForm.php?error=errorSending");
        exit();
    }
}
?>