# Parte A: Questões Teóricas de Fixação


# 1. Semântica RESTful: Por que uma ação de exclusão de dados nunca deve ser implementada através de uma requisição HTTP do tipo GET? Explique o risco associado a robôs de busca.

Pois GET deve ser só leitura. Robôs de busca seguem links automaticamente, então um link GET /clientes/5/excluir seria “clicado” por eles e apagaria dados sem ninguém perceber. Exclusão deve usar DELETE.

# 2. Idempotência: O que significa o conceito de idempotência no protocolo HTTP e por que o método PUT é considerado idempotente enquanto o POST não é?

É repetir a requisição várias vezes e dar o mesmo resultado final que fazer uma vez. O PUT substitui o recurso por completo, então repetir não muda nada. O POST cria algo novo a cada chamada, então repetir pode gerar registros duplicados.

# 3. Resource Controllers: Quais são as 7 ações canônicas geradas pelo comando php artisan make:controller --resource e qual é a responsabilidade de cada uma?

- index: lista os registros
- create: mostra o formulário de criação
- store: valida e salva o novo registro
- show: mostra um registro
- edit: mostra o formulário de edição
- update: atualiza o registro
- destroy: remove o registro

# 4. Injeção de Dependências: Como o Service Container do Laravel entrega automaticamente uma instância de Request ao método do controller sem que tenhamos que instanciá-la com new Request()?

O Service Container olha o tipo declarado no método (Request $request), cria o objeto sozinho e entrega pronto. Por isso não precisamos usar new Request().

# 5. Method Spoofing: Por que os navegadores web não conseguem enviar requisições nativas de PUT e DELETE através de formulários HTML convencionais? Como o Laravel contorna essa limitação?

Formulários HTML só enviam GET e POST. O Laravel resolve com um campo oculto _method, gerado pela diretiva @method('PUT') ou @method('DELETE'). O navegador envia POST, mas o Laravel trata como PUT/DELETE.

# 6. Ataques CSRF: O que é um ataque do tipo Cross-Site Request Forgery e como a diretiva Blade @csrf impede que sites maliciosos forjem requisições em nome do usuário?

É quando um site malicioso faz o navegador do usuário enviar uma requisição forjada. O @csrf coloca no formulário um token único ligado à sessão. O site malicioso não conhece esse token, então a requisição é rejeitada (erro 419).

# 7. Constraints de Rota: Para que servem métodos de restrição como whereNumber('id') ou whereAlphaNumeric('codigo') e qual código de status HTTP o Laravel retorna quando o formato é violado?

Restringem o formato do parâmetro (whereNumber só aceita números, whereAlphaNumeric só letras e números). Se o formato for inválido, o Laravel retorna 404.

# 8. Rotas Nomeadas: Cite duas vantagens corporativas de utilizar a função auxiliar route('clientes.show', $id) nas views em vez de escrever strings estáticas como "/clientes/{$id}".

Se a URL mudar, você altera em um só lugar e todas as views continuam funcionando.
Evita erros de digitação e gera a URL correta com os parâmetros.

# 9. Single Responsibility no Controller: Por que a validação de formulários com $request->validate() ou Form Requests deve ser mantida enxuta dentro do controller para respeitar o limite de 20 linhas por função?

Muitas regras dentro do controller estouram o limite de 20 linhas e misturam responsabilidades. Com Form Requests, as regras ficam em outra classe e o controller só usa $request->validated().

# 10. A Ferramenta route:list: Como o comando php artisan route:list auxilia equipes multidisciplinares a documentar e auditar os endpoints disponíveis em uma API ou aplicação web?

Mostra todas as rotas com verbo, URI, nome, controller e middlewares. Serve como documentação rápida para a equipe e ajuda a auditar se rotas sensíveis estão protegidas.