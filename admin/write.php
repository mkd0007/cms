<?php
    include "includes/header.php";

    if(isset($_SESSION['username']))
    {
?>

<?php
    include "includes/navbar.php";
?>



<div class="container">
    <div class=" card-panel">
        <h4><b>Write your post</b></h4>

        <?php
            if(isset($_SESSION['message']))
            {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>

        <form action="write_check.php" method="POST" enctype="multipart/form-data">

            <textarea name="title" id="title" class="materialize-textarea" placeholder="Title for Post" required> <?php  if(isset($_SESSION['title'])){ echo $_SESSION['title']; unset($_SESSION['title']); }  ?> </textarea>

            <h5>Featured Image</h5>
            <div class="input-field file-field">
                <div class="btn black">
                    Upload File
                   <input type="file" name="image" required  accept="image/png, image/jpeg"> 
                </div>
                <div class="file-path-wrapper">
                    <input type="text" class="file-path" required >
                </div>
            </div>      

            <textarea name="ckeditor" id="ckeditor" class="ckeditor">   <?php  if(isset($_SESSION['content'])){ echo $_SESSION['content']; unset($_SESSION['content']); }  ?>   </textarea>
        
            <div class="center" style="margin-top:20px;">
                <input type="submit" value="Publish" name="publish" class="btn white-text green" required>
                <a href="dashboard.php" class="btn red">Cancel</a>
            </div>

        </form>

    </div>
</div>



      <script type="text/javascript" src="../js/jquery.js"></script>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <!-- ckeditor js -->
      <script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>

     

 </body>
  </html>
  
<?php
    }
    else
    {
        $_SESSION['messageLogin']="<div class='chip red white-text' >login to Continue </div>";
        header("Location: index.php");
    }
?>