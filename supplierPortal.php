<?php include('./assets/header.php'); 
    $name = $_SESSION['userName'];
    $role = $_SESSION['role'];

    if(isset($_SESSION['userId'])) {
        if (!($role == "Supplier")) {
            header("Location: ./index.php");
            alert("You do not have permission to go on this page.");
            exit();
        }
    } else {
        header("Location: ./index.php");
        alert("You do not have permission to go on this page.");
        exit();
    }

    require_once './assets/php/dbh.php';
    $name = $_SESSION['userName'];
    $role = $_SESSION['role'];
    $group = $_SESSION['groups'];

    $sqlPending= "SELECT * FROM heroku_8714cfa5818f328.requests WHERE status = 'pending'";
    $pendingResults = $conn->query($sqlPending);

    $sqlQuoted= "SELECT * FROM heroku_8714cfa5818f328.requests WHERE status = 'approval' or status = 'quoted'";
    $quotedResults = $conn->query($sqlQuoted);

    $sqlCompleted= "SELECT * FROM heroku_8714cfa5818f328.requests WHERE status = 'completed'";
    $completedResults = $conn->query($sqlCompleted);
?>

<body>
    
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="color:white;">Supplier's Portal<br>Requests Received</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <h6 class="mt-n1 mb-0" style="color:white;">Received</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <h6 class="mt-n1 mb-0" style="color:white;">Pending User's reply</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <h6 class="mt-n1 mb-0" style="color:white;">Answered</h6>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <?php
                            if (mysqli_num_rows($pendingResults) == 0) {
                            ?>
                                <a style="color:white"> NOTHING TO SHOW </a>
                            <?php
                            }
                            else {
                                while($row = mysqli_fetch_assoc($pendingResults)){
                            ?>
                                    <div class="reqList p-4 mb-4">
                                        <div class="row g-4">
                                            <div class="col-sm-12 col-md-8 d-flex align-items-center" style="margin-top:-55px;">
                                                <div class="text-start ps-4" style="margin-top:45px;">
                                                    <h5 class="mb-3"><?php echo $row["subject"];?></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center" style="margin-top:-37px;">
                                                <a class="btn btn-primary" href="">Details</a>
                                                <small class="text-truncate" style="margin-top:-30px;margin-right:35%;"><i class="far fa-calendar-alt text-primary me-2"></i>   Date Created: <?php echo $row["created_at"];?></small>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <?php
                            if (mysqli_num_rows($quotedResults) == 0) {
                            ?>
                                <a style="color:white"> NOTHING TO SHOW </a>
                            <?php
                            }
                            else {
                                while($row = mysqli_fetch_assoc($quotedResults)){
                            ?>
                                    <div class="reqList p-4 mb-4">
                                        <div class="row g-4">
                                            <div class="col-sm-12 col-md-8 d-flex align-items-center" style="margin-top:-55px;">
                                                <div class="text-start ps-4" style="margin-top:45px;">
                                                    <h5 class="mb-3"><?php echo $row["subject"];?></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center" style="margin-top:-37px;">
                                                <a class="btn btn-primary" href="">Details</a>
                                                <small class="text-truncate" style="margin-top:-30px;margin-right:35%;"><i class="far fa-calendar-alt text-primary me-2"></i>   Date Created: <?php echo $row["created_at"];?></small>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <?php
                            if (mysqli_num_rows($completedResults) == 0) {
                            ?>
                                <a style="color:white"> NOTHING TO SHOW </a>
                            <?php
                            }
                            else {
                                while($row = mysqli_fetch_assoc($completedResults)){
                            ?>
                                    <div class="reqList p-4 mb-4">
                                        <div class="row g-4">
                                            <div class="col-sm-12 col-md-8 d-flex align-items-center" style="margin-top:-55px;">
                                                <div class="text-start ps-4" style="margin-top:45px;">
                                                    <h5 class="mb-3"><?php echo $row["subject"];?></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center" style="margin-top:-37px;">
                                                <a class="btn btn-primary" href="">Details</a>
                                                <small class="text-truncate" style="margin-top:-30px;margin-right:35%;"><i class="far fa-calendar-alt text-primary me-2"></i>   Date Created: <?php echo $row["created_at"];?></small>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->
    </div>


<!---- Footer --->
<div id="footer" style="display:none;"></div>
<!--End Of Footer-->
</body>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</html>