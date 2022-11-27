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
    $supplierName = $_SESSION['groups'];

    $sql= "SELECT * FROM heroku_8714cfa5818f328.requests WHERE id = '$id'";
    $request = $conn->query($sql);
    $row = mysqli_fetch_assoc($request);

    $sqlQuote= "SELECT * FROM heroku_8714cfa5818f328.quotations WHERE requestId = '$id' and supplierName = '$supplierName'";
    $quote = $conn->query($sqlQuote);
    if (mysqli_num_rows($quote) == 0) {
        $rowQuote = NULL;
    } else {
        $rowQuote = mysqli_fetch_assoc($quote);
    }

    $sqlNbOfQuote= "SELECT * FROM heroku_8714cfa5818f328.quotations WHERE requestId = '$id'";
    $result = $conn->query($sqlNbOfQuote);
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
                    <input style="background-color: white;border-color: black;margin-left:2%;"value="&nbsp;&nbsp;<?php echo $row["status"];?>" disabled><br><br><br><br><br>
                <?php
                    }
                ?>

            <div style = "text-align:right;padding-right:20%;margin-top:-25%">
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

        <div style = "text-align:left;padding-left:15%;margin-top:2%;">
            <?php
            
            if(isset($_GET['error']) && $_GET['error'] == 'errorSending') 
            {
                echo '<div id="infoAdmin" class="alert alert-danger alert-dismissible fade show" role="alert" style="width:40%;">
                    <strong>Error! </strong>There was an error creating the quote in the Database. Try again.</div>';
            }
            if(isset($_GET['creation']) && $_GET['creation'] == 'success')
            {
                echo '<div id="infoAdmin" class="alert alert-success alert-dismissible fade show" role="alert" style="width:40%;">
                    <strong>Success! </strong>The request has been submitted succesfully<br>
                    <a href="./supplierPortal.php"><u>Click here</u><a> to go to the portal page</div>';
            }
            if(isset($_GET['error']) && $_GET['error'] == 'errorUpdating') 
            {
                echo '<div id="infoAdmin" class="alert alert-danger alert-dismissible fade show" role="alert" style="width:40%;">
                    <strong>Error! </strong>There was an error when choosing the quote. Try again.</div>';
            }
            if(isset($_GET['creation']) && $_GET['creation'] == 'successUpdating')
            {
                echo '<div id="infoAdmin" class="alert alert-success alert-dismissible fade show" role="alert" style="width:40%;">
                    <strong>Success! </strong>The quote has been selected successfully.<br>
                    <a href="./userPortal.php"><u>Click here</u><a> to go to the portal page</div>';
            }

            if ($role == "Supplier") {
                if ($rowQuote == NULL) {
            ?>
                <form action="./assets/php/createQuoteDB.php?requestId=<?php echo $row["id"];?>" method="post">
                    <label style="color:white;margin-right:25.5%">Send a quote:&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
                    <input style="background-color: white;border-color: black;" type ="text" name="quotePrice" id="quote-price" placeholder="&nbsp;Quote Price"><br><br>
                    <input onclick="emptyQuoteForm();" type ="submit" name="createQuote" value="Submit" class="btn btn-primary" style="border-color:black;"></input>
                </form>
            <?php
                } else {
                    if ($row["status"] == "completed" && $supplierName == $row["supplierAssigned"]) {
            ?>
                        <label style="color:white;margin-right:25.5%">Quote was accepted by user at this price:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input style="background-color: white;border-color: black;;margin-left:-25%;width: 10%"value="&nbsp;&nbsp;<?php echo $rowQuote["price"];?> $" disabled><br><br>
                        <a style="color:white">Please contact the user to arrange details.</a>
            <?php
                    } elseif ($row["status"] == "completed" && !($supplierName == $row["supplierAssigned"])){
            ?>
                    <label style="color:white;margin-right:25.5%">The process is done. However the user did not accept your quote.</label><br>
            <?php
                    } elseif ($row["status"] == "quoted" || $row["status"] == "approval"){
            ?>
                        <label style="color:white;margin-right:25.5%">Quote sent:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input style="background-color: white;border-color: black;margin-left:-25%;width: 10%"value="&nbsp;&nbsp;<?php echo $rowQuote["price"];?> $" disabled><br>
                        <label style="color:white;margin-right:25.5%">Waiting for user's response.</label><br>
            <?php
                    }
                }
            } elseif ($role == "User") {
                if (mysqli_num_rows($result) == 0) {
                    echo '<a style="color:white">No quotes have been received yet.</a';
                } elseif ($row["status"] == "completed") {
                    echo '<a style="color:white">You have accepted the quote of ',$row["supplierAssigned"],'<br>
                    on the following date: ',$row["modified_at"],'</a><br><a style="color:white">The process is over, 
                    the supplier will contact you.</a>';
                } else {
            ?>
                    <a style="color:white">Select the quote that you want to accept:</a><br><br>
                    <form action="./assets/php/selectQuoteDB.php?requestId=<?php echo $row["id"];?>" method="post">
            <?php
                    while($rows = mysqli_fetch_assoc($result)){
                        if ($rows["price"] >= 5000) {
            ?>
                            <input style="color:white;" type="radio" id="<?php echo $rows["id"];?>" name="quote" value="<?php echo $rows["id"];?>" disabled>
                            <label style="color:white;" for="quote">Price: <?php echo $rows["price"];?> $. Supplier's name: <?php echo $rows["supplierName"];?>. <span style="color:red;"> Requires supervisor to approve.<span></label><br>
            <?php
                        } else {
            ?>
                            <input style="color:white;" type="radio" id="<?php echo $rows["id"];?>" name="quote" value="<?php echo $rows["id"];?>">
                            <label style="color:white;" for="quote">Price: <?php echo $rows["price"];?> $. Supplier's name: <?php echo $rows["supplierName"];?>.</label><br>
            <?php            
                        }
                    }
            ?>  
                    <input type ="submit" name="chooseQuote" value="Submit" class="btn btn-primary" style="border-color:black;"></input>
                    </form>
            <?php
                } 
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