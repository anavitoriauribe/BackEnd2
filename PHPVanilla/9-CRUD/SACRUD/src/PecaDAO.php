<?php
declare(strict_types=1);

//camada de acesso a dados (DAO) para almoxarifado de peças 
// essa camda sera uma classe de conexão usando o POO (programação orientada ao objeto)

final class PecaDAO {
    //atributos de uma classe
    private PDO $pdo;

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
}