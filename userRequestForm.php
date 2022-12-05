<?php include('./assets/header.php'); 

    if(isset($_SESSION['userId']))
    {
        if (!($role == "User" or $role == "Supervisor"))
        {
            header("Location: ./index.php");
            alert("You do not have permission to go on this page.");
            exit();
        }
    }
    else
    {
        header("Location: ./index.php");
        alert("You do not have permission to go on this page.");
        exit();
    }
?>
		<div id="formDiv">
			<form class = "form-center" action="./assets/php/createRequestDB.php" method="post"> 
				<h1> New Quotation Request </h1>
				</br>
				
				<?php
                if(isset($_GET['error']) && $_GET['error'] == 'errorSending') 
                {
                    echo '<div id="infoAdmin" class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-left:375px;width:750px;">
                        <strong>Error! </strong>There was an error creating the request in the Database. Try again.</div>';
                }
                if(isset($_GET['creation']) && $_GET['creation'] == 'success')
                {
                    if($role=="Supervisor") $portalPath = "./supervisorPortal.php";
                    if($role=="User") $portalPath = "./userPortal.php";

                    echo '<div id="infoAdmin" class="alert alert-success alert-dismissible fade show" role="alert" style="margin-left:375px;width:750px;">
                        <strong>Success! </strong>The request has been submitted succesfully<br>
                        <a href="./',$portalPath,'"><u>Click here</u><a> to go to the portal page</div>';
                }
                ?>

				<a for="subjectTitle"> Subject </a>
				</br>
				<input type ="text" class="inputRequest" name="subject" id="subject-input" placeholder="Subject Title" ></input>
				</br>

				<a for="description"> Description </a>
				</br>
				<textarea class="inputRequest" id="descriptionBox" name="descriptionBox" rows="10" cols="75" placeholder="Description of request"></textarea>
				</br></br>
				<input onclick="emptyForm();" type ="submit" name="add" value="Submit" class="submit-button"></input>
			</form>	
		</div>
</div>

<!---- Footer --->
<div id="footer" style="display: none"></div>
<!--End Of Footer-->
</body>

</html>
			
			





