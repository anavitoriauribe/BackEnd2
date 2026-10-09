# 8. LISTA DE EXERCÍCIOS DE FIXAÇÃO E PRÁTICA 


## Parte A: Exercícios Teóricos de Fixação
**1. Definição de CRUD: O que significa o acrônimo CRUD e qual é a correspondência direta de cada uma de suas letras com as instruções SQL no PostgreSQL?**

CRUD são todos os metodos básicos e fundamentais para manipulação dados. É um acrônimo para Create (INSERT INTO ...), Read (SELECT ... FROM ...), Update (UPDATE ... SET ... WHERE ...), Delete(DELETE FROM ... WHERE ...).


**2. Anatomia do SQL Injection: Explique com suas próprias palavras como um atacante consegue alterar a lógica de uma consulta quando o código utiliza concatenação de strings com $_GET ou $_POST.** 

Acontece quando o programador junta (concatena) o que o usuário digitou direto no comando SQL. Assim, o banco não separa o que é dado do que é código, e o atacante pode digitar aspas e -- para mudar a consulta. Exemplo: admin' -- faz o banco ignorar a verificação da senha, e o invasor entra como administrador.

**3. Mecanismo das Prepared Statements: Por que o envio de uma consulta em duas etapas (prepare e depois execute) impede que um texto digitado pelo usuário seja executado como instrução SQL pelo banco?**

Primeiro o banco recebe e compila a query com os marcadores (prepare), já sabendo que eles são só dados. Depois recebe os valores (execute). Como a estrutura já está pronta, o que o usuário digitar nunca vira comando SQL: o banco apenas procura esse texto como valor.


**4. Marcadores Nomeados: Qual é a vantagem de utilizar marcadores nomeados como :sku e :preco em vez de pontos de interrogação posicionais (?) em instruções SQL complexas?**

Eles deixam a query mais legível (dá para saber o que cada valor é) e evitam erros de ordem ou de contagem de parâmetros, que são comuns com ? em queries grandes.


**5. Diferença entre Bindings: Explique a diferença de comportamento entre os métodos $stmt->bindValue() e $stmt->bindParam().**

- bindValue(): guarda o valor no momento da chamada. Se a variável mudar depois, não afeta nada.
- bindParam(): guarda a variável por referência. O valor só é lido no execute(), então usa o valor mais recente.


**6. Tipagem no PDO: Qual é o risco de omitir o tipo de dado (ex: PDO::PARAM_INT) ao vincular uma variável que deveria ser estritamente numérica em uma cláusula LIMIT?**

- Tipagem no PDO: omitir o tipo de um valor que deveria ser inteiro, como em LIMIT, pode fazer o PDO tratá-lo como texto. Isso pode provocar erros, resultados inesperados ou incentivar soluções inseguras.

**7. Padrão DAO: Qual é o benefício do padrão Data Access Object (DAO) em termos de manutenibilidade de software e do princípio de responsabilidade única (SOLID)?** 

O DAO separa o código responsável pelo acesso ao banco de dados das demais partes do sistema. Isso facilita a manutenção e segue o princípio da Responsabilidade Única (SRP) do SOLID.

**8. Operações de Update: Por que a ausência de uma cláusula WHERE em um comando UPDATE é considerada um incidente gravíssimo em ambientes de produção?**

Sem a cláusula `WHERE`, a instrução `UPDATE` altera os valores de **todas as linhas** da tabela indiscriminadamente. Em produção, isso sobrescreve dados consolidados do sistema, resultando na perda irreversível de integridade da informação.


**9. Impacto da LGPD: De acordo com a Lei Geral de Proteção de Dados (LGPD), quais são as penalidades e impactos que uma organização pode sofrer caso ocorra vazamento de dados de clientes por falha de SQL Injection?**

Caso ocorra vazamento de dados de clientes por falhas de segurança como SQL Injection, a empresa pode sofrer sanções administrativas da ANPD. As penalidades incluem advertências, multas que podem chegar a 2 por cento do faturamento limite de 50 milhões de reais por infração, bloqueio ou eliminação dos dados afetados, além de danos à reputação da empresa e processos judiciais promovidos pelos clientes afetados.