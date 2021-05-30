<?php
	session_start();
    if(!isset($_SESSION['id']) || !isset($_COOKIE['id'])) {
        header("Location: app/view/login.php");
    }
    include("app/model/connection.php");
    include("app/view/header.php");
    include("app/view/controllers.php"); 
    include("app/view/nav.php"); 
?>

<link rel="stylesheet" href="web/styles/styles.css">

<div class="container-fluid p-3" id="mainSection">
    <div class="row">
        <?php include("app/model/connection.php"); ?>

        <div id="tableContainer" class="table-responsive p-3">
            <?php include("app/view/reviewTable.php") ?>
        </div>
    </div>
</div>

<script src="web/js/main.js"></script>

<?php 
    include("app/view/footer.php"); 
?>
