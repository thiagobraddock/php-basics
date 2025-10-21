<?php
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Estabelecimento - Espírito Santo do Pinhal</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="container container-form">
    <h1 class="form-title">🏪 Cadastrar Novo Estabelecimento</h1>
        
        <!-- TODO: Implementar exibição de mensagens de sucesso/erro -->
        <?php if (!empty($mensagem)): ?>
            <div class="mensagem <?php echo $tipo_mensagem; ?>">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="nome">
                    Nome do Estabelecimento <span class="obrigatorio">*</span>
                </label>
                <input 
                    type="text" 
                    id="nome" 
                    name="nome" 
                    value="<?php echo htmlspecialchars($dados['nome'] ?? ''); ?>" 
                    maxlength="100"
                    required
                    placeholder="Ex: Restaurante Dona Elisa"
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
                    value="<?php echo htmlspecialchars($dados['endereco'] ?? ''); ?>" 
                    maxlength="200"
                    required
                    placeholder="Ex: Rua Treze de Maio, 210 - Centro"
                >
            </div>

            <div class="form-group">
                <label for="categoria">
                    Categoria <span class="obrigatorio">*</span>
                </label>
                <input 
                    type="text" 
                    id="categoria" 
                    name="categoria" 
                    value="<?php echo htmlspecialchars($dados['categoria'] ?? ''); ?>" 
                    maxlength="50"
                    required
                    placeholder="Ex: Cafeteria"
                    list="categorias-sugeridas"
                >
                <datalist id="categorias-sugeridas">
                    <option value="Cafeteria"></option>
                    <option value="Restaurante"></option>
                    <option value="Padaria"></option>
                    <option value="Pizzaria"></option>
                    <option value="Doceria"></option>
                    <option value="Bar"></option>
                </datalist>
                <!-- TODO: Substituir por categorias vindas do banco -->
            </div>
            
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input 
                    type="tel" 
                    id="telefone" 
                    name="telefone" 
                    value="<?php echo htmlspecialchars($dados['telefone'] ?? ''); ?>" 
                    maxlength="20"
                    placeholder="(19) 3651-1234"
                >
            </div>
            
            <div class="form-group">
                <label for="especialidade">Especialidade da Casa</label>
                <textarea 
                    id="especialidade" 
                    name="especialidade" 
                    maxlength="150"
                    placeholder="Ex: Comida caseira, cafés especiais, doces artesanais..."
                ><?php echo htmlspecialchars($dados['especialidade'] ?? ''); ?></textarea>
                <small style="color: #666;">Máximo 150 caracteres</small>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn">
                    💾 Cadastrar Estabelecimento
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