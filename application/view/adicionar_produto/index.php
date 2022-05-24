<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="box-add-produto mt-5 d-flex flex-column w-25 mr-auto ml-auto">
               <input type="text" id="id_empresa" hidden value="<?= $_SESSION['sessao']['id'] ?>">
               

                    <div class="box-input">
                        <label for=""><b>Nome:</b> </label>
                        <input id='nome' type="text" class="form-control mb-4 text-right" >
                    </div>
                        <!-- id='categoria' -->
                    <div class="box-input">
                        <label for=""><b>Categoria:</b></label>
                        <select name="categoria" id="categoria" class="form-control mb-4 text-right">
                            <option class="mr-1" value="">Selecione uma Categoria</option>
                            <?php foreach($categorias as $categoria){?>
                                <option class="mr-1" value="<?= $categoria->id ?>"><?= $categoria->nome ?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="box-input">
                        <label for=""><b>Quantidade em Estoque:</b></label>
                        <input id='qtd_estoque' data-mask-int type="text" class="form-control mb-4 text-right">
                    </div>

                    <div class="box-input">
                        <label for=""><b>Valor:</b></label>
                        <input id='valor_produto' data-mask-money type="text" class="form-control mb-4 text-right">
                    </div>
                    <div class="box-input text-center">
                        <button type="submit" class="btn btn-dark btn-add-produto">Cadastrar</button>
                    </div>

            
            </div>
        </div>
    </div>
</div>






