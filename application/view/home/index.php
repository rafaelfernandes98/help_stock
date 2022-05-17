<?php

use Mini\Libs\Formatacoes;

?>

<div class="box-tabela">

  <?= var_dump(isset($_SESSION['sessao'])? $_SESSION['sessao'] : 'sem usuario') ?>

  <form action='<?= URL . 'home/index' ?>' method="GET">
    <div class="box-input d-flex mt-4">
      <input type="text" placeholder="Digite o Nome do Produto" name="nome" class="form-control mr-2 text-left w-25" value="<?= (isset($_GET['nome']) ? $_GET['nome'] : ''); ?>">
      <button type="submit" name="filtrar" class="btn btn-outline-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
  </form>



  <div class="table-responsive">
    <table class="table table-striped mt-5">
      <thead class="tfooter ">
        <tr>
          <th scope="col">Cód.</th>
          <th style="width: 150px;" scope="col">Nome</th>
          <th style="width: 150px;" class="text-center" scope="col">Categoria</th>
          <th style="width: 150px;" class="text-center" scope="col">Qtd em Estoque</th>
          <th style="width: 150px;" class="text-right" scope="col">Valor Unitário</th>
          <th style="width: 150px;" class="text-right" scope="col">Valor Total</th>

          <th style="width: 117px;" scope="col" class="text-center">Ações</th>
        </tr>
      </thead>
      <tbody class="">
        <?php
        $qtd_total = 0;
        $valor_total = 0;
        if ($produtos == null) { ?>
          <tr>
            <td></td>
            <td></td>
            <td></td>

            <td class="text-center">Nenhum Produto Encontrado</td>
            <td></td>
            <td></td>
            <td></td>

          </tr>
        <?php }

        foreach ($produtos as $produto) {
          // if ($produto->qtd_estoque != 0 || $produto->qtd_estoque > 1) {
          //   $unidade = " unidades";
          // } else {
          $unidade = " un.";
          // }

          $qtd_total += $produto->qtd_estoque;
          $valor_total_por_produto = $produto->valor_produto * $produto->qtd_estoque;
          $valor_total += $valor_total_por_produto;

        ?>
          <tr>
            <th scope="row"><?= $produto->id ?></th>
            <td><?= $produto->nome ?></td>
            <td class="text-center"><?= $produto->categoria ?></td>
            <td class="text-center"><?= $produto->qtd_estoque  . $unidade ?></td>
            <td class="text-right">R$<?= Formatacoes::maskMoney($produto->valor_produto) ?></td>
            <td class="text-right">R$<?= Formatacoes::maskMoney($valor_total_por_produto) ?></td>
            <td class="text-center">
              <a id="<?= $produto->id; ?>" class="btn btn-primary btn-update-produto"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a id="<?= $produto->id; ?>" class="btn btn-danger btn-deletar-produto"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
          </tr>

        <?php }
        // if ($qtd_total != 0 || $qtd_total > 1) {
        //   $unidade = " unidades";
        // } else {
        $unidade = " un.";
        // }


        ?>

    </table>
    <table class="table table-striped">
      <tr class="tfooter">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-right"><b>Total: </b><?= $qtd_total . $unidade ?></td>
        <td class="text-right"><b>Total:</b> R$<?= Formatacoes::maskMoney($valor_total) ?></td>
        <td style="width: 117px;"></td>
      </tr>

      </tbody>
    </table>


  </div>
</div>
<div class="d-flex justify-content-center">
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <?php
      if (($paginacao - 1) >= 1) { ?>
        <li class="page-item"><a class="page-link" href="<?= preg_replace('/(&pagina=[0-9]{1,}){1}/', '', $_SERVER['REQUEST_URI']) . '&pagina=' . ($paginacao - 1) ?>">Anterior</a></li>

      <?php }
      if (count($produtos_proximo) > 0) { ?>
        <li class="page-item"><a class="page-link" href="<?= preg_replace('/(&pagina=[0-9]{1,}){1}/', '', $_SERVER['REQUEST_URI']) . '&pagina=' . ($paginacao + 1) ?>">Próximo</a></li>

      <?php  }
      ?>
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
          <select name="categoria" id="categoria_update" class="form-control cat_select mb-4 text-right">
            <?php foreach ($categorias as $categoria) { ?>
              <option value="<?= $categoria->id ?>"><?= $categoria->nome ?></option>
            <?php } ?>
          </select>
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