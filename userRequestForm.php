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

	if(isset($_POST['add'])){
		
	}
?>
		<div id="formDiv">
			<form class = "form-center" action="" method="post"> 
				<h1> New Quotation Request </h1>
				</br>

				<a for="subjectTitle"> Subject </a>
				</br>
				<input type ="text" class="inputRequest" name="subject" id="subject-input" placeholder="Subject Title" ></input>
				</br>

				<a for="description"> Description </a>
				</br>
				<textarea class="inputRequest" id="descriptionBox" name="descriptionBox" rows="10" cols="75" placeholder="Description of request"></textarea>
				</br></br>
				<input onclick="" type ="submit" name="add" value="Submit" class="submit-button"></input>
			</form>	
		</div>
</div>

<!---- Footer --->
<div id="footer" style="display:none;"></div>
<!--End Of Footer-->
</body>

</html>
			
			





