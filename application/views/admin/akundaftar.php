<div class="gap inner-bg">
  <div class="element-title">
    <div class="table-styles">
      <a href="<?= base_url('admin/akuntambah') ?>" class="btn-st grn-clr"><i class="fa fa-plus"></i> Tambah Akun Pegawai</a>
      <div class="widget">
        <div class="table-responsive">
          <div class="tableFixHead">
            <table class="prj-tbl striped bordered table-responsive" id="myTable">
              <thead class="">
                <tr>
                  <th><em>No</em></th>
                  <th><em>Nama</em></th>
                  <th><em>Alamat</em></th>
                  <th><em>No. HP</em></th>
                  <th><em>Email</em></th>
                  <th><em>Opsi</em></th>
                </tr>
              </thead>
              <tbody style="overflow-y: auto;">
                <?php $i = 1; ?>
                <?php foreach ($akun as $pro) : ?>
                  <tr>
                    <td><?php echo $i . '.'; ?></td>
                    <td><span><?php echo $pro['user_nama']; ?></span></td>
                    <td><span><?php echo $pro['alamat']; ?></span></td>
                    <td><span><?php echo $pro['nohp']; ?></span></td>
                    <td><i><?php echo $pro['user_email']; ?></i></td>
                    <td>
                      <a href="<?php echo base_url(); ?>admin/akunedit/<?php echo $pro['user_id']; ?>" class="btn-st drk-blu-clr m-1" data-toggle="tooltip" data-placement="top" title="Edit Akun"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo base_url(); ?>admin/akunhapus/<?php echo $pro['user_id']; ?>" class="btn-st rd-clr bdel m-1" data-toggle="tooltip" data-placement="top" title="Hapus Akun"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>