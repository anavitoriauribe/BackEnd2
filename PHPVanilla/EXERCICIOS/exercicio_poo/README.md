## Procedural vs. OO: Quais são os três principais riscos técnicos de manter regras financeiras críticas implementadas puramente através de arrays associativos e scripts procedurais?

- Falta de proteção: Qualquer parte do código pode alterar valores do array (como colocar saldo negativo) sem bloqueios.

- Código repetido: As regras de cálculo e validação ficam espalhadas por vários arquivos, dificultando a manutenção.

- Falta de tipagem: Arrays não garantem que os dados existem ou estão no tipo certo, gerando erros inesperados.

## Ciclo de Vida do Objeto: O que ocorre na memória Heap do servidor quando a instrução new ContaCorrente(...) é executada? Qual é o papel do método __construct() nesse processo?

O new reserva um espaço na memória Heap para guardar os dados daquela conta específica. Logo em seguida, o __construct() roda automaticamente para preencher os valores iniciais obrigatórios do objeto.

## A Pseudo-Variável $this: Explique por que o comando $this->saldo é obrigatório para acessar um atributo dentro da classe, diferenciando-o de uma variável local $saldo.

O $this->saldo acessa o atributo real guardado dentro daquele objeto. Já o $saldo sozinho cria apenas uma variável local temporária que some assim que o método termina.

## Encapsulamento e Invariantes: Por que um desenvolvedor sênior de back-end nunca deve criar um método public function setSaldo(float $novoSaldo) para uma conta bancária?

Porque um setSaldo() público permite mudar o saldo livremente sem passar pelas regras de negócio (como validar limite, cobrar taxa ou registrar histórico). O saldo só deve mudar por métodos seguros como sacar() e depositar().

## Modificadores de Acesso: Qual é a diferença prática entre os modificadores private e protected quando subclasses entram em cena através do extends?

O private só pode ser usado dentro da própria classe onde foi criado. Já o protected também libera o acesso para as classes filhas que usam extends.

## Constructor Property Promotion: Como o recurso de promoção de propriedades introduzido no PHP 8 reduz o boilerplate e melhora a legibilidade do código?

Permite declarar a visibilidade (private/public), o tipo e o nome do atributo direto nos parênteses do __construct(), eliminando a necessidade de declarar e atribuir tudo duas vezes.

## Propriedades readonly: Explique o mecanismo de segurança proporcionado pela palavra-chave readonly em atributos de classes de valor como Titular ou CPF.

Garante que o atributo só possa receber um valor uma única vez (na criação do objeto). Depois disso, ninguém consegue alterar o CPF ou Titular, evitando fraudes ou erros.

## Classes Abstratas: Por que faz todo sentido no modelo bancário que a classe ContaBancaria seja declarada como abstract enquanto ContaCorrente e ContaPoupanca são classes concretas?

Porque no mundo real não existe uma "conta genérica" — ela serve apenas como molde base (abstract) com o que toda conta tem em comum, obrigando a instanciar apenas os tipos reais (ContaCorrente ou ContaPoupanca).

## Polimorfismo: Como o método transferir(float $valor, ContaBancaria $destino) consegue operar transferências entre quaisquer tipos de contas filhas sem precisar saber qual é a classe exata da conta de destino?

Como o parâmetro exige o tipo pai (ContaBancaria), o método aceita qualquer classe filha. Ele não precisa saber qual conta é porque sabe que todas as filhas têm o método depositar() pronto para rodar.

## Exceções de Domínio: Por que é uma péssima prática retornar false ou null quando uma operação de saque é rejeitada por falta de saldo?

Porque retornar false ou null pode passar despercebido se alguém esquecer de colocar um if, fazendo o sistema continuar rodando como se o saque tivesse dado certo. Lançar uma exceção trava o processo na hora e avisa o erro.