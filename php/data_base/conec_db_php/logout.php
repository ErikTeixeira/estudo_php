<?php
session_start();

// Limpa todas as variáveis da sessão
$_SESSION = array();

// Se usar cookie de sessão, remove ele também
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroi a sessão de fato
session_destroy();

// Redireciona para a tela de login
header("Location: /");
exit;
?>