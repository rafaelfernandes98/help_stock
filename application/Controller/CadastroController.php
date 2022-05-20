<?php

namespace Mini\Controller;

use Mini\Model\Empresa;
use stdClass;

class CadastroController extends FrontController
{

    public $dir = 'cadastro';


    public function index()
    {
       

        $this->addStyle(URL . "css/" . VERSAO . "/toastr.min.css");
        $this->addStyle(URL . "css/" . VERSAO . "/style.css");

        $this->addScript(URL . "js/" . VERSAO . "/toastr.min.js");
        $this->addScript(URL . "js/" . VERSAO . "/cadastro.js");


        require APP . 'view/' . $this->dir . '/index.php';
    }


    public function cadastrar()
    {
        if (isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'cadastrar') {

            if (
                isset($_POST['novo-nome']) &&
                !empty($_POST['novo-nome']) ||
                isset($_POST['novo-email']) &&
                !empty($_POST['novo-email']) ||
                isset($_POST['nova-senha']) &&
                !empty($_POST['nova-senha']) ||
                isset($_POST['nova-senha-confirma']) &&
                !empty($_POST['nova-senha-confirma'])
            ) {

                if ((new Empresa())->getEmpresaByEmail($_POST['novo-email']) != true) {

                    if ($_POST['nova-senha'] == $_POST['nova-senha-confirma']) {

                        $nova_empresa = new stdClass();

                        $nova_empresa->nome = $_POST['novo-nome'];
                        $nova_empresa->email = $_POST['novo-email'];
                        $nova_empresa->senha = md5($_POST['nova-senha']);

                        (new Empresa())->insertEmpresa($nova_empresa);

                        header('location:' . URL . 'login/index');

                        exit;
                    }
                }
            }
        }
    }
}
