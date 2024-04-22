<div class="gap no-gap">
    <div class="inner-bg">
        <div class="element-title">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <form action="<?php echo base_url('admin/peminjamantambah'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label>Peminjam</label>
                            <select type="text" name="namapeminjam" class="form-control" required>
                                <option value="">Pilih Peminjam</option>
                                <?php
                                foreach ($akun as $dataakun) { ?>
                                    <option value="<?= $dataakun->user_nama ?>"><?= $dataakun->user_nama ?></option>
                                <?php } ?>
                            </select>
                            <small class="text-danger"><?php echo form_error('namapeminjam'); ?></small>
                        </div>
                        <div class="form-group mb-3">
                            <label>Warkah</label>
                            <select name="warkah_id" class="form-control" required>
                                <option value="">Pilih Warkah</option>
                                <?php
                                foreach ($warkah as $rowwarkah) { ?>
                                    <?php
                                    $cekpeminjaman = $this->db->where('warkah_id', $rowwarkah->warkah_id)->where('statuspeminjaman', 'Belum Di Kembalikan')->get('tb_peminjaman')->num_rows();
                                    if ($cekpeminjaman >= 1) {
                                    ?>

                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?= $rowwarkah->warkah_id ?>"><?= $rowwarkah->nowarkah ?></option>
                                    <?php
                                    }
                                    ?>
                                <?php } ?>
                            </select>
                            <small class="text-danger"><?php echo form_error('namapeminjam'); ?></small>
                        </div>
                        <div class="form-group mb-3">
                            <label>No. Hak</label>
                            <input type="text" name="nohak" value="<?php echo set_value('nohak'); ?>" class="form-control" required>
                            <small class="text-danger"><?php echo form_error('nohak'); ?></small>
                        </div>
                        <div class="form-group mb-3">
                            <label>Tanggal Peminjaman</label><br>
                            <input type="date" class="form-control" name="tanggalpeminjaman" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Nama Petugas</label><br>
                            <input type="text" class="form-control" name="namapetugas" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>