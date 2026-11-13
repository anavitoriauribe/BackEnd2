<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//classe responsavel por conversar com o banco de dados => insert, select, update, delete

class Produtos extends Model
{

   protected $table = "produtos"; //nome da tabela no banco de dados
   
   protected $fillable = ["nome", "fabricante", "quantidade", "valor"];
}
