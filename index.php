<?php
// TODO: Incluir config.php e implementar lógica de busca de cafeterias
// TODO: Conectar com banco e buscar dados reais

// Sistema de autenticação
require_once 'includes/functions.php';
iniciarSessao();
$usuarioLogado = obterUsuarioLogado();
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
        
        <!-- Barra de navegação/autenticação -->
        <div style="text-align: right; margin-bottom: 20px;">
            <?php if ($usuarioLogado): ?>
                <span style="color: #666;">
                    👤 Olá, <?php echo htmlspecialchars($usuarioLogado['nome_completo']); ?>!
                </span>
                <a href="logout.php" style="margin-left: 10px; color: #8b4513; text-decoration: none;">🚪 Sair</a>
            <?php else: ?>
                <a href="login.php" style="color: #8b4513; text-decoration: none;">🔑 Fazer Login</a>
            <?php endif; ?>
        </div>
        
        <!-- Informações gerais -->
        <div style="text-align: center; margin-bottom: 20px; color: #666;">
            3 cafeterias cadastradas
            <!-- TODO: Substituir por código PHP dinâmico -->
        </div>
        
        <!-- Link para cadastro - controle de autenticação -->
        <?php if ($usuarioLogado): ?>
            <a href="cadastrar.php" class="btn">➕ Cadastrar Nova Cafeteria</a>
        <?php else: ?>
            <div style="text-align: center; margin-bottom: 20px;">
                <a href="login.php" class="btn">🔑 Fazer Login para Cadastrar</a>
            </div>
        <?php endif; ?>
        
        <div class="cafeterias-lista">
            <!-- Exemplo de cards de cafeterias (dados estáticos para template) -->
            <div class="cafeteria-card">
                <div class="cafeteria-nome">
                    Café do Centro
                </div>
                
                <div class="cafeteria-info">
                    📍 Rua Rio de Janeiro, 123 - Centro
                </div>
                
                <div class="cafeteria-info">
                    📞 (35) 3721-1234
                </div>
                
                <div class="especialidade">
                    ✨ Café expresso e pão de açúcar mineiro
                </div>
            </div>

            <div class="cafeteria-card">
                <div class="cafeteria-nome">
                    Cafeteria da Praça
                </div>
                
                <div class="cafeteria-info">
                    📍 Praça Pedro Sanches, 45
                </div>
                
                <div class="cafeteria-info">
                    📞 (35) 3722-5678
                </div>
                
                <div class="especialidade">
                    ✨ Cappuccino especial e doces caseiros
                </div>
            </div>

            <div class="cafeteria-card">
                <div class="cafeteria-nome">
                    Café das Montanhas
                </div>
                
                <div class="cafeteria-info">
                    📍 Av. Francisco Sales, 200
                </div>
                
                <div class="especialidade">
                    ✨ Café da região e quitandas mineiras
                </div>
            </div>

            <!-- TODO: Substituir os cards acima por loop PHP que busca dados reais do banco -->
            
        </div>
        
        <div class="footer">
            Sistema desenvolvido com PHP puro + MySQL<br>
            <small>Demonstrando boas práticas de programação</small>
        </div>
    </div>
</body>
</html>