<?php

namespace Mini\Controller;


class LoginController extends FrontController{

    public $dir = 'login';

    public function index(){

        // $this->addStyle(URL . "css/" . VERSAO . "/toastr.min.css");
        $this->addStyle(URL . "css/" . VERSAO . "/style.css");


        $this->addScript(URL . "js/" . VERSAO . "/toastr.min.js");



        require APP.'view/'.$this->dir.'/index.php';
    }
}





?>