<?php

namespace App\Models\Dao;

use App\core\Contexto;
use App\Models\Categoria;

class CategoriaDao extends Contexto
{
    public function listarTodos()
    {
        return $this->listar('CATEGORIA');
    }
    public function obterPorId($id)
    {
        return $this->listar('CATEGORIA', "WHERE ID = ?", [$id]);
    }

    public function adicionar(Categoria $categoria)
    {
        $atributos = array_keys($categoria->atributosPreenchidos());
        $valores = array_values($categoria->atributosPreenchidos());
        return $this->inserir('CATEGORIA', $atributos, $valores);
    }

    public function alterar(Categoria $categoria)
    {
        $atributos = array_keys($categoria->atributosPreenchidos());
        $valores = array_values($categoria->atributosPreenchidos());
        return $this->atualizar('CATEGORIA', $atributos, $valores, $categoria->getId());
    }
    public function excluir($id)    
    {
       return $this->deletar('CATEGORIA', $id);
    }

}
