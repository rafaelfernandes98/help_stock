<?php

namespace Mini\Controller;

use Mini\Model\Categoria;

class CategoriaController extends FrontController{

    public $dir = 'categoria';

    public function index(){
        (new LoginController())->verificaSessao();

        $this->addStyle(URL . "css/" . VERSAO . "/style.css");
        $this->addStyle(URL . "css/" . VERSAO . "/toastr.min.css");


        $this->addScript(URL . "js/" . VERSAO . "/categoria.js");
        $this->addScript(URL . "js/" . VERSAO . "/toastr.min.js");

        $id_empresa = $_SESSION['sessao']['id'];

        $todas_categorias = (new Categoria())->getTodasCategorias($id_empresa);


        require APP . 'view/_templates/header.php';
        require APP . 'view/'.$this->dir.'/index.php';
        require APP . 'view/_templates/footer.php';
    }
}



?>