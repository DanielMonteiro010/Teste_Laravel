<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;

class CadastroController extends Controller
{
    protected $cadastro;
    public function __construct()
    {
        $this->cadastro = new Cadastro();
    }

    /**
     * Exibir uma lista do recurso.
     */
    public function index()
    {
        try
        {
            return response()->json($this->cadastro->all(), 200);
        }
        catch (\Exception $e)
        {
            return response()->json(['error' => $e], 500);
        }
    }

    /**
     * Armazenar um recurso recém-criado.
     */
    public function store(Request $request)
    {
        try
        {
            $cadastro = $this->cadastro->create($request->all());
            return response()->json($cadastro, 201);
        }
        catch (\Exception $e)
        {
            return response()->json(['error' => $e], 500);
        }
    }

    /**
     * Exibir um recurso especifico.
     */
    public function show(string $id)
    {
        try
        {
            $cadastro = $this->cadastro->find($id);
            if (!$cadastro)
            {
                return response()->json(['error' => 'Cadastro não encontrado'], 404);
            }
            return response()->json($cadastro, 200);
        }
        catch (\Exception $e)
        {
            return response()->json(['error' => $e], 500);
        }
    }
    public function filter(Request $request)
    {
        try
        {
            $query = $this->cadastro->query();
    
            if ($request->has('nome')) {
                $query->where('nome', 'LIKE', '%' . $request->input('nome') . '%');
            }
    
            if ($request->has('cpf')) {
                $query->where('cpf', 'LIKE', '%' . $request->input('cpf') . '%');
            }
    
            if ($request->has('created_at')) {
                $query->where('created_at', 'LIKE', '%' . $request->input('created_at') . '%');
            }
    
            $cadastros = $query->get();
            if (!$cadastros)
            {
                return response()->json(['error' => 'Cadastros não encontrados'], 404);
            }
            return response()->json($cadastros, 200);
        }
        catch (\Exception $e)
        {
            return response()->json(['error' => $e], 500);
        }
    }

    /**
     * Atualizar o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        try
        {
            $cadastro = $this->cadastro->find($id);
            if (!$cadastro)
            {
                return response()->json(['error' => 'Cadastro não encontrado'], 404);
            }
            $cadastro->update($request->all());
            return response()->json($cadastro, 200);
        }
        catch (\Exception $e)
        {
            return response()->json(['error' => $e], 500);
        }
    }

    /**
     * Remover o recurso especificado do armazenamento.
     */
    public function destroy(string $id)
    {
        try
        {
            $cadastro = $this->cadastro->find($id);
            if (!$cadastro)
            {
                return response()->json(['error' => 'Cadastro não encontrado'], 404);
            }
            $cadastro->delete();
            return response()->json(['message' => 'Cadastro deletado com sucesso'], 200);
        }
        catch (\Exception $e)
        {
            return response()->json(['error' => $e], 500);
        }
    }
}
