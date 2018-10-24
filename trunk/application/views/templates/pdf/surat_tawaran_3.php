<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
      <br>
      <p>KETUA PEGAWAI EKSEKUTIF<br>
			GIATMARA Sendirian Berhad<br>
			Wisma GIATMARA<br>
			Jalan Medan Tuanku<br>
			50300 Kuala Lumpur<br><br></p>
			Tuan<br><br>
			<b>AKU JANJI PELATIH GIATMARA</b><br><br>
BAHAWASANYA SAYA, <b><?php echo $row_cetak->nama_penuh; ?> (<?php echo $row_cetak->no_mykad; ?>)</b> yang beralamat di <?php echo $row_cetak->alamat_permohonan_butir_peribadi.", ".$row_cetak->poskod." ".$row_cetak->bandar." ".$row_cetak->negeri_poskod; ?> bersetuju mengikuti latihan di <b>GIATMARA <?php echo $row_cetak->nama_giatmara; ?></b> (selepas ini disebut sebagai “GIATMARA”) dan mengakujanji mematuhi segala peraturan dan syarat-syarat seperti berikut:-
			<ol>
				<li style="text-align:justify">Akan mengikuti dan dengan sesungguhnya meneruskan latihan kemahiran dan menduduki semua ujian atau peperiksaan atau yang disyaratkan oleh GIATMARA dan akan menamatkan latihan kemahiran yang tersebut itu dalam masa yang ditetapkan oleh GIATMARA atau dalam sesuatu masa yang lebih lama sebagaimana yang diluluskan oleh GIATMARA;<br></li>
				<li style="text-align:justify">Semasa dalam tempoh latihan kemahiran, akan mengekalkan prestasi pada tahap yang ditetapkan oleh GIATMARA;<br></li>
				<li style="text-align:justify">Semasa dalam tempoh latihan kemahiran itu, akan mematuhi apa-apa arahan status, kaedah-kaedah dan peraturan, termasuklah peraturan-peraturan tatatertib, sebagaimana yang berkuatkuasa dari semasa ke semasa dalam GIATMARA atau di lain-lain tempat di bawah arahan GIATMARA di mana latihan kemahiran itu atau mana-mana bahagiannya mungkin dijalankan;<br></li>
				<li style="text-align:justify">Semasa dalam tempoh latihan kemahiran itu tidak akan menjadi ahli atau mengambil bahagian di dalam apa-apa aktiviti, parti politik, kesatuan sekerja, pertubuhan, badan atau kumpulan, sama ada di dalam atau di luar GIATMARA kecuali setelah mendapat kebenaran bertulis terlebih dahulu dari GIATMARA,<br></li>
				<li style="text-align:justify">Akan bertanggungjawab sepenuhnya membayar segala yuran pengajian dan apa-apa kos lain yang dikenakan oleh GIATMARA dari semasa ke semasa.
			</ol>
			Adalah dipersetujui dan diakui bahawa sekiranya saya melakukan pelanggaran terhadap mana-mana yang tersebut di atas, maka tindakan tatatertib boleh diambil ke atas diri saya serta tawaran latihan kemahiran di GIATMARA <?php echo $row_cetak->nama_giatmara; ?> adalah terbatal.<br><br><br><br><br><br>
      <table>
        <tr>
          <td><p style="text-align:left">......................................................</p></td>
          <td>Tarikh:................................</td>
        </tr>
        <tr>
          <td align="left" style="font-style: italic;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(tandatangan)</td>
          <td>&nbsp;</td>
        </tr>
      </table><br>
      <table>
        <tr>
          <td>
			<table width="100%">
				<tr>
					<td width="20%"><p style="text-align:left">Nama</p></td>
					<td width="8%">:</td>
					<td width="78%"><b><?php echo $row_cetak->nama_penuh; ?></b></td>
				</tr>
			</table>
		  </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table><br><br>
      Di hadapan:<br><br><br><br>
      <table>
        <tr><td><p style="text-align:left">......................................................</p></td>
		 <td>Tarikh:................................</td>
		 </tr>
        <tr><td align="left" style="font-style: italic;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(tandatangan)</td><td>&nbsp;</td></tr>
      </table><br>
      <table>
        <tr>
          <td>
		  <table width="100%">
				<tr>
					<td width="12%"><p style="text-align:left">Nama Saksi</p></td>
					<td width="2%">:</td>
					<td width="86%"><?php
					echo $namapengurus;
					//echo $row_cetak->nama_pegawai; ?></td>
				</tr>
				<tr>
					<td>Jawatan</td>
					<td>:</td>
					<td>PENGURUS</td>
				</tr>
				<tr>
					<td>GIATMARA</td>
					<td>:</td>
					<td><?php echo $row_cetak->nama_giatmara; ?></td>
				</tr>
		  </table>
		  </td>
		</tr>

		  <!--p style="text-align:left">Nama Saksi :&nbsp; <?php //echo $row_cetak->nama_pegawai; ?></p></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Jawatan : Pengurus</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><p style="text-align:left">GIATMARA : <?php //echo $row_cetak->nama_giatmara; ?></p></td>
          <td></td>
        </tr-->
      </table><br>
    </body>
</html>
