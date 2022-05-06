<?php
namespace Mini\Controller;

use Mini\Model\Produtos;
use stdClass;

class AdicionarProdutoController{
    public $dir = 'adicionar_produto';

    public function index(){  
        
        if(isset($_GET['cadastrado']) && $_GET['cadastrado'] == true){
            $_GET['cadastrado'] = false;
        }
        
        // phpinfo();
        // xdebug_info();
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/'.$this->dir.'/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function adicionaProduto(){

        if(isset($_POST) && !empty($_POST)){

            $produto = new stdClass();

            $produto->nome = $_POST['nome'];
            $produto->categoria = $_POST['categoria'];
            $produto->qtd_estoque = $_POST['qtd_estoque'];
            $produto->valor_produto = $_POST['valor_produto'];

            (new Produtos())->insertProduto($produto);

            

            header('location: '. URL. 'AdicionarProduto/index?cadastrado=true');
            exit;

        }

    }

  
}



?>