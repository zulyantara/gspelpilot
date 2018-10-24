<?php
#echo current_url()."<br/>";
$nm_tab = $this->uri->segment('2');
if ($nm_tab === 'registration') $nm_tab = $this->uri->segment('3');
$nmykad = $this->uri->segment('4');
$nurl = "/mykad/".$nmykad;
if ($nmykad === 'mykad') {
	$nmykad = $this->uri->segment('5');
	$nurl = "/mykad/".$nmykad;
}
?>
<ul id="registration-step">
	<li id="butir-peribadi" <?php if ($nm_tab === 'butirperibadi') echo 'class="highlight"'; ?>>
		<?php
		if ($nm_tab === 'butirperibadi') echo 'Butir Peribadi';
		else echo "<a href='".$base_url."registration/butirperibadi".$nurl."'>Butir Peribadi</a>";
		?>
	</li>
	<?php if ($id_pbp) { ?>
	<li id="maklumat-am" <?php if ($nm_tab === 'maklumat') echo 'class="highlight"'; ?>>
		<?php
		if ($nm_tab === 'maklumat') echo 'Maklumat Am';
		else echo "<a href='".$base_url."registration/maklumat".$nurl."'>Maklumat Am</a>";
		?>
	</li>
	<li id="kursus-pilihan" <?php if ($nm_tab === 'kursus') echo 'class="highlight"'; ?>>
		<?php
		if ($nm_tab === 'kursus') echo 'Kursus Pilihan';
		else echo "<a href='".$base_url."registration/kursus".$nurl."'>Kursus Pilihan</a>";
		?>
		</li>
	<li id="maklumat-penjaga" <?php if ($nm_tab === 'penjaga') echo 'class="highlight"'; ?>>
		<?php
		if ($nm_tab === 'penjaga') echo 'Maklumat Penjaga';
		else echo "<a href='".$base_url."registration/penjaga".$nurl."'>Maklumat Penjaga</a>";
		?>
	</li>
	<li id="tempat-tinggal" <?php if ($nm_tab === 'tinggal') echo 'class="highlight"'; ?>>
		<?php
		if ($nm_tab === 'tinggal') echo 'Tempat Tinggal';
		else echo "<a href='".$base_url."registration/tinggal".$nurl."'>Tempat Tinggal</a>";
		?>
	</li>
	<li id="perakuan" <?php if ($nm_tab === 'perakuan') echo 'class="highlight"'; ?>>
		<?php
		if ($nm_tab === 'perakuan') echo 'Perakuan';
		else echo "<a href='".$base_url."registration/perakuan".$nurl."'>Perakuan</a>";
		?>

	</li>
	<?php } ?>
</ul>
