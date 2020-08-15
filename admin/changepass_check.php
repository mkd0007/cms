<?php
    include "includes/header.php";

    if(isset($_POST['change']))
    {
        $current=$_POST['current'];
        $current=mysqli_real_escape_string($conn,$current);
        $current=htmlentities($current);

        $new=$_POST['new'];
        $new=mysqli_real_escape_string($conn,$new);
        $new=htmlentities($new);

        $anew=$_POST['anew'];
        $anew=mysqli_real_escape_string($conn,$anew);
        $anew=htmlentities($anew);


        $username=$_SESSION['username'];

        $sql="select password from users where username='$username'";
        $res=mysqli_query($conn,$sql);
        $data=mysqli_fetch_assoc($res);

        $password=$data['password'];

        if(password_verify($current,$password))
        {
            if($new === $anew)
            {
                $new=password_hash($new,PASSWORD_BCRYPT);

                $sql1="update users set password='$new' where username='$username'";
                $res1=mysqli_query($conn,$sql1);

                $_SESSION['message']="<div class='chip green white-text' > Password changed successfully :) </div>";
                header("Location: changepass.php");
            }
            else
            {
                $_SESSION['message']="<div class='chip red white-text' > new password not matched! </div>";
                header("Location: changepass.php");
            }
        }
        else
        {
            $_SESSION['message']="<div class='chip red white-text' > Current password not matched! </div>";
            header("Location: changepass.php");
        }

    }
    else
    {
        $_SESSION['messageLogin']="<div class='chip red white-text' > Login to continue </div>";
        header("Location: index.php");
    }
?>