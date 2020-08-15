<?php

    include "includes/header.php";

    if(isset($_SESSION['username']))
    {

        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $id=mysqli_real_escape_string($conn,$id);
            $id=htmlentities($id);
    
            $sql="delete from posts where id=$id";
            $res=mysqli_query($conn,$sql);
    
            if($res)
            {
                $_SESSION['delmsg'] = "<div class='chip green white-text'>Deleted Successfully :)</div>";
                header("Location: dashboard.php");
               
            }
            else
            {
                $_SESSION['delmsg'] = "<div class='chip red white-text'>Something went wrong :(</div>";
                header("Location: dashboard.php");
                
    
            }
            
        }
    }
    else
    {
        $_SESSION['messageLogin']="<div class='chip red white-text' >login to Continue </div>";
        header("Location: index.php");
    }
    
?>