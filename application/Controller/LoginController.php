<?php

namespace Mini\Controller;

use Mini\Model\Empresa;

class LoginController extends FrontController
{
    public $dir = 'login';


    public function index()
    {

        $this->addStyle(URL . "css/" . VERSAO . "/toastr.min.css");
        $this->addStyle(URL . "css/" . VERSAO . "/style.css");

        $this->addScript(URL . "js/" . VERSAO . "/toastr.min.js");

        session_start();
      
            if(!isset($_SESSION['sessao']['id']) ){
                
                require APP . 'view/login/index.php';
            }
            if(!isset($_SESSION) && !isset($_SESSION['error']) && $_SESSION['error'] != true){

                header('location: ' . URL . 'home/index');
                exit;
            }
            // require APP.'view/'.$this->dir.'/index.php';
    }

    public function logar()
    {

        // if (!isset($_SESSION)) {
            session_start();
        // }
            $teste = $_POST['logar'];

        if(isset($_POST['logar']) && $_POST['logar'] == 'logar'){

            if (!empty($_POST['email']) && !empty($_POST['senha'])) {
            
            $Usuario = new Empresa();
                 
               $verifica_usuario = $Usuario->getEmpresaByEmail($_POST['email']);
    
                if ($verifica_usuario == true) {
                    
                    
                    $usuario = $Usuario->getEmpresaByEmail($_POST['email']);
                    if (md5($_POST['senha']) == $usuario->senha) {
    
                        if (!isset($_SESSION) && !isset($_SESSION['sessao'])) {
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
                        exit;

                    }
                } else {
    
                    
                    $_SESSION['sessao']['erro_msg'] = 'Seu Email Está Incorreto';
                    $_SESSION['sessao']['error'] = true;
                    header('Location: ' . URL . 'login/index');
                    exit;

                    
                }
            } else {
                $_SESSION['sessao']['erro_msg'] = 'Preencha Todos os Campos';
                $_SESSION['sessao']['error'] = true;
                header('location: ' . URL . 'login/index');
                exit;

               
    
            }
        }else{
            header('location: ' . URL . 'login/index');
            exit;

        }
        
    }

    public function logout()
    {

        // if (!isset($_SESSION)) {
            session_start();
        // }
        unset($_SESSION['sessao']);
        header('location: ' . URL . 'login/index');
    }

    public function verificaSessao()
    {
        session_start();
        if (isset($_SESSION['sessao']['id']) == false) {
            header('location: ' . URL . 'login/index');
            exit;
        }
    }

    public function cadastro(){

        
        $this->addStyle(URL . "css/" . VERSAO . "/toastr.min.css");
        $this->addStyle(URL . "css/" . VERSAO . "/style.css");

        $this->addScript(URL . "js/" . VERSAO . "/toastr.min.js");
       
        require APP . 'view/'.$this->dir.'/cadastro.php';
       
    }
}
