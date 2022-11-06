<?php include('./assets/header.php'); ?>

<style>
	div{color: white;}
</style>

<body>
    <div style="align-items:center;";>
		<form class = ".form-center"> 
        	<label><h1> New Quotation Request </h1></label>
            	</br>

			<label> Subject </label>
			</br>
				<input onchange = "isSubjectValid()" type ="text" name = "item" id="subject-input" value = "" placeholder = "" >
			</br>

			<label for="descriptionBox"> Description </label>
				</br>
				<textarea id="descriptionBox" name="descriptionBox" rows="10" cols="75">
				</textarea>

				</br>
				</br>
				<input onclick="" type ="submit" name="add" value = "Submit" class = "submit-button";></input>
		</form>	
	</div>        
</body>

<Script> 
console.log("Injected");

//function to check if the user entered a correct subject
function isSubjectValid()
{
console.log("ABCD");
var itemNameRegex = /^[a-zA-Z]+$/;
	if(itemNameRegex.test(document.getElementById("subject-input").value) == true)
	{
		return true; 
	}
	else
	{
		alert("Please enter a subject correctly!");
	}
}
</script>

<!---- Footer --->
<div id="footer" style="display:none;"></div>
<!--End Of Footer-->
</body>

</html>
			
			





