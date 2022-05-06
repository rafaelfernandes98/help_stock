<?php

namespace Mini\Model;

use Mini\Core\Model;

class Produtos extends Model{

    public function getTodosProdutos(){
        $sql = 'SELECT * FROM produtos';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function insertProduto($produto){
        $sql = "INSERT INTO
                    produtos 
                    (nome, categoria, qtd_estoque, valor_produto) 
                VALUES
                    (:nome, :categoria, :qtd_estoque, :valor_produto)";

        $query = $this->db->prepare($sql);
        $parameters = array(
            ':nome'=>$produto->nome,
            ':categoria'=>$produto->categoria,
            ':qtd_estoque'=>$produto->qtd_estoque,
            ':valor_produto'=>$produto->valor_produto
        );
        $query->execute($parameters);

        $id_ultimo_produto = $this->db->lastInsertId();

        return $id_ultimo_produto;

    }

    public function deletaProduto($id){

        $parameters = [':id'=>$id];
        $sql= "DELETE FROM produtos WHERE id = :id";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return;
    }
}


?>