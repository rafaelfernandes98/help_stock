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

}


?>