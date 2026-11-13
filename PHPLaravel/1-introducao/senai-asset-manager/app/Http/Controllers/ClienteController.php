<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Listar todos os clientes cadastrados
     */
    public function index(): View
    {
        return view("clientes.index", [
            "clientes" => Cliente::all(), //busca todos os clientes do banco
            "titulo" => "Parceiros e Clientes Industriais"
        ]);
    }

    /**
     * exibir um fo,úlario para cadastro de novos clientes
     */
    public function create(): View
    {
        return view("clientes.create", [
            "titulo"=> "Novo cadastro de Parceiro Industrial"
        ]);
    }

    /**
     * Salva os dados do novo cliente no banco de dados usando o request e dando uma response
     */
    public function store(Request $request) : RedirectResponse
    {
        $dados = $request->validate([
            "razao_social" => "required | min:3",
            "cnpj"         => "required | unique:clientes,cnpj", //
            "setor"        => "required"
            ]);
   
        //fazer o cadastro no banco
        Cliente::create($dados);
        return redirect()->route("clientes.index")->with("sucesso", "cliente cadastrado com sucesso"); 
    }


    /**
*exibir os detalhes de um clioente específico
     */
    public function show(int $id): View
    {
        $cliente = Cliente::findOrFail($id);//manda uma mensagem de erro caso nao encontrado

        return view ("cliente.show",[
            "cliente"   => $cliente,
            "titulo"    =>"Ficha técnica:
            {$cliente["razao_social"]}"
        ]);
    }

    /**
     * Exibir um Formulario com os dados de um cliente especifico para atualização
     */
    public function edit(string $id): View
    {
        $cliente = Cliente::findOrFail($id);

        return view("clientes.edit", [
            "cliente"   => $cliente,
            "titulo"    => "Editar Parceiro {$cliente["razao_social"]}"
        ]);
    }

    /**
     * Atualizar os dados do cliente utilizando Method Spoofing (PUT)*/
     public function update(Request $request, int $id): RedirectResponse {
        $dados = $request->validate([
            "razao_social"  => "required | min:3",
            "setor"         => "required"
        ]);
        Cliente::findOrFail($id)->update($dados);
        return redirect()->route("cliente.show", $id)->with("sucesso", "Dados atualizados com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        Cliente::findOrFail($id)->delete();
        return redirect()->route("clientes.index")->with("sucesso", "Parceiro removido do sistema");
    }

    // filtragem de clientes/empresas por setor
    public function filtrarPorSetor(?string $setor = null) : View {
        $consulta = Cliente::query();
        if($setor !== null) {
            $consulta->where("setor", "like",$setor);
        }

        return view("clientes.index", [
            "clientes"  => $consulta->get(),
            "titulo"    => $setor ? "Setor: ".ucfirst($setor) : "Todos os Setores"
        ]);
    }
}
