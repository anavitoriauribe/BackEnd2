# LISTA DE EXERCÍCIOS DE FIXAÇÃO E PRÁTICA - CONEXÃO BANCO DE DADOS PDO

## Parte A: Exercícios Teóricos de Fixação

### 1. Abstração de Dados: O que é o PDO no PHP e por que ele é preferível em relação a extensões especializadas procedurais como o antigo pgsql em projetos corporativos?

O PDO é a interface padrão do PHP para conectar a bancos de dados. Ele é melhor que o antigo pgsql porque funciona com vários bancos diferentes (MySQL, PostgreSQL, etc.) usando o mesmo código e já traz proteção contra SQL Injection.

---

### 2. Ciclo do DSN: Explique o que é a string DSN e detalhe a finalidade de cada um dos parâmetros configurados para o PostgreSQL (host, port, dbname).

O DSN é o endereço de conexão com o banco.

host: Onde o banco está instalado (ex: localhost).

port: A porta de rede do banco.

dbname: O nome do banco de dados específico que será usado.

---

### 3. Padrão de Portas: Qual é a porta padrão de escuta do SGBD PostgreSQL (5432) e como ela é referenciada dentro da string de conexão?

A porta padrão do PostgreSQL é 5432. Na string DSN, ela é escrita como port=5432 (ex: "pgsql:host=localhost;port=5432;dbname=loja").

---

### 4.Flags de Integridade: O que acontece quando definimos o atributo PDO::ATTR_ERRMODE com o valor PDO::ERRMODE_EXCEPTION? Qual seria o comportamento padrão caso essa flag não fosse definida?

Com ERRMODE_EXCEPTION, qualquer erro no banco dispara uma exceção (PDOException) que pode ser capturada com try/catch. Sem essa flag (em versões antigas do PHP), o padrão era ERRMODE_SILENT, onde o erro acontecia em silêncio sem avisar nada.

---

### 5. Fetch Mode: Qual é a vantagem de utilizar PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC para o consumo de memória RAM do servidor?

O FETCH_ASSOC traz os dados apenas com o nome das colunas. Sem ele, o PDO duplica os dados (traz pelo nome e pelo número da coluna), gastando o dobro de memória RAM.

---

### 6. Padrão Singleton: Por que abrir uma nova conexão com new PDO() a cada consulta executada no PostgreSQL pode esgotar o limite de max_connections do servidor?

Cada new PDO() abre uma conexão pesada no servidor. Se abrir uma nova a cada consulta, o banco atinge o limite de conexões simultâneas (max_connections) e trava para novos usuários.

---

### 7. Encapsulamento do Singleton: Por que o construtor da classe ConexaoBanco precisa ser declarado como private e quais métodos mágicos devem ser bloqueados para garantir a unicidade da instância?

O construtor é private para travar o uso de new ConexaoBanco() fora da classe e garantir apenas uma conexão ativa. Os métodos mágicos bloqueados são o __clone() (evita duplicar a conexão) e o __wakeup() (evita criar uma cópia ao restaurar o objeto da memória)

---

### 8. Segurança de Credenciais: Por que nunca devemos deixar o usuário e senha do banco de dados salvos de forma estática (hardcoded) dentro dos scripts PHP do projeto?

Porque quem tiver acesso ao código (como no GitHub) vai ver a senha do banco. O certo é guardar em um arquivo .env separado e protegido.

---

### 9. Tratamento de Exceções & LGPD: Por que a exibição direta de $e->getMessage() de uma PDOException na tela do navegador é considerada uma falha grave de segurança (Information Disclosure)?

Porque $e->getMessage() mostra na tela nomes de tabelas, colunas e caminhos do servidor, o que ajuda hackers a atacarem o sistema e fere a segurança de dados exigida pela LGPD.
