<?php
    include("connection.php");

    if(isset($_POST) && count($_POST) > 0) {
        $username = $_POST['user'];
        $password = $_POST['password'];

        $query =  
            "SELECT * FROM user
            WHERE password='$password' AND 
            name='$username'";

        $result = $connection->query($query);
        $data = $result->fetch_array(MYSQLI_ASSOC); 

        if($result->num_rows == 1) {
            session_start();
            $_SESSION['id'] = $data['id']; 
            $_SESSION['username'] = $data['name']; 
            $_SESSION['password'] = $data['password'];
            setcookie("id", $data['id'], time() + (86400 * 30), "/"); 
            header('Location: ../../index.php');
        } else {
            echo "Error de credenciales ...";
            echo "<meta http-equiv = 'Refresh' content='3; url = ../view/login.php'>";
        }
    } else {
        echo "Campos sin rellenar ...";
        echo "<meta http-equiv = 'Refresh' content='3; url = ../view/login.php'>";
    }
?>
