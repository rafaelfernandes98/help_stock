<?php



namespace Mini\Controller;

use Mini\Model\Produtos;

class HomeController
{
    public $dir = 'home';
  
    public function index()
    {
        $produtos = (new Produtos())->getTodosProdutos();


        
        require APP . 'view/_templates/header.php';
        require APP . 'view/'.$this->dir.'/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function deletaProduto($id){
        if(isset($id) && isset($_POST['deletar'])){
            (new Produtos())->deletaProduto($id);

            header('location:' . URL . 'home/index?deletado=true');
        }
    }


}
