<div class="gap no-gap">
    <div class="inner-bg">
        <div class="element-title">
            <h4><?php echo $title; ?></h4>
            <br>
            <form action="<?= base_url('admin/akuntambah') ?>" method="post" enctype="multipart/form-data">

                <div class="add-prod-from">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama</label>
                            <input type="text" name="nama" autofocus="" required />
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Kelamin</label>
                            <select type="text" name="jeniskelamin" class="form-control" autofocus="" required>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>No. HP</label>
                            <input type="text" name="nohp" autofocus="" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" />
                        </div>
                        <div class="col-md-12">
                            <label>Alamat</label>
                            <textarea type="text" name="alamat" autofocus="" rows="3" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="text" name="email" required />
                        </div>
                        <div class="col-md-6">
                            <label>Password</label>
                            <input type="text" name="password" required />
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