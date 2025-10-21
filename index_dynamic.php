<?php
// Inclui configuração do banco de dados
require_once 'config.php';
// Inclui funções auxiliares
require_once 'includes/functions.php';

// Recupera a categoria da URL (Query String) - ex: ?categoria=Cafeteria
$categoriaSelecionada = isset($_GET['categoria']) ? $_GET['categoria'] : '';

// Busca todas as categorias disponíveis no banco
$categorias = buscarCategorias($pdo);

// Busca estabelecimentos (filtra por categoria se houver)
$estabelecimentos = buscarEstabelecimentos($pdo, $categoriaSelecionada);

// Conta quantos estabelecimentos foram encontrados
$totalEstabelecimentos = count($estabelecimentos);
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

        <div class="resumo-estabelecimentos">
            <?php echo $totalEstabelecimentos; ?> estabelecimento<?php echo $totalEstabelecimentos != 1 ? 's' : ''; ?>
            <?php if ($categoriaSelecionada != ''): ?>
                na categoria <strong><?php echo $categoriaSelecionada; ?></strong>
            <?php else: ?>
                cadastrado<?php echo $totalEstabelecimentos != 1 ? 's' : ''; ?>
            <?php endif; ?>
        </div>

        <!-- <a href="cadastrar_dynamic.php" class="btn">➕ Cadastrar Novo Estabelecimento</a> -->

        <!-- Filtros por categoria usando links (método GET via Query String) -->
        <div class="filtros-categorias">
            <!-- Botão "Todos" - remove o filtro -->
            <a href="index_dynamic.php" class="btn-filtro <?php echo $categoriaSelecionada == '' ? 'ativo' : ''; ?>">
                Todos
            </a>

            <!-- Loop: cria um botão para cada categoria do banco -->
            <?php foreach ($categorias as $categoria): ?>
                <a href="index_dynamic.php?categoria=<?php echo $categoria; ?>"
                    class="btn-filtro <?php echo $categoriaSelecionada == $categoria ? 'ativo' : ''; ?>">
                    <?php echo $categoria; ?>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="estabelecimentos-lista">
            <?php if (count($estabelecimentos) > 0): ?>
                <?php foreach ($estabelecimentos as $estabelecimento): ?>
                    <div class="estabelecimento-card">
                        <div class="estabelecimento-nome">
                            <?php echo $estabelecimento['nome']; ?>
                        </div>

                        <div class="categoria-badge">
                            <?php echo $estabelecimento['categoria']; ?>
                        </div>

                        <div class="estabelecimento-info">
                            📍 <?php echo $estabelecimento['endereco']; ?>
                        </div>

                        <?php if ($estabelecimento['telefone']): ?>
                            <div class="estabelecimento-info">
                                📞 <?php echo formatarTelefone($estabelecimento['telefone']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($estabelecimento['especialidade']): ?>
                            <div class="especialidade">
                                ✨ <?php echo $estabelecimento['especialidade']; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="nenhum-estabelecimento">
                    <?php if ($categoriaSelecionada != ''): ?>
                        Nenhum estabelecimento encontrado na categoria <strong><?php echo $categoriaSelecionada; ?></strong>.<br>
                        <a href="index_dynamic.php">Ver todos novamente</a>
                    <?php else: ?>
                        Nenhum estabelecimento cadastrado ainda.<br>
                        Seja o primeiro a cadastrar! ✨
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="footer">
            Sistema desenvolvido com PHP puro + MySQL<br>
            <small>Catálogo didático de estabelecimentos de Espírito Santo do Pinhal</small>
        </div>
    </div>
</body>

</html>