$('.btn-deletar-produto').click(function() {

    var id = $(this).attr('id');
    $('#deleta-produto').modal('show');
    $('.form-deletar').attr('action', url + "home/deletaProduto/" + id);
})

$('.btn-add-produto').click(function() {

    var url_string = window.location.href;
    var url = new URL(url_string);
    var cadastrado = url.searchParams.get("cadastrado");


    let nome = $('#nome').val()

    let categoria = $('#categoria').val()
    let qtd_estoque = $('#qtd_estoque').val()
    let valor_produto = $('#valor_produto').val()

    if (cadastrado == 'true' && nome.length != 0 && categoria.length != 0 && qtd_estoque.length != 0 && valor_produto.length != 0) {


        $('#add-produto').modal('show')

    }


    console.log(cadastrado);


})