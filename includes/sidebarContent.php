

        <ul class="collection">
            <li class="collection-item">
                <h5>Search</h5>
                <form action="search.php" method="GET">
                    <div class="input-field">
                        <input type="text" name="search" id="search" placeholder="Search Blogs" required>
                        <div class="center"><input type="submit" id="search1" class="btn black" value="Search" name="submit" ></div>
                    </div>
                </form> 
            </li>
        </ul>

        <div class="collection">
            <h5 style="padding-left:20px;">Trending Blogs </h5>

<?php
    $sql="select * from posts order by view DESC limit 7";
    $res=mysqli_query($conn,$sql);

    if(mysqli_num_rows($res) > 0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
 ?>
        <a id="trending" href="post.php?id=<?php echo $row['id'] ?>" class="collection-item">  <?php   echo  $row['title']   ?>  </a>
 <?php           
        }
    }
?>
            
       <style>
            #trending:hover{
              background-color: rgba(42, 145, 241, 0.651);  
              color: black;
              font-size: large;
        }
        #search1:hover{
            font-size: large;
            color:whitesmoke;
        }
       </style>
            
        </div>

