<!-- Register a new user -->
<?php
    include("connection.php");
    if(isset($_POST)) {
        // Gets data from client request
        $userName = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['passCheck1'];

        // Inserts it into the db
        $insertNewUserQuery = 
            "INSERT INTO user(name, email, password) " .
            "VALUES('$userName', '$email', '$password')"; 
        $insertNewUserResult = $connection->query($insertNewUserQuery);

        if($insertNewUserResult) echo 0;
        else echo -2;
    }
    else echo -1;
?>