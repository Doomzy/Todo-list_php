<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Registration</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="sdoa.css">
</head>
<body>
<fieldset class="row container mt-5">
    <fieldset class="row container">
         <label class="col-lg-4 col-md-6" for="ar_rd_name">
            <a class="form-control text-center" href="index.php">Home</a>
        </label>
        <?php
            if(isset($_SESSION['useruid'])){
                echo'
                <label class="col-lg-4 col-md-6" for="ar_nd_name">
                    <a class="form-control text-center" href="todo_list.php">My List</a>
                </label>
                <label class="col-lg-4 col-md-6" for="ar_nd_name">
                    <a class="form-control text-center" href="includes/logout.inc.php">Log out</a>
                </label>';
            }
        else{
            echo '<label class="col-lg-4 col-md-6" for="ar_nd_name">
                    <a class="form-control text-center" href="login.php">Login</a>
                </label>
                <label  class="col-lg-4 col-md-6" for="ar_st_name">
                    <a class="form-control text-center" href="signup.php">Signup</a>
                </label>';
        }
        ?>
    </fieldset>
</fieldset>

