<?php

namespace Mini\Model;

use Mini\Core\Model;


class Categoria extends Model{

    public function getTodasCategorias($id_empresa)
    {
        $parameters = array(':id_empresa'=>$id_empresa);

        $sql = 'SELECT * FROM categoria WHERE id_empresa = :id_empresa';
        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return $query->fetchAll();  
    }
    
    public function getCategoriaById($id, $id_empresa)
    {

        $parameters = array(':id' => $id, ':id_empresa'=>$id_empresa);

        $sql = 'SELECT * FROM categoria WHERE id = :id AND id_empresa = :id_empresa';
        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return $query->fetch();
    }

    public function insertCategoria($categoria)
    {
        $parameters = array(':nome' => $categoria->nome, ':id_empresa'=>$categoria->id_empresa);
        $sql = "INSERT INTO
                    categoria 
                    (nome, id_empresa)
                VALUES
                    (:nome, :id_empresa)";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return;
    }

    public function deletaCategoria($id, $id_empresa)
    {

        $parameters = [':id' => $id, ':id_empresa'=>$id_empresa];
        $sql = "DELETE FROM categoria WHERE id = :id AND id_empresa = :id_empresa";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return;
    }

    public function updateCategoria($categoria, $id, $id_empresa)
    {

        $parameters = array(
            ':id' => $id,
            ':id_empresa'=>$id_empresa,
            ':nome' => $categoria->nome
          
        );

        $sql = "UPDATE
                    categoria 
                SET
                    nome = :nome 
            
                WHERE
                    id = :id
                AND
                    id_empresa = :id_empresa";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return;
    }
}


?>