<?php
    include_once 'header.php';
    include_once 'includes/dbh.inc.php';
    include_once 'includes/functions.inc.php';
?>
    <h2 class="container mt-5 text-center header-text">To-do List</h2>
    <div class="form-container container mt-4 mb-5">

        <?php
            if(isset($_SESSION['useruid'])){
                $todoTasks=getTasks($conn, $_SESSION['useruid']);
                foreach($todoTasks as $item)
                {
                    echo('
                        <form action="includes/todo.inc.php" method="post">
                            <fieldset class="row container">
                                <label  class="col-lg-6 col-md-6">
                                <input class="form-control" type="text" name="task" value="'.$item['tName'].'">
                                </label>
                                <input name="tId" value="'.$item["tId"].'" hidden>
                                <label class="col-lg-4 col-md-6 row">
                                    <div class=" col-5">
                                        <button class="col-12 m-auto p-2 btn-accept" name="update" type="submit">update</button>
                                    </div>
                                    <div class=" col-5">
                                        <button class="col-12 m-auto p-2 btn-danger" name="delete" type="submit">delete</button>
                                    </div>
                                </label>
                            </fieldset>
                        </form>
                    ');
                }
                echo'
                    <form action="includes/todo.inc.php" method="post">
                        <fieldset class="row container mt-5">
                            <h2>Add task</h2>
                            <fieldset class="row container">
                                <div class="col-lg-6 col-md-6">
                                    <input class="form-control" type="text" name="task" placeholder="Task...">
                                </div>
                                <input name="username" value="'.$_SESSION["useruid"].'" hidden>
                                <div class="col-lg-6 col-md-6">
                                    <button class="col-5 m-auto p-2 btn" name="add" type="submit">Add</button>
                                </div>
                            </fieldset>
                        </fieldset>
                    </form>
                ';
            }else{
                header('location: login.php');
            }
        ?>
        <?php
            if(isset($_GET['error'])){
                if($_GET['error']=='emptytask'){
                    echo "<p>please write the task name</p>";
                }else if($_GET['error']=='taskupdated'){
                    echo "<p>task updated successfully</p>";
                }else if($_GET['error']=='taskdeleted'){
                    echo "<p>task deleted</p>";
                }
            }
        ?>
    </div>

<?php
    include_once 'footer.php';
?>
