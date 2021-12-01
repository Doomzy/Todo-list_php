<?php
    include_once 'header.php';
    ?>
    <h2 class="container mt-5 text-center header-text">Signup</h2>
    <div class="form-container container mt-4 mb-5">
        <form action="includes/signup.inc.php" method="post">
            <fieldset class="row container mt-5">
                <fieldset class="row container">
                    <label  class="col-lg-4 col-md-6" for="ar_st_name">
                        <input class="form-control" type="text" name='name' placeholder="Fullname">
                    </label>
                    <label class="col-lg-4 col-md-6" for="ar_nd_name">
                        <input class="form-control" type="text" name='email' placeholder="Email">
                    </label>
                    <label class="col-lg-4 col-md-6" for="ar_rd_name">
                        <input class="form-control" type="text" name='username' placeholder="username">
                    </label>
                    <label class="col-lg-6 col-md-6" for="ar_th_name">
                        <input class="form-control" type="password" name='pwd' placeholder="password">
                    </label>
                    <label class="col-lg-6 col-md-6" for="ar_th_name">
                        <input class="form-control" type="password" name='pwdRepeat' placeholder="repeat password">
                    </label>
                </fieldset>
            </fieldset>
            <div class="row container mt-5 mb-5">
                <button class="col-5 m-auto p-2 btn" name="submit" type="submit">Submit</button>
                <button class="col-5 m-auto p-2 btn btn-res" type="reset">Reset</button>
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
            else if($_GET['error']=='invalidemail'){
                echo "<p>please enter a valid email</p>";
            }
            else if($_GET['error']=='exsitingusername'){
                echo "<p>the username already exists</p>";
            }
            else if($_GET['error']=='none'){
                echo "<p>signup success</p>";
            }
        }
           
        ?>
    </div>

    <?php
    include_once 'footer.php';
    ?>
