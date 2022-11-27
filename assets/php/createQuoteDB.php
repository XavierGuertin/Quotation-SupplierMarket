<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_POST['createQuote'])) {
    $requestId = $_GET['requestId'];
    $quotePrice = $_POST['quotePrice'];
    if(empty($quotePrice))
    {
        header("Location: ../../viewDetails.php?requestId=".$requestId);
        exit();
    }

    require_once './dbh.php';
    $supplierAgentName = $_SESSION['userName'];
    $supplierName = $_SESSION['groups'];
    $createdDate = date("Y-m-d");

    $sql = "INSERT INTO heroku_8714cfa5818f328.quotations (requestId, supplierAgentName, supplierName, price, date, status) VALUES ('$requestId','$supplierAgentName','$supplierName','$quotePrice','$createdDate', 'pending')";
    $result = mysqli_query($conn, $sql);

    if ($quotePrice >= 5000) {
        $status = "approval";
    } else {
        $status = "quoted";
    }
    $sql2 = "UPDATE heroku_8714cfa5818f328.requests set status = '$status', modified_at = '$createdDate' WHERE (id = '$requestId')";
    $result2 = mysqli_query($conn, $sql2);

    if ($result && $result2) {
        header("Location: ../../viewDetails.php?requestId=".$requestId."&creation=success");
        exit();
    }
    else {
        header("Location: ../../userRequestForm.php?requestId=".$requestId."&error=errorSending");
        exit();
    }
}
?>