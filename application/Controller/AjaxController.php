<?php

namespace Mini\Controller;

use Mini\Model\Produtos;
use stdClass;

class AjaxController {

    // public $dir = 'ajax';

    public function addProduto(){
        $produto = new stdClass();

  
        $produto->nome = $_POST['nome'];
        $produto->categoria = $_POST['categoria'];
        $produto->qtd_estoque = $_POST['qtd_estoque'];
        $produto->valor_produto = $_POST['valor_produto'];

        (new Produtos())->insertProduto($produto);

        echo json_encode(['error'=> false]);
        exit;
      
    }

    public function getProduto(){
        $id = $_POST['id'];

        if(!empty($id)){
            $produto = (new Produtos())->getProdutoById($id);
            echo json_encode($produto);
            exit;

        }else{
            echo json_encode(['error'=> true, 'message'=>'id_vazio']);
            exit;
            
        }

    }

    public function getProdutoFromUpdate(){
        $produto = new stdClass();

        $id = $_POST['id'];
        $produto->nome = $_POST['nome'];
        $produto->categoria = $_POST['categoria'];
        $produto->qtd_estoque = $_POST['qtd_estoque'];
        $produto->valor_produto = $_POST['valor_produto'];

        (new Produtos())->updateProduto($produto, $id);

        echo json_encode(['error'=>false]);
    
        exit;
    }
}
