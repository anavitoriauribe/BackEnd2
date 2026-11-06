<?php
declare(strict_types=1);

use App\Http\Controllers\AtivoController;
use Illuminate\Support\Facades\Route;

Route::get("/", [AtivoController::class, "index"])->name("ativos.index");

//Rota de Infraestrutura Json
Route::get("/status", [AtivoController::class, "status"])->name("ativos.status");

