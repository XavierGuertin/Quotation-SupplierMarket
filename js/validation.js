
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
        if(emptyE.value == ""){
            alert("Email missing.");
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

//email empty validation
function emptyForm(){
    var emptyS = document.getElementById("subject-input");
    var emptyD = document.getElementById("descriptionBox");

    if(emptyS.value == "" || emptyD.value == ""){
        if(emptyS.value == ""){
            alert("subject is missing");
            emptyS.focus();
            emptyS.select();
        }
        else {
            alert("description is missing");
            emptyD.focus();
            emptyD.select();
        }
        return false;
    }
    else
        return true;
}

function emptyQuoteForm(){
    var empty = document.getElementById("quote-price");

    if(empty.value == ""){
            alert("Price is missing");
            empty.focus();
        return false;
    }
    else
        return true;
}