<?php
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
            3 cafeterias cadastradas
            <!-- TODO: Substituir por código PHP dinâmico -->
        </div>
        
        <!-- Link para cadastro -->
        <a href="cadastrar.php" class="btn">➕ Cadastrar Nova Cafeteria</a>
        
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