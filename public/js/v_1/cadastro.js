$(document).ready(() => {
    $(".manda-form-cadastro").on('submit', function(e) {


        let campos = document.getElementsByClassName('campos')

        let email = document.querySelector('#email-cadastro').value
        let senha = document.querySelector('#senha-cadastro').value
        let conf_senha = document.querySelector('#confirma-senha-cadastro').value
        let senha_validada = false
            // let email_exite = true

        let showModal = false
        Array.from(campos).forEach((campo, index) => {

            if (campo.value == '') {
                showModal = true
            }

        })


        if (showModal == true) {
            toastWarningCenter('Preencha Todos os Campos.')
        }

        if (senha != conf_senha) {
            toastWarningCenter('As senhas Precisam ser Iguais.')
        } else {
            senha_validada = true
        }

        if (senha_validada == true && showModal == false) {
            $(this).submit();
        } else {
            e.preventDefault();
        }

    })
})