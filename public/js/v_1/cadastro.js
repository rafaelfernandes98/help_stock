$(document).ready(() => {
    $('.manda-form-cadastro').on('submit', (e) => {
        e.preventDefault()


        let nome = $('#nome-cadastro').val()
        let email = $('#email-cadastro').val()
        let senha = $('#senha-cadastro').val()
        let senha_conf = $('#confirma-senha-cadastro').val()

        if (nome == '' || email == '' || senha == '' || senha_conf == '') {
            toastWarning('Preencha Todos os Campos')
        } else {
            let email_valido = '';
            $.ajax({
                url: url + 'ajax/getEmpresaByEmail',
                dataType: 'json',
                method: 'POST',
                data: {
                    'email': email
                },
                async: false,
                success: function(obj) {
                    email_valido = obj.error
                }
            })
            if ()

        }




    })
})