<div class="gap inner-bg">
    <div class="element-title">
        <div class="table-styles">
            <div class="widget">
                <div class="table-responsive">
                    <table class="prj-tbl striped bordered table-responsive" id="myTable">
                        <thead class="">
                            <tr>
                                <th>No.</th>
                                <th>Nama Peminjam</th>
                                <th>No. Warkah</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Petugas Pengembalian</th>
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
                                    <td><a href="<?= base_url('admin/peminjamandetail/' . $row->idpeminjaman) ?>" class="text-primary"><?= $row->nowarkah ?></a></td>
                                    <td><?= tgl_indo($row->tanggalpeminjaman) ?></td>
                                    <td><?= tgl_indo($row->tanggalpengembalian) ?></td>
                                    <td><?= $row->namapetugaspengembalian ?></td>
                                    <td>
                                        <a class="btn btn-info m-1" href="<?= base_url('admin/pengembaliandetail/' . $row->idpengembalian) ?>">Detail</a>
                                        <a class="btn btn-danger m-1 bdel" href="<?= base_url('admin/pengembalianhapus/' . $row->idpengembalian . '/' . $row->idpeminjaman) ?>">Hapus</a>
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