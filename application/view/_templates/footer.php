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