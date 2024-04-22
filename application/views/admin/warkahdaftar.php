<div class="gap inner-bg">
  <div class="element-title">
    <div class="table-styles">
      <?php if ($this->session->userdata('level') == 'Admin') { ?>
        <a href="<?php echo base_url(); ?>admin/warkahtambah" class="btn-st grn-clr"><i class="fa fa-plus"></i> Tambah Data</a>
      <?php } ?>
      <div class="widget">
        <table class="prj-tbl striped bordered table-responsive" id="myTable">
          <thead class="">
            <tr>
              <th><em>No</em></th>
              <th><em>No. Warkah </em></th>
              <th><em>No. Hak </em></th>
              <th><em>Tahun</em></th>
              <th><em>Jenis</em></th>
              <th><em>Nama Pemegang Hak</em></th>
              <th><em>Kecamatan</em></th>
              <th><em>Kabupaten / Kota</em></th>
              <th><em>Status</em></th>
              <?php if ($this->session->userdata('level') == 'Admin') { ?>
                <th><em>Aksi</em></th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($warkah as $pro) : ?>
              <tr>
                <td><?php echo $i . '.'; ?></td>
                <td><span><?php echo $pro['nowarkah']; ?></span></td>
                <td><span><?php echo $pro['nohak']; ?></span></td>
                <td><span><?php echo $pro['tahun']; ?></span></td>
                <td><span><?php echo $pro['jenis']; ?></span></td>
                <td><span><?php echo $pro['namapemeganghak']; ?></span></td>
                <td><span><?php echo $pro['kecamatan']; ?></span></td>
                <td><span><?php echo $pro['kota']; ?></span></td>
                <td>
                  <span>
                    <?php
                    $cekpeminjaman = $this->db->where('warkah_id', $pro['warkah_id'])->where('statuspeminjaman', 'Belum Di Kembalikan')->get('tb_peminjaman')->num_rows();
                    if ($cekpeminjaman >= 1) {
                      echo 'Belum Di Kembalikan';
                    } else {
                      echo 'Sudah Di Kembalikan';
                    }
                    ?>
                  </span>
                </td>
                <?php if ($this->session->userdata('level') == 'Admin') { ?>
                  <td>
                    <a href="<?php echo base_url(); ?>admin/warkahedit/<?php echo $pro['warkah_id']; ?>" class="btn-st drk-blu-clr m-1"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url(); ?>admin/warkahhapus/<?php echo $pro['warkah_id']; ?>" class="btn-st rd-clr bdel m-1"><i class="fa fa-trash"></i></a>
                  </td>
                <?php } ?>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>