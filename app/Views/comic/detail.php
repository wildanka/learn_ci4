<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="margin-bottom: 20px;">Comic Detail</h1>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $komik['cover']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $komik['title']; ?></h5>
                            <p class="card-text"><b>Penulis : </b><?= $komik['writter']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Publisher : </b><?= $komik['publisher']; ?></small></p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            <a href="" class="btn btn-warning">Edit</a>
                            <a href="/comic/delete/<?= $komik['id_comic']; ?>" class="btn btn-danger">Delete</a>
                            <br><br>
                            <a href="/comic">Kembali Ke Daftar Komik</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>