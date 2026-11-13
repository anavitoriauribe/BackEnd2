<?php
declare(strict_types=1);

use App\Http\Controllers\AtivoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

// Rota Principal: Dashboard de Ativos Fabris
Route::get("/", [AtivoController::class, "index"])->name("ativos.index");
Route::get("/status", [AtivoController::class, "status"])->name("ativos.status");

// Filtro de clientes por setor
Route::get("/clientes/setor/{setor?}", [ClienteController::class, "filtrarPorSetor"])
    ->name("clientes.setor")
    ->whereAlphaNumeric("setor");

// Exercício 3: Rota de telemetria e leitura de cabeçalhos HTTP
Route::get("/clientes/telemetria", [ClienteController::class, "origemRequisicao"])
    ->name("clientes.telemetria");

// Exercício 1: Rota com múltiplos parâmetros e constraints compostas
Route::get("/clientes/{cliente}/contratos/{ano}", [ClienteController::class, "contratosPorAno"])
    ->name("clientes.contratos.ano")
    ->whereNumber("cliente")
    ->where("ano", "[0-9]{4}");

// Exercício 5: Rota de alteração parcial de status com verbo PATCH
Route::patch("/clientes/{id}/status", [ClienteController::class, "alterarStatus"])
    ->name("clientes.status")
    ->whereNumber("id");

// Rotas RESTful de Clientes e Produtos
Route::resource("clientes", ClienteController::class)->whereNumber("clientes");
Route::resource("produtos", ProdutosController::class)->whereNumber("produtos");

// Exercício 2: Resource Controller parcial (somente leitura) para fornecedores
Route::resource("fornecedores", FornecedorController::class)
    ->only(["index", "show"])
    ->whereNumber("fornecedores");

// Exercício 4: Agrupamento de rotas administrativas com prefixo e nome
Route::prefix("admin")->name("admin.")->group(function (): void {
    Route::get("/auditoria/clientes", [ClienteController::class, "auditoriaAtivos"])
        ->name("auditoria.clientes");
});