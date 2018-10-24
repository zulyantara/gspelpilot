<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <style media="screen">

            p {
                text-align: justify;
            }
        </style>
    </head>
    <body style="font-family:helvetica;font-size:10px;margin-top:-50px">
        <div style="margin-top:-30px; padding-left:20px;"><img src="<?php echo $url_img; ?>" height="40px"></div><br>
        <table style="width: 100%;" border="0" cellpadding="0" cellspacing="0" style="font-family:helvetica;font-size:10px">
            <tr>
                <td style="width: 50%;"></td>
                <td style="width: 100%;">
                    <table border="0" style="width: 100%; maring-right: 0px; margin-left: auto;">
                        <tr>
                            <td width="100">Rujukan Kami</td>
                            <td width="10">:</td>
			    <td><b>GM400/12/<?php echo date("Y");?>/TWR/<?php echo $nomor_surat;?></b></td>
                        </tr>
                        <tr>
                            <td>Tarikh</td>
                            <td width="10">:</td>
                            <td><b><?php echo $tgl_cetak; ?></b></td>
                        </tr>
                    </table><br><br>
                </td>
            </tr>
        </table>

        <table cellpadding="0" style="font-family:helvetica;font-size:10px">
            <tr>
                <td><b><?php echo strtoupper($row_cetak->nama_penuh); ?></b></td>
            </tr>
            <tr>
                <td><b><?php echo strtoupper($row_cetak->no_mykad); ?></b></td>
            </tr>
            <tr>
                <td><?php echo strtoupper($row_cetak->alamat_permohonan_butir_peribadi); ?></td>
            </tr>
            <tr>
                <td><?php echo $data2['poskod_3']." ".$data2['bandar_3'].", ".$data2['negeri_3']; ?></td>
            </tr>
            <tr>
                <td><?php echo strtoupper($row_cetak->nama_negara); ?></td>
            </tr>
        </table><br>
        <table cellpadding="0" style="font-family:helvetica;font-size:10px">
        <tr>
          <td>
              <p style="font-weight: bold;">TAWARAN MENGIKUTI LATIHAN KEMAHIRAN GIATMARA SEPENUH MASA</p>
          </td><br>
        </tr>
        <tr><td></td></tr>
      </table>


    <table  style="font-family:helvetica;font-size:10px;padding:0px;">
        <tr>
            <td>GIATMARA</td>
            <td width="10">:</td>
            <td width="250"><?php echo strtoupper($row_cetak->nama_giatmara); ?></td>
        </tr>
        <tr>
            <td>KURSUS</td>
            <td>:</td>
            <td><?php echo strtoupper($row_cetak->nama_kursus); ?></td>
        </tr>
        <tr>
            <td>SESI</td>
            <td>:</td>
            <td><?php echo strtoupper($row_cetak->nama_intake); ?></td>
        </tr>
        <tr>
            <td>TEMPOH</td>
            <td>:</td>
            <td><?php echo $row_cetak->tempoh_pusat;//date("m", strtotime($row_cetak->tarikh_tamat))-date("m",strtotime($row_cetak->tarikh_mula)); ?> BULAN</td>
        </tr>
    </table>

  </table>

  <table style="font-family:helvetica;font-size:10px">
    <tr>
        <td>
          <p style="font-weight: bold;">TAHNIAH</p>
          <p style="text-align:justify">Sukacita dimaklumkan bahawa saudara / saudari telah dipilih untuk mengikuti latihan kemahiran secara sepenuh masa di GIATMARA seperti maklumat di atas.</p>
          <p style="text-align:justify">2. Sehubungan dengan itu, saudara / saudari dikehendaki menghadirkan diri pada hari pendaftaran seperti butiran berikut:<br></p>

        </td>
      </tr>
	<tr>
		<td>

        <table>
            <tr>
                <td width="8%">&nbsp;</td>
				<td width="25%">TARIKH PENDAFTARAN</td>
                <td width="2%">:</td>
                <td width="65%"><?php echo date("d-m-Y", strtotime($row_cetak->tawaran_tarikh_lapordiri)); ?></td>
            </tr>
            <tr>
                <td></td>
				<td>TEMPAT</td>
                <td>:</td>
                <td><?php echo strtoupper("GIATMARA ".$row_cetak->nama_giatmara."<br>".$row_cetak->alamat_gtt); ?></td>
            </tr>
            <tr>
                <td></td>
				<td>MASA</td>
                <td>:</td>
                <td><?php echo date("H:i", strtotime($row_cetak->tawaran_masa_lapordiri)); echo " AM"; ?><br></td>
                    <?php #echo date("d-m-Y", strtotime($row_cetak->tawaran_tarikh_lapordiri))." ".date("H:i", strtotime($row_cetak->tawaran_masa_lapordiri)); ?>
            </tr>
        </table>
	</td></tr>
	  <!--/table>
        <table style="font-family:helvetica;font-size:10px"-->
          <tr>
              <td align="justify"><br>2. Bagi tujuan pendaftaran, saudara / saudari perlu untuk melengkapi Borang Profil Pelatih, Borang Aku Janji Pelatih GIATMARA dan Borang Pemeriksaan Kesihatan. Saudara / saudari juga perlu untuk membawa dokumen-dokumen asal bagi tujuan pengesahan, 1 salinan MyKAD, 1 salinan akaun bank peribadi yang aktif dan 4 keping gambar berukuran passport.<!--/p-->

        <p style="text-align:justify">3. Kegagalan saudara / saudari untuk menepati keperluan pendaftaran serta kegagalan menghadirkan diri pada tarikh pendaftaran yang ditetapkan akan menyebabkan tawaran ini terbatal secara sendirinya.</p>

        <p>GIATMARA Malaysia mengucapkan syabas dan selamat maju jaya.</p>

        <p>Terima kasih.</p>
        <p style="font-weight: bold;">'BERKHIDMAT UNTUK NEGARA'<br>'Membandarkan Luar Bandar'</p>
        <p>Pengarah<br>Bahagian Pembangunan Pelatih & Kerjaya<br>GIATMARA Sendirian Berhad</p>

                </td>
              </tr>
          </table><br><br><br>
        <table align="center" style="font-family:helvetica;font-size:8px">
            <tr>
                <td><i><b>(Surat ini adalah janaan sistem dan dianggap telah ditandatangan)</b></i><br></td>
            </tr>
            <tr>
                <td>GIATMARA Malaysia, Wisma GIATMARA, No. 39 & 41, Jalan Tuanku, 50300 Kuala Lumpur</td>
            </tr>
            <tr>
                <td>Tel: +603 2691 2690</td>
            </tr>
        </table>
    </body>
</html>
