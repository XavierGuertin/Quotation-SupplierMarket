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

$(window).scroll(function(){
    if (window.scrollY > 100){
        $(".fa-arrow-alt-circle-up").css({position: 'fixed', bottom: "40px", left: "5%"});
    }
    else {
        $(".fa-arrow-alt-circle-up").css({position: 'absolute', bottom:"-60px", left: "5%"});
    }
    console.log(window.scrollY);
});

function menuButton() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}


// $.fn.followTo = function (pos) {
//     var $this = this,
//         $window = $(window);

//     $window.scroll(function (e) {
//         if ($window.scrollTop() > pos) {
//             $this.css({
//                 position: 'absolute',
//                 top: pos
//             });
//         } else {
//             $this.css({
//                 position: 'fixed',
//                 top: 0
//             });
//         }
//     });
// };

// $('#yourDiv').followTo(250);