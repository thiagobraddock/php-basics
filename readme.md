# Sistema de Estabelecimentos de Espírito Santo do Pinhal - PHP Básico

Um sistema web simples para gerenciar estabelecimentos de Espírito Santo do Pinhal, desenvolvido em PHP puro com MySQL e focado em atividades práticas para sala de aula.

## 📋 Estrutura do Projeto

### Templates para Alunos (Interface Estática)
- `index.php` - Página principal com lista de estabelecimentos (template)
- `cadastrar.php` - Formulário de cadastro com campo de categoria (template)

### Versões Funcionais (Referência do Professor)
- `index_dynamic.php` - Lista funcional com filtros dinâmicos por categoria
- `cadastrar_dynamic.php` - Cadastro funcional com validação e sugestões de categorias

### Arquivos de Configuração
- `config.php` - Configurações do banco de dados (estabelecimentos_pinhal)
- `includes/functions.php` - Funções auxiliares, filtros e validações
- `dump_banco.sql` - Script de criação e carga inicial do banco

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
1. Abra `index.php` para ver a interface da lista de estabelecimentos
2. Abra `cadastrar.php` para ver o formulário de cadastro
3. Implemente a lógica PHP seguindo os comentários `// TODO:`

### Para Testar a Versão Funcional
1. Configure o banco MySQL executando `dump_banco.sql`
2. Ajuste as configurações em `config.php`
3. Acesse `index_dynamic.php` e `cadastrar_dynamic.php`

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
- ✅ Listagem e contagem de estabelecimentos com filtro por categoria
- ✅ Cadastro com validação de dados e sugestões de categorias
- ✅ Máscara automática para telefone
- ✅ Mensagens de sucesso/erro
- ✅ Separação clara entre template e lógica

## 📚 Conceitos Demonstrados

- Separação de responsabilidades (MVC básico)
- Conexão e consultas PDO (com filtros dinâmicos)
- Validação de dados server-side
- Sanitização de inputs
- Estrutura de projeto organizada
- Boas práticas de segurança

## 👨‍🏫 Para Professores

Os arquivos `*_dynamic.php` contêm a implementação completa para referência. Os alunos trabalham nos arquivos principais (`index.php` e `cadastrar.php`) que começam como templates estáticos.
## Fluxo

Fluxo 1 - TODOS (padrão):
URL: index_dynamic.php
↓
$_GET['categoria'] não existe
↓
$categoriaSelecionada = ''
↓
buscarEstabelecimentos($pdo, '') → SELECT * FROM estabelecimentos
↓
Mostra TODOS


Fluxo 2 - FILTRADO:
URL: index_dynamic.php?categoria=Cafeteria
↓
$_GET['categoria'] = 'Cafeteria'
↓
$categoriaSelecionada = 'Cafeteria'
↓
buscarEstabelecimentos($pdo, 'Cafeteria') → SELECT * WHERE categoria = 'Cafeteria'
↓
Mostra só Cafeterias