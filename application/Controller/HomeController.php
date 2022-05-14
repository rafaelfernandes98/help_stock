<?php



namespace Mini\Controller;

use Mini\Model\Categoria;
use Mini\Model\Produtos;
use Mini\Model\Geral;

class HomeController extends FrontController
{
    public $dir = 'home';
  
    public function index()
    {
        $this->addStyle(URL . "css/" . VERSAO . "/style.css");
        $this->addStyle(URL . "css/" . VERSAO . "/toastr.min.css");


        $this->addScript(URL . "js/" . VERSAO . "/application.js");
        $this->addScript(URL . "js/" . VERSAO . "/toastr.min.js");


        // $produtos = (new Produtos())->getTodosProdutos();

        $categorias = (new Categoria())->getTodasCategorias();

        $paginacao = (new Geral())->paginacao();

        // $produtos = (new Geral())->getItensComLimit(5, $paginacao, $_GET, "produtos");
        // $produtos_proximo = (new Geral())->getItensComLimit(5, $paginacao + 1, $_GET, "produtos");

        $produtos = (new Produtos())->getTodosProdutosComLimit(5, $paginacao, $_GET);

        $produtos_proximo = (new Produtos())->getTodosProdutosComLimit(5, $paginacao, $_GET);

        
        require APP . 'view/_templates/header.php';
        require APP . 'view/'.$this->dir.'/index.php';
        require APP . 'view/_templates/footer.php';
    }

}
