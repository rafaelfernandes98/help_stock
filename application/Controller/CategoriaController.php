<?php

namespace Mini\Controller;

use Mini\Model\Categoria;

class CategoriaController extends FrontController{

    public $dir = 'categoria';

    public function index(){
        

        $this->addStyle(URL . "css/" . VERSAO . "/style.css");
        $this->addStyle(URL . "css/" . VERSAO . "/toastr.min.css");


        $this->addScript(URL . "js/" . VERSAO . "/categoria.js");
        $this->addScript(URL . "js/" . VERSAO . "/toastr.min.js");

        $todas_categorias = (new Categoria())->getTodasCategorias();


        require APP . 'view/_templates/header.php';
        require APP . 'view/'.$this->dir.'/index.php';
        require APP . 'view/_templates/footer.php';
    }
}



?>