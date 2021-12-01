<?php

    if(isset($_POST['submit'])){
        $username= $_POST['username'];
        $pwd= $_POST['pwd'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyLoginInput($username,$pwd) !==false){
            header('location: ../login.php?error=emptyfields');
            exit();
        }
        else if(wrongUsername($username) !== false){
            header('location: ../login.php?error=wrongusername');
            exit();
        }
        loginUser($conn,$username,$pwd) ;
    }
    else{
        header('location:../login.php');
        exit();
    }