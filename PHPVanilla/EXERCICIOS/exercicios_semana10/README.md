## Parte A: Exercícios Teóricos de Fixação


**Protocolo Stateless: O que significa afirmar que o protocolo HTTP é "stateless" e por que o mecanismo de cookies/sessões é necessário para aplicações modernas?**

Significa que o servidor trata cada requisição como se fosse a primeira vez, sem lembrar de quem você é. Depois do login, a conexão fecha e o servidor esquece o usuário.
Cookies e sessões são necessários para o usuário não ter que digitar login e senha a cada clique. O servidor entrega uma “pulseira VIP” (um ID de sessão único e aleatório), o navegador guarda isso em um cookie e o apresenta automaticamente em cada página. O PHP lê o ID, busca os dados em `$_SESSION` e reconhece o usuário.

---

**Cookies vs. Sessões: Qual é a diferença entre os dados armazenados em um cookie e os dados mantidos no array superglobal $_SESSION? Qual dos dois apresenta maior segurança para informações confidenciais?**

- Cookies:pequeno arquivo de texto (cerca de 4 KB), gravado no navegador a pedido do servidor via cabeçalho Set-Cookie

- $_SESSION: dados mantidos no servidor, com “privacidade total”, associados ao ID recebido pelo cookie (ex.: usuario_id, usuario_perfil).

- A sessão é mais segura para informações confidenciais, porque os dados ficam no servidor e o cliente só tem o ID.

---

**A Flag HttpOnly: Explique detalhadamente como a configuração httponly => true impede o sequestro de sessão (Session Hijacking) mesmo se a aplicação possuir uma vulnerabilidade de Cross-Site Scripting (XSS).**

Com httponly => true, o navegador proíbe o JavaScript de ler o cookie de sessão.

O script malicioso até pode rodar na página, mas não consegue ler o cookie. Sem o ID da sessão, o atacante não tem como se passar pelo usuário em outro navegador. O cookie continua sendo enviado normalmente ao servidor nas requisições, só que fica invisível para o JavaScript. Porém o HttpOnly não elimina o XSS. O script ainda pode fazer coisas dentro do navegador da vítima, como alterar a página. Ele só impede o roubo do cookie. Por isso, o ideal é também corrigir a falha de XSS.

---

**A Flag SameSite: Qual é a finalidade do atributo SameSite=Lax em cookies e contra qual tipo de ataque corporativo ele atua?**

O SameSite=Lax faz o navegador enviar o cookie só em navegações vindas do próprio site. Ele protege contra CSRF (Cross-Site Request Forgery), que é quando um site ou link externo força uma ação no sistema em nome de um usuário que está logado. 


---

**Ataque de Fixação de Sessão: O que é o ataque de Session Fixation e por que é mandatório executar session_regenerate_id(true) imediatamente após o login do usuário?**

No Session Fixation, o atacante faz a vítima fazer login usando um ID de sessão que ele já conhece. Se o servidor mantém o mesmo ID depois do login, o atacante passa a ter uma sessão logada sem saber a senha. O `session_regenerate_id(true)` logo após o login cria um ID novo e apaga a sessão antiga. Assim, o ID que o atacante conhecia deixa de funcionar. 

---

***MD5 e Rainbow Tables: Por que é considerado negligência técnica armazenar senhas com algoritmos rápidos como MD5 ou SHA256? Como as Rainbow Tables operam contra esses hashes?**

MD5 e SHA256 foram feitos para serem rápidos, e isso é ruim para senhas, pois um atacante testa bilhões de combinações por segundo. Por isso, usá-los para senhas é negligência técnica. Rainbow Tables são tabelas prontas com milhões de senhas e seus hashes. Se o hash vazado não tem salt, o atacante só procura o hash na tabela e descobre a senha quase na hora.

---

**O Papel do Salt: O que é o Salt criptográfico e por que ele garante que dois usuários com a mesma senha possuam hashes completamente distintos no banco de dados?**

Salt é um valor aleatório e único (16 bytes) que é misturado à senha antes de gerar o hash. Como cada usuário recebe um salt diferente, duas pessoas com a mesma senha terminam com hashes completamente diferentes no banco.

---

**Argon2id vs Bcrypt: Por que o algoritmo Argon2id é considerado superior ao Bcrypt na proteção contra ataques de força bruta realizados por placas de vídeo (GPUs) e circuitos ASIC?**

Os dois são lentos (diferentes dos metodos antigos) de propósito para dificultar força bruta. A diferença é a memória:

- Bcrypt: usa muito pouca memória, então placas de vídeo (GPUs) e circuitos ASIC conseguem rodar milhares de tentativas ao mesmo tempo.
- Argon2id: exige bastante memória RAM a cada tentativa. GPUs e ASICs têm pouca memória por núcleo, então o ataque em massa fica muito mais caro e lento.

---

**Timing Attacks: Por que a verificação de senhas deve ser feita com password_verify() em vez do operador de comparação comum ===?**

 o `password_hash()` gera um salt aleatório a cada chamada, então comparar com `===` sempre dá falso. A verificação deve ser feita só com `password_verify()`, que pega o salt do hash guardado e refaz o cálculo. o `===` para de comparar na primeira diferença, e essa variação de tempo pode vazar informação ao atacante (timing attack). O `password_verify()`  compara em tempo constante e evita isso.