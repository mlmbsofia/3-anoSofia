
<?php
session_start();

require 'csrf.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

if (!verificarTokenCsrf()) {
    http_response_code(403);
    exit('Requisição inválida. Volte ao site e tente novamente.');
}

$_SESSION = [];

if (ini_get('session.use_cookies')) {
    $parametros = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        [
            'expires' => time() - 42000,
            'path' => $parametros['path'],
            'domain' => $parametros['domain'],
            'secure' => $parametros['secure'],
            'httponly' => $parametros['httponly'],
            'samesite' => 'Lax'
        ]
    );
}

session_destroy();

header('Location: index.php');
exit;
