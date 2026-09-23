# Criação de uma aplicação para Teste de Conexão PDO com Singleton e PDOException

## Passo 1 - validando a extensão `pdo_pgsqlq`e o serviço do postgres

1. abra o terminal e digite:
```bash
php -m | findstr -i pgsql 
```
*Saída esperada:* deve listar `pdo_pgsql`e o `pgsql`

Caso não apareça:
- abra o `php.ini`;
- localize a linha `;extension=pdo_pgsql`e remoa o ponto e virgula inicial;
- salve o arquivo e valide novamente o comando

2. Validando o **PostgreSQL**

Usando a Extensão do VSCode = postgresql -> instalar a extensão Chris Kolkman

## Passo 2 - Estrutura de diretórios do projeto 

Organize a raiz do projeto exatamente com a seguinte árvore de pastas:

```text
SAFormativaConexaoBD/
├── config/
│   └── database.ini        <- Credenciais protegidas
├── logs/
│   └── database.log        <- Arquivo gerado para auditoria de falhas
├── src/
│   └── ConexaoBanco.php    <- Classe Singleton com PDO para PostgreSQL
├── schema.sql              <- Script DDL e DML para o PostgreSQL
├── index.php               <- Painel de diagnóstico e testes operacionais
└── README.md               <- Documentação do Projeto
```
## Passo 3 - Executando o script DDL no PostgreSQL (`schema.sql`)

## Passo 4 - Criando o arquivo de configuração (`config/database.ini`)

