<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_POST['chooseQuote'])) {
    $requestId = $_GET['requestId'];
    $quoteId = $_POST['quote'];
    if(empty($quoteId))
    {
        header("Location: ../../viewDetails.php?requestId=".$requestId);
        exit();
    }

    require_once './dbh.php';
    $createdDate = date("Y-m-d");
    $statusA = "approved";
    $statusR = "rejected";
    $statusC = "completed";
    $statusS = "supervisor";
    $statusAS = "approval";
    $role = $_SESSION['role'];

    //verify that the quote id appears and go search the supplierName
    $sql= "SELECT * FROM heroku_8714cfa5818f328.quotations WHERE id = '$quoteId'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $supplierName = $row["supplierName"];
    $quotePrice = $row["price"];

    //send quote to supervisor.
    if ($quotePrice >= 5000 && $role == "User"){
        $sql2 = "UPDATE heroku_8714cfa5818f328.requests set status = '$statusAS', supplierAssigned = '$supplierName', modified_at = '$createdDate' WHERE (id = '$requestId')";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            header("Location: ../../viewDetails.php?requestId=".$requestId."&creation=successSupervisor");
            exit();
        }
        else {
            header("Location: ../../viewDetails.php?requestId=".$requestId."&error=errorUpdating");
            exit();
        }

    } else {

        $sql2 = "UPDATE heroku_8714cfa5818f328.requests set status = '$statusC', supplierAssigned = '$supplierName', modified_at = '$createdDate' WHERE (id = '$requestId')";
        $result2 = mysqli_query($conn, $sql2);

        $sql3 = "UPDATE heroku_8714cfa5818f328.quotations set status = '$statusA' WHERE (id = '$quoteId')";
        $result3 = mysqli_query($conn, $sql3);

        //change status of other quotes to rejected
        $sql= "SELECT * FROM heroku_8714cfa5818f328.quotations WHERE requestId = '$requestId'";
        $results = $conn->query($sql);

        while($rows = mysqli_fetch_assoc($results)) {
            if (!($rows["supplierName"] == $supplierName)){
                $changeQuoteId = $rows["id"];
                $sql4 = "UPDATE heroku_8714cfa5818f328.quotations set status = '$statusR' WHERE (id = '$changeQuoteId')";
                $result4 = mysqli_query($conn, $sql4);
            }
        }



        if ($result2 && $result3) {
            header("Location: ../../viewDetails.php?requestId=".$requestId."&creation=successUpdating");
            exit();
        }
        else {
            header("Location: ../../viewDetails.php?requestId=".$requestId."&error=errorUpdating");
            exit();
        }
    }
}
?>