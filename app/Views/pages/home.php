<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Hello, world!</h1>
            <?php
            d($tes);

            //or you can use dd to kill the process after do var_dump (by using d of course)
            // dd($tes);

            ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>