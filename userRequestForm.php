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
		<div id="formDiv" style="color: white;text-align:center;">
			<form class = "form-center"> 
				<h1> New Quotation Request </h1>
				</br>

				<a> Subject </a>
				</br>
				<input type ="text" class="inputRequest" name="item" id="subject-input" placeholder="Subject Title" ></input>
				</br>

				<a> Description </a>
				</br>
				<textarea class="inputRequest" style="max-height:300px" id="descriptionBox" name="descriptionBox" rows="10" cols="75" placeholder="Description of request"></textarea>
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
			
			





