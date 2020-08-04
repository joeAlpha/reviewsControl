<!-- Checks the rigth credentials for the login requests -->
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
           /*  setcookie("id", $data['id'], [
                'expires' => time() + 86400,
                'path' => '/',
                // 'domain' => 'domain.com',
                'secure' => true,
                'httponly' => true,
                'samesite' => 'None',
            ]);  */
            // echo 0;
            // header("Location: ../../index.php");
            // die();
            echo true;
        } else echo false;
            // echo 1;
            /* echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" .
            '  <i class="fa fa-times"></i> The username or password is wrong ' .
            "</div>"; */
           /*  echo "Error de credenciales ...";
            echo "<meta http-equiv = 'Refresh' content='3; url = ../view/login.php'>"; */
    } /* else {
        // echo 2;
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" .
        '  <i class="fa fa-times"></i> Fill all fields ' .
        "</div>";
      
    } */
?>
