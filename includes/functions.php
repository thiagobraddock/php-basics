<?php

/**
 * Funções auxiliares do sistema
 * Mantém o código organizado e reutilizável
 */

/**
 * Busca todas as categorias cadastradas
 */
function buscarCategorias($pdo)
{
  $sql = "SELECT DISTINCT categoria FROM estabelecimentos ORDER BY categoria";
  return $pdo->query($sql)->fetchAll(PDO::FETCH_COLUMN);
}

/**
 * Busca estabelecimentos (com filtro opcional por categoria)
 */
function buscarEstabelecimentos($pdo, $categoria = '')
{
  if ($categoria != '') {
    $stmt = $pdo->prepare("SELECT * FROM estabelecimentos WHERE categoria = ? ORDER BY nome");
    $stmt->execute([$categoria]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } else {
    return $pdo->query("SELECT * FROM estabelecimentos ORDER BY nome")->fetchAll(PDO::FETCH_ASSOC);
  }
}

/**
 * Cadastra um novo estabelecimento
 */
function cadastrarEstabelecimento($pdo, $nome, $endereco, $categoria, $telefone, $especialidade)
{
  $sql = "INSERT INTO estabelecimentos (nome, endereco, categoria, telefone, especialidade) VALUES (?, ?, ?, ?, ?)";
  $stmt = $pdo->prepare($sql);
  return $stmt->execute([$nome, $endereco, $categoria, $telefone, $especialidade]);
}

/**
 * Formata telefone para exibição
 */
function formatarTelefone($telefone)
{
  if (empty($telefone)) {
    return '';
  }

  $telefone = preg_replace('/[^0-9]/', '', $telefone);

  if (strlen($telefone) == 11) {
    return '(' . substr($telefone, 0, 2) . ') ' .
      substr($telefone, 2, 5) . '-' .
      substr($telefone, 7);
  } elseif (strlen($telefone) == 10) {
    return '(' . substr($telefone, 0, 2) . ') ' .
      substr($telefone, 2, 4) . '-' .
      substr($telefone, 6);
  }

  return $telefone;
}
