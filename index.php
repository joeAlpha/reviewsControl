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
<script src="app/controller/newTopic.js"></script>

<div class="container-fluid p-3">
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-dark h-100">
                <div class="card-header text-center text-light">
                <i class="fas fa-book-open text-light icon-big my-2"></i>
                <br>
                   Review's register
                </div>
                
                <div class="card-body">
                    <form id="userForm" action="" method="POST">

                    <label for="name" class="text-white">Topic's name</label>
                        <div class="form-group">
                            <input placeholder="Topic name" type="text" name="name" id="name" class="form-control">
                        </div>

                    <!-- Date -->
                    <label for="" class="text-white">Date for next review</label>
                    <!-- <small id="newSubjectHelp" class="form-text text-white">If you want to register a new subject, type here its name, otherwise left it empty.</small> -->
                    <div class="form-row form-group">
                        <div class="col">
                        <select class="form-control custom-select col" id="year" name="year">
                            <?php
                                echo 'ok';
                                for($i = date('o'); $i > 1970; $i--) { ?>
                                    <option value="<?php echo $i; ?>" <?php if(date('Y', strtotime($date)) == $i) { echo 'selected';}; ?> ><?php echo $i; ?></option>;
                                <?php } ?>
                        </select>
                        </div>

                        <div class="col">

                            <select class="form-control custom-select col" id="month" name="month">
                                <?php
                            // $months = array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');
                            $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
                            
                            for($i = 12; $i > 0; $i--) { ?>
                                <option value="<?php echo $months[$i]; ?>" <?php if(date('m', strtotime($date)) == $i) { echo 'selected';}; ?> ><?php echo $months[$i]; ?></option>;
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col">
                            <select class="form-control custom-select col" id="day" name="day">
                                <?php
                                for($i = 31; $i > 0; $i--) { ?>
                                    <option value="<?php echo $i; ?>" <?php if(date('d', strtotime($date)) == $i) { echo 'selected';}; ?> ><?php echo $i; ?></option>;
                                    <?php } ?>
                            </select>
                            
                        </div> 
                        </div>

                            <div class="form-group">
                            <label for="subject" class="text-white">Subject's topic</label>

                            <select class="form-control custom-select" id="subject" name="subject">
                                <?php
                                    $userId = $_SESSION['id'];
                                    $query = 
                                        "SELECT 
                                            subject.id,
                                            subject.name,
                                            subject.user
                                        FROM 
                                            subject
                                        WHERE
                                            subject.user = '$userId'";
                                    $result = $connection->query($query);
                                    while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                                    <option value="<?php echo $row['id'] ?>">
                                        <?php echo $row['name'] ?>
                                    </option>;
                                    <?php } ?>
                            </select>
                            
                        </div>

                        <div class="form-group">
                            <input placeholder="New subject" type="text" name="newSubject" id="newSubject" class="form-control">
                            <!-- <small id="newSubjectHelp" class="form-text text-white">If you want to register a new subject, type here its name, otherwise left it empty.</small> -->
                        </div>

                        

                        <div class="form-group">
                            <button class="btn btn-success btn-lg btn-block" type="submit" value="Save topic" name="saveTopic">
                                <i class="fas fa-save icon-small mx-1"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <br>
        
        <div id="tableContainer" class="col-md-9 table-responsive">
            <?php include("app/view/reviewTable.php") ?>
        </div>
    </div>
</div>

<!-- <div class="fixed-bottom fixed-left my-2">
<button class="btn btn-success btn-lg" type="submit" value="Save topic" name="saveTopic">
                                <i class="fas fa-save icon-small mx-1"></i> Save
</button>
</div> -->

<?php include("app/view/footer.php"); ?>
