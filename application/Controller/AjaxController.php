<?php

namespace Mini\Controller;

use Mini\Model\Categoria;
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

    public function deletaProduto(){
        $id = $_POST['id'];

        if(isset($id) && !empty($id)){
            (new Produtos())->deletaProduto($id);
            echo json_encode(['error'=>false]);
        }else{
            echo json_encode(['error'=>true, 'message'=>'id_indefinido_ou_vazio']);

        }

    }

    public function addCategoria(){
        $categoria = new stdClass();

        $categoria->nome = $_POST['nome'];

        (new Categoria())->insertCategoria($categoria);

        echo json_encode(['error'=>false, 'message'=>'Erro ao Cadastrar a Categoria!']);
    }

    public function deletaCategoria(){
        $id = $_POST['id'];

        if(isset($id) && !empty($id)){
            (new Categoria())->deletaCategoria($id);
            echo json_encode(['error'=>false, 'message'=>'Categoria Deletada!']);
        }else{
            echo json_encode(['error'=>true, 'message'=>'Erro Problema ao Deletar!']);

        }
    }
}
