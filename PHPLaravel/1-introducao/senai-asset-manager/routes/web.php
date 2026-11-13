<?php
declare(strict_types=1);

use App\Http\Controllers\AtivoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

//Rota Principal da Minha aplicação : Dashboard de Ativos Fabris
Route::get("/", [AtivoController::class, "index"])->name("ativos.index");

//Rota de Infraestrutura Json
Route::get("/status", [AtivoController::class, "status"])->name("ativos.status");

//Criar as rotas nomeadas para Clientes -> para filtro por setor
Route::get("/clientes/setor/{setor?}", [ClienteController::class, "filtrarPorSetor"])
    ->name("clientes.setor")
    ->whereAlphaNumeric("setor");

//Rota RESTful (GET, POST, PUT/PATCH, DELETE)
Route::resource("clientes", ClienteController::class)->whereNumber("clientes");


//criar as rotas nomeadas para produtos -> filtro por fabricante
Route::get("/produtos/fabricante/{fabricante?}", [ProdutosController::class, "filtrarPorFabricante"])
    ->name("produtos.fabricante")
    ->whereAlphaNumeric("fabricante");

//rota RESTful para rpodtudos (GET, POST, PUT/PATCH, DELETE)
Route::resource("produtos", ProdutosController::class)->whereNumber("produtos");

