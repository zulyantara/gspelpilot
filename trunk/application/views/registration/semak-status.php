<div class="container">
<div class="row">
                <div class="col-lg-12 text-center">

                    <!--span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span-->
                    <h4 class="service-heading">Semak Status</h4>
					<?php if($row_data['message']!=''){ ?>
					<form action="/registration/closesemakstatus" method="post">
					<div style="font-weight:bold"><?php echo "<br><br>".$row_data['message'];?></div>
					<br><input type="submit" name="back" value="Tutup" class="btn btn-primary btn-lg">
					</form>
					<?php }else{?>
                    <p class="text-muted">Masukkan no. ID Pengenalan kemudian klik butang 'Semak' untuk membuat semakan status permohonan dan mencetak surat-surat berkaitan.</p>
					<table width="50%" align="center">
					<tr><td>
					<form action="/registration/semakstatus" method="post">
					No. ID Pengenalan: <input type="text" name="idpengenalan" class="form-control"><br>
					<input type="submit" name="submit" value="Semak" class="btn btn-primary btn-lg">
					</form>
					</td></tr></table>
					<?php } ?>
                </div>
</div>
</div>				