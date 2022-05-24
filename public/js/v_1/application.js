    //MODAL DE DELETAR PRODUTO
    $('.btn-deletar-produto').click(function() {

        var id = $(this).attr('id');
        $('#deleta-produto').modal('show');
        // $('.form-deletar').attr('action', url + "home/deletaProduto/" + id);
        $('.btn-deletado').click(function() {
            $.ajax({
                url: url + 'ajax/deletaProduto',
                dataType: 'json',
                method: 'POST',
                data: {
                    'id': id
                },
                async: false,
                success: function(obj) {
                    if (obj.error == false) {
                        $('#deleta-produto').modal('hide');
                        toastSucessMessage('Produto Deletado com Sucesso!')
                        setTimeout(() => {
                            location.reload()
                        }, 1000)
                    } else {
                        toastError('Erro ao Deletar o Produto!')
                        $('#deleta-produto').modal('hide');
                    }
                }
            })
        })

    })


    // MODAL DE EDITAR PRODUTO
    $('.btn-update-produto').click(function() {
        var id = $(this).attr('id')




        $.ajax({
            url: url + 'ajax/getProduto',
            dataType: 'json',
            method: 'POST',
            data: {
                'id': id
            },
            async: false,
            success: function(obj) {
                $('#update-produto').modal('show');
                $('#nome_update').val(obj.nome)

                // var aux_Categorias = '';
                // $.ajax({
                //     url: url + 'ajax/getTodasCategorias',
                //     dataType: 'json',
                //     method: 'POST',
                //     data: {},
                //     async: false,
                //     success: function(obj) {
                //         if (obj.error == false) {

                //             aux_Categorias = obj.categorias
                //         }
                //     }
                // })


                $('#categoria_update').val(obj.id_categoria)



                $('#qtd_estoque_update').val(obj.qtd_estoque)
                $('#valor_produto_update').val(numToMoedaFormatado(obj.valor_produto))
                $('.btn-save-change').attr('id', obj.id)
            }
        })


    })

    // BOTAO SALVAR MUDANÇA PRODUTO

    $(document).ready(function() {



        $('.btn-save-change').click(function() {

            var id = $(this).attr('id')

            let nome = $('#nome_update').val()
            let id_categoria = $('#categoria_update').val()
            let qtd_estoque = $('#qtd_estoque_update').val()
            let valor_produto = moedaToNum($('#valor_produto_update').val())


            if (id != "" && nome != "" && id_categoria != "" && qtd_estoque != "" && valor_produto != "") {
                $.ajax({
                    url: url + 'ajax/getProdutoFromUpdate',
                    dataType: 'json',
                    method: 'POST',
                    data: {
                        'id': id,
                        'nome': nome,
                        'id_categoria': id_categoria,
                        'qtd_estoque': qtd_estoque,
                        'valor_produto': valor_produto
                    },
                    async: false,
                    success: function(obj) {

                        if (obj.error == false) {

                            $('#update-produto').modal('hide');
                            toastSucessMessage('Produto editado com sucesso!')

                            setTimeout(() => {
                                location.reload()
                            }, 1000)


                        } else {
                            $('#update-produto').modal('hide');
                            toastError('Erro ao Editar o Produto.')
                        }
                    }
                })
            }

        })
    })




    //BOTAO ADD/TELA ADD PRODUTO
    $(document).ready(function() {
        $('.btn-add-produto').click(function() {

            let nome = $('#nome').val()
            let id_categoria = $('#categoria').val()
            let qtd_estoque = $('#qtd_estoque').val()
            let valor_produto = moedaToNum($('#valor_produto').val())
            let id_empresa = $('#id_empresa').val()




            if (id_empresa != '' && nome != "" && id_categoria != "" && qtd_estoque != "" && valor_produto != "") {

                $.ajax({
                    url: url + "ajax/addProduto",
                    dataType: 'json',
                    method: 'POST',
                    data: {
                        'id_empresa': id_empresa,
                        'nome': nome,
                        'id_categoria': id_categoria,
                        'qtd_estoque': qtd_estoque,
                        'valor_produto': valor_produto
                    },
                    async: false,
                    success: function(obj) {
                        if (obj.error == false) {
                            toastSucessMessage('Produto cadastrado com sucesso!')
                            $('#nome').val('')
                            $('#categoria').val('')
                            $('#qtd_estoque').val('')
                            $('#valor_produto').val('')
                        } else {
                            toastError('Erro ao Cadastrar o Produto')
                        }
                    }
                })


            } else {
                toastWarning('Preencha todos os campos.')

            }


        })
    })