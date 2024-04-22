<br><Br>
<main id="main">
    <section id="contact" class="contact section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <p>Daftar Pengembalian</p>
            </div>
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
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
                                            <td><a href="<?= base_url('home/peminjamandetail/' . $row->idpeminjaman) ?>" class="text-primary"><?= $row->nowarkah ?></a></td>
                                            <td><?= tgl_indo($row->tanggalpeminjaman) ?></td>
                                            <td><?= tgl_indo($row->tanggalpengembalian) ?></td>
                                            <td><?= $row->namapetugaspengembalian ?></td>
                                            <td>
                                                <a class="btn btn-info" href="<?= base_url('home/pengembaliandetail/' . $row->idpengembalian) ?>">Detail</a>
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