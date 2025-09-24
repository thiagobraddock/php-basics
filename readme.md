# Sistema de Cafeterias - PHP Básico

Um sistema web simples para gerenciar cafeterias em Poços de Caldas, desenvolvido em PHP puro com MySQL.

## 📋 Estrutura do Projeto

### Templates para Alunos (Interface Estática)
- `index.php` - Página principal com lista de cafeterias (template)
- `cadastrar.php` - Formulário de cadastro (template)

### Versões Funcionais (Referência do Professor)
- `index_dynamic.php` - Lista funcional conectada ao banco
- `cadastrar_dynamic.php` - Cadastro funcional com validação

### Arquivos de Configuração
- `config.php` - Configurações do banco de dados
- `includes/functions.php` - Funções auxiliares e de autenticação
- `dump_banco.sql` - Script de criação do banco (inclui tabela de usuários)

### Autenticação
- `login.php` - Página de login do sistema
- `logout.php` - Script de logout

### Recursos
- `assets/styles.css` - Estilos CSS
- `readme.md` - Este arquivo

## 🎯 Objetivo Pedagógico

Este projeto foi estruturado para permitir que os alunos:

1. **Vejam a interface completa** funcionando antes de implementar a lógica
2. **Implementem gradualmente** as funcionalidades PHP seguindo os TODOs
3. **Tenham uma referência funcional** nos arquivos `*_dynamic.php`

## 🚀 Como Usar

### Para Alunos (Templates)
1. Abra `index.php` para ver a interface da lista de cafeterias
2. Abra `cadastrar.php` para ver o formulário de cadastro
3. Implemente a lógica PHP seguindo os comentários `// TODO:`

### Para Testar a Versão Funcional
1. Configure o banco MySQL executando `dump_banco.sql`
2. Ajuste as configurações em `config.php`
3. Acesse `index_dynamic.php` e `cadastrar_dynamic.php`

## 🔐 Sistema de Autenticação

O sistema agora inclui autenticação de usuários para controlar o acesso ao cadastro de cafeterias.

### Funcionalidades de Autenticação:
- **Login seguro** com hash de senhas
- **Controle de sessão** PHP
- **Proteção de páginas** de cadastro
- **Interface de navegação** com status de login/logout

### Credenciais de Teste:
- **Usuário:** `admin`
- **Senha:** `admin123`

### Como Usar:
1. Acesse `login.php` para fazer login
2. Após autenticado, você poderá acessar o cadastro de cafeterias
3. Use o link "Sair" para fazer logout

## 🛠️ Tecnologias

- **Backend:** PHP 8.2+ (puro, sem frameworks)
- **Banco de Dados:** MySQL
- **Frontend:** HTML5, CSS3, JavaScript (vanilla)
- **Servidor:** Apache/Nginx ou PHP built-in server

## 📦 Instalação

```bash
# Clone o repositório
git clone [URL_DO_REPOSITORIO]

# Configure o banco de dados
mysql -u root -p < dump_banco.sql

# Inicie o servidor PHP
php -S localhost:8080
```

## 🎨 Funcionalidades

- ✅ Interface responsiva e moderna
- ✅ Listagem de cafeterias com informações completas
- ✅ Cadastro com validação de dados
- ✅ **Sistema de autenticação de usuários**
- ✅ **Controle de acesso para cadastro de cafeterias**
- ✅ Máscara automática para telefone
- ✅ Mensagens de sucesso/erro
- ✅ Separação clara entre template e lógica

## 📚 Conceitos Demonstrados

- Separação de responsabilidades (MVC básico)
- Conexão e consultas PDO
- Validação de dados server-side
- Sanitização de inputs
- **Sistema de autenticação com sessões PHP**
- **Hash seguro de senhas (password_hash/password_verify)**
- **Controle de acesso a páginas restritas**
- Estrutura de projeto organizada
- Boas práticas de segurança

## 👨‍🏫 Para Professores

Os arquivos `*_dynamic.php` contêm a implementação completa para referência. Os alunos trabalham nos arquivos principais (`index.php` e `cadastrar.php`) que começam como templates estáticos.
