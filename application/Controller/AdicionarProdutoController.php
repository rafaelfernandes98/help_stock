<?php
namespace Mini\Controller;

use Mini\Model\Produtos;
use stdClass;

class AdicionarProdutoController extends FrontController{
    public $dir = 'adicionar_produto';

    public function index(){  
      
        $this->addStyle(URL . "css/" . VERSAO . "/toastr.min.css");
        $this->addStyle(URL . "css/" . VERSAO . "/style.css");

        
        $this->addScript(URL . "js/" . VERSAO . "/toastr.min.js");
        $this->addScript(URL . "js/" . VERSAO . "/application.js");
        
        

        
        require APP . 'view/_templates/header.php';
        require APP . 'view/'.$this->dir.'/index.php';
        require APP . 'view/_templates/footer.php';
    }

  
}



?>