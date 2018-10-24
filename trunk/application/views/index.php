<!-- Bootstrap CSS -->
<!-- jQuery first, then Bootstrap JS. -->
<!-- Nav tabs -->

<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Screen Dua</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#references" role="tab" data-toggle="tab">Screen Tiga</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#empat" role="tab" data-toggle="tab">Screen Empat</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#lima" role="tab" data-toggle="tab">Screen Lima</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#enam" role="tab" data-toggle="tab">Screen Enam</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#tujuh" role="tab" data-toggle="tab">Screen Tujuh</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#delapan" role="tab" data-toggle="tab">Screen Delapan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#sembilan" role="tab" data-toggle="tab">Screen Sembilan</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="profile">
        Home
    </div>
    <div role="tabpanel" class="tab-pane fade" id="buzz">
        Screen Dua
    </div>
    <div role="tabpanel" class="tab-pane fade in active" id="references">
        Screen Tiga
    </div>
    <div role="tabpanel" class="tab-pane fade" id="empat">
        Screen Empat
    </div>
    <div role="tabpanel" class="tab-pane fade" id="lima">
        Screen Lima
    </div>
    <div role="tabpanel" class="tab-pane fade" id="enam">
        Screen Enam
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tujuh">
        Screen Tujuh
    </div>
    <div role="tabpanel" class="tab-pane fade" id="delapan">
        Screen Delapan
    </div>
    <div role="tabpanel" class="tab-pane fade" id="sembilan">
        Screen Sembilan
    </div>
</div>

<script type="text/javascript">
    $("a[href='#buzz']").on('shown.bs.tab', function(e) {
      $("#buzz").load("<?php echo base_url("screen_dua")?>");
    });

    $("a[href='#references']").on('shown.bs.tab', function(e) {
      $("#references").load("<?php echo base_url("screen_tiga")?>");
    });

    $("a[href='#empat']").on('shown.bs.tab', function(e) {
      $("#empat").load("<?php echo base_url("screen_empat")?>");
    });

    $("a[href='#lima']").on('shown.bs.tab', function(e) {
      $("#lima").load("<?php echo base_url("screen_lima")?>");
    });

    $("a[href='#enam']").on('shown.bs.tab', function(e) {
      $("#enam").load("<?php echo base_url("screen_enam")?>");
    });

    $("a[href='#tujuh']").on('shown.bs.tab', function(e) {
      $("#tujuh").load("<?php echo base_url("screen_tujuh")?>");
    });

    $("a[href='#delapan']").on('shown.bs.tab', function(e) {
      $("#delapan").load("<?php echo base_url("screen_lapan")?>");
    });

    $("a[href='#sembilan']").on('shown.bs.tab', function(e) {
      $("#sembilan").load("<?php echo base_url("screen_sembilan")?>");
    });
</script>
