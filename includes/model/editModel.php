<?php
if(isset($_POST['save'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $newDate = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
		$query = "UPDATE review SET name = '$name', fk_subject = '$subject', review_date = '$newDate' WHERE review_id = '$id'";
        $result = $connection->query($query);
        if($result) {
            header("Location: ../../index.php");
        } else {
            
        }
    } 

    if(isset($_POST['cancel'])) {
        header("Location: ../../index.php");
	} 
?>