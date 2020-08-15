<?php   
        include "includes/header.php";

        if(isset($_POST['publish']))
        {
            $data=$_POST['ckeditor'];
            $data=mysqli_real_escape_string($conn,$data);

            $title=$_POST['title'];
            $title=mysqli_real_escape_string($conn,$title);
            $title=htmlentities($title);

            $image=$_FILES['image'];
            $img_name=$_FILES['image']['name'];
            $img_size=$_FILES['image']['size'];
            $tmp_dir=$_FILES['image']['tmp_name'];
            $type=$_FILES['image']['type'];

            $author_username=$_SESSION['username'];

            if($type =="image/jpeg" || $type =="image/png" || $type =="image/jpg")
            {
                if($img_size <= 2097152)
                {

                   $uploaddir='../img/';
                   $uploadfile = $uploaddir . basename($img_name);

                   move_uploaded_file($tmp_dir,$uploadfile);

                   

                    $sql="insert into posts(title,content,author_username,feature_img,view) values('$title','$data','$author_username','$img_name',0)";
                    $res=mysqli_query($conn,$sql); 

                

                    if($res)
                    {
                        $_SESSION['message']="<div class='chip green white-text'>Post is Published</div>";
                        header("Location: write.php");
                    }
                    else
                    {
                        $_SESSION['message']="<div class='chip red white-text'>Sorry, Something went wrong!</div>";
                        header("Location: write.php");
                    }
                }
                else
                {   
                    $_SESSION['title']=$title;
                    $_SESSION['content']=$data;
                    $_SESSION['message']="<div class='chip red white-text'>Sorry, image size exceded 2MB.</div>";
                    header("Location: write.php");
                } 
            }
            else
            {
                $_SESSION['title']=$title;
                $_SESSION['content']=$data;
                $_SESSION['message']="<div class='chip red white-text'>Sorry, That image format is not supported!</div>";
                header("Location: write.php");
            }        
            
        } 
        else
        {
            $_SESSION['messageLogin']="<div class='chip red white-text' >login to Continue </div>";
            header("Location: index.php");
        }
    ?>