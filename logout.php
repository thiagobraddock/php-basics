<?php
/**
 * Página de logout
 * Encerra a sessão do usuário e redireciona
 */

// Incluir dependências
require_once 'includes/functions.php';

// Realizar logout
realizarLogout();

// Redirecionar para a página principal
redirecionarPara('index_dynamic.php');
?>