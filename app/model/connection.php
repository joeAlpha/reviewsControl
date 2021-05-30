
<?php
    // Sets a reusable connection with the DB 
    
   $connection = new mysqli(
        "localhost",
        "reviewer",
        'reviews',
        "reviewsControl"
    );
/*
   if ($connection->connect_error) {
   echo "Not connected, error: " . $connection->connect_error;
}
else {
   echo "Connected.";
}
 */

?>

