<!-- <div id="topicMakerAlert"></div> -->

<div id="topicMaker" class="">
	<div class="card bg-dark h-100">

    	<div class="card-header text-center text-light">
        	<i class="fas fa-book-open text-light icon-big my-2"></i>
        	<br>
    	    Topic's register
    	</div> <!-- Card header -->
            
    	<div class="card-body">
        	<form id="userForm" action="" method="POST">

            	<div class="form-group">
            	    <input placeholder="Topic's name" type="text" name="name" id="name" class="form-control">
            	</div>

                <div class="form-group">
	                <select class="form-control custom-select" id="subject" name="subject">
                		<option value="">( Choose a subject )</option>
                		    <?php
								include("../model/connection.php");
                		        $userId = $_COOKIE['id'];
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
                		        while($subject = $result->fetch_array(MYSQLI_ASSOC)) { ?>
									<option value="<?php echo $row['id'] ?>">
                		        	    <?php echo $subject['name'] ?>
                		        	</option>;
                		        <?php } ?>
                	</select>
                </div>

                <div class="form-group">
                    <input placeholder="Or type a new subject" type="text" name="newSubject" id="newSubject" class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-success btn-lg btn-block" type="submit" value="Save topic" name="saveTopic">
                        <i class="fas fa-save icon-small mx-1"></i> Save
                    </button>
                </div>
    		</form>
		</div> <!-- Card body -->
	</div> <!-- Card -->
</div> <!-- Card container -->