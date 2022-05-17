<?php

if (!isset($_GET['url']) || empty($_GET['url'])) {
    $_GET['pg'] = "home";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MINI3</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>font-awesome/css/font-awesome.min.css">
    <?= $this->renderStyle() ?>
</head>

<body>
    <div class="container-fluid margem-pagima">
        <div class="container mt-5">
            <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="pull-right">

                    <a href="<?=URL?>login/logout" class=""><i class="fa fa-sign-out"></i>Sair</a>
                </div>
            </div>

            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <h1>Help Stock</h1>
                </div>

                <div class="col-sm-2 col-md-2 col-lg-2 mt-2 text-right">
                    <a href="<?= URL?>Categoria/index" class="btn btn-dark mr-2">Categorias</a>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 mt-2 text-right">
                    <a href="<?= URL ?>AdicionarProduto/index" class="btn btn-dark">Adicionar Produtos</a>
                </div>

                <div class="col-sm-3 col-md-3 col-lg-3 mt-2 text-right">
                    <a href="<?= URL ?>Home/index" class="btn btn-dark">Listar Produtos</a>
                </div>
            </div>