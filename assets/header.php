<?php 
if (session_status() === PHP_SESSION_NONE) 
{
    session_start();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Market</title>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- import js -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/Javascript" src="js/validation.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/be2443f621.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integity="sha256-2Kok7Mb0yxpgUVvAk/H32jig0SYS2auk4Pfzbm7uH60=" crossorigin "anonymous"></script>
    <script>
        $(function() {
            $('#footer').load("./assets/footer.php");
        });
    </script>

    <!-- import css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">

    <!-- website icon-->
    <link rel="icon" href="./img/BG.JPG" sizes="32x32" type="image/JPG">

</head>

<body>
    <div class="bgimage">
        <div class="menu">

            <div class="leftmenu">
                <a style="text-decoration:none;" href="./index.php"><h4><i class='fa-brands fa-think-peaks fa-beat' style="--fa-animation-duration: 2s;"></i>  Quotation & Supplier Market </h4></a>
            </div>
            <div class="rightmenuBurger">
                <ul>
                    <a href="javascript:void(0);" class="icon" onclick="menuButton()">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div id="myLinks" style="display: none;">
                    <a href="./index.php"><li id="firstlist">Home</li></a>
                    <?php
                    if(isset($_SESSION['userName'])) {
                        $role = $_SESSION['role'];
                        if($role=="User") {
                            echo '<a href="./userRequestForm.php"><li>Request Form</li></a>';
                            echo '<a href="./userPortal.php"><li>Portal</li></a>';
                        }
                        if($role=="Supervisor") {
                            echo '<a href="./userRequestForm.php"><li>Request Form</li></a>';
                            echo '<a href="./supervisorPortal.php"><li>Portal</li></a>';
                        }
                        if($role=="Supplier")
                            echo '<a href="./supplierPortal.php"><li>Portal</li></a>';
                    }
                    ?>
                    <a onclick="showFooter()"><li>About Us</li></a>
                    <?php
                    if(isset($_SESSION['userName'])) {
                        echo '<form id="logOutHeader" action="./assets/php/logoutPhp.php" method="post"><a onclick="logOutHeader.submit();">log out</a></form>';
                    }
                    ?>
                    </div>
                </ul>
            </div>
            <div class="rightmenu">
                <ul>
                    <a href="./index.php"><li id="firstlist">Home</li></a>
                    <?php
                    if(isset($_SESSION['userName'])) {
                        $role = $_SESSION['role'];
                        if($role=="User") {
                            echo '<a href="./userRequestForm.php"><li>Request Form</li></a>';
                            echo '<a href="./userPortal.php"><li>Portal</li></a>';
                        }
                        if($role=="Supervisor") {
                            echo '<a href="./userRequestForm.php"><li>Request Form</li></a>';
                            echo '<a href="./supervisorPortal.php"><li>Portal</li></a>';
                        }
                        if($role=="Supplier")
                            echo '<a href="./supplierPortal.php"><li>Portal</li></a>';
                    }
                    ?>
                    <li onclick="showFooter()">About Us</li>
                    <?php
                    if(isset($_SESSION['userName'])) {
                        echo '<form id="logOutHeader" style="display: inline-block;" action="./assets/php/logoutPhp.php" method="post"><li onclick="logOutHeader.submit();">log out</li></form>';
                    }
                    ?>
                </ul>
                </div>
        </div>