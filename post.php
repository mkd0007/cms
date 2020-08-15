<?php
    session_start();
    include "includes/header.php";
?>

<?php
    include "includes/navbar.php";
?>


<div class="row">

    <!--Main Blog Content Area -->
    <div class="col l9 m9 s12">
        <?php
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                    $id=mysqli_real_escape_string($conn,$id);
                    $id=htmlentities($id);

                    $sql="select * from posts where id=$id";
                    $res=mysqli_query($conn,$sql);

                    if(mysqli_num_rows($res) > 0)
                    {
                        $row=mysqli_fetch_assoc($res);
                        $title=$row['title'];
                        $content=$row['content'];
                        $author_username=$row['author_username'];

                        //Get author fullname
                        $sql6="select * from users where username='$author_username'";
                        $res6=mysqli_query($conn,$sql6);
                        $row6=mysqli_fetch_assoc($res6);
                        $author_name=$row6['author_name'];
                                                

                        //post view update start
                        $sql1="select view from posts where id=$id";
                        $res1=mysqli_query($conn,$sql1);
                        $row1=mysqli_fetch_assoc($res1);

                        $view=$row1['view'];
                        $view=$view+1;

                        $sql2="update posts set view=$view where id=$id";
                        mysqli_query($conn,$sql2);


        ?>
               
                     
                    <div class="card-panel" style="padding:10px;">
                        <h4 class="center">  <?php echo ucwords($title); ?>   </h4>
                        <div class="divider"></div>
                        <p class="flow-text" >  <?php echo $content ?>   </p>
                        
                        <span class="grey-text text-darken-1"> by <b> <?php echo $author_name ?> </b></span>
                        <br>
                    </div>

                    <div class="card-panel">
                    
                        <div class="row " >
                            <div class="l8 offset-l2 m10 offset-m1 s12 container">
                            <h5>Write your comment : </h5>
                                <?php
                                    if(isset($_SESSION['message']))
                                    {
                                        echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                    }
                                ?>
                                <form action="comment.php?id=<?php echo $id; ?>" method="POST">
                                    <div class="input-field">
                                        <input type="email" name="email" class="validate" id="" placeholder="Enter email ..." required>
                                        <label for="email" data-error="Invalid Email Format"></label>
                                    </div>
                                    <div class="input-field">
                                        <textarea name="comment" class="materialize-textarea" placeholder="Your comment goes here" required></textarea>
                                    </div>
                                    <div class="center">
                                        <input type="submit" value="Comment" name="submit" class="btn black">
                                    </div>
                                </form>

                                <h5>Comments : </h5>

                        <ul class="collection">

<?php
    $sql3="select * from comment where post_id=$id and status=1 order by id DESC";
    $res3=mysqli_query($conn,$sql3);

    if(mysqli_num_rows($res3) >0)
    {
        while($row3 =mysqli_fetch_assoc($res3))
        {
?>
                        
                            <li class="collection-item"> <?php echo $row3['comment_text'] ?>
                                
                                <span class="secondary-content">  <?php echo $row3['email'] ?>  </span>
                            </li>
                       
<?php           
        }
        
    }
    else
    { ?>
             
    
       <div class="center">
            No one comment.
       </div>
       <?php
    }
?>                      </ul>

                        

                            </div> 
                        </div>
                    </div>
                
                    

        <?php

                    }
                    else
                    {
                        header("Location: index.php");
                    }
                }
        ?>



        <!--Related Blogs -->
        <div class="col l12 m12 s12">
            <div class="collection">
                <h5 style="padding-left:20px;">Related Blogs </h5>
                <?php

                        $sql="select * from posts order by rand() limit 4";
                        $res=mysqli_query($conn,$sql);

                        if(mysqli_num_rows($res) > 0)
                        {
                            while($row = mysqli_fetch_assoc($res))
                            {
                    ?>

                                <div class="col l3 m4 s6 ">
                                    <div class="card small" id="card">
                                        <div class="card-image">
                                            <img src="img/<?php echo $row['feature_img']; ?>" alt="" >
                                            <span class="card-title truncate"><b> <?php echo $row['title'] ?> </b></span>
                                        </div>
                                        <div class="card-content">
                                            <span> <?php echo ($row['content']) ?> </span>
                                        </div>
                                        <div class="card-action #9e9e9e grey center">
                                            <a href="post.php?id=<?php echo $row['id'] ?>" class="black-text">Read More</a>
                                        </div>
                                    </div>

                                </div>

                <?php
                            }
                        }
                    ?>
    <style>  
                #card:hover{
                transform:translate(0,-10px);
                box-shadow:0px 17px 35px 0px rgba(0,0,0,1);
        }
    </style>
            </div>
        </div> 
    </div>


    <!--Sidebar Content Area -->
    <div class="col l3 m3 s12">
        <?php
            include "includes/sidebarContent.php";
        ?>
    </div>

    

</div>




<?php
     include "includes/footer.php";
?>
     
