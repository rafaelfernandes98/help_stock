<?php
namespace Mini\Controller;

use Mini\Model\Produtos;
use Mini\Model\Categoria;
use stdClass;

class AdicionarProdutoController extends FrontController{
    public $dir = 'adicionar_produto';

    public function index(){ 
        
        (new LoginController())->verificaSessao();
        
      
        $this->addStyle(URL . "css/" . VERSAO . "/toastr.min.css");
        $this->addStyle(URL . "css/" . VERSAO . "/style.css");

        
        $this->addScript(URL . "js/" . VERSAO . "/toastr.min.js");
        $this->addScript(URL . "js/" . VERSAO . "/application.js");

        $id_empresa = $_SESSION['sessao']['id'];
        
        $categorias = (new Categoria())->getTodasCategorias($id_empresa);
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/'.$this->dir.'/index.php';
        require APP . 'view/_templates/footer.php';
    }

  
}



?>