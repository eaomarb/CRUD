<!doctype html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Afegir nou producte</title>
</head>
<body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<div class="container">
    <div class="alert alert-primary text-center" role="alert" style="margin-top: 1rem;">
        Vista de creació d'un producte
    </div>
    <div class="text-left">
        <form method="POST" action="./index.php">
            <div class="form-group row">
                <label for="Nom" class="col-sm-2 col-form-label font-weight-bold">Nom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Nom" id="Nom" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Preu" class="col-sm-2 col-form-label font-weight-bold">Preu</label>
                <div class="col-sm-10">
                    <input type="number" step=".01" class="form-control" name="Preu" id="Preu" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Stock" class="col-sm-2 col-form-label font-weight-bold">Stock</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="Stock" id="Stock" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Mides" class="col-sm-2 col-form-label font-weight-bold">Mides</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Mides" id="Mides" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Descripció" class="col-sm-2 col-form-label font-weight-bold">Descripció</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Descripció" id="Descripció" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Imatge" class="col-sm-2 col-form-label font-weight-bold">Imatge</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Imatge" id="Imatge" required>
                </div>
            </div>
            <input type="hidden" name="action" value="add">
            <div class="text-right">
                <button type="submit" class="btn btn-primary"><ion-icon name="save-outline"></ion-icon></button>
                <a class="btn btn-secondary" role="button" href="./index.php"><ion-icon name="exit-outline"></ion-icon></a>
            </div>
        </form>                
    </div>
</div>
</body>
</html>