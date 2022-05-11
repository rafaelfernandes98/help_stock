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
            $('#categoria_update').val(obj.categoria)
            $('#qtd_estoque_update').val(obj.qtd_estoque)
            $('#valor_produto_update').val(numToMoedaFormatado(obj.valor_produto))
            $('.btn-save-change').attr('id', id)
        }
    })


})

// BOTAO SALVAR MUDANÇA PRODUTO

$(document).ready(function() {



    $('.btn-save-change').click(function() {

        var id = $(this).attr('id')

        let nome = $('#nome_update').val()
        let categoria = $('#categoria_update').val()
        let qtd_estoque = $('#qtd_estoque_update').val()
        let valor_produto = moedaToNum($('#valor_produto_update').val())

        if (id != "" && nome != "" && categoria != "" && qtd_estoque != "" && valor_produto != "") {
            $.ajax({
                url: url + 'ajax/getProdutoFromUpdate',
                dataType: 'json',
                method: 'POST',
                data: {
                    'id': id,
                    'nome': nome,
                    'categoria': categoria,
                    'qtd_estoque': qtd_estoque,
                    'valor_produto': valor_produto
                },
                async: false,
                success: function(obj) {

                    console.log(obj);
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
        let categoria = $('#categoria').val()
        let qtd_estoque = $('#qtd_estoque').val()
        let valor_produto = moedaToNum($('#valor_produto').val())




        if (nome != "" && categoria != "" && qtd_estoque != "" && valor_produto != "") {

            $.ajax({
                url: url + "ajax/addProduto",
                dataType: 'json',
                method: 'POST',
                data: {
                    'nome': nome,
                    'categoria': categoria,
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