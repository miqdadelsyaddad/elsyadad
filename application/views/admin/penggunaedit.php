<div class="gap no-gap">
    <div class="inner-bg">
        <div class="element-title">
            <h4><?php echo $title; ?></h4>
            <br>
            <form action="<?= base_url('admin/penggunaedit/' . $pengguna->admin_id) ?>" method="post" enctype="multipart/form-data">

                <div class="add-prod-from">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Pengguna</label>
                            <input type="text" name="admin_nama" value="<?php echo $pengguna->admin_nama; ?>" placeholder="" required>
                            <small class="text-danger"><?php echo form_error('admin_nama'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label>Username Pengguna</label>
                            <input type="text" name="admin_username" value="<?php echo $pengguna->admin_username; ?>" placeholder="" required>
                            <small class="text-danger"><?php echo form_error('admin_username'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label>Email Pengguna</label>
                            <input type="text" name="admin_email" value="<?php echo $pengguna->admin_email; ?>" placeholder="" required>
                            <small class="text-danger"><?php echo form_error('admin_email'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label>No. HP Pengguna</label>
                            <input type="text" name="nohp" value="<?php echo $pengguna->nohp; ?>" placeholder="" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
                            <small class="text-danger"><?php echo form_error('nohp'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label>Password Pengguna</label>
                            <input type="text" name="admin_sandi" value="" placeholder="">
                            <input type="hidden" name="passwordlama" value="<?php echo $pengguna->admin_sandi; ?>" placeholder="">
                            <span class="text-danger">Kosongkan jika tidak ingin mengganti password</span>
                            <small class="text-danger"><?php echo form_error('admin_sandi'); ?></small>
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