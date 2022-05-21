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

    <div class="container-fluid box-img">
        <div class="container">
            <div class="row box-view">

                <div class="box-login">
                    <form action="<?= URL ?>login/logar" method="POST" autocomplete="off">
                        <div class="box-title text-center">
                            <h1>Help Stock</h1>
                            <span>Por favor faça o Login ou <a href="<?= URL ?>cadastro/index">Registre-se</a></span>
                        </div>
                        <?php if (isset($_GET['error'])) {

                            if ($_GET['error'] == '1') { ?>
                                <div class="box text-center mb-2">
                                    <span style="color: #9B0000;">Senha Incorreta.</span>
                                </div>
                            <?php }

                            if ($_GET['error'] == '2') { ?>
                                <div class="box text-center mb-2">
                                    <span style="color: #9B0000;">Seu Email Está Incorreto.</span>
                                </div>
                            <?php }

                            if ($_GET['error'] == '3') { ?>
                                <div class="box text-center mb-2">
                                    <span style="color: #9B0000;">Preencha Todos os Campos.</span>
                                </div>
                        <?php }
                        } ?>

                        <div class="box-ipt">
                            <input type="email" name="email" required placeholder="Digite Seu Email" autocomplete="false">
                        </div>
                        <div class="box-ipt">
                            <input type="password" name="senha" required placeholder="Digite Sua Senha" autocomplete="false">
                        </div>

                        <div class="box-submit">
                            <button class="btn-submit btn btn-primary" type="submit" name="logar" value="logar">Entrar</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


    <script src="<?php echo URL; ?>js/jquery.slim.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="<?php echo URL; ?>js/bootstrap.bundle.min.js"></script>
    <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script src="<?php echo URL; ?>js/jquery-maskmoney.js"></script>
    <script src="<?php echo URL; ?>js/formatacao.js"></script>




    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <?= $this->renderScript() ?>




    <script>
        $('[data-mask]').inputmask();

        $('[data-mask-int]').inputmask(
            'decimal', {
                alias: "decimal",
                rightAlign: false,
                radixPoint: ",",
                groupSeparator: ".",
                autoGroup: true,
                digits: 0,
                digitsOptional: false,
                placeholder: '0'
            });

        $('[data-mask-money]').maskMoney({
            decimal: ',',
            thousands: '.',
            affixesStay: false
        });
    </script>

</body>

</html>