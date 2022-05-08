$('.btn-deletar-produto').click(function() {

    var id = $(this).attr('id');
    $('#deleta-produto').modal('show');
    $('.form-deletar').attr('action', url + "home/deletaProduto/" + id);
})

$(document).ready(function() {
    $('.btn-add-produto').click(function() {

        let nome = $('#nome').val()
        let categoria = $('#categoria').val()
        let qtd_estoque = $('#qtd_estoque').val()
        let valor_produto = $('#valor_produto').val()

        console.log(nome, categoria, qtd_estoque, valor_produto);

        if (nome != "" && categoria != "" && qtd_estoque != "" && valor_produto != "") {

            let aux = ""

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

                    aux = obj

                    if (obj.error == true) {
                        toastrSuccess('sucesso')
                    } else {
                        toastError('Erro ao Cadastrar o Produto!')
                    }
                }
            })

            console.log(aux);

        } else {
            toastWarning('Preencha todos os campos.')

        }


    })
})