
function showFooter(){
    var x = document.getElementById("footer");
    x.style.display = "block";
    window.scrollTo(0, document.body.scrollHeight);
}

function hideFooter(){
    var x = document.getElementById("footer");
    x.style.display = "block";
    window.scrollTo(0, 0);
}

$(window).scroll(function(){
    if (window.scrollY > 85){
        $(".fa-arrow-alt-circle-up").css({position: 'fixed', bottom: "40px", "padding-top": "10px", left: "5%"});
    }
    else {
        $(".fa-arrow-alt-circle-up").css({position: 'absolute', left: "5%"});
    }
    console.log(window.scrollY);
});


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