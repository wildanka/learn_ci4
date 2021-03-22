<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Comic List</h1>
            <a href="/comic/add" class="btn btn-primary mb-3">Tambah Data Comic</a>
            <?php if (session()->getFlashdata('pesan')) :  ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table mt-2">
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
                            <td><?= $k['title']; ?></td>
                            <td>
                                <a href="/comic/<?= $k['slug']; ?>" class="btn btn-info">Detail</a>
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