<?php

    include("./../database/db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM materiales WHERE id = $id";
        $result = mysqli_query($db, $query);
        if(!$result) {
            $_SESSION['message'] = 'Error desconocido';
            $_SESSION['message_type'] = 'success';
            header('Location: ./../index.php');
        }
        $_SESSION['message'] = 'Registro eliminado';
        $_SESSION['message_type'] = 'danger';
        header('Location: ./../index.php');
    }

    ?>