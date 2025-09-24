<?php
/**
 * Página de login/autenticação
 * Permite que usuários façam login para acessar funcionalidades restritas
 */

// Incluir dependências
require_once 'config.php';
require_once 'includes/functions.php';

// Iniciar sessão
iniciarSessao();

// Se já está logado, redirecionar para a página principal
if (usuarioLogado()) {
    redirecionarPara('index_dynamic.php');
}

// Variáveis para controle
$mensagem = '';
$tipo_mensagem = '';
$dados = ['username' => '', 'senha' => ''];

// Processar formulário se foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Limpar dados recebidos
    $dados = [
        'username' => trim($_POST['username'] ?? ''),
        'senha' => trim($_POST['senha'] ?? '')
    ];
    
    // Validar dados
    $erros = validarDadosLogin($dados);
    
    if (empty($erros)) {
        // Tentar autenticar
        $usuario = autenticarUsuario($pdo, $dados['username'], $dados['senha']);
        
        if ($usuario) {
            // Login realizado com sucesso
            realizarLogin($usuario);
            redirecionarPara('index_dynamic.php');
        } else {
            $mensagem = "Nome de usuário ou senha incorretos.";
            $tipo_mensagem = "erro";
        }
    } else {
        // Mostrar erros de validação
        $mensagem = implode("<br>", $erros);
        $tipo_mensagem = "erro";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Cafeterias</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="container container-form">
        <h1 class="form-title">🔐 Login do Sistema</h1>
        
        <div style="text-align: center; margin-bottom: 20px; color: #666;">
            Faça login para cadastrar novas cafeterias
        </div>
        
        <?php if (!empty($mensagem)): ?>
            <div class="mensagem <?php echo $tipo_mensagem; ?>">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">
                    Nome de Usuário <span class="obrigatorio">*</span>
                </label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    value="<?php echo htmlspecialchars($dados['username']); ?>" 
                    maxlength="50"
                    required
                    placeholder="Digite seu usuário"
                    autocomplete="username"
                >
            </div>
            
            <div class="form-group">
                <label for="senha">
                    Senha <span class="obrigatorio">*</span>
                </label>
                <input 
                    type="password" 
                    id="senha" 
                    name="senha" 
                    maxlength="100"
                    required
                    placeholder="Digite sua senha"
                    autocomplete="current-password"
                >
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn">
                    🔑 Fazer Login
                </button>
                <a href="index_dynamic.php" class="btn btn-voltar">
                    ⬅️ Voltar para Lista
                </a>
            </div>
        </form>
        
        <div class="footer">
            <span class="obrigatorio">*</span> Campos obrigatórios<br>
            <small>Usuário de teste: <strong>admin</strong> | Senha: <strong>admin123</strong></small>
        </div>
    </div>
</body>
</html>