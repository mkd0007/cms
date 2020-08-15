<?php
    include "includes/header.php";

    if(isset($_POST['login']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $username=mysqli_real_escape_string($conn,$username);
        $password=mysqli_real_escape_string($conn,$password);

        $username=htmlentities($username);
        $password=htmlentities($password);

        $sql="select password from users where username='$username'";
        $res=mysqli_query($conn,$sql);
        $data=mysqli_fetch_assoc($res);
        $pass=$data['password'];

        if(empty($username) || empty($_POST['password']))
        {
            header("Location: index.php");
            $_SESSION['messageLogin']="<div class='chip red white-text' > Fill inputs please. </div>";
        }
        else
        {
            if(password_verify($password,$pass))
            {
                $_SESSION['username']=$username;
                header("Location: dashboard.php");
            }
            else
            {   
                header("Location: index.php");
                $_SESSION['messageLogin']="<div class='chip red white-text' > Sorry, Credential don't match! </div>";
            }
        }




    }
    else
    {
        $_SESSION['messageLogin']="<div class='chip red white-text' >login to Continue </div>";
        header("Location: index.php");
    }
 
    
 ?>   