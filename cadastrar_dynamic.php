<?php
/**
 * Página de cadastro de cafeterias
 * Versão refatorada com separação de responsabilidades
 */

// Incluir dependências
require_once 'config.php';
require_once 'includes/functions.php';

// Variáveis para controle
$mensagem = '';
$tipo_mensagem = '';
$dados = ['nome' => '', 'endereco' => '', 'telefone' => '', 'especialidade' => ''];

// Processar formulário se foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Limpar dados recebidos
    $dados = limparDados($_POST);
    
    // Validar dados
    $erros = validarDadosCafeteria($dados);
    
    if (empty($erros)) {
        // Tentar cadastrar
        $sucesso = cadastrarCafeteria($pdo, $dados);
        
        if ($sucesso) {
            $mensagem = "Cafeteria cadastrada com sucesso! 🎉";
            $tipo_mensagem = "sucesso";
            
            // Limpar formulário após sucesso
            $dados = ['nome' => '', 'endereco' => '', 'telefone' => '', 'especialidade' => ''];
        } else {
            $mensagem = "Erro interno do sistema. Tente novamente.";
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
    <title>Cadastrar Cafeteria - Poços de Caldas</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="container container-form">
        <h1 class="form-title">☕ Cadastrar Nova Cafeteria</h1>
        
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
                <a href="index_dynamic.php" class="btn btn-voltar">
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