<!-- dashboard.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION["username"]; ?>!</h2>
    <p>Esta es la página de panel de control. Puedes agregar más contenido aquí.</p>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>
