<?php
    include "includes/header.php";

    if(isset($_SESSION['username']))
    {
        unset($_SESSION['username']);
        header("Location: index.php");
    }
    else
    {
        $_SESSION['messageLogin']="<div class='chip red white-text' > Login to continue </div>";
        header("Location: index.php");
    }
?>