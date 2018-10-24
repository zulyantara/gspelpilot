<div class="card">
    <h3 class="card-header">SENARAI SEMAK</h3>
	<div class="card-block">
    	<div class="row">
    		<div class="col-md-4">1. Butir Peribadi</div>
    		<div class="col-md-4">&nbsp;</div>
    		<div class="col-md-4">
    			<?php 
    			echo ($data['checkArr'][0]['permohonan_butir_peribadi']>0)? 'Ok' : '<font color="red">Not Ok</font>'; 
    			$chk1 = ($data['checkArr'][0]['permohonan_butir_peribadi']>0)? 'checked' : '';
    			?>
    			<input type="checkbox" id="myCheckBox" name="chk1" style="visibility:hidden" <?php echo $chk1; ?> />
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-4">2. Maklumat Am</div>
    		<div class="col-md-4">&nbsp;</div>
    		<div class="col-md-4">
    			<?php 
    			echo ($data['checkArr'][1]['permohonan_maklumat_am']>0)? 'Ok' : '<font color="red">Not Ok</font>'; 
    			$chk2 = ($data['checkArr'][1]['permohonan_maklumat_am']>0)? 'checked' : '';
    			?>
    			<input type="checkbox" id="myCheckBox" name="chk2" style="visibility:hidden" <?php echo $chk2; ?> />
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-4">3. Kursus Pilihan</div>
    		<div class="col-md-4">&nbsp;</div>
    		<div class="col-md-4">
    			<?php 
    			echo ($data['checkArr'][2]['permohonan_kursus']>0)? 'Ok' : '<font color="red">Not Ok</font>'; 
    			$chk3 = ($data['checkArr'][2]['permohonan_kursus']>0)? 'checked' : '';
    			?>
    			<input type="checkbox" id="myCheckBox" name="chk3" style="visibility:hidden" <?php echo $chk3; ?> />
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-4">4. Maklumat Penjaga</div>
    		<div class="col-md-4">&nbsp;</div>
    		<div class="col-md-4">
    			<?php 
    			echo ($data['checkArr'][3]['permohonan_penjaga']>0)? 'Ok' : '<font color="red">Not Ok</font>'; 
    			$chk4 = ($data['checkArr'][3]['permohonan_penjaga']>0)? 'checked' : '';
    			?>
    			<input type="checkbox" id="myCheckBox" name="chk4" style="visibility:hidden"<?php echo $chk4; ?> />
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-4">5. Tempat Tinggal</div>
    		<div class="col-md-4">&nbsp;</div>
    		<div class="col-md-4">
    			<?php 
    			echo ($data['checkArr'][4]['permohonan_tempat_tinggal']>0)? 'Ok' : '<font color="red">Not Ok</font>'; 
    			$chk5 = ($data['checkArr'][4]['permohonan_tempat_tinggal']>0)? 'checked' : '';
    			?>
    			<input type="checkbox" id="myCheckBox" name="chk5" onclick="checkVal();" style="visibility:hidden" <?php echo $chk5; ?> />
    		</div>
    	</div>
	</div>
    <h3 class="card-header">PENGAKUAN</h3>
	<div class="card-block">
		<style>
			.ftitle-left { visibility:hidden; }	
			/* .small-loading { visibility:hidden; } */
		</style>
		<?php echo $output; ?>
		<!-- div id="testing"></div -->
	</div>
</div>
		<script>
			$(document).ready(function(){
				$('#btnaction').append('<button disabled id="btnext" type="button" class="btn btn-large btn-primary" onclick="return custom_next()">Hantar Permohonan</button>');
			
				var countChecked = function() {
					var sub = document.getElementById("btnext");
					var n = $( "#myCheckBox:checked" ).length;
					// $( "div#testing" ).text( n + (n === 1 ? " is" : " are") + " checked!" );
					if (n>6) {
						sub.disabled = false;
					} else {
						sub.disabled = true;
					}
				};
				countChecked();
				$( "input[type=checkbox]" ).on( "click", countChecked );

			});
			
			function custom_next() {
				window.location.href = "<?php echo site_url('screen_lapan/'); ?>";
			}
			
		</script>

