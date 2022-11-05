<?php

if(isset($_POST['login-submit']))
{  
    require 'dbh.php';

    $email = $_POST['email'];
    $password = $_POST['pwd'];

    if(empty($email) || empty($password))
    {
        header("Location: ../../login.php");
        exit();
    }
    else 
    {
        $sql= "SELECT * FROM heroku_8714cfa5818f328.users WHERE email = '$email' and password = '$password'"; //check using email
        $sql2 = "SELECT * FROM heroku_8714cfa5818f328.users WHERE username = '$email' and password = '$password'"; //check using username

        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);
        if($result && $result2)
        {
            $num = mysqli_num_rows($result);
            $num2 = mysqli_num_rows($result2);
            if($num > 0)
            {
                if (session_status() === PHP_SESSION_NONE) 
                {
                    session_start();
                }
                $row = mysqli_fetch_assoc($result);
                $_SESSION['userId'] = $row['id'];
                $_SESSION['userName'] = $row['username'];
                $_SESSION['userEmail'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['groups'] = $row['groups'];

                header("Location: ../../index.php?login=success"); //redirect to home page
                exit();
            }
            else if ($num2 > 0)
            {
                if (session_status() === PHP_SESSION_NONE) 
                {
                    session_start();
                }
                $row = mysqli_fetch_assoc($result2);
                $_SESSION['userId'] = $row['id'];
                $_SESSION['userName'] = $row['username'];
                $_SESSION['userEmail'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['groups'] = $row['groups'];

                header("Location: ../../index.php?login=success"); //redirect to home page
                exit();
            }
            else
            {
                header("Location: ../../login.php?error=invalidcredentials");
                exit();
            }
        }
    }
}
else
{
    header("Location: ../../index.php?logout=success");
    exit();
}
