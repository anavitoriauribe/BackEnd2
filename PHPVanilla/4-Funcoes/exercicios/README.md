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
`string $nome`-> parâmetro do tipo texto;
`int $idade` -> parâmetro do tipo número inteiro;
`bool` -> retorno da função do tipo da booleana.