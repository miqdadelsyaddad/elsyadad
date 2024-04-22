<br><Br>
<main id="main">
    <section id="contact" class="contact section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <p>Daftar Peminjaman</p>
            </div>
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>No.</th>
                                    <th>Nama Peminjam</th>
                                    <th>No. Warkah</th>
                                    <th>No. Hak</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Nama Petugas</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
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
                                                echo $row->statuspeminjaman
                                                ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="<?= base_url('home/peminjamandetail/' . $row->idpeminjaman) ?>">Detail</a>
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
        </div>
    </section>
</main>