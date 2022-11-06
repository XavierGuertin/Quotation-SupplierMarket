<?php include('./assets/header.php'); 
if (session_status() === PHP_SESSION_NONE) 
{
    session_start();
}
?>

        <div class="text">
            <h4> Submit & Manage Quotes</h4>
            <h1> Quotation Manager </h1>
            <h3> From a user's perspective to a supplier's</h3>
            <?php 
            if(isset($_SESSION['userId']))
            {
            $name = $_SESSION['userName'];
            $role = $_SESSION['role'];
            echo '<div class="alert alert-secondary" role="alert" style=" width:15%;margin: auto;">Welcome ',$name,'<br>Role: ',$role,'<br>You are logged in!</div>
            <form style="display: inline-block;" action="./assets/php/logoutPhp.php" method="post"><button name="log out" class="btn"> Log out</button></form>';
                if($role=="User" || $role=="Supervisor")
                    echo '<button name="Portal" class="btn" onclick="location.href=\'userPortal.php\'"> Portal</button>';
                if($role=="Supplier")
                    echo '<button name="Portal" class="btn" onclick="location.href=\'supplierPortal.php\'"> Portal</button>';
            }
            else {
            echo '<div class="alert alert-secondary" role="alert" style=" width:15%;margin: auto;">You are logged out.</div>
            <button name="log in" class="btn" onclick="location.href=\'login.php\'"> Log in</button>';
            }
            ?> 
        </div>

    </div>


<!---- Footer --->
<div id="footer" style="display:none;"></div>
<!--End Of Footer-->
</body>

</html>