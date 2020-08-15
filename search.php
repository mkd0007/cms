<?php
    include "includes/header.php";
    include "includes/navbar.php";

    if(isset($_GET['submit']))
    {
        $q=$_GET['search'];
        $q=mysqli_real_escape_string($conn,$q);
        $q=htmlentities($q);

        $sql="select * from posts where title like '$q' or content like '$q' or title like '%$q%' or content like '%$q%'";
        $res=mysqli_query($conn,$sql);

        $resNo=mysqli_num_rows($res);
        if($resNo>0)
        {
    ?>       
            
            <div class="row">
                <div class="col l9 m9 s12">
                <div class=" center">
                <h6> <?php echo $resNo ?> result found on search <b><?php echo $q ?></b></h6>
                </div>
            <div class="divider "></div>
    <?php         
            while($row = mysqli_fetch_assoc($res))
            {
    ?>

                <div class="col l3 m4 s6">
                    <div class="card medium">
                        <div class="card-image">
                            <img src="img/<?php echo $row['feature_img']; ?>" alt="" >
                            <span class="card-title truncate"><b> <?php echo $row['title'] ?> </b></span>
                        </div>
                        <div class="card-content">
                            <span> <?php echo $row['content'] ?> </span>
                        </div>
                        <div class="card-action #9e9e9e grey center">
                            <a href="post.php?id=<?php echo $row['id'] ?>" class="black-text">Read More</a>
                        </div>
                    </div>

                </div>

    <?php
           }
     ?>
               </div>
           
           <!-- Sidebar Content Area -->
            <div class="col l3 m3 s12">

                <?php
                    include "includes/sidebarContent.php";
                ?>

            </div>
            </div>  
    <?php        
        }
        else
        {
     ?>
        <div class="row">
            <div class="col l9 m9 s12">
                <div class=" center">
                <h6> <?php echo $resNo ?> result found on search <b><?php echo $q ?></b></h6>
                </div>
                <div class="divider"></div>
            </div>
            <!-- Sidebar Content Area -->
            <div class="col l3 m3 s12">

                <?php
                    include "includes/sidebarContent.php";
                ?>

            </div>
        </div>

     <?php
        }
    
    }
    else
    {
        header("Location: index.php");
    }

    include "includes/footer.php";
?>