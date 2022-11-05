<?php 

    include('./assets/header.php');
    if (session_status() === PHP_SESSION_NONE) 
    {
    session_start();
    }

?>
    <main>
        <form action="./assets/php/loginPhp.php" method="post">

            <div class="login-container">
                <h1 class="section-title"><span>Log in</span></h1>

                <?php
                if(isset($_GET['error']) && $_GET['error'] == 'invalidcredentials') 
                {
                    echo '<div id="infoAdmin" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error! </strong>Username or Password is invalid. Try again.</div>';
                }
                if(isset($_GET['login']) && $_GET['login'] == 'success')
                {
                    echo '<div id="infoAdmin" class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success! </strong>You have logged in successfully.<br>
                        <a href="./index.php"><u>Click here</u><a> to go to the main page</div>';
                }
                ?>

                <?php 
                    if(isset($_SESSION['userId']))
                    {
                    $name = $_SESSION['userName'];
                    echo '<div class="alert alert-secondary" role="alert" style=" width:100%;margin: auto; text-align: center;
                    vertical-align: middle;">Welcome ',$name,'.<br>You are logged in!</div> <br><br>
                    <form action="./assets/php/logoutPhp.php" method="post"><button class="btn btn-outline-warning" style="margin: auto; display: block;" type="submit" name="logout-submit">Logout</button></form>';
                    }
                    else {
                    echo '
                        <div class="textbox">
                            <i class="fa fa-user-circle-o" style="margin-bottom:5px;font-size:18px;" aria-hidden="true"></i>
                            <input style="text-transform:none" class="form-control" type="text" id="loginEmail" name="email" placeholder="Email or Username" onmouseover="this.focus();">
                        </div>
                        <div class="textbox">
                            <i class="fa fa-lock" style="margin-bottom:5px;font-size:18px;" aria-hidden="true"></i>
                            <input style="text-transform:none" class="form-control" type="password" id="loginPass" name="pwd" placeholder="Password" onmouseover="this.focus();"></br>
                        </div>
                        <div class="form-check" style="margin-left:10%;">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember" style="margin-left:35px;">Remember Me</label>
                        </div>
                        <div style="margin-left:-10%; padding-bottom:5px;">
                            <button href="./index.php" class="login-btn" type="submit" name="login-submit" onclick="emptyLogin();">Log in</button>
                        </div>
                        <br>
                        <a style="margin-left:25%" href="https://alzheimer.ca/sites/default/files/documents/alzheimers-disease_getting-a-diagnosis_0.pdf" target="_blank">forgot your password?</a><br>
                        ';
                    }
                ?>
            </div>
        </form>
    </main>


    </div>

    <!---- Footer --->
    <div id="footer" style="display:none;"></div>
    <!--End Of Footer-->
</body>

</html>