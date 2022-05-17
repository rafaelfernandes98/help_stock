<?php

namespace Mini\Controller;

use Mini\Model\Empresa;

class LoginController extends FrontController
{


    public function index()
    {

        $this->addStyle(URL . "css/" . VERSAO . "/toastr.min.css");
        $this->addStyle(URL . "css/" . VERSAO . "/style.css");

        $this->addScript(URL . "js/" . VERSAO . "/toastr.min.js");

        session_start();

        if (!isset($_SESSION['sessao'])) {
            require APP . 'view/login/index.php';
        } else {
            header('location: ' . URL . 'home/index');
            exit;
        }
        // require APP.'view/'.$this->dir.'/index.php';
    }

    public function Logar()
    {

        session_start();

        if (isset($_POST['logar'])) {
            if (!empty($_POST['email']) && !empty($_POST['senha'])) {



                if ((new Empresa())->getEmpresaByEmail($_POST['email']) == true) {
                    $usuario = (new Empresa())->getEmpresaByEmail($_POST['email']);

                    if (md5($_POST['senha']) == $usuario->senha) {

                        if(!isset($_SESSION['sessao'])){
                            session_start();
                        }

                        $_SESSION['sessao']['id'] = $usuario->id;
                        $_SESSION['sessao']['nome'] = $usuario->nome;
                        $_SESSION['sessao']['email'] = $usuario->email;

                        
                        unset($_SESSION['sessao']['error']);

                        header('location: ' . URL . 'home/index');
                        exit;


                    } else {
                        $_SESSION['sessao']['erro_msg'] = "Senha Incorreta";
                        $_SESSION['sessao']['error'] = true;
                        header('location: ' . URL . 'login/index');
                    }
                } else {
                    $_SESSION['sessao']['erro_msg'] = 'Seu Email Está Incorreto';
                    $_SESSION['sessao']['error'] = true;
                    header('location: ' . URL . 'login/index');

                }
            } else {
                $_SESSION['sessao']['erro_msg'] = 'Preencha Todos os Campos';
                $_SESSION['sessao']['error'] = true;
                header('location: ' . URL . 'login/index');

            }
        }else{
            header('location: ' . URL . 'login/index');
            
        }
    }

    public function logout() {
        session_start();
        unset($_SESSION['sessao']);
        header('location: ' . URL . 'login/index');
    }
}
