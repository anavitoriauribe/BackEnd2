# Parte A: Questões Teóricas de Fixação


## 1. Evolução Arquitetural: Quais foram os principais aprendizados técnicos obtidos na construção do MVC artesanal da Semana 12 que permitiram que você compreendesse o Laravel 11 com facilidade?

Front Controller (um index.php recebe tudo), roteamento (URL → método do controller), autoload com namespaces, e separação Model/View/Controller. O Laravel é essa mesma ideia, só mais pronta.

## 2. A Nova Arquitetura do Laravel 11: O que mudou na estrutura de inicialização do Laravel 11 em relação às versões anteriores (Laravel 9 e 10)? Onde fica o novo ponto central de configuração?

O Laravel 11 simplificou a estrutura inicial do projeto, centralizando configurações no arquivo bootstrap/app.php, reduzindo a quantidade de arquivos.

## 3. Padrão 12-Factor App: Por que é uma violação grave de segurança gravar senhas de banco de dados diretamente dentro do arquivo config/database.php em vez de utilizar o arquivo .env?

O arquivo vai para o Git, então a senha fica exposta no repositório e no histórico. Configuração secreta deve ficar no .env (fora do Git), específica de cada ambiente.

## 4. O Papel da APP_KEY: Qual é o risco técnico de alterar a APP_KEY de uma aplicação que já está em produção há meses com usuários reais cadastrados?

Todos os usuários são deslogados e os dados criptografados com a chave antiga não podem mais ser lidos (perda de dados). Links assinados e tokens de reset também deixam de funcionar

## 5. Isolamento de Diretórios: Por que um servidor web de produção (Nginx/Apache) deve apontar rigorosamente para a pasta public/ e nunca para a raiz do projeto Laravel?

Para que arquivos de conteúdo sensíveis como `.env`não seja expostos. 

## 6. Artisan CLI: Qual é a diferença prática entre executar um script PHP procedural com php arquivo.php e executar comandos através do php artisan?

O script solto não conhece o framework. O artisan carrega a aplicação inteira (config, banco, Eloquent) e oferece comandos prontos, como make:model, migrate e route:list.

## 7. O Arquivo .env.example: Por que manter o arquivo .env.example sempre atualizado é indispensável para o sucesso de equipes de desenvolvimento que utilizam Git?

Ele vai para o Git sem segredos e mostra quais variáveis o projeto precisa. Quem entra na equipe copia para .env e preenche.

## 8. Motor de Templates Blade: Qual é a diferença entre a diretiva Blade {{ $variavel }} e a diretiva {!! $variavel !!} em termos de proteção contra ataques Cross-Site Scripting (XSS)?

O {{ }} escapa o HTML (protege contra XSS). O {!! !!} imprime sem escapar, então scripts maliciosos rodam. Use {!! !!} só com conteúdo confiável.

## 9. Responsabilidade do Controller: Em uma aplicação profissional com Laravel, por que um método de Controller deve ser curto (≤ 20 linhas) e não deve conter consultas SQL cruas ou regras de negócio extensas?

Ele deve só receber a requisição e devolver a resposta. Regras de negócio e SQL em outros lugares (Services, Models) deixam o código mais fácil de testar, reutilizar e manter.

## 10. A Ferramenta Tinker: Para que serve o comando php artisan tinker e em quais situações ele economiza tempo do desenvolvedor durante testes de laboratório?

É um console interativo com o Laravel carregado. Serve para testar models, consultas, relacionamentos e configurações rapidamente, sem criar rota, controller ou view.