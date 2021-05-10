<?php

    include("./../database/db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $stock = $_GET['stock'];

        if($stock != 0){
            $_SESSION['message'] = 'No se puede eliminar, aun hay en stock';
            $_SESSION['message_type'] = 'warning';
            header('Location: ./../index.php');
        }else{
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
    }
?>