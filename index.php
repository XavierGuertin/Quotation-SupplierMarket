<?php include('./assets/header.php'); ?>

        <div class="text">
            <h4> Submit & Manage Quotes</h4>
            <h1> Quotation Manager </h1>
            <h3> From a user's perspective to a supplier's</h3>
            <button class="btn"> Log in</button>
            <button class="btn"> Sign up</button>
        </div>

    </div>


<!---- Footer --->
<div id="footer" style="display:none;"></div>
<!--End Of Footer-->
</body>

<script>
    $('#myButton')
    .click(function() {
    $('#footer').toggle('slow', function() {
        // Animation complete.
    });
    }
    );

    function pageScroll() {
    	window.scrollTo(0, document.body.scrollHeight);
    	scrolldelay = setTimeout('pageScroll()',1); // scrolls every 100 milliseconds
        break;
    }
</script>

</html>