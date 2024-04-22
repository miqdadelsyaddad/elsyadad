</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
<script src="<?php echo base_url(); ?>assets_admin/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/echart.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/chat-init.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/flatweather.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/html5lightbox.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/custom.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.js"></script>
<script src="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.buttons.js"></script>
<script src="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.nonblock.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<script>
  $(document).ready(function() {
    $(".selectcari").select2({
      // dropdownParent: $(".modal"),
      theme: "bootstrap4",
      width: 'style',
      allowClear: true
    });
    document.addEventListener("trix-before-initialize", () => {
  // Change Trix.config if you need
})
  });
  $(document).ready(function() {
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if (month < 10)
      month = '0' + month.toString();
    if (day < 10)
      day = '0' + day.toString();

    var minDate = year + '-' + month + '-' + day;

    $('#tanggalsebelum').attr('min', minDate);
  });
</script>
<script>
  $(document).ready(function() {
    // $('#myTable').DataTable();
    $('#myTable').DataTable({
      scrollY: '500px',
      scrollCollapse: true,
      // paging: false,
    });
  });
</script>
<script src="<?php echo base_url(); ?>assets_admin/js/peity-circle.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/custom2.js"></script>
<script src="<?php echo base_url(); ?>assets_home/js/sweetalert2.all.min.js"></script>
<script>
  const flashData = $('.flash-data').data('flashdata');
  // console.log(flashData);
  if (flashData) {
    Swal.fire({
      // position: 'top-end',
      title: 'Berhasil !',
      text: '' + flashData,
      icon: 'success',
      showConfirmButton: false,
      timer: 3500
    });
  }
</script>
<script>
  const flashDataError = $('.flash-data-error').data('flashdata');
  // console.log(flashData);
  if (flashDataError) {
    Swal.fire({
      // position: 'top-end',
      title: 'Gagal !',
      text: '' + flashDataError,
      icon: 'error',
      showConfirmButton: false,
      timer: 3500
    });
  }
</script>
<script>
  $('.bdel').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success m-3',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
      // position: 'top-end',
      title: 'Yakin data ini akan dihapus?',
      text: "Data tidak akan bisa dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, Hapus!',
      cancelButtonText: 'Batal',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          '',
          'error'
        )
      }
    });
  });
</script>
<script>
  function goBack() {
    window.history.back();
  }

  function addlist(obj, out) {
    var grup = obj.form[obj.name];
    var len = grup.length;
    var list = new Array();

    if (len > 1) {
      for (var i = 0; i < len; i++) {
        if (grup[i].checked) {
          list[list.length] = grup[i].value;
        }
      }
    } else {
      if (grup.checked) {
        list[list.length] = grup.value;
      }
    }

    document.getElementById(out).value = list.join(', ');

    return;
  }
</script>
<script>
  $(document).ready(function() {
    $('#tabel').DataTable();
  });
</script>
</body>

</html>