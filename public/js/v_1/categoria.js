$(document).on('click', '.btn-add-categoria', function(e) {
    e.preventDefault()

    $('#modal-add-categoria').modal('show')

    $('.btn-save-categoria').click(function() {

        let nome = $('#nome_add').val()

        if (typeof nome !== 'undefined' && nome != '') {
            $.ajax({
                url: url + 'ajax/addCategoria',
                dataType: 'json',
                method: 'POST',
                data: {
                    'id_empresa': ID_EMPRESA,
                    'nome': nome
                },
                async: false,
                success: function(obj) {
                    if (obj.error == false) {
                        $('#modal-add-categoria').modal('hide')
                        toastSucessMessage('Categoria Cadastrada com Sucesso!')
                        setTimeout(() => {
                            location.reload();
                        }, 1000)

                    } else {
                        $('#modal-add-categoria').modal('hide')
                        toastError(obj.message)

                    }
                }
            })
        }
    })
})


$(document).on('click', '.btn-deletar-categoria', function(e) {
    e.preventDefault()

    var id = $(this).attr('id');

    $('#deleta-categoria').modal('show')

    $('.btn-deletado').click(function() {

        $.ajax({
            url: url + 'ajax/deletaCategoria',
            dataType: 'json',
            method: 'POST',
            data: {
                'id': id,
                'id_empresa': ID_EMPRESA
            },
            async: false,
            success: function(obj) {
                if (obj.error == false) {
                    $('#deleta-categoria').modal('hide')

                    toastSucessMessage(obj.message)

                    setTimeout(() => {
                        location.reload()
                    }, 1000)

                } else {
                    $('#deleta-categoria').modal('hide')
                    toastError(obj.message)

                }
            }
        })

    })

})

$(document).on('click', '.btn-update-categoria', function() {

    let id = $(this).attr('id')

    $.ajax({
        url: url + 'ajax/getCategoria',
        dataType: 'json',
        method: 'POST',
        data: {
            'id': id,
            'id_empresa': ID_EMPRESA
        },
        async: false,
        success: function(obj) {
            $('#modal-update-categoria').modal('show')

            $('#nome_update_cat').val(obj.nome)
            $('.btn-save-update-categoria').attr('id', obj.id)


        }
    })

    $('.btn-save-update-categoria').click(() => {
        let id = $(this).attr('id')

        let nome = $('#nome_update_cat').val()

        if (typeof nome !== 'undefined' && nome != '') {

            $.ajax({
                url: url + 'ajax/getCategoriaFromUpdate',
                dataType: 'json',
                method: 'POST',
                data: {
                    'id': id,
                    'nome': nome,
                    'id_empresa': ID_EMPRESA
                },
                async: false,
                success: function(obj) {
                    if (obj.error == false) {

                        $('#modal-update-categoria').modal('hide')
                        toastSucessMessage('Categoria editada com sucesso!')

                        setInterval(() => {
                            location.reload()
                        }, 1000)
                    } else {
                        $('#modal-update-categoria').modal('hide')
                        toastError('Erro ao Editar a Categoria.')

                    }
                }
            })

        } else {
            toastWarning('Preencha todos os campos.')

        }

    })
})