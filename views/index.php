<?= loadFile('../modules/ppdb/views/layouts/header.php') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-xl-6 col-md-8 col-sm-10 mx-auto">
            <div class="card p-lg-5 p-sm-2">
                <div class="card-body">

                    <?php if ($success_msg) : ?>
                    <div class="alert alert-success"><?= $success_msg ?></div>
                    <?php endif ?>

                    <?php if($error_msg): ?>
                    <div class="alert alert-danger"><?=$error_msg?></div>
                    <?php endif ?>

                    <center>
                        <img src="<?=asset('assets/ppdb/images/logo-lpis-alazhar.png')?>" alt="" width="150px">
                    </center>

                    <h3 class="card-title text-center">Pendaftaran PPDB Al-Azhar Blitar</h3>

                    <form action="" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1 fw-bolder">Nama Pendaftar (Orang Tua / Wali)</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Pendaftar (Orang Tua / Wali)" value="<?= isset($old['name']) ? $old['name'] : ''?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1 fw-bolder">No. WA</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    62
                                </div>
                                <input type="tel" name="phone" class="form-control" placeholder="8123xxxxxx" value="<?= isset($old['phone']) ? $old['phone'] : ''?>">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1 fw-bolder">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="nama@mail.com" value="<?= isset($old['email']) ? $old['email'] : ''?>">
                        </div>

                        <button class="btn btn-primary btn-block w-100">Submit</button>

                        <div class="text-center mt-3">
                            <span>Sudah mendaftar ? <br> Silahkan isi formulir atau cek status pendaftaran <a href="<?=routeTo('ppdb/check')?>">disini</a></span>
                        </div>
                    </form>

                    <div class="mt-5">
                        <center>
                            copyright &copy; 2024 Al-Azhar Blitar
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= loadFile('../modules/ppdb/views/layouts/footer.php') ?>