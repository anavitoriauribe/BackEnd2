# LISTA DE EXERCÍCIOS DE FIXAÇÃO E PRÁTICA - CONEXÃO BANCO DE DADOS PDO

## Parte A: Exercícios Teóricos de Fixação

### 1. Abstração de Dados: O que é o PDO no PHP e por que ele é preferível em relação a extensões especializadas procedurais como o antigo pgsql em projetos corporativos?


---

### 2. Ciclo do DSN: Explique o que é a string DSN e detalhe a finalidade de cada um dos parâmetros configurados para o PostgreSQL (host, port, dbname).


---

### 3. Padrão de Portas: Qual é a porta padrão de escuta do SGBD PostgreSQL (5432) e como ela é referenciada dentro da string de conexão?


---

### 4.Flags de Integridade: O que acontece quando definimos o atributo PDO::ATTR_ERRMODE com o valor PDO::ERRMODE_EXCEPTION? Qual seria o comportamento padrão caso essa flag não fosse definida?


---

### 5. Fetch Mode: Qual é a vantagem de utilizar PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC para o consumo de memória RAM do servidor?


---

### 6. Padrão Singleton: Por que abrir uma nova conexão com new PDO() a cada consulta executada no PostgreSQL pode esgotar o limite de max_connections do servidor?


---

### 7. Encapsulamento do Singleton: Por que o construtor da classe ConexaoBanco precisa ser declarado como private e quais métodos mágicos devem ser bloqueados para garantir a unicidade da instância?


---

### 8. Segurança de Credenciais: Por que nunca devemos deixar o usuário e senha do banco de dados salvos de forma estática (hardcoded) dentro dos scripts PHP do projeto?


---

### 9. Tratamento de Exceções & LGPD: Por que a exibição direta de $e->getMessage() de uma PDOException na tela do navegador é considerada uma falha grave de segurança (Information Disclosure)?

