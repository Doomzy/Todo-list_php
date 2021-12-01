
<?php
Function emptyInput($name,$email,$username,$pwd,$pwdRepeat){
    $status;
    if(empty($name)||empty($email)||empty($username)||empty($pwd)||empty($pwdRepeat)){
        $status= true;
    }
    else {
        $status= false;
    }
    return $status;
}

Function emptyLoginInput($username,$pwd){
    $status;
    if(empty($username)||empty($pwd)){
        $status= true;
    }
    else {
        $status= false;
    }
    return $status;
}

Function pwdDontMatch($pwd,$pwdRepeat){
    $status;
    if($pwd != $pwdRepeat){
        $status= true;
    }
    else{
        $status= false;
    }
    return $status;
}

Function wrongUsername($username){
    $status;
    if(preg_match("/^[a-zA-z0-9]*$/",$username)){
        $status= false;
    }
    else{
        $status= true;
    }
    return $status;
}

Function invalidEmail($email){
    $status;
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $status= false;
    }
    else{
        $status= true;
    }
    return $status;
}

Function exsistedUsername($conn, $username){
    $sqlStmt='SELECT * FROM users WHERE uUid=?;';
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sqlStmt)){
        header('location: ../signup.php?error=exsitingusername');
        exit();
    }
    mysqli_stmt_bind_param($stmt,'s',$username);
    mysqli_stmt_execute($stmt);

    $resultData= mysqli_stmt_get_result($stmt);

    if($row= mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result=false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

Function createUser($conn, $name,$email,$username,$pwd){
    $sqlStmt='INSERT INTO users(uName,uEmail,uUid,upwd) VALUES(?,?,?,?);';
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sqlStmt)){
        header('location: ../signup.php?error=faildsignup');
        exit();
    }

    $hashedPwd= password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,'ssss',$name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    loginUser($conn,$username,$pwd);
    header('location: ../signup.php?error=none');
    exit();

}

Function loginUser($conn,$username,$pwd){
    $userExists= exsistedUsername($conn, $username);
    if ($userExists === false){
        header('location: ../login.php?error=invalidlogin');
        exit();
    }

    $hashedPwd= $userExists['upwd'];
    $myPwd = password_verify($pwd,$hashedPwd);
    if($myPwd === false){
        header('location: ../login.php?error=invalidlogin');
        exit();
    }else if($myPwd === true){
        session_start();
        $_SESSION['userid']= $userExists['uId'];
        $_SESSION['useruid']= $userExists['uUid'];
        header('location: ../index.php');
        exit();

    }
}

Function emptyTodoInput($task){
    $status;
    if(empty($task)){
        $status= true;
    }
    else {
        $status= false;
    }
    return $status;
}

Function createTask($conn,$task,$username){
    $sqlStmt='INSERT INTO tasks(tName,tUid) VALUES(?,?);';
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sqlStmt)){
        header('location: ../todo_list.php?error=wrongtask');
        exit();
    }

    mysqli_stmt_bind_param($stmt,'ss',$task,$username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../todo_list.php');
}

Function getTasks($conn, $username){
    $sqlStmt='SELECT * FROM tasks WHERE tUid=?;';
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sqlStmt)){
        header('location: ../todo_list.php?error=notasks');
        exit();
    }
    mysqli_stmt_bind_param($stmt,'s',$username);
    mysqli_stmt_execute($stmt);

    $resultData= mysqli_stmt_get_result($stmt);

    if($resultData){
        return $resultData;
    }
    else{
        $result=false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

Function updateTask($conn,$task,$taskId){
    $sqlStmt='UPDATE tasks SET tName=? WHERE tId=?;';
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sqlStmt)){
        header('location: ../todo_list.php?error=wrongtask');
        exit();
    }

    mysqli_stmt_bind_param($stmt,'ss',$task,$taskId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../todo_list.php?error=taskupdated');
}

Function deleteTask($conn,$taskId){
    $sqlStmt='DELETE FROM tasks WHERE tId=?;';
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sqlStmt)){
        header('location: ../todo_list.php?error=wrongtask');
        exit();
    }

    mysqli_stmt_bind_param($stmt,'s',$taskId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../todo_list.php?error=taskdeleted');
}