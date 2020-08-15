<?php
    include "includes/header.php";
?>

<?php
    


if(isset($_SESSION['username']))
{
    include "includes/navbar.php";

    $username=$_SESSION['username'];

    $sql="select * from users where username='$username'";
    $res=mysqli_query($conn,$sql);
    $data=mysqli_fetch_assoc($res);

    $author_name=$data['author_name'];
    $email=$data['email'];
    $user_img=$data['user_img'];
    
?>



   <div class="row " >
            <div class="col l12 m12 s12 center" >
                    <div class="card-panel" style="padding:0px; margin-bottom:0px">
                        <ul class="tabs " >
                            <li class="tab ">
                                <a href="#dashboard" class="black-text" ><i class="material-icons tiny">local_library</i> Overview </a> 
                            </li>
                            <li class="tab">
                                <a href="#posts" class="black-text"><i class="material-icons tiny">pages</i> Posts</a>
                            </li>
                            <li class="tab">
                                <a href="#comments" class="black-text"><i class="material-icons tiny">comment</i> Comments</a>
                            </li>
                        </ul>   
                    </div>    

            </div>
    </div>


<div class="row container" id="dashboard" >

    <div class="col l3 m3 s12" >
        
            <div class="card"  >

                 <div class="card-image ">
                     <img src="img/<?php if($user_img){echo $user_img;} else{echo "person.png";} ?>"  class="responsive-img" alt="">
                 </div>
                 <div class="card-content" style="padding-top:0px; padding-bottom:0px ">
                     <h6><b>  <?php echo $author_name ?>   </b></h6>
                 </div>
                 <div class="card-content" style="padding-top:0px;>
                     <h7 class="grey-text text-darken-4">    <?php echo $username ?>    </h7>
                 </div>
                 


            </div>

       
    </div>

    <div class="col l9 m9 s12">
    
<!-- Recent Post section start--> 

        <div class="col l6 m6 s12">
            <ul class="collection with-header">
                <li class="collection-header #616161 grey darken-1 white-text">
                    <h4>Recent Posts</h4>
                </li>

                <?php
                    if(isset($_SESSION['delmsg']))
                    {
                        echo $_SESSION['delmsg'];
                        unset($_SESSION['delmsg']);
                    }
                ?>

                <?php 
                        $sql1="select * from posts where author_username='$username' order by id desc";
                        $res1=mysqli_query($conn,$sql1);

                        if(mysqli_num_rows($res1)>0)
                        {
                            while($data1=mysqli_fetch_assoc($res1))
                            {
                             
                ?>
                        <li class="collection-item">
                            <a href="" >   <?php echo $data1['title'] ?>   </a>
                            <br>
                            <span>
                                <a href="edit.php?id=<?php echo $data1['id']; ?>"><i class="material-icons tiny">edit</i> Edit</a> | 
                                <a onclick="javascript:return confirm('Are You Confirm Deletion');" href="delete.php?id=<?php echo $data1['id']; ?>" id="<?php echo $data1['id']; ?>" class="delete"><i class="material-icons tiny red-text">clear</i> Delete</a> | 
                                <a href=""><i class="material-icons tiny green-text">share</i> Share</a></span>    
                        </li>

                <?php    
                            }
                        }
                        else
                        {
                            echo "<span>No one post found!</span>";
                        }
                ?>   
            </ul>
        </div>

<!-- Recent Post section end--> 


<!-- Recent Comment section start-->
        <div class="col l6 m6 s12">

            <ul class="collection with-header">
                <li class="collection-header #616161 grey darken-1 white-text">
                    <h4>Recent Comments</h4>
                </li>
                        
                <?php
                    if(isset($_SESSION['delmsg1']))
                    {
                        echo $_SESSION['delmsg1'];
                        unset($_SESSION['delmsg1']);
                    }
                ?>


<?php
    $sql3="select * from comment where post_author_username='$username' order by id DESC";
    $res3=mysqli_query($conn,$sql3);

    if(mysqli_num_rows($res3) >0)
    {
        while($row3 =mysqli_fetch_assoc($res3))
        {  
?>
                        
                            <li class="collection-item"> <?php echo $row3['comment_text'] ?>
                                <br>
                                <span class="secondary-content">  <?php echo $row3['email'] ?>  </span>
                                <br>
                                <span><a onclick="javascript:return confirm('Are You Confirm Deletion');" href="del_comment.php?id=<?php echo $row3['id']  ?>"><i class="material-icons tiny red-text">clear</i> Remove</a></span>
                                
                                
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
?>
                   
                
            </ul>      
        </div>

<!-- Recent Comment section end-->         
        

    </div>

</div>


<!-- Tab Recent Post section start--> 

<div id="posts">

    <div class="row container">

        <div class="col s12 ">
            <ul class="collection with-header">
                <li class="collection-header #616161 grey darken-1 white-text">
                    <h4>Recent Posts</h4>
                </li>

                <?php 
                        $sql1="select * from posts where author_username='$username' order by id desc";
                        $res1=mysqli_query($conn,$sql1);

                        if(mysqli_num_rows($res1)>0)
                        {
                            while($data1=mysqli_fetch_assoc($res1))
                            {
                             
                ?>
                        <li class="collection-item">
                            <a href="" >   <?php echo $data1['title'] ?>   </a>
                            <br>
                            <span><a href="edit.php?id=<?php echo $data1['id']; ?>"><i class="material-icons tiny">edit</i> Edit</a> | <a href="delete.php?id=<?php echo $data1['id']; ?>" id="<?php echo $data1['id']; ?>" class="delete"><i class="material-icons tiny red-text">clear</i> Delete</a> | <a href=""><i class="material-icons tiny green-text">share</i> Share</a></span>    
                        </li>

                <?php    
                            }
                        }
                        else
                        {
                            echo "<span>No one post found!</span>";
                        }
                ?>   
            </ul>
        </div>

    </div>

</div>

<!-- Tab Recent Post section end--> 


<!-- Tab Recent comments section start--> 

<div id="comments" class="container">
    <div class="collection">
        <?php
            $sql3="select * from comment where post_author_username='$username' order by id DESC";
            $res3=mysqli_query($conn,$sql3);

            if(mysqli_num_rows($res3) >0)
            {
                while($row3 =mysqli_fetch_assoc($res3))
                {
        ?>
                                
                                    <li class="collection-item"> <?php echo $row3['comment_text'] ?>
                                        <br>
                                        <span class="secondary-content">  <?php echo $row3['email'] ?>  </span>
                                        <br>
                                        <span><a onclick="javascript:return confirm('Are You Confirm Deletion');" href="del_comment.php?id=<?php echo $row3['id']  ?>"><i class="material-icons tiny red-text">clear</i> Remove</a></span>
                                        
                                        
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
        ?>
    </div>
</div>


<!-- Tab Recent Post section end--> 


<div class="fixed-action-btn ">
    <a href="write.php" class="btn-floating btn btn-large white-text pulse black">
        <i class="material-icons">edit</i>
    </a>
</div>


<!-- <script>

    const del=document.querySelectorAll(".delete");
    del.forEach(function(item,index)
    {
        item.addEventListener("click",deleteNow)
    })

    function deleteNow(e)
    {
        e.preventDefault();
        if(confirm("Do you really want to delete"))
        {
            const xhr=new XMLHttpRequest();
            xhr.open("GET","delete.php?id="+Number(e.target.id),true)
            // xhr.onload=function()
            // {
            //    const msg= xhr.responseText;
            //     const message=document.getElementById(".delmsg");
            //     message.innerHTML=msg;
            // } 
            xhr.send()
            
        }
        
    }
</script> -->




<?php
}
else
{
    $_SESSION['messageLogin']="<div class='chip red white-text' > Login to continue </div>";
    header("Location: index.php");
}
    include "includes/footer.php";
?>

