<?php
    session_start();
    include "includes/dbconfig.php";

    if(isset($_POST['submit']))
    {
        $id= $_GET['id'];
        $id=mysqli_real_escape_string($conn,$id);
        $id=htmlentities($id);

        $email=$_POST['email'];
        $email=mysqli_real_escape_string($conn,$email);
        $email=htmlentities($email);

        $comment=$_POST['comment'];
        $comment=mysqli_real_escape_string($conn,$comment);
        $comment=htmlentities($comment);

        $sql="select author_username from posts where id=$id";
        $data=mysqli_fetch_assoc(mysqli_query($conn,$sql));
        $post_author_username=$data['author_username'];
        

        $username=$_SESSION['username'];

        $sql3="insert into comment (post_id,post_author_username,comment_text,email) values($id,'$post_author_username','$comment','$email')";
        $res3= mysqli_query($conn,$sql3);
        if($res3)
        {
            $_SESSION['message']="<div class='chip green white-text' > Comment added successfully :)</div>";
            header("Location: post.php?id=$id");
        }
        else
        {
            $_SESSION['message']="<div class='chip red white-text' > Sorry something went wrong :( </div>";
            header("Location: post.php?id=$id");
        }



    }
    else
    {
        header("Location: index.php");
    }
?>