<?php

use Mini\Libs\Formatacoes;

?>

<div class="container box-tabela">
  <div class="table-responsive">
    <table class="table table-bordered table-hover mt-5">
      <thead>
        <tr>
          <th scope="col">Cód.</th>
          <th scope="col">Nome</th>
          <th scope="col">Categoria</th>
          <th scope="col">Qtd em Estoque</th>
          <th scope="col">Valor</th>
          <th scope="col" class="text-center">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php


        foreach ($produtos as $produto) {
          if ($produto->qtd_estoque != 0 || $produto->qtd_estoque > 1) {
            $unidade = " unidades";
          } else {
            $unidade = " unidade";
          }

        ?>
          <tr>
            <th scope="row"><?= $produto->id ?></th>
            <td><?= $produto->nome ?></td>
            <td><?= $produto->categoria ?></td>
            <td><?= $produto->qtd_estoque  . $unidade ?></td>
            <td>R$<?= Formatacoes::maskMoney($produto->valor_produto) ?></td>
            <td class="text-center">
              <a id="<?= $produto->id; ?>" class="btn btn-warning btn-update-produto">Editar</a>
              <a id="<?= $produto->id; ?>" class="btn btn-danger btn-deletar-produto">Deletar</a>
            </td>

          </tr>

        <?php } ?>

      </tbody>
    </table>


  </div>
</div>


<!-- Modal  DELETAR-->
<div class="modal fade" id="deleta-produto" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Atenção!</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja Realmente deletar esse produto
      </div>
      <form method="POST" class="form-deletar">
        <div class="modal-footer">
          <div>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
          </div>
          <button type="submit" name='deletar' class="btn btn-danger">Deletar</button>
        </div>
      </form>
    </div>
  </div>
</div>




<!-- Modal  EDITAR-->
<div class="modal fade" id="update-produto" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edição de Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">

          <div class="box-input">
            <label for=""><b>Nome:</b> </label>
            <input id='nome_update' type="text" class="form-control mb-4 text-right">
          </div>

          <div class="box-input">
            <label for=""><b>Categoria:</b></label>
            <input id='categoria_update' type="text" class="form-control mb-4 text-right">
          </div>

          <div class="box-input">
            <label for=""><b>Quantidade em Estoque:</b></label>
            <input id='qtd_estoque_update' data-mask-int type="text" class="form-control mb-4 text-right">
          </div>

          <div class="box-input">
            <label for=""><b>Valor:</b></label>
            <input id='valor_produto_update' data-mask-money type="text" class="form-control mb-4 text-right">
          </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success btn-save-change">Save changes</button>
        </div>
      
    </div>
  </div>
</div>