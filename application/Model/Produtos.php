<?php

namespace Mini\Model;

use Mini\Core\Model;

class Produtos extends Model
{

    public function getTodosProdutos()
    {
        $sql = 'SELECT
                    produtos.id AS id,
                    produtos.nome AS nome,
                    produtos.qtd_estoque AS qtd_estoque,
                    produtos.valor_produto AS valor_produto,
                    categoria.nome AS categoria
                FROM 
                    produtos 
                LEFT JOIN 
                    categoria 
                ON 
                    categoria.id = produtos.id_categoria';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getTodosProdutosComLimit($qtd, $pagina, $filtros){
        $filtros_query = '';
        $parameters = array();

        if(isset($filtros['nome']) && $filtros['nome'] != ""){
            $filtros_query = $filtros_query . "AND ucase(produtos.nome) LIKE ucase(:nome)";
            $parameters[':nome'] = '%'. $filtros['nome'] . '%';
        }

        $offset = ($pagina - 1) * $qtd;


        $sql = "SELECT
                    produtos.id AS id,
                    produtos.nome AS nome,
                    produtos.qtd_estoque AS qtd_estoque,
                    produtos.valor_produto AS valor_produto,
                    categoria.nome AS categoria
                FROM 
                    produtos 
                LEFT JOIN 
                    categoria 
                ON 
                    categoria.id = produtos.id_categoria
                WHERE
                    TRUE $filtros_query ORDER BY nome ASC LIMIT $qtd OFFSET $offset";

        
        $query = $this->db->prepare($sql);
        $query->execute($parameters);

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
            'id_empresa'=>$produto->id_empresa,
            ':nome' => $produto->nome,
            ':id_categoria' => $produto->id_categoria,
            ':qtd_estoque' => $produto->qtd_estoque,
            ':valor_produto' => $produto->valor_produto
        );
        $sql = "INSERT INTO
                    produtos 
                    (nome, id_categoria, qtd_estoque, valor_produto, id_empresa)
                VALUES
                    (:nome, :id_categoria, :qtd_estoque, :valor_produto, :id_empresa)";

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
            ':id_categoria' => $produto->id_categoria,
            ':qtd_estoque' => $produto->qtd_estoque,
            ':valor_produto' => $produto->valor_produto
        );


        $sql = "UPDATE
                    produtos 
                SET
                    nome = :nome, id_categoria = :id_categoria, qtd_estoque = :qtd_estoque, valor_produto = :valor_produto
            
                WHERE
                    id = :id";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return;
    }
}
