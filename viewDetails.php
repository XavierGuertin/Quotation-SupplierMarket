<?php include('./assets/header.php'); 

    if(!(isset($_SESSION['userId'])))
    {
        header("Location: ./index.php");
        alert("You do not have permission to go on this page.");
        exit();
    }

    if ($role == "User" or $role == "Supervisor") {
        $portailUrl = "./userPortal.php";
    }
    else {
        $portailUrl = "./supplierPortal.php";
    }

    require_once './assets/php/dbh.php';
    $id = $_GET['requestId'];

    $sql= "SELECT * FROM heroku_8714cfa5818f328.requests WHERE id = '$id'";
    $request = $conn->query($sql);

    $row = mysqli_fetch_assoc($request)
?>
		
    <div>
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="color:white;margin-top:3%;">Request Details</h1>
        
        <a style="margin-left:15%;margin-top:-10%;border-color:black;"class="btn btn-primary" href="<?php echo $portailUrl ?>">Return to Portal</a>

        <div style = "text-align:left;padding-left:15%;">
            <?php
                if (mysqli_num_rows($request) == 0) {
                ?>
                    <a style="color:white"> ERROR WHEN RETRIEVING DETAILS OF REQUEST </a>
                <?php
                }
                else {
                ?>
                    <label style="color:white;">Request Id:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input style="background-color: white;border-color: black;margin-left:2%;"value="&nbsp;&nbsp;<?php echo $row["id"];?>" disabled><br><br>

                    <label style="color:white;">Created By:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input style="background-color: white;border-color: black;margin-left:2%;"value="&nbsp;&nbsp;<?php echo $row["created_by"];?>" disabled><br><br>

                    <label style="color:white;">Creation date:</label>
                    <input style="background-color: white;border-color: black;margin-left:2%;"value="&nbsp;&nbsp;<?php echo $row["created_at"];?>" disabled><br><br>

                    <label style="color:white;">Status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input style="background-color: white;border-color: black;margin-left:2%;"value="&nbsp;&nbsp;<?php echo $row["status"];?>" disabled><br><br>
                <?php
                    }
                ?>
        </div>
        <div style = "text-align:right;padding-right:20%;margin-top:-16%">
            <?php
            if (mysqli_num_rows($request) > 0) {
            ?>
                <label style="color:white;margin-right:25.5%">Subject:&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
                <textarea style="background-color: white;border-color: black;margin-left:2%;" rows="1" cols="50" disabled>&nbsp;&nbsp;<?php echo $row["subject"];?></textarea><br><br>

                <label style="color:white;margin-right:23%">Description:&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
                <textarea style="background-color: white;border-color: black;margin-left:2%;" rows="4" cols="50" disabled>&nbsp;&nbsp;<?php echo $row["description"];?></textarea>
            <?php
                }
            ?>
        </div>

    </div>

</div>

<!---- Footer --->
<div id="footer" style="display:none;"></div>
<!--End Of Footer-->
</body>

</html>