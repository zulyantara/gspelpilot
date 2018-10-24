<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Permohonan - <?php echo $butir_peribadi['no_rujukan_permohonan']; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/templates.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/custom-pdf.css">
</head>
<body>

<header class="clearfix">

    <div id="logo">
        <?php echo logo_pdf(); ?>
    </div>

    <div id="client">
    	&nbsp;
    </div>

    <div id="company">
        <div><b>No. Rujukan Permohonan : <?php echo $butir_peribadi['no_rujukan_permohonan']; ?></b></div>
    </div>
</header>

<main>
    <div class="invoice-details clearfix">
    	&nbsp;
    </div>

    <h1 class="invoice-title">A. Butir Peribadi</h1>
    <table class="item-table">
        <tbody>
		<tr>
			<td><strong>Nama Penuh</strong></td>
			<td colspan="3"><?php echo $butir_peribadi['nama_penuh']; ?></td>
		</tr>
		<tr>
			<td><strong>No. MyKAD</strong></td>
			<td><?php echo $butir_peribadi['no_mykad']; ?></td>
			<td><strong>Tarikh Lahir</strong></td>
			<td><?php echo $butir_peribadi['tarikh_lahir']; ?></td>
		</tr>
		<tr>
			<td><strong>Kewarganegaraan</strong></td>
			<td><?php echo $butir_peribadi['kewarganegaraan']; ?></td>
			<td><strong>Umur</strong></td>
			<td><?php echo $butir_peribadi['umur']; ?></td>
		</tr>
		<tr>
			<td><strong>Telefon</strong></td>
			<td><?php echo $butir_peribadi['no_telefon']; ?></td>
			<td><strong>HP</strong></td>
			<td><?php echo $butir_peribadi['no_hp']; ?></td>
		</tr>
		<tr>
			<td><strong>Alamat</strong></td>
			<td colspan="3"><?php echo $butir_peribadi['alamat']; ?></td>
		</tr>
		<tr>
			<td><strong>Poskod</strong></td>
			<td><?php echo $butir_peribadi['poskod']; ?></td>
			<td><strong>Emel</strong></td>
			<td><?php echo $butir_peribadi['emel']; ?></td>
		</tr>
		<tr>
			<td><strong>Bangsa</strong></td>
			<td><?php echo $butir_peribadi['bangsa']; ?></td>
			<td><strong>Etnik</strong></td>
			<td><?php echo $butir_peribadi['etnik']; ?></td>
		</tr>
		<tr>
			<td><strong>Agama</strong></td>
			<td><?php echo $butir_peribadi['agama']; ?></td>
			<td><strong>Taraf Perkahwinan</strong></td>
			<td><?php echo $butir_peribadi['taraf_perkahwinan']; ?></td>
		</tr>
		<tr>
			<td><strong>Kategori Kelulusan</strong></td>
			<td><?php echo $butir_peribadi['kategori_kelulusan']; ?></td>
			<td><strong>Kelulusan</strong></td>
			<td><?php echo $butir_peribadi['kelulusan']; ?></td>
		</tr>
		<tr>
			<td><strong>Matlamat</strong></td>
			<td><?php echo $butir_peribadi['matlamat']; ?></td>
			<td><strong>Kategori Pemohon</strong></td>
			<td><?php echo $butir_peribadi['kategori_pemohon']; ?></td>
		</tr>
        </tbody>
    </table>

    <h1 class="invoice-title">B. Maklumat Am</h1>
    <table class="item-table">
        <thead>
		<tr><th colspan="4" class="item-name">Sumber Informasi Kursus</th></tr>
		</thead>

        <tbody>
    	<tr><td colspan="4">
    		<?php
    		if ($maklumat_am['media_cetak']) echo "<li>Media Cetak</li>";
    		if ($maklumat_am['media_elektronik']) echo "<li>Media Elektronik</li>";
    		if ($maklumat_am['internet']) echo "<li>Internet</li>";
    		if ($maklumat_am['media_sosial']) echo "<li>Media Sosial</li>";
    		if ($maklumat_am['rakan']) echo "<li>Rakan</li>";
    		if ($maklumat_am['keluarga']) echo "<li>Keluarga</li>";
    		if ($maklumat_am['pameran']) echo "<li>Pameran</li>";
    		if ($maklumat_am['lain']) echo "<li>".$maklumat_am['lain']."</li>";
    		?>
    	</td></tr>
        </tbody>
    </table>

    <h1 class="invoice-title">C. Kursus Pilihan</h1>
    <table class="item-table">
        <thead>
		<tr>
			<th class="item-name">Kursus</th>
			<th class="item-name">Kluster</th>
		</tr>
		</thead>
        <tbody>
        	<?php if ($kursus['kursus1']!='') {?>
        	<tr>
        		<td><?php echo "(".$kursus['b1_kod1'].") ".$kursus['b1_nama']; ?></td>
        		<td><?php echo "(".$kursus['b11_kod'].") ".$kursus['b11_nama']; ?></td>
        	</tr>
        	<?php } ?>
        	<?php if ($kursus['kursus2']!='') {?>
        	<tr>
        		<td><?php echo "(".$kursus['c1_kod1'].") ".$kursus['c1_nama']; ?></td>
        		<td><?php echo "(".$kursus['c11_kod'].") ".$kursus['c11_nama']; ?></td>
        	</tr>
        	<?php } ?>
        	<?php if ($kursus['kursus3']!='') {?>
        	<tr>
        		<td><?php echo "(".$kursus['d1_kod1'].") ".$kursus['d1_nama']; ?></td>
        		<td><?php echo "(".$kursus['d11_kod'].") ".$kursus['d11_nama']; ?></td>
        	</tr>
        	<?php } ?>
        </tbody>
    </table>

    <h1 class="invoice-title">D. Maklumat Penjaga</h1>
    <table class="item-table">
        <thead>
			<tr><th colspan="4" class="item-name">Penjaga/Waris</th></tr>
		</thead>
		<tbody>

		</tbody>

        <thead>
			<tr><th colspan="4" class="item-name">Ibu Bapa</th></tr>
		</thead>
		<tbody>

		</tbody>
	</table>

</main>

<footer>

</footer>

</body>
</html>
