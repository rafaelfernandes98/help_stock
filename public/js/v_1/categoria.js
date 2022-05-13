$(document).on('click', '.btn-add-categoria', function(e) {
    e.preventDefault()

    $('#modal-add-categoria').modal('show')

    $('.btn-save-categoria').click(function() {
        debugger
        let nome = $('#nome_add').val()

        if (typeof nome !== 'undefined' && nome != '') {
            $.ajax({
                url: url + 'ajax/addCategoria',
                dataType: 'json',
                method: 'POST',
                data: {
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
                'id': id
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