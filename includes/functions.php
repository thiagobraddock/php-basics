<?php
/**
 * Arquivo com todas as funções da aplicação
 * Separação das regras de negócio da apresentação
 */

/**
 * Busca todas as cafeterias do banco de dados
 * @param PDO $pdo Conexão com o banco
 * @return array Lista de cafeterias ou array vazio
 */
function buscarTodasCafeterias($pdo) {
    try {
        $sql = "SELECT * FROM cafeterias ORDER BY nome ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // Log do erro (em produção, usar sistema de log)
        error_log("Erro ao buscar cafeterias: " . $e->getMessage());
        return false;
    }
}

/**
 * Cadastra uma nova cafeteria no banco
 * @param PDO $pdo Conexão com o banco
 * @param array $dados Dados da cafeteria
 * @return bool True se sucesso, False se erro
 */
function cadastrarCafeteria($pdo, $dados) {
    try {
        $sql = "INSERT INTO cafeterias (nome, endereco, telefone, especialidade) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        
        return $stmt->execute([
            $dados['nome'],
            $dados['endereco'], 
            $dados['telefone'],
            $dados['especialidade']
        ]);
    } catch(PDOException $e) {
        error_log("Erro ao cadastrar cafeteria: " . $e->getMessage());
        return false;
    }
}

/**
 * Valida os dados do formulário de cadastro
 * @param array $dados Dados a serem validados
 * @return array Array de erros (vazio se não há erros)
 */
function validarDadosCafeteria($dados) {
    $erros = [];
    
    // Validar nome
    if (empty(trim($dados['nome']))) {
        $erros[] = "Nome da cafeteria é obrigatório";
    } elseif (strlen(trim($dados['nome'])) < 3) {
        $erros[] = "Nome deve ter pelo menos 3 caracteres";
    }
    
    // Validar endereço
    if (empty(trim($dados['endereco']))) {
        $erros[] = "Endereço é obrigatório";
    } elseif (strlen(trim($dados['endereco'])) < 10) {
        $erros[] = "Endereço deve ser mais detalhado";
    }
    
    // Validar telefone (se preenchido)
    if (!empty($dados['telefone'])) {
        $telefone = preg_replace('/[^0-9]/', '', $dados['telefone']);
        if (strlen($telefone) < 10) {
            $erros[] = "Telefone deve ter pelo menos 10 dígitos";
        }
    }
    
    // Validar especialidade (se preenchida)
    if (!empty($dados['especialidade']) && strlen($dados['especialidade']) > 150) {
        $erros[] = "Especialidade deve ter no máximo 150 caracteres";
    }
    
    return $erros;
}

/**
 * Limpa e sanitiza os dados de entrada
 * @param array $dados Dados brutos do formulário
 * @return array Dados limpos
 */
function limparDados($dados) {
    return [
        'nome' => trim($dados['nome'] ?? ''),
        'endereco' => trim($dados['endereco'] ?? ''),
        'telefone' => trim($dados['telefone'] ?? ''),
        'especialidade' => trim($dados['especialidade'] ?? '')
    ];
}

/**
 * Formata telefone para exibição
 * @param string $telefone Telefone bruto
 * @return string Telefone formatado
 */
function formatarTelefone($telefone) {
    if (empty($telefone)) return '';
    
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

/**
 * Conta total de cafeterias cadastradas
 * @param PDO $pdo Conexão com o banco
 * @return int Número de cafeterias
 */
function contarCafeterias($pdo) {
    try {
        $sql = "SELECT COUNT(*) as total FROM cafeterias";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$resultado['total'];
    } catch(PDOException $e) {
        error_log("Erro ao contar cafeterias: " . $e->getMessage());
        return 0;
    }
}

/**
 * Busca cafeteria por ID
 * @param PDO $pdo Conexão com o banco
 * @param int $id ID da cafeteria
 * @return array|false Dados da cafeteria ou false
 */
function buscarCafeteriaPorId($pdo, $id) {
    try {
        $sql = "SELECT * FROM cafeterias WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        error_log("Erro ao buscar cafeteria: " . $e->getMessage());
        return false;
    }
}

/**
 * Exibe mensagem formatada
 * @param string $mensagem Texto da mensagem
 * @param string $tipo Tipo: 'sucesso' ou 'erro'
 */
function exibirMensagem($mensagem, $tipo = 'sucesso') {
    if (!empty($mensagem)) {
        echo "<div class='mensagem {$tipo}'>";
        echo htmlspecialchars($mensagem);
        echo "</div>";
    }
}

/**
 * Redireciona para uma página
 * @param string $url URL de destino
 */
function redirecionarPara($url) {
    header("Location: $url");
    exit;
}

/**
 * Inicia sessão se ainda não foi iniciada
 */
function iniciarSessao() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

/**
 * Autentica um usuário
 * @param PDO $pdo Conexão com o banco
 * @param string $username Nome de usuário  
 * @param string $senha Senha
 * @return array|false Dados do usuário ou false
 */
function autenticarUsuario($pdo, $username, $senha) {
    try {
        $sql = "SELECT * FROM usuarios WHERE username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        
        return false;
    } catch(PDOException $e) {
        error_log("Erro na autenticação: " . $e->getMessage());
        return false;
    }
}

/**
 * Verifica se o usuário está logado
 * @return bool True se logado, False caso contrário
 */
function usuarioLogado() {
    iniciarSessao();
    return isset($_SESSION['usuario_id']) && !empty($_SESSION['usuario_id']);
}

/**
 * Obtém dados do usuário logado
 * @return array|null Dados do usuário ou null
 */
function obterUsuarioLogado() {
    iniciarSessao();
    if (usuarioLogado()) {
        return [
            'id' => $_SESSION['usuario_id'],
            'username' => $_SESSION['usuario_username'] ?? '',
            'nome_completo' => $_SESSION['usuario_nome'] ?? ''
        ];
    }
    return null;
}

/**
 * Realiza login do usuário
 * @param array $usuario Dados do usuário
 */
function realizarLogin($usuario) {
    iniciarSessao();
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_username'] = $usuario['username'];
    $_SESSION['usuario_nome'] = $usuario['nome_completo'];
}

/**
 * Realiza logout do usuário
 */
function realizarLogout() {
    iniciarSessao();
    session_destroy();
}

/**
 * Requer autenticação - redireciona para login se não autenticado
 * @param string $redirect_url URL para redirecionamento após login
 */
function requerAutenticacao($redirect_url = 'login.php') {
    if (!usuarioLogado()) {
        redirecionarPara($redirect_url);
    }
}

/**
 * Valida dados de login
 * @param array $dados Dados do formulário
 * @return array Array de erros
 */
function validarDadosLogin($dados) {
    $erros = [];
    
    if (empty(trim($dados['username']))) {
        $erros[] = "Nome de usuário é obrigatório";
    }
    
    if (empty(trim($dados['senha']))) {
        $erros[] = "Senha é obrigatória";
    }
    
    return $erros;
}
?>