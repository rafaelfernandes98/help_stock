<?php

namespace Mini\Model;

use Mini\Core\Model;


class Empresa extends Model{

    public function getEmpresaByEmail($email){

        $parameters = array(':email'=>$email);

        $sql = "SELECT
                    * 
                FROM 
                    empresa 
                WHERE
                email = :email";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return $query->fetch();
    }
    
    
    public function insertEmpresa($nova_Empresa){
        $parameters = array(
            ':nome'=>$nova_Empresa->nome,
            ':email'=>$nova_Empresa->email,
            ':senha'=>$nova_Empresa->senha
        );

        $sql = "INSERT INTO
                empresa
                (nome, email, senha)
                VALUES
                (:nome, :email, :senha)";

        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return;
    }

}


?>