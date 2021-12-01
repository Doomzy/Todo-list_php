<?php
    include_once 'header.php';
    ?>
    <h2 class="container mt-5 text-center header-text">Login</h2>
    <div class="form-container container mt-4 mb-5">
        <form action="includes/login.inc.php" method="post">
            <fieldset class="row container mt-5">
                <fieldset class="row container">
                    <label class="col-lg-6 col-md-6" for="ar_rd_name">
                        <input class="form-control" type="text" name='username' placeholder="username">
                    </label>
                    <label class="col-lg-6 col-md-6" for="ar_th_name">
                        <input class="form-control" type="password" name='pwd' placeholder="password">
                    </label>
                </fieldset>
            </fieldset>
            <div class="row container mt-5 mb-5">
                <button class="col-5 m-auto p-2 btn" name="submit" type="submit">Submit</button>
            </div>
        </form>
        <?php
        if(isset($_GET['error'])){
             if($_GET['error']=='emptyfields'){
                echo "<p>please fill all the fields</p>";
            }else if($_GET['error']=='pwddontmatch'){
                echo "<p>Passwords doesnt match</p>";
            }
            else if($_GET['error']=='wrongusername'){
                echo "<p>please enter a valid username</p>";
            }
            else if($_GET['error']=='invalidlogin'){
                echo "<p>please enter a valid login info</p>";
            }
        }
           
        ?>
    </div>

    <?php
    include_once 'footer.php';
    ?>
