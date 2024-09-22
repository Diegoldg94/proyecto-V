<?php
session_start();

// Definir los usuarios, contraseñas permitidos y sus respectivas páginas de destino
$usuarios = [
    "user" => ["contraseña" => "user", "pagina" => "dashboard.php"]
];


// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Comprobar si el usuario y contraseña son correctos
    if (isset($usuarios[$username]) && $usuarios[$username]['contraseña'] == $password) {
        // Si las credenciales son correctas, configurar la sesión
        $_SESSION['username'] = $username;
        // Redirigir al usuario a su página de destino
        header('Location: ' . $usuarios[$username]['pagina']);
        exit;
    } else {
        // Si las credenciales son incorrectas, enviar un mensaje de error
        echo "Nombre de usuario o contraseña incorrecta.";
    }
}
?>