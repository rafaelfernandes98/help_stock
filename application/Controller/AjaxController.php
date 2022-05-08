<?php

namespace Mini\Controller;

use Mini\Model\Produtos;
use stdClass;

class AjaxController {

    // public $dir = 'ajax';

    public function addProduto(){
        $produto = new stdClass();

        // echo 'teste';
        // die;

  
        $produto->nome = $_POST['nome'];
        $produto->categoria = $_POST['categoria'];
        $produto->qtd_estoque = $_POST['qtd_estoque'];
        $produto->valor_produto = $_POST['valor_produto'];

        (new Produtos())->insertProduto($produto);

        echo json_encode(['error'=> false]);
        exit;
      
    }
}
