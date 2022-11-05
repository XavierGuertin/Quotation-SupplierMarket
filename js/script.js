
function showFooter(){
    var x = document.getElementById("footer");
    x.style.display = "block";
    window.scrollTo(0, document.body.scrollHeight);
}

function hideFooter(){
    var x = document.getElementById("footer");
    x.style.display = "none";
    window.scrollTo(0, 0);
}