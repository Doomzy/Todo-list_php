<?php

    if(isset($_POST['submit'])){
        $name= $_POST['name'];
        $email= $_POST['email'];
        $username= $_POST['username'];
        $pwd= $_POST['pwd'];
        $pwdRepeat= $_POST['pwdRepeat'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInput($name,$email,$username,$pwd,$pwdRepeat) !==false){
            header('location: ../signup.php?error=emptyfields');
            exit();
        }else if(pwdDontMatch($pwd,$pwdRepeat) !== false){
            header('location: ../signup.php?error=pwddontmatch');
            exit();
        }
        else if(wrongUsername($username) !== false){
            header('location: ../signup.php?error=wrongusername');
            exit();
        }
        else if(invalidEmail($email) !== false){
            header('location: ../signup.php?error=invalidemail');
            exit();
        }
        else if(exsistedUsername($conn, $username) !== false){
            header('location: ../signup.php?error=usernameexists');
            exit();
        }
        createUser($conn, $name,$email,$username,$pwd);
        
    }
    else{
        header('location:../signup.php?error=none');
        exit();
    }