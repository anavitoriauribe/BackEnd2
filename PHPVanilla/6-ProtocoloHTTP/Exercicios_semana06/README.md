# LISTA DE EXERCÍCIOS: PROCESSAMENTO HTTP E FORMULÁRIOS 

## Parte A: Exercícios Teóricos de Fixação

**1. Diferença Estrutural: Explique a diferença física entre onde os dados são anexados em uma requisição GET e em uma requisição POST.**

-> No método GET, os daods são anexados e expostos para qualquer um visualizar diretamente na URL, na forma de uma Query String.
-> No método POST, os dados são anexados no body, ou seja, no corpo da requisição HTTP, onde são escondidos da URL, garantindo a privaciade dos dados.

---

**2. Segurança e Privacidade: Por que senhas de usuário nunca devem ser enviadas via método GET? Cite pelo menos dois locais onde essa senha ficaria gravada de forma insegura.**

-> Senhas não devem ser enviadas pelo método GET pois já que os dados sao enviados e expostos na URL, essas senhas seriam expostas tambem sem nenhum tipo de ciptrografia. 
- Elas poderiam aparecer no hisórico de navegação do usuário quando a URL completa fosse salva.
- Também apareceriam nos registros das URLs acessadas em aquivos de Log, a senha ficaria gravada em texto puro.

---

**3. Coalescência Nula: Por que a instrução $nome = $_POST['nome']; dispara um Warning na primeira vez que a página é carregada no navegador? Como o operador ?? resolve isso?**

-> O Warning acontece pois na primeira vez que a página carrega, o formulário ainda não foi enviado, ou seja, o método da requisição foi GET (o usuário só abriu a página para visualização), e a chave 'nome' simplesmente não existe dentro do array $_POST. Tentar acessar um índice que não existe gera esse aviso de erro do PHP.
O operador `??` resolve isso porque ele testa se o valor à esquerda é null (ou não existe). Se não existir, ele atribui automaticamente o valor do lado direito, a string vazia `""`, evitando o Warning e mantendo o navegador funcionando normalmente.

---

**4.Idempotência: O que significa dizer que uma requisição GET é idempotente? Por que atualizar ou deletar dados no banco usando links GET é uma má prática de segurança?**

-> Idempotente quer dizer que repetir a mesma requisição várias vezes produz sempre o mesmo efeito no servidor, como se tivesse sido feita apenas uma vez. O GET foi pensado só para consultar/buscar dados, ele não deveria mudar nada no sistema.
O problema de usar GET pra apagar ou mudar dados é que um link é fácil demais de "disparar sem querer", por exemplo, o navegador pode recarregar sozinho, o Google pode passar clicando em todos os links de um site pra indexar, ou alguém pode clicar duas vezes por acidente. Se apagar um usuário fosse só um link GET, isso poderia acontecer sem ninguém ter pedido de verdade, o que acaba tornando isso perigoso.

---

**5.Validação Client vs Server: Um desenvolvedor júnior afirma que o formulário dele é 100% seguro porque colocou required e type="email" em todas as tags HTML. Explique por que essa afirmação é falsa.**

-> Essa afirmação é falsa porque validações feitas em HTML (required, type="email", etc.) acontecem apenas Front-End. Essas validações podem ser facilmente ignoradas, o usuário pode desabilitar o JavaScript ou editar o HTML. Por isso, a validação no *BackEnd* é obrigatória, é a única parte que realmente garante a integridade dos dados, pois roda no servidor e não pode ser burlada pelo usuário.

---

**6.XSS e Sanitização: Qual é o risco de exibir dados vindos de um $_POST diretamente na tela sem utilizar htmlspecialchars()?**

-> Exibir dados de $_POST sem htmlspecialchars() expõe o sistema a ataques de XSS (Cross-Site Scripting). Sem essa função, o navegador interpreta textos digitados pelo usuário que contenham tags HTML ou scripts (como `<script>`) como código executável em vez de texto puro. Isso permite que invasores executem códigos maliciosos no navegador das vítimas, podendo roubar senhas, tokens de sessão ou redirecionar o usuário para sites falsos.

--- 

**7.Sticky Forms: O que é a técnica de Sticky Forms e qual é o seu impacto na experiência do usuário (UX)?**

-> Sticky Form é a técnica de manter nos campos o que o usuário já digitou quando o formulário dá erro ao enviar. Ele evita que o usuário precise preencher tudo do zero por causa de um único erro, tornando a experiência mais rápida, fácil e menos frustrante.

--- 

**8. DevTools: Como você utilizaria a aba Network do navegador para comprovar que um formulário foi enviado via POST e não via GET?**

-> Na aba Network do navegador, ao enviar o formulário e clicar na requisição, a aba Headers mostra se o método usado foi POST ou GET. Se for POST, os dados enviados aparecerão na seção  Body, separados da URL, comprovando que não estão na Query String. Ou então, se fosse GET, os mesmos dados apareceriam diretamente na própria URL da requisição, na seção de Query String Parameters.