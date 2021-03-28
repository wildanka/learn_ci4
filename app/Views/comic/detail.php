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
                            <!-- by default, element form akan diperlakukan seperti block oleh form, maka kita haruss membuatnya menjadi inline agar button delete sejajar dengan edit -->
                            <form action="/comic/<?= $komik['id_comic']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" href="/comic/delete/<?= $komik['id_comic']; ?>" onclick="return confirm('apakah anda yakin akan menghapus komik dengan judul ini?');" class="btn btn-danger">Delete</button>
                            </form>

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