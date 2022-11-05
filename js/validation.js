
//store login email
function storeEmail(){
    var email = this.value;
    localStorage.setItem("loginEmail", email);
}
//local storage to keep email value after refresh
function getEmail(){
    
    var email = localStorage.getItem("loginEmail");
    if(email == null)
        document.getElementById("loginEmail").value = " ";
    else
        document.getElementById("loginEmail").value = email; 
    
}
//email empty validation
function emptyLogin(){
    var emptyE = document.getElementById("loginEmail");
    var emptyP = document.getElementById("loginPass");

    if(emptyE.value == "" || emptyP.value == ""){
        if(emptyE == ""){
            alert("Email or username missing.");
            emptyE.focus();
            emptyE.select();
        }
        else {
            alert("Password missing.");
            emptyP.focus();
            emptyP.select();
        }
        return false;
    }
    else
        return true;
}