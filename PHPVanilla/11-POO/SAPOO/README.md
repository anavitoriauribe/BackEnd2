# Situação de Aprendizagem: SENAI Bank - usando POO

## Montagem da Estrutura de Arquivos

```text
SAPOO/
├── src/
│   ├── Dominio/
│   │   ├── Titular.php                         <- Entidade imutável do correntista
│   │   ├── ContaBancaria.php                   <- Superclasse abstrata
│   │   ├── ContaCorrente.php                   <- Subclasse com cheque especial e taxa
│   │   └── ContaPoupanca.php                   <- Subclasse com rendimento e sem taxa
│   └── Exceptions/
│       ├── ContaException.php                  <- Exceção base do domínio
│       ├── SaldoInsuficienteException.php      <- Falha por fundos insuficientes
│       └── ValorInvalidoException.php          <- Valores negativos ou nulos
├── app_banco.php                               <- Simulador visual de operações bancárias
└── README.md                                   <- Documentação e testes
```


## Etapas do Desenvolvimento

### Modelagem Ralacional e Script DDL (`schema.sql`)

Criar o Banco de Dados e Executar o Script SQL para Criação das Tabelas

### Configuração do Autoload PSR-4 (`composer.json`)

Criar o arquivo `composer.json` na raiz do projeto


