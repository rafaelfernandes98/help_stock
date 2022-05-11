<?php

use Mini\Libs\Formatacoes;

?>

<div class="container box-tabela">
  <div class="table-responsive">
    <table class="table table-striped mt-5">
      <thead class="tfooter">
        <tr>
          <th scope="col">Cód.</th>
          <th scope="col">Nome</th>
          <th scope="col">Categoria</th>
          <th class="text-right" scope="col">Qtd em Estoque</th>
          <th class="text-right" scope="col">Valor</th>
          <th scope="col" class="text-center">Ações</th>
        </tr>
      </thead>
      <tbody class="">
        <?php
        $qtd_total = 0;
        $valor_total = 0;

        foreach ($produtos as $produto) {
          if ($produto->qtd_estoque != 0 || $produto->qtd_estoque > 1) {
            $unidade = " unidades";
          } else {
            $unidade = " unidade";
          }

          $qtd_total += $produto->qtd_estoque;
          $valor_total += $produto->valor_produto;

        ?>
          <tr>
            <th scope="row"><?= $produto->id ?></th>
            <td><?= $produto->nome ?></td>
            <td><?= $produto->categoria ?></td>
            <td class="text-right"><?= $produto->qtd_estoque  . $unidade ?></td>
            <td class="text-right">R$<?= Formatacoes::maskMoney($produto->valor_produto) ?></td>
            <td class="text-center">
              <a id="<?= $produto->id; ?>" class="btn btn-warning btn-update-produto">Editar</a>
              <a id="<?= $produto->id; ?>" class="btn btn-danger btn-deletar-produto">Deletar</a>
            </td>

          </tr>

        <?php }
        if ($qtd_total != 0 || $qtd_total > 1) {
          $unidade = " unidades";
        } else {
          $unidade = " unidade";
        }


        ?>

        <tr class="tfooter">
          <td></td>
          <td></td>
          <td></td>
          <td class="text-right"><b>Total de Produtos : </b><?= $qtd_total . $unidade ?></td>
          <td class="text-right"><b>Total:</b> R$<?= Formatacoes::maskMoney($valor_total) ?></td>
          <td></td>
        </tr>

      </tbody>
    </table>


  </div>
</div>
<div class="container d-flex justify-content-center">
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav>
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

      <div class="modal-footer">
        <div>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
        </div>
        <button type="submit" name='deletar' class="btn btn-danger btn-deletado">Deletar</button>
      </div>

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
          <label for="nome_update"><b>Nome:</b> </label>
          <input id='nome_update' type="text" class="form-control mb-4 text-right">
        </div>

        <div class="box-input">
          <label for="categoria_update"><b>Categoria:</b></label>
          <input id='categoria_update' type="text" class="form-control mb-4 text-right">
        </div>

        <div class="box-input">
          <label for="qtd_estoque_update"><b>Quantidade em Estoque:</b></label>
          <input id='qtd_estoque_update' data-mask-int type="text" class="form-control mb-4 text-right">
        </div>

        <div class="box-input">
          <label for="valor_produto_update"><b>Valor:</b></label>
          <input id='valor_produto_update' data-mask-money type="text" class="form-control mb-4 text-right">
        </div>



      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
        <a class="btn btn-success btn-save-change">Salvar Mudanças</a>
      </div>

    </div>
  </div>
</div>