<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MINI3</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL; ?>css/bootstrap.min.css">
    <?= $this->renderStyle() ?>
</head>
<body>
   <div class="container">
       <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mt-5">
               <a href="<?= URL?>AdicionarProduto/index" class="btn btn-primary mr-4 btn-lg">Adicionar Produtos</a>
               <a href="<?= URL?>Home/index" class="btn btn-success btn-lg">Listar Produtos</a>
           </div>
       </div>
   </div>
