# Exercícios Teóricos


### Respostas - Parte A

**1. conceito de função:**
Uma função é quando você coloca um parametro (materia-prima), ela processa por dentro e devolve um produto final (retorno).

#### vantagens: 
- evita repetir código (o que economiza empo e trabalho);
- facilita a manutenção, porque se precisar corrigir algo, corrige em um lugar só.

--- 

**2. princípio DRY:**
Se o mesmo bloco de código está copiado em várias partes do sistema, quando precisar corigir um erro ou mudar uma regra, você vai ter que lembrar de mudar em todos os lugares. Se esquecer de um, o sistema fica com comportamento errado em algum ponto.
Uma função ajuda porque cria algo "simultaneo" e fica escrita uma única vez, onde você pode mudar quando preicisar todos os blocos apenas chamando a função.

---

**3. parâmetros e retorno:**
- *Parâmetro* é o dado que entra na função (a materia-prima). No exemplo, `$preco` e `$quantidade`são os parâmetros.
- *Retorno* é o resultado que a funçao devolve depois de processar. No exemplo retorno é `$preco * $quantidade`

---
 
**4. tipagem:**
>function cadastrar(string $nome, int $idade): bool.

`string $nome`-> parâmetro do tipo texto;
`int $idade` -> parâmetro do tipo número inteiro;
`bool` -> retorno da função do tipo da booleana.

--- 

**5. void e return:**
- Uma função que *retorna string* devolve um texto para quem chamou, e ese texto pode ser guardado em uma variável ou usado depois. 
*exemplo*: function saudar (string $nome): string { return "Olá, $nome!"; }

- Uma função *void* não devolve nada, ela só executa uma ação internamente.
*exemplo:* funcition registraLog(string $mensagem): void {flie_put_contents("erro.log", $mensagem); }

---

**6. escopo:**
A função não consegue acessar `$cliente` porque essa variável foi criada no escopo global, e o que é criada dentro de uma função (escopo local) nao enxerga o que está fora, e vice-versa.

Formas de corrigir:
- passar `$cliente`como parâmetro da função (o recomendado);
- usar a palavra `global $cliente;` dentro da função.

--- 

**7. referência:**
Quando o parâmetro é declarado como `float &$valor`, a função passa a trabalhar com a variável original, e não com uma cópia dela.
- sem `&`(por padrão): a função recebe uma cópia do valor. Se alterar o parâmetro dentro da funçâo, a variável original lá fora não muda.
- com `&`(por referência): qualquer alteração feita no parâmetro dentro da função muda também a variável original que foi enviada.

---

**8. funções nativas:**

| Função | Categoria | Finalidade | Parâmetros | Retorno |
| - | - | - | - | - |
| strlen()	| Strings | Conta quantos caracteres tem um texto |	 o texto | um número inteiro|
|str_replace()|	Strings	| Substitui uma parte do texto por outra |	texto a procurar, texto novo, texto original |	o texto já substituído|
|count()|	Arrays |Conta quantos itens tem em um array |	o array	| um número inteiro|
|number_format()|	Números| 	Formata um número com casas decimais e separadores|	número, casas decimais, separadores	| uma string formatada
max()|	Números | Encontra o maior valor dentro de uma lista ou array|	uma lista de números ou um array|	o maior valor encontrado|

---

**9. previsão de saída:**
Aparecerá `echo aplicarDesconto($valor); // 90 | echo $valor; // 100` pois a função não altera a variável `$valor` origninal, ela só faz o cálculo e devolve (return) um novo valor com o desconto. Como o parâmetro `$preco` é passado normalmente (sem &), a função trabalha com uma cópia, e o `$valor` lá fora continua com 100.

---

**10. Documentação:**

- *Sintaxe:* `strlen(string $string): int`
- *Parâmetro recebido:* uma string (o texto que você quer medir);
- *Retorno:* um número inteiro (int), representando a quantidade de caracteres do texto.
**Exemplo:** `strlen("senai")` retorna 5.