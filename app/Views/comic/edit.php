<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-3" style="margin-bottom: 20px;">Ubah Data Komik</h2>
            <form action="/comic/update/<?= $comic['id_comic']; ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" id="" value="<?= $comic['slug']; ?>">
                <div class="form-group row">
                    <label for="inputTitle" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="inputTitle" name="title" placeholder="cth: naruto, slamdunk, dll" value="<?= $comic['title']; ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('title'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputWritter" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputWritter" name="writter" placeholder="cth: mashasi kishimoto, aoyama gosho, takehiko inoue" value="<?= $comic['writter']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPublisher" class="col-sm-2 col-form-label">Publisher</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputPublisher" name="publisher" placeholder="cth: garammedia, alex media tiviindo" value="<?= $comic['publisher']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputCover" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputCover" name="cover" placeholder="url to cover image" value="<?= $comic['cover']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>