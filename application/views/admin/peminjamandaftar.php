<div class="gap inner-bg">
    <div class="element-title">
        <div class="table-styles">
            <?php if ($this->session->userdata('level') == 'Admin') { ?>
                <a href="<?php echo base_url(); ?>admin/peminjamantambah" class="btn-st grn-clr"><i class="fa fa-plus"></i> Tambah Data</a>
            <?php } ?>
            <div class="widget">
                <div class="table-responsive">
                    <table class="prj-tbl striped bordered table-responsive" id="myTable">
                        <thead class="">
                            <tr>
                                <th>No.</th>
                                <th>Nama Peminjam</th>
                                <th>No. Warkah</th>
                                <th>No. Hak</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Nama Petugas</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($riwayat as $row) {
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row->namapeminjam ?></td>
                                    <td><?= $row->nowarkah ?></td>
                                    <td><?= $row->nohak ?></td>
                                    <td><?= tgl_indo($row->tanggalpeminjaman) ?></td>
                                    <td><?= $row->namapetugas ?></td>
                                    <td>
                                        <?php
                                        if ($row->statuspeminjaman == 'Belum Di Kembalikan') {
                                            $warna = "danger";
                                        } else {
                                            $warna = "success";
                                        }
                                        ?>
                                        <a class="btn btn-<?= $warna ?> m-1" href="<?= base_url('admin/peminjamandetail/' . $row->idpeminjaman) ?>">
                                            <?php
                                            echo $row->statuspeminjaman
                                            ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info m-1" href="<?= base_url('admin/peminjamandetail/' . $row->idpeminjaman) ?>">Detail</a>
                                        <a class="btn btn-danger m-1 bdel" href="<?= base_url('admin/peminjamanhapus/' . $row->idpeminjaman) ?>">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>