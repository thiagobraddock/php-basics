<?php
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estabelecimentos de Espírito Santo do Pinhal</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="container">
        <h1>🏙️ Estabelecimentos de Espírito Santo do Pinhal</h1>
        
        <!-- Informações gerais -->
        <div class="resumo-estabelecimentos">
            5 estabelecimentos cadastrados
            <!-- TODO: Substituir por contagem dinâmica e filtro selecionado -->
        </div>
        
        <!-- Link para cadastro -->
        <a href="cadastrar.php" class="btn">➕ Cadastrar Novo Estabelecimento</a>

        <!-- Filtros de categoria (versão estática de exemplo) -->
        <div class="filtros-categorias">
            <a href="#" class="btn-filtro ativo">Todos</a>
            <a href="#" class="btn-filtro">Cafeteria</a>
            <a href="#" class="btn-filtro">Restaurante</a>
            <a href="#" class="btn-filtro">Padaria</a>
            <a href="#" class="btn-filtro">Doceria</a>
        </div>
        
        <div class="estabelecimentos-lista">
            <!-- Exemplo de cards de estabelecimentos (dados estáticos para template) -->
            <div class="estabelecimento-card">
                <div class="estabelecimento-nome">
                    Café do Largo
                </div>

                <div class="categoria-badge">
                    Cafeteria
                </div>
                
                <div class="estabelecimento-info">
                    📍 Praça da Bandeira, 45 - Centro
                </div>
                
                <div class="estabelecimento-info">
                    📞 (19) 3651-1122
                </div>
                
                <div class="especialidade">
                    ✨ Cafés especiais e quitutes caseiros
                </div>
            </div>

            <div class="estabelecimento-card">
                <div class="estabelecimento-nome">
                    Restaurante Dona Elisa
                </div>

                <div class="categoria-badge">
                    Restaurante
                </div>
                
                <div class="estabelecimento-info">
                    📍 Rua Treze de Maio, 210 - Centro
                </div>
                
                <div class="estabelecimento-info">
                    📞 (19) 3651-3344
                </div>
                
                <div class="especialidade">
                    ✨ Comida caseira com toque regional
                </div>
            </div>

            <div class="estabelecimento-card">
                <div class="estabelecimento-nome">
                    Padaria Santo Pão
                </div>

                <div class="categoria-badge">
                    Padaria
                </div>
                
                <div class="estabelecimento-info">
                    📍 Av. Oliveira Motta, 980 - Jardim Universitário
                </div>
                
                <div class="especialidade">
                    ✨ Pães artesanais e doces finos
                </div>
            </div>

            <!-- TODO: Substituir os cards acima por loop PHP que busca dados reais do banco -->
            
        </div>
        
        <div class="footer">
            Sistema desenvolvido com PHP puro + MySQL<br>
            <small>Catálogo didático de estabelecimentos de Espírito Santo do Pinhal</small>
        </div>
    </div>
</body>
</html>