<div class="gap no-gap">
    <div class="inner-bg">
        <div class="element-title">
            <h4><?php echo $title; ?></h4>
            <br>
            <form action="<?= base_url('admin/penggunatambah') ?>" method="post" enctype="multipart/form-data">

                <div class="add-prod-from">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Pengguna</label>
                            <input type="text" name="admin_nama" value="<?php echo set_value('admin_nama'); ?>" placeholder="" required>
                            <small class="text-danger"><?php echo form_error('admin_nama'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label>Username Pengguna</label>
                            <input type="text" name="admin_username" value="<?php echo set_value('admin_username'); ?>" placeholder="" required>
                            <small class="text-danger"><?php echo form_error('admin_username'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label>Email Pengguna</label>
                            <input type="text" name="admin_email" value="<?php echo set_value('admin_email'); ?>" placeholder="" required>
                            <small class="text-danger"><?php echo form_error('admin_email'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label>No. HP Pengguna</label>
                            <input type="text" name="nohp" value="<?php echo set_value('nohp'); ?>" placeholder="" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
                            <small class="text-danger"><?php echo form_error('nohp'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label>Password Pengguna</label>
                            <input type="text" name="admin_sandi" value="<?php echo set_value('admin_sandi'); ?>" placeholder="" required>
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