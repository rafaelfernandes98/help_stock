<?php

namespace Mini\Model;

use Mini\Core\Model;

class Produtos extends Model
{

    public function getTodosProdutos()
    {
        $sql = 'SELECT * FROM produtos';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getProdutoById($id)
    {

        $parameters = array(':id' => $id);

        $sql = 'SELECT * FROM produtos WHERE id = :id';
        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return $query->fetch();
    }

    public function insertProduto($produto)
    {
        $parameters = array(
            ':nome' => $produto->nome,
            ':categoria' => $produto->categoria,
            ':qtd_estoque' => $produto->qtd_estoque,
            ':valor_produto' => $produto->valor_produto
        );
        $sql = "INSERT INTO
                    produtos 
                    (nome, categoria, qtd_estoque, valor_produto)
                VALUES
                    (:nome, :categoria, :qtd_estoque, :valor_produto)";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return;
    }

    public function deletaProduto($id)
    {

        $parameters = [':id' => $id];
        $sql = "DELETE FROM produtos WHERE id = :id";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return;
    }

    public function updateProduto($produto, $id)
    {

        $parameters = array(
            ':id' => $id,
            ':nome' => $produto->nome,
            ':categoria' => $produto->categoria,
            ':qtd_estoque' => $produto->qtd_estoque,
            ':valor_produto' => $produto->valor_produto
        );


        $sql = "UPDATE
                    produtos 
                SET
                    nome = :nome, categoria = :categoria, qtd_estoque = :qtd_estoque, valor_produto = :valor_produto
            
                WHERE
                    id = :id";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return;
    }
}
