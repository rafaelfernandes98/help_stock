<?php

namespace Mini\Model;


use Mini\Core\Model;


class Geral extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function paginacao()
    {
        if (isset($_GET['pagina'])) {
            $paginacao = $_GET['pagina'];
        } else {
            $paginacao = 1;
        }
        return $paginacao;
    }


    public function getItensComLimit($qtd, $pagina, $filtros, $tabela){

        $filtros_query = '';
        $parameters = array();

        if(isset($filtros['nome']) && $filtros['nome'] != ""){
            $filtros_query = $filtros_query . "AND ucase(nome) LIKE ucase(:nome)";
            $parameters[':nome'] = '%'. $filtros['nome'] . '%';
        }

        $offset = ($pagina - 1) * $qtd;

        $sql = "SELECT * FROM {$tabela} WHERE TRUE $filtros_query ORDER BY nome ASC LIMIT $qtd OFFSET $offset";

        
        $query = $this->db->prepare($sql);
        $query->execute($parameters);

        return $query->fetchAll();
        

    }
}


?>