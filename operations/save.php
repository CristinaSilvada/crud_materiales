<?php 

    include("./../database/db.php");
    
    if(isset($_POST['save'])){
        $id = $_POST['hidden_id'];
        $name = $_POST['name'];
        $unit = $_POST['unit'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $total = $price * $stock;

        $search = "SELECT nombre from materiales where nombre='$name'";
        $result = mysqli_query($db, $search);


        if($id != null){
            $compare_query = "SELECT * from materiales where id='$id' and nombre='$name'";
            $compare_result = mysqli_query($db, $compare_query);
            if(mysqli_num_rows($compare_result)>0){
                $update_query = "UPDATE materiales SET nombre = '$name', unidad_medida= '$unit', precio= '$price', stock= '$stock', total='$total' WHERE id = $id";
                $update_result = mysqli_query($db, $update_query);
                if(!$update_result) {
                    $_SESSION['message'] = 'Error desconocido';
                    $_SESSION['message_type'] = 'danger';
                    header('Location: ./../index.php');
                }else{
                    $_SESSION['message'] = 'Registro actualizado';
                    $_SESSION['message_type'] = 'success';
                    header('Location: ./../index.php');
                }
            }else{
                if(mysqli_num_rows($result)>0){
                    header ("Location: ./../index.php");
                    $_SESSION['message'] = 'Nombre duplicado';
                    $_SESSION['message_type'] = 'warning';
                }else{
                    $update_query_with_name = "UPDATE materiales SET nombre = '$name', unidad_medida= '$unit', precio= '$price', stock= '$stock', total='$total' WHERE id = $id";
                    $update_With_name_result = mysqli_query($db, $update_query_with_name);
                    if(!$update_with_name_result) {
                        $_SESSION['message'] = 'Registro actualizado';
                        $_SESSION['message_type'] = 'success';
                        header('Location: ./../index.php');
                    }else{
                        $_SESSION['message'] = 'Error desconocido';
                        $_SESSION['message_type'] = 'danger';
                        header('Location: ./../index.php');
                    }
                }
            }
        }else{
            if(mysqli_num_rows($result)>0){
                $_SESSION['message'] = 'Este registro ya existe';
                $_SESSION['message_type'] = 'warning';
                header('Location: ./../index.php');
            }else{
                $query = "INSERT INTO materiales(nombre, unidad_medida, precio, stock, total) values ('$name', '$unit', '$price', '$stock', '$total')";
                $res = mysqli_query($db, $query);
                if(!$res){
                    header ("Location: ./../index.php");
                    $_SESSION['message'] = 'Error inesperado';
                    $_SESSION['message_type'] = 'danger';
                }else{
                    header ("Location: ./../index.php");
                    $_SESSION['message'] = 'Guardado';
                    $_SESSION['message_type'] = 'success';
                } 
            }
        }
    }
?> 