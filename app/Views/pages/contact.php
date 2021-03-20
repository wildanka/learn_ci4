<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Contact Us</h1>
            <?php
            foreach ($alamat as $address) :  ?>
                <ul>
                    <li><?= $address['tipe']; ?></li>
                    <li><?= $address['alamat']; ?></li>
                    <li><?= $address['kota']; ?></li>
                </ul>
            <?php
            endforeach
            ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>