<?php
namespace Mini\Controller;

use Mini\Model\Produtos;
use stdClass;

class AdicionarProdutoController extends FrontController{
    public $dir = 'adicionar_produto';

    public function index(){  
      
        $this->addStyle(URL . "css/" . VERSAO . "/toastr.min.css");
        
        $this->addScript(URL . "js/" . VERSAO . "/toastr.min.js");
        $this->addScript(URL . "js/" . VERSAO . "/application.js");
        
        

        
        require APP . 'view/_templates/header.php';
        require APP . 'view/'.$this->dir.'/index.php';
        require APP . 'view/_templates/footer.php';
    }

    // public function adicionaProduto(){

    //     if(isset($_POST) && !empty($_POST)){

    //         $produto = new stdClass();

    //         $produto->nome = $_POST['nome'];
    //         $produto->categoria = $_POST['categoria'];
    //         $produto->qtd_estoque = $_POST['qtd_estoque'];
    //         $produto->valor_produto = $_POST['valor_produto'];

    //         // (new Produtos())->insertProduto($produto);


    //         header('location: '. URL. 'AdicionarProduto/index?cadastrado=true');
    //         exit;

    //     }

    // }

  
}



?>