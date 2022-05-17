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
                    <form action="<?=URL?>login/logar" method="POST">
                        <div class="box-title text-center">
                            <h1>Help Stock</h1>
                            <span>Por favor faça o Login ou <a href="">Registre-se</a></span>
                        </div>

                        <div class="box-ipt">
                            <input type="text" name="email">
                        </div>
                        <div class="box-ipt">
                            <input type="password" name="senha">
                        </div>
                        <div class="box-submit">
                            <input class="btn-submit btn btn-primary" type="submit" name="logar" value="Logar">
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

        var erro = "<?php if(isset($_SESSION['sessao']['error'])) {
                                    echo $_SESSION['sessao']['error'];
                                } ?>";
        var mensagem_erro = "<?= (isset($_SESSION['sessao']['erro_msg']))? $_SESSION['sessao']['erro_msg'] : ""; ?>";
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