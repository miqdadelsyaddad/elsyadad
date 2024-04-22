<div class="gap inner-bg">
    <div class="element-title">
        <div class="table-styles">

            <a href="<?php echo base_url(); ?>admin/penggunatambah" class="btn-st grn-clr"><i class="fa fa-plus"></i> Tambah Pengguna</a>
            <div class="widget">
                <div class="table-responsive">
                    <table class="prj-tbl striped bordered table-responsive" id="myTable">
                        <thead class="">
                            <tr>
                                <th><em>No</em></th>
                                <th><em>Nama</em></th>
                                <th><em>Email</em></th>
                                <th><em>No. HP</em></th>
                                <th><em>Username</em></th>
                                <th><em>Level</em></th>
                                <th><em>Opsi</em></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pengguna as $pro) : ?>
                                <tr>
                                    <td><?php echo $i . '.'; ?></td>
                                    <td><span><?php echo $pro['admin_nama']; ?></span></td>
                                    <td><i><?php echo $pro['admin_email']; ?></i></td>
                                    <td><i><?php echo $pro['nohp']; ?></i></td>
                                    <td><i><?php echo $pro['admin_username']; ?></i></td>
                                    <td><?= $pro['level'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>admin/penggunaedit/<?php echo $pro['admin_id']; ?>" class="btn-st drk-blu-clr"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url(); ?>admin/penggunahapus/<?php echo $pro['admin_id']; ?>" class="btn-st rd-clr bdel">Hapus</a>
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