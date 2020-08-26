<?php
	session_start();
    if(!isset($_SESSION['id']) || !isset($_COOKIE['id'])) {
        header("Location: app/view/login.php");
    }
    include("app/model/connection.php");
    include("app/view/header.php");
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

<!-- Action controllers -->
<script src="app/controller/registerNewTopicController.js"></script>
<script src="app/controller/restoreController.js"></script>
<script src="app/controller/completeController.js"></script>
<script src="app/controller/editController.js"></script>
<script src="app/controller/deleteTopicController.js"></script>
<script src="app/controller/deleteSubjectController.js"></script>

<!-- Action controllers -->
<script src="app/controller/loadTopicManagerController.js"></script>
<script src="app/controller/loadSubjectManagerController.js"></script>
<script src="app/controller/paginationController.js"></script>
<script src="app/controller/subjectPaginationController.js"></script>
<script src="app/controller/navController.js"></script>

<script src="app/controller/saveEditionController.js"></script>
<script src="app/controller/logoutController.js"></script>
<script src="app/controller/subjectRegisterController.js"></script>

<script src="web/js/main.js"></script>



<?php include("app/view/footer.php"); ?>
