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
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 d-flex mt-5 justify-content-around">
                <h1>Help Stock</h1>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-center mt-5 align-items-center">
                <a href="<?= URL ?>AdicionarProduto/index" class="btn btn-primary mr-4 ">Adicionar Produtos</a>
                <a href="<?= URL ?>Home/index" class="btn btn-success">Listar Produtos</a>
            </div>
        </div>
    </div>