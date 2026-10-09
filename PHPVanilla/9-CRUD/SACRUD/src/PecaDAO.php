<?php
declare(strict_types=1);

//camada de acesso a dados (DAO) para almoxarifado de peças 
// essa camda sera uma classe de conexão usando o POO (programação orientada ao objeto)

final class PecaDAO {
    //atributos de uma classe
    private PDO $pdo; // =>atributo que irá disponibilizar a conexão com o banco de dados

    //metodos da classe
    //contrutor -> é o metodo que permite criar objetos desta classe
    public function __construct(PDO $pdo){
        //ao chamar o contrutor, estou atribuindo um valor ao atributo declarado anteriormente
        $this->pdo = $pdo;
    }
//para criar um obj da classe PecaDAO é necessario ja possuir uma conexão estabelecida com o banco de dados, conexão essa criada anteriormente na classe ConexaoBanco

//criar os metodos do CRUD
//READ -> listar todas as peças em ordem decrescente 
public function listarTodos(): array {
    $sql = "SELECT * FROM pecas_industriais ORDER BY id DESC";
    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC); //criar uma lista de produtos associando os valores aos nomes das colunas do banco de dados
}

//READ -> listar objetos pelo ID
public function buscarPorId(int $id): array {
    $sql = "SELECT * FROM pecas_industriais WHERE id = :id"; //código SQL
    //sse vai ter dados inseridos pelo usuário
    $stmt = $this->pdo->prepare($sql);
    //prepara o parametro de entrada usando o bindValue()
    $stmt -> bindValue(":id", $id, PDO::PARAM_INT);
    $stmt -> execute ();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}

//READ -> buscarpor termo (filtro)
public function buscarPorTermo(string $termo): array{
    $sql = "SELECT * FROM pecas_industriais
     WHERE codigo_sku ILIKE :termo 
     OR descricao ILIKE :termo 
     OR categoria ILIKE :termo
     ORDER BY descricao ASC";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([":termo" => "%" .trim($termo) ."%"]);
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

//CREATE _> cadastra nova peça no estoque
public function salvar(array $dados): bool {
    $sql = "INSERT INTO pecas_industriais
            (codigo sku,descricao,categoria,quantidade,preco_unitario)
            VALUE (:sku,:descricao,:categoria,:quantidade,:preco)";

    $stmt = $this->pdo->prepare($sql);

    $resultado = $stmt->execute([
        ":sku"       => strtoupper(trim($dados["codigo_sku"])),
        ":descricao"        => trim ($dados["1descricao"]),
        ":categoria"        => trim ($dados["categoria"]),
        ":quantidade"       => (int)$dados["quantidade"], //(int) => cast de dados -> converte para o formato numero a variavel
        ":preco"            => (float)$dados ["preco_unitario"]//cast => (float)
    ]);
    return $resultado; //retorna se deu certo (true) ou não (false)
}

//UPDATE -> atualizar um registro no banco
public function atualizar(int $id, array $dados): bool{
    $sql = "UPDATE pecas_industriais
            SET codigo_sku = :sku,
            descricao = :descricao,
            categoria = :categoria,
            quantidade = :quantidade,
            preco_unitario = :preco
            WHERE id = :id";

$stmt = $this->pdo->prepare($sql);

$resultado = $stmt->execute([
        ":sku"       => strtoupper(trim($dados["codigo_sku"])),
        ":descricao"        => trim ($dados["descricao"]),
        ":categoria"        => trim ($dados["categoria"]),
        ":quantidade"       => (int)$dados["quantidade"], 
        ":preco"            => (float)$dados ["preco_unitario"],
        ":id"               => (int)$dados["id"]
    ]);
    return $resultado;
}

// DELETE -> excluir dado do banco 
public function excluir(int $id):bool{
    $sql = "DELETE FROM pecas_industriais WHERE id = :id";
    $stmt = $this ->pdo->prepare ($sql);
    $stmt->bindValue (":id", $id, PDO::PARAM_INT);
    $resultado = $stmt->execute();
    return $resultado;
    
}
}