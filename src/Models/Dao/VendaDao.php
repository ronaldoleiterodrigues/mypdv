<?php

namespace App\Models\Dao;
use App\core\Contexto;
use App\Models\ItensVenda;
use App\Models\Venda;
class VendaDao extends Contexto
{
    public function listarTodos()
    {
        return $this->listar('VENDA');
    }
    public function obterPorId($id)
    {
        return $this->listar('VENDA', "WHERE ID = ?", [$id]);
    }
    public function adicionar(Venda $venda)
    {
        $atributos = array_keys($venda->atributosPreenchidos());
        $valores = array_values($venda->atributosPreenchidos());
        return $this->inserir('VENDA', $atributos, $valores);
    }

    public function adicionarItens(ItensVenda $itensVenda)
    {
        $atributos = array_keys($itensVenda->atributosPreenchidos());
        $valores = array_values($itensVenda->atributosPreenchidos());
        return $this->inserir('ITENSVENDA', $atributos, $valores);
    }

    public function alterar(Venda $venda)
    {
        $atributos = array_keys($venda->atributosPreenchidos());
        $valores = array_values($venda->atributosPreenchidos());
        return $this->atualizar('VENDA', $atributos, $valores, $venda->getId());
    }
    public function excluir($id)    
    {
       return $this->deletar('VENDA', $id);
    }

}
