<?php
    include "includes/header.php";

    if(isset($_POST['update']))
    {
        $username1=$_SESSION['username'];
        
        $author_name=$_POST['author_name'];
        $author_name= mysqli_real_escape_string($conn,$author_name);
        $author_name= htmlentities($author_name);

        $username=$_POST['username'];
        $username= mysqli_real_escape_string($conn,$username);
        $username= htmlentities($username);

        $email=$_POST['email'];
        $email= mysqli_real_escape_string($conn,$email);
        $email= htmlentities($email);

        $user_image=$_FILES['user_image'];
        $img_name=$_FILES['user_image']['name'];
        $tmp_dir=$_FILES['user_image']['tmp_name'];


        $sql="update users set author_name='$author_name',username='$username',email='$email',user_img='$img_name' where username='$username1'";
        $sql1="update posts set author_username='$username' where author_username='$username1'";
        $sql2="update comment set post_author_username='$username' where post_author_username='$username1'";
        $res=mysqli_query($conn,$sql);
        $res1=mysqli_query($conn,$sql1);
        $res2=mysqli_query($conn,$sql2);

        if($res && ($res1 && $res2))
            {   
                move_uploaded_file($tmp_dir,"img/" . basename($img_name));

                $_SESSION['username']=$username;
                $_SESSION['pro-message']="<div class='chip green white-text'>Profile is Updated</div>";
                header("Location: profile.php");
            }
            else
            {
                $_SESSION['pro-message']="<div class='chip red white-text'>Sorry, Something went wrong!</div>";
                header("Location: profile.php");
            }


    }
    else
    {
        $_SESSION['messageLogin']="<div class='chip red white-text' > Login to continue </div>";
        header("Location: index.php");
    }
?>