<?php

namespace Mini\Model;

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
}


?>