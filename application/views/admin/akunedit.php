<div class="gap no-gap">
    <div class="inner-bg">
        <div class="element-title">
            <h4><?php echo $title; ?></h4>
            <br>
            <form action="<?= base_url('admin/akunedit/' . $akun->user_id) ?>" method="post" enctype="multipart/form-data">

                <div class="add-prod-from">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama</label>
                            <input type="text" name="nama" autofocus="" required value="<?= $akun->user_nama ?>" />
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Kelamin</label>
                            <select type="text" name="jeniskelamin" class="form-control" autofocus="" required>
                                <option <?php if ($akun->jeniskelamin == 'Laki - Laki') echo 'selected'; ?> value="Laki - Laki">Laki - Laki</option>
                                <option <?php if ($akun->jeniskelamin == 'Perempuan') echo 'selected'; ?> value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>No. HP</label>
                            <input type="text" name="nohp" autofocus="" required value="<?= $akun->nohp ?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" />
                        </div>
                        <div class="col-md-12">
                            <label>Alamat</label>
                            <textarea type="text" name="alamat" autofocus="" rows="3" required value="<?= $akun->alamat ?>"><?= $akun->alamat ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="text" name="email" required value="<?= $akun->user_email ?>" />
                        </div>
                        <div class="col-md-6">
                            <label>Password</label>
                            <input type="text" name="password" />
                            <input type="hidden" name="passwordlama" value="<?= $akun->user_sandi ?>" />
                            <span class="text-danger">Kosongkan jika tidak ingin mengganti password</span>
                        </div>
                        <div class="col-md-12">
                            <div class="buttonz">
                                <button type="submit">Simpan</button>
                                <button type="button" onclick="goBack()">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>