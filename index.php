<?php
    ob_start();
    include "includes/header.php";

?>

<?php
    include "includes/navbar.php";
?>
<div class="row">

    <!-- Main Content Area -->
    
    <div class="col l9 m9 s12">
        <div>
        <?php
            

        if(isset($_GET['page']))
        {
            $page=$_GET['page'];
            $page=mysqli_real_escape_string($conn,$page);
            $page=htmlentities($page);
        }
        else
        {
            $page=1;
        }

        $sql1="select * from posts";
        $res1 =mysqli_query($conn,$sql1);
        $count=mysqli_num_rows($res1);
        $per_page=8;
        $no_of_page=ceil($count/$per_page);
        $start=($page-1)*$per_page;
        
        $sql2="select * from posts order by id DESC limit $start,$per_page " ;
        $res=mysqli_query($conn,$sql2);

        if(mysqli_num_rows($res) > 0)
        {
            while($row = mysqli_fetch_assoc($res))
            {
    ?>

                <div class="col l3 m4 s6">
                    <div class="card medium" id="card">
                        <div class="card-image">
                            <img src="img/<?php echo $row['feature_img']; ?>" alt="" >
                            <span class="card-title truncate"><b> <?php echo $row['title'] ?> </b></span>
                        </div>
                        <div class="card-content">
                            <span> <?php echo $row['content'] ?> </span>
                        </div>
                        <div class="card-action #9e9e9e grey center" id="readmore">
                            <a href="post.php?id=<?php echo $row['id'] ?>" class="black-text" >Read More</a>
                        </div>
                    </div>

                </div>

    <?php
            }
        }
        else
        {
            header("Location: index.php?page=1");
        }

    ?>
    </div>
    <!--  Pagination  start -->
    <div class="center" style="clear:both; position:relative; ">
        <ul class="pagination ">
            <li <?php if($page==1){ echo "class='disabled'"; } ?> >
                <a href="index.php?page=<?php echo $page-1; ?>"><i class="material-icons ">chevron_left</i></a>
            </li>
            
    <?php
        for($i=1;$i<=$no_of_page;$i++)
        {
    ?>
            <li <?php if($page == $i){ echo "class='active black'"; } ?>>
                <a href="index.php?page=<?php echo $i ?>"> 
                    <?php  echo $i  ?> 
                </a>
            </li>
    <?php
        }
    ?>

            <li  <?php if($page==$no_of_page){ echo "class='disabled'"; } ?> >
                <a href="index.php?page=<?php echo $page+1; ?>"><i class="material-icons">chevron_right</i></a>
            </li>
        </ul>
 </div>
    <!--  Pagination  end -->

    <style>
        #readmore:hover{
              background-color: rgba(42, 145, 241, 0.651);  
              color: cyan;
              font-size: large;
        }
    #card:hover{
                transform:translate(0,-10px);
                box-shadow:0px 17px 35px 0px rgba(0,0,0,1);
        }
    </style>

    </div>

        

     <!-- Sidebar Content Area -->
    <div class="col l3 m3 s12">

        <?php
            include "includes/sidebarContent.php";
        ?>

    </div>

   
   

</div>





<?php
    include "includes/footer.php";
?>


 
        