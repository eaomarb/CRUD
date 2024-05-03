<!doctype html>
<html lang="ca">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>CRUD PRODUCTES</title>
</head>
<body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<div class="container">
    <div class="py-5 text-center">
        <h1>Editar Usuari</h1>
    </div>
    <div class="alert alert-warning text-center" role="alert">
        Vista d'edició dels usuaris
    </div>
    <div class="text-left">
        <form method="POST" action="../controllers/users.php">
            <!-- Afegeix un camp ocult on fa referencia la ID -->
        <input type="hidden" name="Id" value="<?php echo isset($result[0]['Id']) ? $result[0]['Id'] : ''; ?>">
            <div class="form-group row">
                <label for="Nom" class="col-sm-2 col-form-label font-weight-bold">Usuari</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" id="Usuari" name="Usuari" value="<?php echo isset($result[0]['Usuari']) ? $result[0]['Usuari'] : ''; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Preu" class="col-sm-2 col-form-label font-weight-bold">Contrasenya</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" id="Contrasenya" name="Contrasenya" value="<?php echo isset($result[0]['Contrasenya']) ? $result[0]['Contrasenya'] : ''; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Stock" class="col-sm-2 col-form-label font-weight-bold">Administrador</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control-plaintext" id="Administrador" name="Administrador" value="<?php echo isset($result[0]['Administrador']) ? $result[0]['Administrador'] : ''; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Mides" class="col-sm-2 col-form-label font-weight-bold">Editor</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control-plaintext" id="Editor" name="Editor" value="<?php echo isset($result[0]['Editor']) ? $result[0]['Editor'] : ''; ?>">
                </div>
            </div>

            <input type="hidden" name="action" value="up">
            <div class="text-right">
                <button type="submit" class="btn btn-primary"><ion-icon name="save-outline"></ion-icon></button>
                <a class="btn btn-secondary" role="button" href="./index.php"><ion-icon name="exit-outline"></ion-icon></a>
            </div>
        </form>                
    </div>
</div>
</body>
</html>
