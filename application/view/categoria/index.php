<div class="box-tabela-categoria">
    <div class="rowt">
        <div class="col-sm-12 col-md-12 col-lg-12 text-right mt-4 mb-0">
 
            <button class="btn btn-primary btn-add-categoria"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button>
        </div>
        
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped mt-2">
                    <thead class="tfooter ">
                        <tr>
                            <th scope="col">Cód.</th>
                            <th scope="col">Nome</th>
                            <th scope="col" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($todas_categorias as $categoria){ ?>
                            <tr>
                                <td scope='row'><?=$categoria->id?></td>
                                <td><?= $categoria->nome ?></td>
                                <td class="text-center">
                                    <a id="<?=$categoria->id?>" class="btn btn-warning btn-update-categoria"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a id="<?=$categoria->id?>" class="btn btn-danger btn-deletar-categoria"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>

                        <?php } ?>


                        
                        <tr class="tfooter ">
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-add-categoria" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicione uma Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="box-input">
          <label for="nome_add"><b>Nome:</b> </label>
          <input id='nome_add' type="text" class="form-control mb-4 text-right">
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
        <a class="btn btn-success btn-save-categoria">Adicionar</a>
      </div>

    </div>
  </div>
</div>


<!-- Modal  DELETAR-->
<div class="modal fade" id="deleta-categoria" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Atenção!</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja Realmente deletar essa Categoria?
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


<div class="modal fade" id="modal-update-categoria" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edite a sua Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="box-input">
          <label for="nome_add"><b>Nome:</b> </label>
          <input id='nome_update_cat' type="text" class="form-control mb-4 text-right">
        </div>
      </div>
      
      <div class="modal-footer">
        <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
        <a class="btn btn-success btn-save-update-categoria">Adicionar</a>
      </div>

    </div>
  </div>
</div>