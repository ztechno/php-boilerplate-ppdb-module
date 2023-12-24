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
                            <label for="" class="mb-1 fw-bolder">PIN</label>
                            <input type="text" name="PIN" class="form-control" placeholder="PIN">
                        </div>

                        <button class="btn btn-primary btn-block w-100">Submit</button>

                        <div class="text-center mt-3">
                            <span>Belum memiliki PIN ? Silahkan mendaftar terlebih dahulu <a href="<?=routeTo('/')?>">disini</a></span>
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