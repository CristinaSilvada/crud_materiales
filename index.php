<?php include("./database/db.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Corporativo CA</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Inventario</span>
        </div>
    </nav>
    <br>
    
    <div class="container">

    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php session_unset(); } ?>

    <br>
    <form action="./operations/add.php" method="POST">
        <div class="container">
            <div class="row justify-content-md-left">
                <input type="hidden" class="form-control" name="hidden_id" id="id_hidden" required>
                <div class="col col-lg-4">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="col col-lg-2 col-md-3">
                    <label for="unit" class="form-label">Unidad de medida</label>
                    <select name="unit" class="form-select" id="unit" aria-label="Default select example" required>
                        <option disabled value="" selected>Selecciona una opción</option>
                        <option value="kg">kg</option>
                        <option value="m3">m3</option>
                        <option value="p2">p2</option>
                        <option value="pz">pz</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row justify-content-md-left">
                <div class="col col-lg-2">
                    <label for="price" class="form-label">Precio</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="text" name="price" class="form-control" id="price" required>
                    </div>
                </div>
                <div class="col col-lg-2">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" name="stock" id="stock" required>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success" name="add">Guardar</button>
        </div>
    </form> 

    <br>
    <br>
   
    <div class="container">
        <div class="row justify-content-md-left">
            <div class="input-group">
                <div class="form-outline">
                    <input type="search" id="form1" class="form-control" />
                </div>
                <button type="button" class="btn btn-primary">
                    Buscar
                </button>         
            </div>
            <br>
            <div class="col col-lg-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Unidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Total</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $query = "SELECT * from materiales";
                        $res = mysqli_query($db, $query);

                        while($row = mysqli_fetch_array($res)){ ?>
                            <tr>
                                <td><?php echo $row['nombre']?></td>
                                <td><?php echo $row['unidad_medida']?></td>
                                <td><?php echo $row['precio']?></td>
                                <td><?php echo $row['stock']?></td>
                                <td><?php echo $row['total']?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="setValues('<?php echo $row['id'] ?>', 
                                    '<?php echo $row['nombre'] ?>',
                                    '<?php echo $row['unidad_medida'] ?>',
                                    '<?php echo $row['precio'] ?>',
                                    '<?php echo $row['stock'] ?>')" >
                                        Editar
                                    </button>
                                    <a href="./operations/delete.php?id=<?php echo $row['id']?>&stock=<?php echo $row['stock']?>" class="btn btn-danger">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>  
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script>
    setValues = function(id, name, unit, price, stock){
        values = {
            "id" : id,
            "name" : name,
            "unit" : unit,
            "price" : price,
            "stock" : stock
        }

        $('#id_hidden').val(values.id)
        $('#name').val(values.name)
        $('#unit').val(values.unit)
        $('#price').val(values.price)
        $('#stock').val(values.stock) 
    }
</script>
</html>