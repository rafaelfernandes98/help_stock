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
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h1>Help Stock</h1>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6 mt-2 text-right">
                    <a href="<?= URL?>Categoria/index" class="btn btn-dark mr-4">Categorias</a>
                    <a href="<?= URL ?>AdicionarProduto/index" class="btn btn-dark mr-4">Adicionar Produtos</a>
                    <a href="<?= URL ?>Home/index" class="btn btn-dark">Listar Produtos</a>
                </div>
            </div>