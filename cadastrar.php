<?php
// Incluir sistema de autenticação
require_once 'includes/functions.php';

// Verificar se usuário está logado
iniciarSessao();
if (!usuarioLogado()) {
    header('Location: login.php');
    exit;
}

// TODO: Incluir config.php e implementar lógica de cadastro
// TODO: Processar formulário quando enviado via POST
// TODO: Validar dados e inserir no banco

// Dados para manter valores no formulário (implementar depois)
$dados = ['nome' => '', 'endereco' => '', 'telefone' => '', 'especialidade' => ''];
$mensagem = '';
$tipo_mensagem = '';
$usuarioLogado = obterUsuarioLogado();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cafeteria - Poços de Caldas</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="container container-form">
        <h1 class="form-title">☕ Cadastrar Nova Cafeteria</h1>
        
        <!-- Informações do usuário logado -->
        <div style="text-align: right; margin-bottom: 20px; color: #666;">
            👤 Logado como: <?php echo htmlspecialchars($usuarioLogado['nome_completo']); ?>
            <a href="logout.php" style="margin-left: 10px; color: #8b4513; text-decoration: none;">🚪 Sair</a>
        </div>
        
        <!-- TODO: Implementar exibição de mensagens de sucesso/erro -->
        <?php if (!empty($mensagem)): ?>
            <div class="mensagem <?php echo $tipo_mensagem; ?>">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="nome">
                    Nome da Cafeteria <span class="obrigatorio">*</span>
                </label>
                <input 
                    type="text" 
                    id="nome" 
                    name="nome" 
                    value="<?php echo htmlspecialchars($dados['nome']); ?>" 
                    maxlength="100"
                    required
                    placeholder="Ex: Café do Centro"
                >
            </div>
            
            <div class="form-group">
                <label for="endereco">
                    Endereço Completo <span class="obrigatorio">*</span>
                </label>
                <input 
                    type="text" 
                    id="endereco" 
                    name="endereco" 
                    value="<?php echo htmlspecialchars($dados['endereco']); ?>" 
                    maxlength="200"
                    required
                    placeholder="Ex: Rua Rio de Janeiro, 123 - Centro"
                >
            </div>
            
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input 
                    type="tel" 
                    id="telefone" 
                    name="telefone" 
                    value="<?php echo htmlspecialchars($dados['telefone']); ?>" 
                    maxlength="20"
                    placeholder="(35) 3721-1234"
                >
            </div>
            
            <div class="form-group">
                <label for="especialidade">Especialidade da Casa</label>
                <textarea 
                    id="especialidade" 
                    name="especialidade" 
                    maxlength="150"
                    placeholder="Ex: Café expresso, doces artesanais, pão de açúcar mineiro..."
                ><?php echo htmlspecialchars($dados['especialidade']); ?></textarea>
                <small style="color: #666;">Máximo 150 caracteres</small>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn">
                    💾 Cadastrar Cafeteria
                </button>
                <a href="index.php" class="btn btn-voltar">
                    ⬅️ Voltar para Lista
                </a>
            </div>
        </form>
        
        <div class="footer">
            <span class="obrigatorio">*</span> Campos obrigatórios
        </div>
    </div>
    
    <script>
        // Máscara simples para telefone
        document.getElementById('telefone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length <= 11) {
                if (value.length <= 2) {
                    value = value.replace(/(\d{0,2})/, '($1');
                } else if (value.length <= 6) {
                    value = value.replace(/(\d{2})(\d{0,4})/, '($1) $2');
                } else if (value.length <= 10) {
                    value = value.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
                } else {
                    value = value.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
                }
            }
            
            e.target.value = value;
        });
    </script>
</body>
</html>