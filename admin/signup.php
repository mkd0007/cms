<?php
    include "includes/header.php";

    if(isset($_POST['signup']))
    {
        $email=$_POST['email'];
        $username=$_POST['username'];
        $authorname=$_POST['authorname'];
        $password=$_POST['password'];

        $email=mysqli_real_escape_string($conn,$email);
        $username=mysqli_real_escape_string($conn,$username);
        $authorname=mysqli_real_escape_string($conn,$authorname);
        $password=mysqli_real_escape_string($conn,$password);

        $email=htmlentities($email);
        $username=htmlentities($username);
        $authorname=htmlentities($authorname);
        $password=htmlentities($password);
        $password=password_hash($password,PASSWORD_BCRYPT);

        $sql1="select * from users where username='$username' or email='$email'";
        $res1=mysqli_query($conn,$sql1);

        if(empty($username) || empty($email) || empty($password))
            {   
                header("Location: index.php#signup");
                $_SESSION['messageSignup']="<div class='chip red white-text' > Fill inputs please. </div>";
            }
            else
            {
                if(mysqli_num_rows($res1)>0)
                {
                    header("Location: index.php");
                    $_SESSION['messageLogin']="<div class='chip green white-text' > Account Already exist, Please login to Continue </div>";
                }
                else
                {
                    
                    $sql="insert into users(author_name,username,email,password,user_img) values('$authorname','$username','$email','$password','person.png')";
                    $res=mysqli_query($conn,$sql);                  
                    if($res)
                    {
                        header("Location: index.php");
                        $_SESSION['messageLogin']="<div class='chip green white-text' > You have been successfully registered, Login to Continue.</div>";
                    }
                    else
                    {
                        header("Location: index.php#signup");
                        $_SESSION['messageSignup']="<div class='chip red white-text' > Something went worng! Signup again. </div>";
                    }
                }
            }

        

    }
    else
    {
        $_SESSION['messageLogin']="<div class='chip red white-text' >login to Continue </div>";
        header("Location: index.php");
    }
?>