<?php

/**
 * Página de cadastro de estabelecimentos
 */

require_once 'config.php';
require_once 'includes/functions.php';

$mensagem = '';
$tipo_mensagem = '';

// Busca categorias existentes para sugestões
$categorias = buscarCategorias($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$categoria = $_POST['categoria'];
	$telefone = $_POST['telefone'];
	$especialidade = $_POST['especialidade'];

	// Validação simples
	if (empty($nome) || empty($endereco) || empty($categoria)) {
		$mensagem = 'Preencha os campos obrigatórios!';
		$tipo_mensagem = 'erro';
	} else {
		// Cadastrar no banco usando a função
		if (cadastrarEstabelecimento($pdo, $nome, $endereco, $categoria, $telefone, $especialidade)) {
			$mensagem = 'Estabelecimento cadastrado com sucesso! 🎉';
			$tipo_mensagem = 'sucesso';

			// Limpar campos
			$nome = $endereco = $categoria = $telefone = $especialidade = '';
		} else {
			$mensagem = 'Erro ao cadastrar. Tente novamente.';
			$tipo_mensagem = 'erro';
		}
	}
}
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
					value="<?php echo isset($nome) ? $nome : ''; ?>"
					maxlength="100"
					required
					placeholder="Ex: Café do Largo">
			</div>

			<div class="form-group">
				<label for="endereco">
					Endereço Completo <span class="obrigatorio">*</span>
				</label>
				<input
					type="text"
					id="endereco"
					name="endereco"
					value="<?php echo isset($endereco) ? $endereco : ''; ?>"
					maxlength="200"
					required
					placeholder="Ex: Rua Treze de Maio, 210 - Centro">
			</div>

			<div class="form-group">
				<label for="categoria">
					Categoria <span class="obrigatorio">*</span>
				</label>
				<input
					type="text"
					id="categoria"
					name="categoria"
					list="categorias-sugeridas"
					value="<?php echo isset($categoria) ? $categoria : ''; ?>"
					maxlength="50"
					required
					placeholder="Ex: Restaurante">
				<datalist id="categorias-sugeridas">
					<?php foreach ($categorias as $cat): ?>
						<option value="<?php echo $cat; ?>">
						<?php endforeach; ?>
				</datalist>
				<small style="color: #666;">Sugestões: Cafeteria, Restaurante, Padaria, Doceria...</small>
			</div>

			<div class="form-group">
				<label for="telefone">Telefone</label>
				<input
					type="tel"
					id="telefone"
					name="telefone"
					value="<?php echo isset($telefone) ? $telefone : ''; ?>"
					maxlength="20"
					placeholder="(19) 3651-1234">
			</div>

			<div class="form-group">
				<label for="especialidade">Especialidade da Casa</label>
				<textarea
					id="especialidade"
					name="especialidade"
					maxlength="150"
					placeholder="Ex: Pratos feitos, cafés especiais, massas artesanais..."><?php echo isset($especialidade) ? $especialidade : ''; ?></textarea>
				<small style="color: #666;">Máximo 150 caracteres</small>
			</div>

			<div class="form-group">
				<button type="submit" class="btn">
					💾 Cadastrar Estabelecimento
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