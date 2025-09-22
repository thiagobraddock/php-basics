<?php
/**
 * Página principal - Lista todas as cafeterias cadastradas
 * Versão refatorada com separação de responsabilidades
 */

// Incluir dependências
require_once 'config.php';
require_once 'includes/functions.php';

// Buscar cafeterias do banco
$cafeterias = buscarTodasCafeterias($pdo);
$totalCafeterias = contarCafeterias($pdo);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeterias de Poços de Caldas</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="container">
        <h1>☕ Cafeterias de Poços de Caldas</h1>
        
        <!-- Informações gerais -->
        <div style="text-align: center; margin-bottom: 20px; color: #666;">
            <?php echo $totalCafeterias; ?> cafeteria<?php echo $totalCafeterias != 1 ? 's' : ''; ?> cadastrada<?php echo $totalCafeterias != 1 ? 's' : ''; ?>
        </div>
        
        <!-- Link para cadastro -->
        <a href="cadastrar_dynamic.php" class="btn">➕ Cadastrar Nova Cafeteria</a>
        
        <div class="cafeterias-lista">
            <?php if ($cafeterias !== false): ?>
                <?php if (count($cafeterias) > 0): ?>
                    <?php foreach ($cafeterias as $cafeteria): ?>
                        <div class="cafeteria-card">
                            <div class="cafeteria-nome">
                                <?php echo htmlspecialchars($cafeteria['nome']); ?>
                            </div>
                            
                            <div class="cafeteria-info">
                                📍 <?php echo htmlspecialchars($cafeteria['endereco']); ?>
                            </div>
                            
                            <?php if (!empty($cafeteria['telefone'])): ?>
                                <div class="cafeteria-info">
                                    📞 <?php echo formatarTelefone($cafeteria['telefone']); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (!empty($cafeteria['especialidade'])): ?>
                                <div class="especialidade">
                                    ✨ <?php echo htmlspecialchars($cafeteria['especialidade']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="nenhuma-cafeteria">
                        Nenhuma cafeteria cadastrada ainda.<br>
                        Seja o primeiro a cadastrar! ☕
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="erro-sistema">
                    ❌ Erro ao carregar cafeterias. Tente novamente mais tarde.
                </div>
            <?php endif; ?>
        </div>
        
        <div class="footer">
            Sistema desenvolvido com PHP puro + MySQL<br>
            <small>Demonstrando boas práticas de programação</small>
        </div>
    </div>
</body>
</html>