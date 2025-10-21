<?php
/**
 * Configuração da conexão com o banco de dados
 * Este arquivo será incluído em todas as páginas que precisam acessar o banco
 */

// Configurações do banco de dados
$host = 'localhost';        // Servidor do banco
$usuario = 'root';          // Usuário do MySQL
$senha = '';                // Senha do MySQL (deixe vazio se não tiver)
$banco = 'estabelecimentos_pinhal'; // Nome do banco de dados

// Tentar conectar com o banco
try {
    // Criar conexão usando PDO (PHP Data Objects)
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha);
    
    // Configurar PDO para mostrar erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Configurar charset para UTF-8
    $pdo->exec("SET NAMES utf8");
    
    // Mensagem de sucesso (comentar em produção)
    // echo "Conectado com sucesso!";
    
} catch(PDOException $e) {
    // Se der erro na conexão, mostrar mensagem
    die("Erro na conexão: " . $e->getMessage());
}
?>