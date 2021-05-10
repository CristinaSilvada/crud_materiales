<?php 

    include("./../database/db.php");
    
    if(isset($_POST['add'])){
        $name = $_POST['name'];
        $unit = $_POST['unit'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $total = $price * $stock;
        
        $search = "SELECT nombre from materiales where nombre='$name'";
        $result = mysqli_query($db, $search);
        if(mysqli_num_rows($result)>0){
            header ("Location: ./../index.php");
            $_SESSION['message'] = 'Este registro ya existe';
            $_SESSION['message_type'] = 'warning';
        } else {
            $query = "INSERT INTO materiales(nombre, unidad_medida, precio, stock, total) values ('$name', '$unit', '$price', '$stock', '$total')";
            $res = mysqli_query($db, $query);
            if(!$res){
                header ("Location: ./../index.php");
                $_SESSION['message'] = 'Error inesperado';
                $_SESSION['message_type'] = 'danger';
            }
            header ("Location: ./../index.php");
            $_SESSION['message'] = 'Guardado';
        $_SESSION['message_type'] = 'success';
        }
    }
?> 