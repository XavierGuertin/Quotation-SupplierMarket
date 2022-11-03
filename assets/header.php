<?php session_start(); ?>
<!DocTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Market</title>

    <!-- import css -->
    <link rel="stylesheet" href="./css/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- website icon-->
    <link rel="icon" href="/img/BG.JPG" sizes="32x32" type="image/JPG">

    <script src="https://code.jquery.com/jquery-3.3.1.js" integity="sha256-2Kok7Mb0yxpgUVvAk/H32jig0SYS2auk4Pfzbm7uH60=" crossorigin "anonymous"></script>
    <script>
        $(function() {
            $('#footer').load("./assets/footer.php");
        });
    </script>

</head>

<body>
    <div class="bgimage">
        <div class="menu">

            <div class="leftmenu">
                <a style="text-decoration:none;" href="./index.php"><h4><i class='bx bx-hive'></i>  Quotation & Supplier Market </h4></a>
            </div>

            <div class="rightmenu">
                <ul>
                    <li id="firstlist">Home</li>
                    <li>Services</li>
                    <li>Work</li>
                    <a href="javascript:pageScroll()"><li id="myButton" type="button" href='#footer'>About Us</li></a>
                    <li>Blogs</li>
                    <li>Contact</li>
                </ul>
            </div>

        </div>

        <!-- login -->

        <!--form action="" class="login-form">
            <h3>log in</h3>
            <br>
            <a href="https://alzheimer.ca/sites/default/files/documents/alzheimers-disease_getting-a-diagnosis_0.pdf" target="_blank">forgot your password?</a>

            <a href="./p6_signup.php">Create An Account</a>
            <a href="./p5_login.php" class="btn"> Login Now </a>
        </form-->
    <!--END OF HEADER-->