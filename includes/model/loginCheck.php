<?php
    include("includes/connection.php");

    if(isset($_POST) && count($_POST) > 0) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($email == 'admin' && $password == 'admin') {
            header('Location: reportes.php');
        } else {
            /* $query =  mysql_query( */
            /*     "SELECT FROM usuario(claveDeAcceso, contacto) */
            /*     WHERE claveDeAcceso=$password AND */
            /*     contacto=$email"); */

            $query =  
                "SELECT idUsuario FROM usuario
                WHERE claveDeAcceso='$password' AND 
                contacto='$email'";

            /* $query = "SELECT * FROM user"; */    
            $resultado = mysqli_query($connection, $query);

            if(mysqli_num_rows($resultado) >= 1) {
                header('Location: chatV2.php');
            } else {
                echo "Error de credenciales ...";
                /* echo var_dump(mysqli_num_rows($resultado)); */
                echo "<meta http-equiv = 'Refresh' content='3; url = loginV2.php'>";
            }
        }
    } else {
        echo "Campos sin rellenar ...";
        echo "<meta http-equiv = 'Refresh' content='3; url = loginV2.php'>";
    }
?>
