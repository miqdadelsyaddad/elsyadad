<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-12 col-md-12">
          <div class="footer-info">
            <h3>I-WAK</h3>
            <p>
              Dibuat Oleh :<br>
              <br><br>
              <strong>Miqdad El Syaddad</strong>

            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">

    </div>
  </div>
</footer>

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="<?php echo base_url(); ?>assets_home/home/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?php echo base_url(); ?>assets_home/home/assets/vendor/aos/aos.js"></script>
<script src="<?php echo base_url(); ?>assets_home/home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets_home/home/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets_home/home/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets_home/home/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets_home/home/assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo base_url(); ?>assets_home/home/assets/js/main.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
  const flashDataAlert = $('.flash-data-alert').data('flashdata');
  // console.log(flashData);
  if (flashDataAlert) {
    Swal.fire({
      // position: 'top-end',
      title: '',
      text: '' + flashDataAlert,
      icon: 'info',
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
        confirmButton: 'btn btn-success',
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
</script>
<script type="text/javascript">
  $(".button-collapse").sideNav();
  $(".modal").modal();

  $(document).ready(function() {

    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $('.back-top').fadeIn();
      } else {
        $('.back-top').fadeOut();
      }
    });
    $('.back-top').click(function() {
      $("html, body").animate({
        scrollTop: 0
      }, 600);
      return false;
    });
  });
</script>
<!-- Google Map APi
		============================================ -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwIQh7LGryQdDDi-A603lR8NqiF3R_ycA"></script>
<script>
  function initialize() {
    var mapOptions = {
      zoom: 15,

      scrollwheel: false,
      center: new google.maps.LatLng(-7.3929748, 109.3480009),

    };
    var map = new google.maps.Map(document.getElementById('contact_map_area'),
      mapOptions);
    var marker = new google.maps.Marker({
      position: map.getCenter(),
      icon: '<?php echo base_url(); ?>assets_home/img/map_pin.png',
      map: map,

    });

  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>

<script>
  feather.replace({
    'aria-hidden': 'true'
  });
  $(".togglePassword").click(function(e) {
    e.preventDefault();
    var type = $(this).parent().parent().find(".password").attr("type");
    console.log(type);
    if (type == "password") {
      $("svg.feather.feather-eye").replaceWith(feather.icons["eye-off"].toSvg());
      $(this).parent().parent().find(".password").attr("type", "text");
    } else if (type == "text") {
      $("svg.feather.feather-eye-off").replaceWith(feather.icons["eye"].toSvg());
      $(this).parent().parent().find(".password").attr("type", "password");
    }
  });
</script>

</body>

</html>