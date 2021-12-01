<?php
    include_once 'header.php';
?>
    <h2 class="container mt-5 text-center header-text">Home</h2>
    <div class="form-container container mt-4 mb-5">

        <?php
            if(isset($_SESSION['useruid'])){
                echo'
                <label class="col-lg-4 col-md-6">
                    <p class="form-control text-center">
                        welcome back '.$_SESSION['useruid'].
                    '</p>
                </label>';
            }
        ?>
    </div>

<?php
    include_once 'footer.php';
?>
