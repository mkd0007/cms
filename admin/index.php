<?php
    include "includes/header.php";

    if(isset($_SESSION['username']))
    {
        header("Location: dashboard.php");
    }
    else
    {
?>

        <body class="black">


        <div class="row center " style="margin-top:75px; ">

        
            <div class="col l4 offset-l4 m8 offset-m2 s12">
                <h4 class="white-text" >Money TechTuts</h4>
            </div>

            <div class="col l4 offset-l4 m8 offset-m2 s12 " > 
                <div class="card-panel #757575 grey darken-1" style="margin-bottom:1px; ">
                    <ul class="tabs #757575 grey darken-1 ">
                    <li class="tab " >
                        <a href="#login" class="black-text" style="font-size:20px">Log in</a>
                    </li>
                    <li class="tab">
                        <a href="#signup" class="black-text" style="font-size:20px">Sign Up</a>
                    </li>
                    </ul>
                </div>
            </div>

            <div class="col l4 offset-l4 m8 offset-m2 s12" id="login">
                <div class="card-panel #757575 grey darken-1">

                    <?php
                        if(isset($_SESSION['messageLogin']))
                        {
                            echo $_SESSION['messageLogin'];
                            unset ($_SESSION['messageLogin']);
                        }
                        
                    ?>
                    
                    <form action="login_check.php" method="POST">
                        <div class="input-field">
                            <i class="material-icons prefix">person</i>
                            <input type="text"  name="username" id="username" placeholder="Enter Username..." required>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">vpn_key</i>
                            <input type="password" name="password"  placeholder="Enter Password..." required>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="btn" value="Log In" name="login" >
                        </div>
                    </form>
                </div>
            </div>

            <div class="col l4 offset-l4 m8 offset-m2 s12" id="signup">
                <div class="card-panel #757575 grey darken-1">

                <?php
                        if(isset($_SESSION['messageSignup']))
                        {
                            echo $_SESSION['messageSignup'];
                            unset ($_SESSION['messageSignup']);
                        }
                        
                    ?>

                    <form action="signup.php" method="POST">

                        <div class="input-field">
                            <i class="material-icons prefix" >person</i>
                            <input type="text" name="authorname" id="name" placeholder="Enter Author Name..." required>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">person</i>
                            <input type="text"  name="username" id="username" placeholder="Enter Username..." required >
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix" >email</i>
                            <input type="email" name="email" id="email" placeholder="Enter Email Address..." class="validate" required>
                            <label for="email" ></label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">vpn_key</i>
                            <input type="password" name="password" id="password" placeholder="Enter Password..." required>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="btn" value="Sign Up" name="signup" >
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php
      include "includes/footer.php";
    }
?>




    



