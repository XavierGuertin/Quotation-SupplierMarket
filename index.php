<?php include('./assets/header.php'); 
if (session_status() === PHP_SESSION_NONE) 
{
    session_start();
}
?>

        <div class="text" style="margin-top:10%;">
            <h4> Submit & Manage Quotes</h4>
            <h1> Quotation Manager </h1>
            <h3> From a user's perspective to a supplier's</h3>
            <?php 
            if(isset($_SESSION['userId']))
            {
            $name = $_SESSION['userName'];
            $role = $_SESSION['role'];
            echo '<div class="alert alert-secondary" role="alert" style="margin: auto;">Welcome ',$name,'<br>Role: ',$role,'<br>You are logged in!</div>
            <form style="display: inline-block;" action="./assets/php/logoutPhp.php" method="post"><button name="log out" class="loginBtn"> Log out</button></form>';
                if($role=="User")
                    echo '<button name="Portal" class="loginBtn" onclick="location.href=\'userPortal.php\'"> Portal</button>';
                if($role=="Supervisor")
                    echo '<button name="Portal" class="loginBtn" onclick="location.href=\'supervisorPortal.php\'"> Portal</button>';
                if($role=="Supplier")
                    echo '<button name="Portal" class="loginBtn" onclick="location.href=\'supplierPortal.php\'"> Portal</button>';
            }
            else {
            echo '<div class="alert alert-secondary" role="alert" style="margin:auto;margin-top:20px;font-size:small;">You are logged out.</div>
            <button name="log in" class="loginBtn" onclick="location.href=\'login.php\'"> Log in</button>';
            }
            ?> 
        </div>

    </div>


<!---- Footer --->
<div id="footer" style="display: none"></div>
<!--End Of Footer-->
</body>

</html>