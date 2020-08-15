<?php

    include "includes/header.php";
    include "includes/navbar.php";

    $username=$_SESSION['username'];
    $sql="select * from users where username='$username'";
    $res=mysqli_query($conn,$sql);

   if(mysqli_num_rows($res) > 0)
    {
        $data =mysqli_fetch_assoc($res);
        $author_name=$data['author_name'];
        $email=$data['email'];
        $user_img=$data['user_img'];
?>    

        <div class="container center">
                     <?php
                            if(isset($_SESSION['pro-message']))
                            {
                                echo $_SESSION['pro-message'];
                                unset($_SESSION['pro-message']);
                            }
                        ?>
            <div class="card" style="padding:20px;">
                    <form name="form" action="profile_check.php" method="POST" enctype="multipart/form-data">
                        
                            <table class="responsive-table centered highlight ">
                                <tbody>
                                <tr>
                                    <td><img class="responsive-img circle z-depth-4" src="img/<?php if($user_img){echo $user_img;} else{echo "person.png";} ?>" alt="" width="120" height="120" ></td>
                                    <td>
                                        <div class="input-field file-field" style="margin-top:72px;">
                                            <div class="btn black">
                                                Upload Profile Pic
                                            <input type="file" name="user_image" value="img/<?php if($user_img){echo $user_img;} else{echo "person.png";}?>" accept="image/png, image/jpeg" > 
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input type="text" class="file-path" value="<?php if($user_img){echo $user_img;} else{echo "person.png";} ?>">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name :</td>
                                    <td><input type="text" name="author_name" value="<?php echo $author_name; ?>"> </td>
                                </tr>
                                <tr>
                                    <td>Username :</td>
                                    <td><input type="text" name="username" value="<?php echo $username  ?>"></td>
                                </tr>
                                <tr>
                                    <td>Email Address :</td>
                                    <td><input type="email" name="email" id="email" value="<?php echo $email ?>" class="validate"></td>
                                </tr>
                                </tbody>
                            </table>


                            <br>
                            
                            <input type="submit" name="update"  class=" btn border-radius-4 green " value="Update" >
                             <a href="dashboard.php" class="btn red">Cancel</a>
                    
                    </form>
                    
            </div>
        </div>


<?php
    }
    else
    {
        $_SESSION['messageLogin']="<div class='chip red white-text' > Login to continue </div>";
         header("Location: index.php");
    }
    include "includes/footer.php";

?>    