<?php

    include "includes/header.php"; 
    if(isset($_SESSION['username']))
    {
    include "includes/navbar.php";  

    $dir="../img/";
    $files=scandir($dir);

    if($files)
    {
        
?>
        
        <div class="row container">
        
<?php
            foreach($files as $file)
            {
                if(strlen($file)>2)
                {
?>              
                    <div class="col l3 m4 s6">
                    <div class="card">
                        <div class="card-image">
                            <img src="../img/<?php echo $file; ?>" alt="" style="height:200px; width:300px; padding:2px;" >
                            <span  class="card-title"><?php   echo $file;   ?></span>
                        </div>
                    </div>
                    </div>

<?php      
                }
            }
 ?>
        
        </div>

 <?php       
    }
}
else
{
    $_SESSION['messageLogin']="<div class='chip red white-text' >login to Continue </div>";
    header("Location: index.php");
}
    include "includes/footer.php";
?>
