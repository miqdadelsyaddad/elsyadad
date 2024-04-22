<style>
	.button-container {
		position: absolute;
		top: 70%;
		left: 50%;
		transform: translate(-50%, -50%);
	}

	.center-button {
		display: inline-block;
		padding: 10px 20px;
		background-color: #007bff;
		color: #fff;
		text-decoration: none;
		border-radius: 5px;
	}
</style>
<section id="hero">
	<div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
		<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
		<div class="carousel-inner" role="listbox">
			<img src="<?= base_url('assets/home.jpg') ?>" class="img-fluid" style="height: 800px;width:100%" alt="">
			<div class="button-container">
				<h3 class="text-white">Selamat Datang di I-WAK</h3>
			</div>
		</div>
	</div>
</section>