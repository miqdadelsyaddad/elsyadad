<br><Br>
<main id="main">
    <section id="contact" class="contact section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <p>Detail Warkah</p>
            </div>
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>No. Warkah</td>
                                        <td><?= $row->nowarkah ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Hak</td>
                                        <td><?= $row->nohak ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tahun</td>
                                        <td><?= $row->tahun ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis</td>
                                        <td><?= $row->jenis ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pemegang Hak</td>
                                        <td><?= $row->namapemeganghak ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td><?= $row->kecamatan ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kota</td>
                                        <td><?= $row->kota ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <?php
                                            $cekpeminjaman = $this->db->where('warkah_id', $row->warkah_id)->where('statuspeminjaman', 'Belum Di Kembalikan')->get('tb_peminjaman')->num_rows();
                                            if ($cekpeminjaman >= 1) {
                                                echo 'Belum Di Kembalikan';
                                            } else {
                                                echo 'Sudah Di Kembalikan';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>