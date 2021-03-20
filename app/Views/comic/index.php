<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Comic List</h1>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0 ?>
                    <?php foreach ($komik as $k) :  ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $k['cover']; ?>" alt="" class="sampul"></td>
                            <td><?= $title; ?></td>
                            <td>
                                <a href="" class="btn btn-info">Detail</a>
                                <a href="" class="btn btn-success">Beli</a>
                            </td>
                        </tr>
                    <?php endforeach;  ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>