<!-- register.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
    <h2>Registrarse</h2>
    <?php if(isset($_SESSION["error"])): ?>
        <p><?php echo $_SESSION["error"]; unset($_SESSION["error"]); ?></p>
    <?php endif; ?>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="register">
        <label for="username">Usuario:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Registrarse">
    </form>
    <a href="login.php">Iniciar Sesión</a>
</body>
</html>
