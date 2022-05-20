<?php

namespace Mini\Controller;

use Mini\Model\Categoria;
use Mini\Model\Empresa;
use Mini\Model\Produtos;
use stdClass;

class AjaxController {

    // public $dir = 'ajax';

    public function addProduto(){
        $produto = new stdClass();

  
        $produto->nome = $_POST['nome'];
        $produto->id_categoria = $_POST['id_categoria'];
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
        $produto->id_categoria = $_POST['id_categoria'];
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

    // FUNCOES CATEGORIAS

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

    public function getCategoria(){
        $id  = $_POST['id'];

        if(isset($_POST['id']) && !empty($id)){
            $categoria = (new Categoria())->getCategoriaById($id);
            echo json_encode(($categoria));

        }else{
            echo json_encode(['error'=> true, 'message'=>'id_vazio']);
            exit;
        }

    }

    public function getTodasCategorias(){
        $categorias = (new Categoria())->getTodasCategorias();
        echo json_encode(['error'=>false, 'categorias'=> $categorias]);
        exit;
    }

    public function getCategoriaFromUpdate(){

        $categoria = new stdClass();
        
        $id = $_POST['id'];
        $categoria->nome = $_POST['nome'];

        (new Categoria())->updateCategoria($categoria, $id);

        echo json_encode(['error'=>false]);
    
        exit;

    }

    public function getEmpresaByEmail(){
        $email = $_POST['email'];
        $retorno_email = (new Empresa())->getEmpresaByEmail($email);
        if($retorno_email == false){
            echo json_encode(['error'=> false, 'msg'=>'Email não Cadastrado.']);
            exit;
        }else{
            echo json_encode(['error'=> true, 'msg'=> 'Email Cadastrado.']);
        }
    }
}
