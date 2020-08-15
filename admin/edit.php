<?php
    include "includes/header.php";

    if(isset($_SESSION['username']))
    {

        include "includes/navbar.php";

        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $id=mysqli_real_escape_string($conn,$id);
            $id=htmlentities($id);

            $sql="select * from posts where id=$id";
            $res=mysqli_query($conn,$sql);

            if(mysqli_num_rows($res))
            {
                $data=mysqli_fetch_assoc($res);
    ?>
                <div class="container">
                    <div class=" card-panel">

                        <h4><b>Edit your post</b></h4>

                        <?php
                            if(isset($_SESSION['message']))
                            {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                        ?>

                        <form action="edit_check.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">

                            <textarea name="title" id="title" class="materialize-textarea" placeholder="Title for Post" required><?php echo $data['title'] ?></textarea>
                            
                            <h5>Featured Image</h5>
                            <div class="input-field file-field">
                                   <div class="btn black">
                                        Upload File
                                    <input type="file" name="image"  accept="image/png, image/jpeg" required> 
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input type="text" class="file-path" required>
                                    </div>
                            </div>

                            <textarea name="ckeditor" id="ckeditor" class="ckeditor" required><?php  echo $data['content']  ?></textarea>
                        
                            <div class="center" style="margin-top:20px;">
                                <input type="submit" value="Update" name="update" class="btn white-text green">
                                <a href="dashboard.php" class="btn red">Cancel</a>
                            </div>

                        </form>

                    </div>
                </div>
    <?php            
            }
        }
    }
    else
    {
        $_SESSION['messageLogin']="<div class='chip red white-text' >login to Continue </div>";
        header("Location: index.php");
    }  
?>



                <script type="text/javascript" src="../js/jquery.js"></script>
                <!--JavaScript at end of body for optimized loading-->
                <script type="text/javascript" src="../js/materialize.min.js"></script>
                <!-- ckeditor js -->
                <script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>

                

</body>
</html>
