<!-- Important Owl stylesheet -->
<link rel="stylesheet" href="<?= asset_url();?>plugins/slider/owl-carousel/owl.carousel.css">
 
<!-- Default Theme -->
<link rel="stylesheet" href="<?= asset_url();?>plugins/slider/owl-carousel/owl.theme.css">
 

 
<!-- Include js plugin -->
<script src="<?= asset_url();?>plugins/slider/owl-carousel/owl.carousel.js"></script>
<script>
$(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      autoPlay: 3000, //Set AutoPlay to 3 seconds
 
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
 
  });
 
});
</script>

<div class="container">


<div id="owl-demo">
          
  <div class="item"><img src="<?= asset_url();?>images/cover/1.jpg" alt="Owl Image"></div>
  <div class="item"><img src="<?= asset_url();?>images/cover/2.jpg" alt="Owl Image"></div>
  <div class="item"><img src="<?= asset_url();?>images/cover/3.jpg" alt="Owl Image"></div>
  <div class="item"><img src="<?= asset_url();?>images/cover/4.jpg" alt="Owl Image"></div>
  <div class="item"><img src="<?= asset_url();?>images/cover/5.jpg" alt="Owl Image"></div>
  <div class="item"><img src="<?= asset_url();?>images/cover/6.jpg" alt="Owl Image"></div>
  <div class="item"><img src="<?= asset_url();?>images/cover/7.jpg" alt="Owl Image"></div>
  <div class="item"><img src="<?= asset_url();?>images/cover/8.jpg" alt="Owl Image"></div>
  <!--div class="item"><img src="<?php //echo asset_url();?>images/cover/9.jpg" alt="Owl Image"></div-->
 
</div>
                
				
				
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Selamat Datang</h2>
                    <h3 class="section-subheading text-muted">Sistem Pengurusan Pelatih GIATMARA</h3>
                </div>
            </div>
			
<div class="jumbotron">
  <h2>Pengumuman</h2>
  <p>Sebarang masalah berkaitan penggunaan GSPel, perlulah diadukan melalui sistem Helpdesk GSPel untuk tindakan susulan. Harap maklum.</p>
  <p><a class="btn btn-primary btn-lg" href="http://helpdesk.mmsc.com.my/">Helpdesk GSPel</a></p>
</div>

<div class="list-group col-md-6">
  <a href="http://gspelpilot.giatmara.edu.my/manualgspel.pdf" target="_blank" class="list-group-item">
    <h4 class="list-group-item-heading">Pautan Pantas</h4>
    <p class="list-group-item-text">Klik disini untuk muat turun Manual Pengguna GSPel.</p>
  </a>
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Carian Pelatih</h4>
    <p class="list-group-item-text">Klik disini ini untuk membuat semakan status pelatih GIATMARA.</p>
  </a>
</div>

<div class="well col-md-6">
<h4>Hubungi Kami</h4>
GIATMARA Sendirian Berhad</br> 
Wisma GIATMARA, No 39 & 41, Jalan Medan Tuanku, 50300 Kuala Lumpur. </br>
Tel: +603 - 2691 2690 </br>

</div>
</div>