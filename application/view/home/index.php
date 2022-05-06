<div class="container box-tabela" >
    <div class="table-responsive" >
        <table class="table table-bordered table-hover mt-5" >
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Qtd em Estoque</th>
                    <th scope="col">Valor</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($produtos as $produto){?>
                 
                 <tr>
                    <th scope="row"><?= $produto->id?></th>
                    <td><?=$produto->nome?></td>
                    <td><?=$produto->categoria ?></td>
                    <td><?=$produto->qtd_estoque ?></td>
                    <td>R$<?=$produto->valor_produto ?>,00</td>
                    <td class="text-center">
                        <a href="" class="btn btn-warning ">Editar</a>
                        <a id="<?=$produto->id;?>" class="btn btn-danger btn-deletar-produto">Deletar</a>
                    </td>

                 </tr>

                <?php }?>    

            </tbody>
        </table>


    </div>
</div>


<!-- Modal -->
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