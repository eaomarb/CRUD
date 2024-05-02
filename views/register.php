    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/register.css">
        <title>Registre</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <h2>Registre d'Usuari</h2>
        <form action="register.php" method="post">
            <label for="nombre_usuario">Nom d'Usuari:</label>
            <input type="text" id="Usuari" name="Usuari" required><br><br>
            
            <label for="Contrasenya">Contrasenya:</label>
            <input type="password" id="Contrasenya" name="Contrasenya" required><br><br>
            
            <input type="submit" value="Registrarse">
        </form>
    </body>
    </html>