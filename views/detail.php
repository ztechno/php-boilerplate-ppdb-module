<?= loadFile('../modules/ppdb/views/layouts/header.php') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-xl-8 col-md-10 col-12 mx-auto">
            <div class="card p-lg-5 p-sm-2">
                <div class="card-body">

                    <center>
                        <img src="<?=asset('assets/ppdb/images/logo-lpis-alazhar.png')?>" alt="" width="50px">
                    </center>

                    <h3 class="card-title text-center">Formulir PPDB Al-Azhar Blitar</h3>

                    <h4>Data Diri</h4>
                    
                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">NIK</label>
                        <input type="text" name="formulir[NIK]" class="form-control" placeholder="NIK" required value="<?=$data->formulir?$data->formulir->NIK:''?>">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">Nama Lengkap</label>
                        <input type="text" name="formulir[name]" class="form-control" placeholder="Nama Lengkap" required value="<?=$data->formulir?$data->formulir->name:''?>">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">Nama Panggilan</label>
                        <input type="text" name="formulir[nickname]" class="form-control" placeholder="Nama Panggilan" required value="<?=$data->formulir?$data->formulir->nickname:''?>">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">Jenis Kelamin</label>
                        <select name="formulir[gender]" id="" class="form-control" required>
                            <option <?=$data->formulir&&$data->formulir->gender == 'Laki-laki'?'selected=""':''?>>Laki-laki</option>
                            <option <?=$data->formulir&&$data->formulir->gender == 'Perempuan'?'selected=""':''?>>Perempuan</option>
                        </select>
                    </div>
                    
                    <div class="form-group mb-3 row">
                        <div class="col-12 col-sm-6">
                            <label for="" class="mb-1 fw-bolder">Tempat Lahir</label>
                            <input type="text" name="formulir[birthplace]" class="form-control" placeholder="Tempat Lahir" required value="<?=$data->formulir?$data->formulir->birthplace:''?>">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="" class="mb-1 fw-bolder">Tanggal Lahir</label>
                            <input type="date" name="formulir[birthdate]" class="form-control" placeholder="Tanggal Lahir" required value="<?=$data->formulir?$data->formulir->birthdate:''?>">
                        </div>
                    </div>

                    <hr>

                    <h4>Alamat / Tempat Tinggal</h4>
                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">Kabupaten / Kota</label>
                        <input type="text" name="formulir[district]" class="form-control" placeholder="Kabupaten / Kota" required value="<?=$data->formulir?$data->formulir->district:''?>">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">Kecamatan</label>
                        <input type="text" name="formulir[subdistrict]" class="form-control" placeholder="Kecamatan" required value="<?=$data->formulir?$data->formulir->subdistrict:''?>">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">Desa / Kelurahan</label>
                        <input type="text" name="formulir[village]" class="form-control" placeholder="Desa / Kelurahan" required value="<?=$data->formulir?$data->formulir->village:''?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">Alamat Lengkap</label>
                        <textarea name="formulir[address]" class="form-control" rows="5" placeholder="Alamat Lengkap" required><?=$data->formulir?$data->formulir->address:''?></textarea>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">Nomor Rumah</label>
                        <input type="text" name="metadata[house_number]" class="form-control" placeholder="Nomor Rumah" required value="<?=$data->formulir?$data->formulir->metadata->house_number:''?>">
                    </div>
                    
                    <div class="form-group mb-3 row">
                        <div class="col-12 col-md-6">
                            <label for="" class="mb-1 fw-bolder">RT</label>
                            <input type="text" name="metadata[RT]" class="form-control" placeholder="RT" required value="<?=$data->formulir?$data->formulir->metadata->RT:''?>">
                        </div>
                        
                        <div class="col-12 col-md-6">
                            <label for="" class="mb-1 fw-bolder">RW</label>
                            <input type="text" name="metadata[RW]" class="form-control" placeholder="RW" required value="<?=$data->formulir?$data->formulir->metadata->RW:''?>">
                        </div>
                    </div>

                    <hr>

                    <h4>Data Ayah</h4>
                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">NIK</label>
                        <input type="text" name="metadata[dad][NIK]" class="form-control" placeholder="NIK" required value="<?=$data->formulir?$data->formulir->metadata->dad->NIK:''?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">Nama Lengkap</label>
                        <input type="text" name="metadata[dad][name]" class="form-control" placeholder="Nama Lengkap" required value="<?=$data->formulir?$data->formulir->metadata->dad->name:''?>">
                    </div>
                    
                    <div class="form-group mb-3 row">
                        <div class="col-12 col-sm-6">
                            <label for="" class="mb-1 fw-bolder">Tempat Lahir</label>
                            <input type="text" name="metadata[dad][birthplace]" class="form-control" placeholder="Tempat Lahir" required value="<?=$data->formulir?$data->formulir->metadata->dad->birthplace:''?>">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="" class="mb-1 fw-bolder">Tanggal Lahir</label>
                            <input type="date" name="metadata[dad][birthdate]" class="form-control" placeholder="Tanggal Lahir" required value="<?=$data->formulir?$data->formulir->metadata->dad->birthdate:''?>">
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">No. HP</label>
                        <input type="tel" name="metadata[dad][phone]" class="form-control" placeholder="No HP" required value="<?=$data->formulir?$data->formulir->metadata->dad->phone:''?>">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">Pekerjaan</label>
                        <input type="text" name="metadata[dad][job]" class="form-control" placeholder="Pekerjaan" required value="<?=$data->formulir?$data->formulir->metadata->dad->job:''?>">
                    </div>

                    <hr>

                    <h4>Data Ibu</h4>
                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">NIK</label>
                        <input type="text" name="metadata[mom][NIK]" class="form-control" placeholder="NIK" required value="<?=$data->formulir?$data->formulir->metadata->mom->NIK:''?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">Nama Lengkap</label>
                        <input type="text" name="metadata[mom][name]" class="form-control" placeholder="Nama Lengkap" required value="<?=$data->formulir?$data->formulir->metadata->mom->name:''?>">
                    </div>
                    
                    <div class="form-group mb-3 row">
                        <div class="col-12 col-sm-6">
                            <label for="" class="mb-1 fw-bolder">Tempat Lahir</label>
                            <input type="text" name="metadata[mom][birthplace]" class="form-control" placeholder="Tempat Lahir" required value="<?=$data->formulir?$data->formulir->metadata->mom->birthplace:''?>">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="" class="mb-1 fw-bolder">Tanggal Lahir</label>
                            <input type="date" name="metadata[mom][birthdate]" class="form-control" placeholder="Tanggal Lahir" required value="<?=$data->formulir?$data->formulir->metadata->mom->birthdate:''?>">
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">No. HP</label>
                        <input type="tel" name="metadata[mom][phone]" class="form-control" placeholder="No HP" required value="<?=$data->formulir?$data->formulir->metadata->mom->phone:''?>">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="" class="mb-1 fw-bolder">Pekerjaan</label>
                        <input type="text" name="metadata[mom][job]" class="form-control" placeholder="Pekerjaan" required value="<?=$data->formulir?$data->formulir->metadata->mom->job:''?>">
                    </div>
                    
                    <div class="text-center">
                        <?php if($data->status == 'PEMBAYARAN FORMULIR DITERIMA'): ?>
                            <a href="<?=routeTo('ppdb/notif-test-schedule', ['id' => $data->id])?>" class="btn btn-primary" onclick="if(confirm('Apakah anda yakin akan mengirimkan jadwal observasi pada calon peserta didik ini ?')){return true}else{return false}">Kirim Notif Observasi</a>
                            <a href="<?=routeTo('ppdb/verified', ['id' => $data->id])?>" class="btn btn-primary" onclick="if(confirm('Apakah anda yakin akan memverifikasi data ini ?')){return true}else{return false}">Verifikasi Hasil Test</a>
                        <?php elseif($data->status == 'HASIL TES DALAM VERIFIKASI'): ?>
                        <a href="<?=routeTo('ppdb/accept', ['id' => $data->id])?>" class="btn btn-primary" onclick="if(confirm('Apakah anda yakin akan menerima calon peserta didik ini ?')){return true}else{return false}">Terima</a>
                        <?php endif ?>
                        &nbsp;
                        <a href="<?=routeTo('crud/index',['table' => 'formulirs', 'filter' => ['status' => 'send']])?>" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($data->formulir && $data->formulir->status == 'send'): ?>
<script>
document.querySelectorAll('input').forEach(el => {
    el.disabled = true
})

document.querySelectorAll('select').forEach(el => {
    el.disabled = true
})

document.querySelectorAll('textarea').forEach(el => {
    el.disabled = true
})
</script>
<?php endif ?>

<?= loadFile('../modules/ppdb/views/layouts/footer.php') ?>