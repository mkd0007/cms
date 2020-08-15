<?php
    
    include "includes/header.php";
    if(isset($_SESSION['username']))
    {
    include "includes/navbar.php";
?>

   

    <div class="container  center">
    <div class="card " style="padding:10px;" >
        <h4 class="center">Change Password</h4>

        <?php
                        if(isset($_SESSION['message']))
                        {
                            echo $_SESSION['message'];
                            unset ($_SESSION['message']);
                        }
                        
                    ?>            


        <div class="divider"></div>

        <form action="changepass_check.php" method="POST">
            <table class="centered ">
                <tbody>
                    <tr>
                        <td>Current Password :</td>
                        <td>
                            <div class="input-field pass ">
                                <input type="password" name="current" id="password" required>       
                            </div>
                        </td>
                        <td>
                        <i class="far fa-eye " id="togglePassword"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>New Password :</td>
                        <td>
                            <div class="input-field pass">
                                <input type="password" name="new"  required>
                            </div>
                        </td>
                        <td>
                        <!-- <i class="far fa-eye " ></i> -->
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm New Password :</td>
                        <td>
                            <div class="input-field pass">
                                <input type="password" name="anew"  required>
                            </div>
                        </td>
                        <td>
                        <!-- <i class="far fa-eye " ></i> -->
                        </td>
                    </tr>
                </tbody>
            </table>

            <br>

            <input type="submit" name="change"  class=" btn border-radius-4 green " value="change" >
                                <a href="dashboard.php" class="btn red">Cancel</a>
        </form>

        <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');


            togglePassword.addEventListener('click', function (e) {
                // toggle the type attribute
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    // toggle the eye slash icon
                    this.classList.toggle('fa-eye-slash');
                });

                

        </script>

    </div>
    </div>


<?php
    include "includes/footer.php";
    }
    else
    {
        $_SESSION['messageLogin']="<div class='chip red white-text' >login to Continue </div>";
        header("Location: index.php");
    }
?>