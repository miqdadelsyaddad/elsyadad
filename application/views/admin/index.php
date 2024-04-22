<div class="content">
  <div class="row mb-3">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-body ">
          <center>
            <img src="<?= base_url('assets/') ?>selamatdatang.webp" width="50%">
          </center>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-md-4">
      <div class="card bg-success">
        <div class="card-body">
          <h3 class="text-white">Data Warkah</h3>
          <h2 class="text-white"><?= $totalwarkah ?></h2>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-info">
        <div class="card-body">
          <h3 class="text-white">Data Peminjaman</h3>
          <h2 class="text-white"><?= $totalpeminjaman ?></h2>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-danger">
        <div class="card-body">
          <h3 class="text-white">Data Akun</h3>
          <h2 class="text-white"><?= $totalakun ?></h2>
        </div>
      </div>
    </div>
  </div>
</div>