<?php
declare (strict_types=1);

use DomainException; //impor da biblioteca do PHP de erros chamados DomainException

//classe base para erros das regras de negocio
class ContaException extends DomainException{
//declaração do construtor usando o property promotion
#[Override]
	public function __construct(string $message = "Falha na operação bancária!")
    {
       parent::__construct($message);
    }

}