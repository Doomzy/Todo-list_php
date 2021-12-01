<?php

    if(isset($_POST['add'])){
        $username= $_POST['username'];
        $task= $_POST['task'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyTodoInput($task) !==false){
            header('location: ../todo_list.php?error=emptytask');
            exit();
        }

        createTask($conn,$task,$username) ;
    }
    else if(isset($_POST['update'])){
        $tId= $_POST['tId'];
        $task= $_POST['task'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyTodoInput($task) !==false){
            header('location: ../todo_list.php?error=emptytask');
            exit();
        }

        updateTask($conn,$task,$tId) ;
    }
    else if(isset($_POST['delete'])){
        $tId= $_POST['tId'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        deleteTask($conn,$tId) ;
    }
    else{
        header('location:../todo_list.php');
        exit();
    }