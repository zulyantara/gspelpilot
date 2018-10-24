<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body style="font-family:arial;font-size:12px">
        <div id="logo">
            <img src="<?php echo FCPATH."assets/images/giatmara03.png"; ?>" height="60" />
        </div>
		<br>
		<div style="float: left; clear: both; display: block;"><b>BORANG PERMOHONAN</b></div>
        <div style="float: right; clear: both; display: block;">
            <b>No. Rujukan Permohonan : <?php echo $butir_peribadi["0"]["no_mykad"]; ?></b>
        </div><br>
        <fieldset>
            <legend>A. Butir Peribadi</legend>
            <table>
                <tr>
                    <td>Nama Penuh</td>
                    <td>:</td>
                    <td><?php echo strtoupper($butir_peribadi["0"]["nama_penuh"]);?></td>
                </tr>
                <tr>
                    <td>No MyKAD</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["no_mykad"];?></td>
                </tr>
                <tr>
                    <td>Tarikh Lahir</td>
                    <td>:</td>
                    <td><?php echo date("d-m-Y", strtotime($butir_peribadi["0"]["tarikh_lahir"]));?></td>
                </tr>
                <tr>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["kewarganegaraan"];?></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["umur"];?></td>
                </tr>
                <tr>
                    <td>No Telefon</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["no_telefon"];?></td>
                </tr>
                <!--
                <tr>
                    <td>No Telefon Bimbit</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["no_hp"];?></td>
                </tr>
                -->
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["alamat"];?></td>
                </tr>
                <tr>
                    <td>Poskod</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["poskod"];?></td>
                </tr>
                <tr>
                    <td>Bandar</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["bandar"];?></td>
                </tr>
                <tr>
                    <td>Negeri</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["nama_negeri"];?></td>
                </tr>
                <tr>
                    <td>Emel</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["emel"];?></td>
                </tr>
                <tr>
                    <td>Bangsa</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["bangsa"];?></td>
                </tr>
                <tr>
                    <td>Etnik</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["etnik"];?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["agama"];?></td>
                </tr>
                <tr>
                    <td>Taraf Perkahwinan</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["taraf_perkahwinan"];?></td>
                </tr>
                <tr>
                    <td>Kelulusan Akademik</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["kelulusan"];?></td>
                </tr>
                <tr>
                    <td>Kelulusan Kemahiran</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["kelulusan_kemahiran"];?></td>
                </tr>
                <tr>
                    <td>Matlamat Selepas Kursus</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["matlamat"];?></td>
                </tr>
                <tr>
                    <td>Kategori Pemohon</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["kategori_pemohon"];?></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>B. Maklumat Am</legend>
            <table>
                <tr>
                    <td>Media Cetak</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["media_cetak"] == 1 ? "Ya" : "-";?></td>
                </tr>
                <tr>
                    <td>Media Elektronik</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["media_elektronik"] == 1 ? "Ya" : "-";?></td>
                </tr>
                <tr>
                    <td>Internet</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["internet"] == 1 ? "Ya" : "-";?></td>
                </tr>
                <tr>
                    <td>Media Sosial</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["media_sosial"] == 1 ? "Ya" : "-";?></td>
                </tr>
                <tr>
                    <td>Rakan-rakan</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["rakan"] == 1 ? "Ya" : "-";?></td>
                </tr>
                <tr>
                    <td>Keluarga</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["keluarga"] == 1 ? "Ya" : "-";?></td>
                </tr>
                <tr>
                    <td>Pameran / Karnival / Pendidikan</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["pameran"] == 1 ? "Ya" : "-";?></td>
                </tr>
                <tr>
                    <td>Lain-lain</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["text_lain"]== 1 ? $butir_peribadi["0"]["text_lain"] : "-";?></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>C. Kursus Pilihan</legend>
            <table border="1" width="100%" cellpadding="5" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Kursus</th>
                    <th>GIATMARA</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><?php echo $butir_peribadi["0"]["kursus_1"]; ?></td>
                    <td><?php echo $butir_peribadi["0"]["giatmara_1"]; ?></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><?php echo $butir_peribadi["0"]["kursus_2"]; ?></td>
                    <td><?php echo $butir_peribadi["0"]["giatmara_2"]; ?></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><?php echo $butir_peribadi["0"]["kursus_3"]; ?></td>
                    <td><?php echo $butir_peribadi["0"]["giatmara_3"]; ?></td>
                </tr>
            </table>
        </fieldset>
        <div style="page-break-before: always;"></div>
        <fieldset>
            <legend>D. Maklumat Penjaga</legend>
			<?php if($butir_peribadi["0"]["b_nama_penuh"]!=''){?>
			<table width="100%">
			<tr>
				<td width="15%">Nama Penuh Bapa</td>
				<td width="34%">: <?php echo $butir_peribadi["0"]["b_nama_penuh"];?></td>
				<td width="2%">&nbsp;</td>
				<td width="15%">Nama Penuh Ibu</td>
                <td width="34%">: <?php echo $butir_peribadi["0"]["c_nama_penuh"];?></td>
			</tr>
            <tr>
				<td>Jenis Pengenalan</td>
                <td>: <?php echo $butir_peribadi["0"]["b_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["b_jenis_pengenalan"];?></td>
				<td></td>
				<td>Jenis Pengenalan</td>
                <td>: <?php echo $butir_peribadi["0"]["c_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["c_jenis_pengenalan"];?></td>
			</tr>
			<tr>
                    <td>No. ID Pengenalan</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_mykad"];?></td>
					<td></td>
                    <td>No. ID Pengenalan</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_mykad"];?></td>
                </tr>
                <tr>
                    <td>Kewarganegaraan</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["b_kewarganegaraan"];?></td>
					<td></td><td>Kewarganegaraan</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["c_kewarganegaraan"];?></td>
                </tr>
                <tr>
                    <td>No Telefon</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_no_tel"];?></td>
					<td></td>
					 <td>No Telefon</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_no_tel"];?></td>
                </tr>
            
                <tr>
                    <td>Agama</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["b_agama"];?></td>
					<td></td>
					 <td>Agama</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["c_agama"];?></td>
                </tr>
                <tr>
                    <td>Etnik</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["b_etnik"];?></td>
					<td></td>
					<td>Etnik</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["c_etnik"];?></td>
                </tr>
                <tr>
                    <td>Bangsa</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["b_bangsa"];?></td>
					<td></td>
					 <td>Bangsa</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["c_bangsa"];?></td>
                </tr>
                <tr>
                    <td>Alamat Tetap</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_alamat"];?></td>
					<td></td>
					 <td>Alamat Tetap</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_alamat"];?></td>
                </tr>
                <tr>
                    <td>Poskod</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_poskod"];?></td>
					<td></td>
					<td>Poskod</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_poskod"];?></td>
                </tr>
                <tr>
                    <td>Bandar</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_bandar"]; ?></td>
					<td></td>
					<td>Bandar</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_bandar"]; ?></td>
                </tr>
                <tr>
                    <td>Negeri</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_nama_negeri"]; ?></td>
					<td></td>
					<td>Negeri</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_nama_negeri"]; ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: <?php echo $butir_peribadi["0"]["pekerjaan_b"];?></td>
					<td></td>
					 <td>Pekerjaan</td>
                    <td>: <?php echo $butir_peribadi["0"]["pekerjaan_c"];?></td>
                </tr>
                <tr>
                    <td>Pendapatan (RM)</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["b_pendapatan"];?></td>
					<td></td>
					<td>Pendapatan (RM)</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["c_pendapatan"];?></td>
                </tr>
                <tr>
                    <td>Majikan</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_majikan"];?></td>
					<td></td>
					<td>Majikan</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_majikan"];?></td>
                </tr>
                <tr>
                    <td>No Telefon Pejabat</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_no_tel_pejabat"];?></td>
					<td></td>
					<td>No Telefon Pejabat</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_no_tel_pejabat"];?></td>
                </tr>
                <tr>
                    <td>Samb</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_samb"];?></td>
					<td></td>
					<td>Samb</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_samb"];?></td>
                </tr>
                <tr>
                    <td>Alamat Pejabat</td>
                    <td>: <?php echo $butir_peribadi["0"]["b_alamat_pejabat"];?></td>
					<td></td>
					<td>Alamat Pejabat</td>
                    <td>: <?php echo $butir_peribadi["0"]["c_alamat_pejabat"];?></td>
                </tr>
                </table>
				<?php }else{?>
				<table>
                <tr>
                    <td>Nama Penuh</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_nama_penuh"];?></td>
                </tr>
                <tr>
                    <td>Hubungan</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_hubungan"];?></td>
                </tr>
                <tr>
                    <td>Jenis Pengenalan</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["a_jenis_pengenalan"];?></td>
                </tr>
                <tr>
                    <td>No MyKAD</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_mykad"];?></td>
                </tr>
                <tr>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["a_kewarganegaraan"];?></td>
                </tr>
                <!--
                <tr>
                    <td>Kategori Penjaga</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["a_kategori_penjaga"];?></td>
                </tr>
                -->
                <tr>
                    <td>No Telefon</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_no_tel"];?></td>
                </tr>
                <!--
                <tr>
                    <td>No Telefon Bimbit</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["a_no_hp"];?></td>
                </tr>
                -->
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["a_agama"];?></td>
                </tr>
                <tr>
                    <td>Etnik</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["a_etnik"];?></td>
                </tr>
                <tr>
                    <td>Bangsa</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["a_bangsa"];?></td>
                </tr>
                <tr>
                    <td>Alamat Tetap</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_alamat"];?></td>
                </tr>
                <tr>
                    <td>Poskod</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_poskod"];?></td>
                </tr>
                <tr>
                    <td>Bandar</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_bandar"]; ?></td>
                </tr>
                <tr>
                    <td>Negeri</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_nama_negeri"]; ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["pekerjaan_a"];?></td>
                </tr>
                <tr>
                    <td>Pendapatan (RM)</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_nama_penuh"] == "" ? "" : $butir_peribadi["0"]["a_pendapatan"];?></td>
                </tr>
                <tr>
                    <td>Majikan</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_majikan"];?></td>
                </tr>
                <tr>
                    <td>No Telefon Pejabat</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_no_tel_pejabat"];?></td>
                </tr>
                <tr>
                    <td>Samb</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_samb"];?></td>
                </tr>
                <tr>
                    <td>Alamat Pejabat</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_alamat_pejabat"];?></td>
                </tr>
                <tr>
                    <td>Poskod</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_alamat_pejabat_poskod"];?></td>
                </tr>
                <tr>
                    <td>Bandar</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_alamat_pejabat_bandar"];?></td>
                </tr>
                <tr>
                    <td>Negeri</td>
                    <td>:</td>
                    <td> <?php echo $butir_peribadi["0"]["a_alamat_pejabat_negeri"];?></td>
                </tr>
				<?php } ?>
            </table>
        </fieldset>
        <fieldset>
            <legend>E. Tempat Tinggal</legend>
            <table>
                <tr>
                    <td>Tempat Tinggal</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["tempat_tinggal"] == 1 ? "Atas Urusan Sendiri" : "Perlukan Tempat Tinggal"; ?></td>
                </tr>
                <tr>
                    <td>Pengangkutan</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["pengangkutan"] == 1 ? "Ada Kenderaan Sendiri" : "Tiada Kenderaan"; ?></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>F. Pengakuan</legend>
            <ul>
                <li>Saya mengesahkan bahawa semua butiran di dalam permohonan ini adalah benar. Jika didapati permohonan ini tidak lengkap atau tidak memenuhi mana-mana keperluan yang dinyatakan maka permohonan ini akan ditolak dan tidak akan diproses.</li>
                <li>
                    Fasal Persetujuan PDPA<br>
                    Dengan mengemukakan borang ini, anda bersetuju bahawa GIATMARA boleh mengumpul, memperoleh, menyimpan dan memproses data peribadi anda yang telah berikan dalam borang ini untuk tujuan kemaskini data, berita, promosi dan pemasaran oleh GIATMARA.<br>
                    Anda dengan ini memberi persetujuan kepada GIATMARA untuk:
                    <ul>
                        <li>Menyimpan dan memproses Data Peribadi anda;</li>
                        <li>Mengisytiharkan Data Peribadi anda kepada pihak berkuasa kerajaan atau pihak ketiga yang berkaitan jika diperlukan oleh undang-undang atau untuk tujuan undang-undang.</li>
                    </ul>
                    Di samping itu, Data Peribadi anda boleh dipindahkan ke mana-mana syarikat yang difikirkan sesuai oleh GIATMARA yang mungkin melibatkan penghantaran data anda ke lokasi di luar Malaysia. Untuk tujuan mengemaskini atau membetulkan data tersebut, anda boleh pada bila-bila masa memohon kepada GIATMARA untuk mengakses data peribadi anda yang disimpan oleh GIATMARA.<br>
                    Untuk mengelakkan keraguan, Data Peribadi adalah merangkumi semua data yang ditakrifkan dalam Akta Perlindungan Data Peribadi 2010 termasuk semua data yang anda telah diberikan kepada GIATMARA dalam Borang ini.
                </li>
            </ul>
        </fieldset>
</body></html>
