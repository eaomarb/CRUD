<?php
session_start();
var_dump($_SESSION);
print_r($_POST);
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
    <title>Administració d'Usuari</title>
</head>

<body>
<div class="text-left">
            <a class="btn btn-secondary" role="button" href=".\index.php"><ion-icon name="exit-outline"></ion-icon> Tornar</a>
        </div>
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
            }

        ?>
    </div>
    
    <div class="container">
        <div class="py-5 text-center">
            <h1>Administració</h1>
            <h3>Control d'Usuaris</h3>
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


<div class="table-responsive-sm">
				<table class="table table-striped">
					<thead class="thead-dark">
						<tr>
							<th class="align-middle">ID</th>
							<th class="align-middle">USUARI</th>
							<th class="align-middle">CONSTRASENYA</th>
							<th class="align-middle">PERMÍS ADMINISTRADOR</th>
                            <th class="align-middle">PERMÍS EDITOR</th>
							<th class="align-middle text-right"><a class="btn btn-primary" role="button" href="?action=newUsuari">Afegir</a></th>
						</tr>
					</thead>
					<tbody>
						<?php
                            foreach ($result as $row) {
                                echo '<tr>';
                                echo "<td class='align-middle'>" . $row['Id'] . '</td>';
                                echo "<td class='align-middle'>" . $row['Usuari'] . '</td>';
                                echo "<td class='align-middle'>" . $row['Contrasenya'] . '</td>';
                                echo "<td class='align-middle'>" . $row['Administrador'] . '</td>';
                                echo "<td class='align-middle'>" . $row['Editor'] . '</td>';
                                echo "<a class='btn btn-warning' role='button' href='?action=edit&id=" . $row['Id'] . "'>Editar</a> ";
                                echo "<a class='btn btn-danger' role='button' href='?action=delete&id=" . $row['Id'] . "'>Eliminar</a> ";
                                echo '</td>';
                                echo '</tr>';
                            }
                        ?>
					</tbody>
				</table>
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