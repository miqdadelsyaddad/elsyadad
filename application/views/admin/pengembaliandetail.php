<div class="gap no-gap">
    <div class="inner-bg">
        <div class="element-title">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Nama Peminjam</td>
                                <td><?= $row->namapeminjam ?></td>
                            </tr>
                            <tr>
                                <td>No. Warkah</td>
                                <td><a href="<?= base_url('admin/warkahdetail/' . $row->warkah_id) ?>" class="text-primary"><?= $row->nowarkah ?></a></td>
                            </tr>
                            <tr>
                                <td>No. Hak</td>
                                <td><?= $row->nohak ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Peminjaman</td>
                                <td><?= tgl_indo($row->tanggalpeminjaman) ?></td>
                            </tr>
                            <tr>
                                <td>Nama Petugas Peminjaman</td>
                                <td><?= $row->namapetugas ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Pengembalian</td>
                                <td><?= tgl_indo($row->tanggalpengembalian) ?></td>
                            </tr>
                            <tr>
                                <td>Nama Petugas Pengembalian</td>
                                <td><?= $row->namapetugaspengembalian ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>