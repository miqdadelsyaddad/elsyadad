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
                                <td>Nama Petugas</td>
                                <td><?= $row->namapetugas ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <?php
                                    echo $row->statuspeminjaman
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            if ($row->statuspeminjaman == 'Belum Di Kembalikan') {
            ?>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Form Pengembalian</div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?= base_url('admin/peminjamandetail/' . $row->idpeminjaman) ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Tanggal Pengembalian</label>
                                        <input class="form-control" type="date" name="tanggalpengembalian" value="<?= date('Y-m-d') ?>" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nama Petugas</label><br>
                                        <input type="text" class="form-control" name="namapetugaspengembalian" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary float-right" type="submit" name="simpan" value="simpan">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>