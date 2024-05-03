<!doctype html>
<html lang="ca">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/show.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>PRODUCTES MANOLO</title>
</head>

<body>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <div class="text-right">
            <a class="btn btn-secondary" role="button" href="./index.php"><ion-icon name="exit-outline"></ion-icon> Tornar</a>
        </div>
    <div class="container">
        <div class="py-5 text-center">
            <h1>PRODUCTES MANOLO</h1>
            <h3>VEURE PRODUCTES</h3>
        </div>
        <div class="alert alert-info text-center" role="alert">
            Vista del producte
        </div>
        <div class="text-left">
            <div class="form-group row">
                <label for="Id" class="col-sm-2 col-form-label font-weight-bold">Id</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="Id" name="Id" value="<?php echo isset($result[0]['Id']) ? $result[0]['Id'] : ''; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Nom" class="col-sm-2 col-form-label font-weight-bold">Nom</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="Nom" name="Nom" value="<?php echo isset($result[0]['Nom']) ? $result[0]['Nom'] : ''; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Preu" class="col-sm-2 col-form-label font-weight-bold">Preu</label>
                <div class="col-sm-10">
                    <input type="number" readonly class="form-control-plaintext" id="Preu" name="Preu" value="<?php echo isset($result[0]['Preu']) ? $result[0]['Preu'] : ''; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Stock" class="col-sm-2 col-form-label font-weight-bold">Stock</label>
                <div class="col-sm-10">
                    <input type="number" readonly class="form-control-plaintext" id="Stock" name="Stock" value="<?php echo isset($result[0]['Stock']) ? $result[0]['Stock'] : ''; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Mides" class="col-sm-2 col-form-label font-weight-bold">Mides</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="Mides" name="Mides" value="<?php echo isset($result[0]['Mides']) ? $result[0]['Mides'] : ''; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Descripció" class="col-sm-2 col-form-label font-weight-bold">Descripció</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="Descripció" name="Descripció" value="<?php echo isset($result[0]['Descripció']) ? $result[0]['Descripció'] : ''; ?>">
                </div>
            </div>
            <div class="center">
                <img src="<?= $result[0]['Imatge'] ?> ">
            </div>
        </div>
        
    </div>
    </div>

</body>

</html>