# Parte A: Questões Teóricas de Fixação


## 1. O Colapso do Código Espaguete: Explique por que manter consultas SQL, regras de validação e marcação HTML no mesmo arquivo inviabiliza a manutenção e a escalabilidade de um sistema corporativo.

Misturar SQL, validação e HTML no mesmo arquivo não é muito viável, ois qualquer mudança, como trocar o banco ou o layout, mexe no mesmo código e pode quebrar outras partes. Além disso, não há reaproveitamento de código, fica difícil testar, designer e programador não conseguem trabalhar em paralelo, o sistema vira uma bagunça ilegível conforme cresce.


## 2. A Tríade MVC: Qual é a função específica de cada um dos três componentes do padrão MVC (Model, View, Controller)? Qual deles deve conter as regras de negócio?

Model: acessa os dados (banco) e representa as entidades.
View: apresenta os dados ao usuário (HTML), sem lógica de negócio.
Controller: recebe a requisição, aciona o Model e escolhe a View.

As regras de negócio devem ficar no Model.

## 3. O Papel do Composer: Diferencie o papel do arquivo composer.json do arquivo composer.lock. Por que a pasta vendor/ nunca deve ser versionada no Git?

composer.json: declara as dependências do projeto e suas faixas de versão, além da configuração de autoload.
composer.lock: registra as versões exatas instaladas, garantindo que toda a equipe e o servidor usem o mesmo ambiente.
A pasta `vendor/` fica fora do Git porque pode ser regenerada a qualquer momento com `composer install`, usando as versões exatas do `composer.lock`. Versioná-la só deixaria o repositório pesado e cheio de arquivos de terceiros que não são código do projeto.

## 4. A Especificação PSR-4: Como o Autoloader PSR-4 consegue localizar o arquivo src/Controllers/ProdutoController.php a partir do namespace App\Controllers\ProdutoController?

Apenas public/index.php fica exposto na web. O código-fonte, as configurações (como credenciais de banco) e o vendor/ ficam fora da raiz pública, impedindo acesso direto via URL, vazamento de código e execução de scripts internos. Também centraliza o controle de entrada (filtros, autenticação, tratamento de erros).

## 5. Front Controller: Qual é a principal vantagem de segurança ao centralizar todas as requisições em public/index.php e isolar os arquivos-fonte do projeto fora da raiz pública da web?

Apenas public/index.php fica exposto na web. O código-fonte, as configurações (como credenciais de banco) e o vendor/ ficam fora da raiz pública, impedindo acesso direto via URL, vazamento de código e execução de scripts internos. Também centraliza o controle de entrada (filtros, autenticação, tratamento de erros).

## 6. Roteador HTTP: Como o objeto Roteador diferencia uma requisição GET /produtos de uma requisição POST /produtos?

Para o roteador, uma rota só existe como um par: **verbo HTTP + URI**. Ao receber a requisição, ele compara esse par com a tabela de rotas cadastradas. Como `GET /produtos` e `POST /produtos` têm verbos diferentes, caem em entradas separadas e chamam métodos distintos do Controller, como `index()` (listar) e `store()` (gravar).

## 7. Injeção de Dados na View: Como a função nativa extract() atua no método renderizar() do Controller para disponibilizar variáveis para as Views?

O `extract()` "abre" o array de dados e transforma cada chave em uma variável pronta para uso. Chamado dentro do `renderizar()` antes de incluir a View, ele faz com que o template enxergue, por exemplo, `$produtos` e `$titulo` como variáveis comuns, em vez de ter que escrever `$dados['produtos']` toda vez.

## 8. Segurança contra XSS nas Views: Por que todas as saídas dinâmicas exibidas em tabelas e formulários devem ser envolvidas com htmlspecialchars()?

Dados dinâmicos podem conter scripts maliciosos (ex.: <script>...</script>). O htmlspecialchars() converte caracteres especiais em entidades HTML, fazendo o navegador exibi-los como texto em vez de executá-los, o que evita roubo de sessão e outros ataques.

## 9. Single Responsibility no Controller: Por que um Controller nunca deve conter comandos SQL com strings concatenadas ou conexões diretas via new PDO()?

O Controller deve apenas coordenar requisição e resposta. SQL concatenado e new PDO() misturam acesso a dados com controle, dificultam testes e manutenção e abrem brecha para SQL Injection. Essa responsabilidade pertence ao Model/Repositório, usando prepared statements.

## 10. Transição para o Framework Laravel: Identifique quais conceitos aprendidos neste MVC artesanal são exatamente os mesmos utilizados pelo Laravel 11.

