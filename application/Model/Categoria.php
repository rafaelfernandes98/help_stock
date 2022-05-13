<?php

namespace Mini\Model;

use Mini\Core\Model;


class Categoria extends Model{

    public function getTodasCategorias()
    {
        $sql = 'SELECT * FROM categoria';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function insertCategoria($categoria)
    {
        $parameters = array(':nome' => $categoria->nome);
        $sql = "INSERT INTO
                    categoria 
                    (nome)
                VALUES
                    (:nome)";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return;
    }

    public function deletaCategoria($id)
    {

        $parameters = [':id' => $id];
        $sql = "DELETE FROM categoria WHERE id = :id";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return;
    }
}


?>