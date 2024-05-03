<?php
var_dump($_SESSION);
?>
<!doctype html>
<html lang="ca">

<head>
    <!-- Metadades necessàries -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>CRUD PRODUCTES</title>
</head>

<body>
    <div class="btn float-right">
        
        
        <?php
            // Verificar si el usuario ha iniciado sesión
            $isEditor = 0;
            $isAdmin = 0;
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $isAdmin = $_SESSION['isAdmin'];
                $isEditor = $_SESSION['isEditor'];
                echo '<a href="./controllers/logout.php" class="btn btn-danger">Tancar sesio</a>';
                echo '<p>Benvingut, ' . $username . '</p>';
            } else {
                echo '<a href="views/login.php" class="btn btn-primary mr-2">Login</a>';
                echo '<a href="views/register.php" class="btn btn-secondary">Register</a>';
            }

            if ($isAdmin = 1){
                echo '<a href="views/editUser.php" class="btn btn-primary mr-2">Staff</a>';
            }

        ?>
    </div>
    <div class="container">
        <div class="py-5 text-center">
            <h1>PRODUCTES MANOLO</h1>
            <h3>LLISTA DELS PRODUCTES</h3>
        </div>

        <?php
            // Comprovar si hi ha un missatge de success
            if (isset($missatge['Success'])) {
                echo "<div class='alert alert-success' role='alert'>{$missatge['Success']}</div>";
            } elseif (isset($missatge['Error'])) {
                // Comprovar si hi ha un missatge d'error
                echo "<div class='alert alert-danger' role='alert'>{$missatge['Error']}</div>";
            }
        ?>


        <div class="row mb-4">
            <?php
                // Recorrer els resultats per mostrar-los a la taula
                foreach ($result as $row) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='card'>";
                    echo "<div class='card-img-top'><img src='" . $row['Imatge'] . "'>" . '</div>';
                    echo "<div class='card-body'>";
                    echo '<p class="card-text">' . $row['Nom'] . '</p>';
                    echo "<p class='card-text'>Preu: " . $row['Preu'] . '</p>';
                    echo "<p class='card-text'>Stock: " . $row['Stock'] . '</p>';
                    echo "<a href='?action=show&id=" . $row['Id'] . "' class='btn btn-primary mr-1'>Veure</a>";

                    if ($isEditor == 1) {
                        echo "<a href='?action=edit&id=" . $row['Id'] . "' class='btn btn-secondary mr-1'>Editar</a>";
                        echo "<a href='?action=delete&id=" . $row['Id'] . "' class='btn btn-danger'>Eliminar</a>";
                    }

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>

        <?php
            if ($isEditor == 1) {
                echo '<div class="text-center">';
                echo '<a href="?action=new" class="btn btn-success btn-lg">Afegir un nou producte</a>';
                echo '</div>';
            }
        ?>
    </div>

</body>

</html>