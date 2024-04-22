<div class="gap no-gap">
  <div class="inner-bg">
    <div class="element-title">
      <h4>Edit Warkah </h4>
      <br>
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="warkah_id" value="<?php echo $warkahid['warkah_id']; ?>">
        <div class="add-prod-from">
          <div class="row">
            <div class="col-md-12">
              <label>No. Warkah</label>
              <br>
              <input type="text" name="nowarkah" value="<?php echo $warkahid['nowarkah']; ?>" placeholder="" required>
              <small class="text-danger"><?php echo form_error('nowarkah'); ?></small>
            </div>
            <div class="col-md-12">
              <label>No. Hak</label>
              <br>
              <input type="text" name="nohak" value="<?php echo $warkahid['nohak']; ?>" placeholder="" required>
              <small class="text-danger"><?php echo form_error('nohak'); ?></small>
            </div>
            <div class="col-md-12">
              <label>Tahun</label>
              <br>
              <select name="tahun" value="<?php echo set_value('tahun'); ?>" placeholder="" required>
                <?php
                $nomor = 1;
                $tahunawal = 1975;
                $tahunakhir = date('Y');
                while ($tahunakhir >= $tahunawal) {
                ?>
                  <option <?php if ($warkahid['tahun'] == $tahunakhir) echo 'selected'; ?> value="<?= $tahunakhir ?>"><?= $tahunakhir ?></option>
                <?php
                  $tahunakhir = $tahunakhir - 1;
                } ?>
              </select>
              <small class="text-danger"><?php echo form_error('tahun'); ?></small>
            </div>
            <div class="col-md-12">
              <label>Jenis</label>
              <br>
              <input type="text" name="jenis" value="<?php echo $warkahid['jenis']; ?>" placeholder="" required>
              <small class="text-danger"><?php echo form_error('jenis'); ?></small>
            </div>
            <div class="col-md-12">
              <label>Nama Pemegang Hak</label>
              <br>
              <input type="text" name="namapemeganghak" value="<?php echo $warkahid['namapemeganghak']; ?>" placeholder="" required>
              <small class="text-danger"><?php echo form_error('namapemeganghak'); ?></small>
            </div>
            <div class="col-md-12">
              <label>Kecamatan</label>
              <br>
              <input type="text" name="kecamatan" value="<?php echo $warkahid['kecamatan']; ?>" placeholder="" required>
              <small class="text-danger"><?php echo form_error('kecamatan'); ?></small>
            </div>
            <div class="col-md-12">
              <label>Kabupaten / Kota</label>
              <br>
              <input type="text" name="kota" value="<?php echo $warkahid['kota']; ?>" placeholder="" required>
              <small class="text-danger"><?php echo form_error('kota'); ?></small>
            </div>
            <div class="col-md-12">
              <div class="buttonz">
                <button type="submit">Simpan</button>
                <button onclick="goBack()">Batal</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>