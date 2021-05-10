<?php include("./database/db.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <form action="./operations/add.php" method="POST">
        <div class="container">
            <div class="row justify-content-md-left">
                <div class="col col-lg-4">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col col-lg-2 col-md-3">
                    <label for="unit" class="form-label">Unidad de medida</label>
                    <select name="unit" class="form-select" aria-label="Default select example">
                        <option disabled selected>Selecciona una opción</option>
                        <option value="1">kg</option>
                        <option value="2">m3</option>
                        <option value="3">p2</option>
                        <option value="3">pz</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row justify-content-md-left">
                <div class="col col-lg-2">
                    <label for="price" class="form-label">Precio</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="text" name="price" class="form-control">
                    </div>
                </div>
                <div class="col col-lg-2">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" name="stock">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success" name="add">Guardar</button>
        </div>
    </form> 

    <br>
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php session_unset(); } ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</html>