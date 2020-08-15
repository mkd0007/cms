<?php
    if(isset($_SESSION['username']))
    {
?>

        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
        <li><a href="profile.php">Profile</a></li>
        <li><a href="images.php">Images</a></li>
        <li><a href="changepass.php">Change Password</a></li>
        <li class="divider"></li>
        <li><a href="logout.php">Logout</a></li>
        </ul>

        <nav>
            <div class="nav-wrapper black ">
                <div class="container">

                    <a href="dashboard.php" class="brand-logo center "> Money TechTuts </a>
                    
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="" class=" right"><i class="material-icons ">notifications_none</i></a></li>
                        <li>
                            <a class="dropdown-trigger " href="#!" data-target="dropdown1">
                                <i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
                    </ul>
                </div>    
            </div>
        </nav>


        <ul class="sidenav" id="mobile-demo">
             <li><a href="profile.php">Profile</a></li>
             <li><a href="images.php">Images</a></li>
             <li><a href="changepass.php">Change Password</a></li>
             <li><a href="logout.php">Logout</a></li>
        </ul>    

<?php
    }
    else
    {   
        session_start();
        $_SESSION['messageLogin']="<div class='chip red white-text' >login to Continue </div>";
        header("Location: ../index.php");
    }
?>

