<?php 
if (session_status() === PHP_SESSION_NONE) 
{
    session_start();
}
?>
<!DocTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Market</title>

    <!-- import css -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/Javascript" src="js/validation.js"></script>
    <script type="text/Javascript" src="js/login.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="./css/styles.css">
    

    <!-- website icon-->
    <link rel="icon" href="./img/BG.JPG" sizes="32x32" type="image/JPG">

    <script src="https://code.jquery.com/jquery-3.3.1.js" integity="sha256-2Kok7Mb0yxpgUVvAk/H32jig0SYS2auk4Pfzbm7uH60=" crossorigin "anonymous"></script>
    <script>
        $(function() {
            $('#footer').load("./assets/footer.php");
        });
    </script>
    <script src="js/script.js"></script>

</head>

<body>
    <div class="bgimage">
        <div class="menu">

            <div class="leftmenu">
                <a style="text-decoration:none;" href="./index.php"><h4><i class='bx bx-hive'></i>  Quotation & Supplier Market </h4></a>
            </div>

            <div class="rightmenu">
                <ul>
                    <a href="./index.php"><li id="firstlist">Home</li></a>
                    <?php
                    if(isset($_SESSION['userName'])) {
                        $role = $_SESSION['role'];
                        if($role=="User" || $role=="Supervisor")
                            echo '<a href="./userPortal.php"><li>Portal</li></a>';
                        if($role=="Supplier")
                            echo '<a href="./supplierPortal.php"><li>Portal</li></a>';
                    }
                    ?>
                    <li onclick="showFooter()">About Us</li>
                </ul>
            </div>

        </div>

        <!-- login -->

        <!--form action="" class="login-form">
            <h3>log in</h3>
            <br>
            <a href="https://alzheimer.ca/sites/default/files/documents/alzheimers-disease_getting-a-diagnosis_0.pdf" target="_blank">forgot your password?</a>

            <a href="./signup.php">Create An Account</a>
            <a href="./login.php" class="btn"> Login Now </a>
        </form-->
    <!--END OF HEADER-->