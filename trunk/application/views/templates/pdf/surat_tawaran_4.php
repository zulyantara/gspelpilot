<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <!--style>
        .tengah {
          float: center;
          padding: 15px;
        }
        p {
            text-align: justify;
        }
        p.small {
            line-height: 70%;
        }
        p.big {
            line-height: 200%;
        }
        p.tengah {
            text-align: center;
        }
        .sehat1{
          display:grid;
          grid-template-columns: 50% 50%;

        }
        table, th, td {
            padding: 1px;
        }
        td.kiri {
          text.align: left;
        }
    </style-->
</head>
    <body>
      <table align="center"	>
          <tr>
              <td><img class="tengah" src="<?php echo $url_img; ?>" height="30"></td>
          </tr>
          <tr>
              <td>GIATMARA MALAYSIA</td>
          </tr>
          <tr>
              <td><b>&nbsp;</b></td>
          </tr>
          <tr>
              <td><h3>BORANG PEMERIKSAAN KESIHATAN</h3></td>
          </tr>
          <tr>
              <td align="center">(Perlu diisi oleh pelatih baru atau lepasan pelatih yang telah meninggalkan latihan GIATMARA melebihi 12 bulan)</td>

          </tr><tr><td><p class="tengah">____________________________________________________________</p></td></tr>
      </table>

<table  style="font-size:8px;" border="0" width="100%" cellpadding="1">
       <tr><td colspan="3" align="justify">Pelatih perlu mengisi maklumat di bawah dan membenarkan Pegawai Perubatan Bertauliah untuk diperiksa. Keputusan pemeriksaan ini adalah untuk kegunaan GIATMARA Malaysia sahaja. Pelatih adalah bertanggungjawab untuk memberi maklumat yang lengkap dan tepat.<br></td></tr>
	   <tr>
           <td width="60">NAMA</td>
           <td width="5">:</td>
           <td width="100%" colspan="5"><b><?php echo $row_cetak->nama_penuh; ?></b></td>

       </tr>
       <tr>
         <td width="60">NO. MYKAD</td>
         <td width="5">:</td>
         <td  width="80" ><b><?php echo $row_cetak->no_mykad; ?></b></td>
         <td width="60"></td><td width="5"></td>
         <td width="15"></td><td width="5"></td><td width="80">TARIKH LAHIR</td><td width="5">:</td>
         <td><b><?php $str = explode('-',$row_cetak->tarikh_lahir); echo $str[2].'-'.$str[1].'-'.$str[0];?></b></td>
       </tr>

       <tr>
         <td width="60">JANTINA</td>
         <td width="5">:</td>
         <td  width="80"><b><?php echo $row_cetak->Name_exp_54;?></b></td>
         <td width="60"></td><td width="5"></td>
         <td width="15"></td><td width="5"></td><td width="80">UMUR</td>
         <td width="5">:</td>
         <td ><?php echo $row_cetak->umur; ?></td>
         <!-- <td width="5"></td><td>TEMPAT LAHIR</td><td width="5">:</td>
         <td></td> -->
       </tr>
       <tr>
           <td width="120" colspan="3">STATUS PERKAHWINAN</td>
           <td width="5">:</td>
           <td width="100%" colspan="5"><?php echo $row_cetak->taraf_perkahwinan; ?></td>

       </tr>

</table>
<p>A. Untuk diisi oleh pelatih. <i>(Sila tandakan (/) pada ruangan yang berkaitan)</i><br><br>
Adakah anda mempunyai/ mengidap/ menjalani ?</p>
<table style="font-size:8px;" width="100%" border="0">
  <tr align="left">
    <td width="5%">&nbsp;</td>
	<td width="25%">&nbsp;</td>
	<td width="8%" align="center">Ya</td>
	<td width="8%" align="center">Tidak</td>
	<td width="8%">&nbsp;</td>
	<td width="5%">&nbsp;</td>
	<td width="25%">&nbsp;</td>
	<td width="8%" align="center">Ya</td>
	<td width="8%" align="center">Tidak</td>
  </tr>
  <tr align="left">
    <td width="5%">a.</td>
	<td width="25%">Sakit Mata</td>
	<td width="8%" align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td width="8%" align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td width="8%">&nbsp;</td>
	<td width="5%">j.</td>
	<td width="25%">Buasir</td>
	<td width="8%" align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td width="8%" align="center">[&nbsp;&nbsp;&nbsp;]</td>
  </tr>
  <tr>
    <td>b.</td><td>Mulut Berdarah</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td></td><td>k.</td><td>Sawan</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td>
  </tr>
  <tr>
    <td>c.</td><td>Lelah</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td></td><td>l.</td><td>Tekanan</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td>
  </tr>
  <tr><td>d.</td><td>Bronkitis</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td></td><td>m.</td><td>Kanser</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td>
</tr>
  <tr>
    <td>e.</td><td>Sakit Buah Pinggang</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td></td><td></td><td colspan="3">Nyatakan :____________</td>
  </tr>
  <tr>
    <td>f.</td><td>Tekanan Darah Tinggi</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td></td><td>n.</td><td>Penyakit Saraf</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td>
  </tr>
  <tr>
    <td>g.</td><td>Sakit Jantung</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td></td><td>o.</td><td>Merokok</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td>
  </tr>
  <tr>
    <td>h.</td><td>Kencing Manis</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td></td><td>p.</td><td>Minum Alkohol</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td>
  </tr>
  <tr>
    <td>h.</td><td>Dadah (Tujuan Kesihatan)</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td></td><td>q.</td><td>Pitam</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td>
  </tr>
  <tr>
    <td></td><td colspan="3">Nyatakan Tujuan :_____________</td><td></td><td>r.</td><td>Pembedahan</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td><td align="center">[&nbsp;&nbsp;&nbsp;]</td>
  </tr>
</table>
<p style="line-height: 90%;" align="justify">Saya dengan ini mengaku bahawa maklumat yang telah saya berikan di atas adalah benar dan lengkap. Saya dengan ini memberi kebenaran kepada Pegawai Perubatan untuk memeriksa saya dan mengemukakan keputusan pemeriksaan kesihatan ini untuk kegunaan GIATMARA Malaysia sahaja.</p>

<table style="font-size:8px;">
  <tr>
    <td width="300">Pelatih</td><td>Saksi</td>
  </tr>
   <tr>
    <td width="300"><br></td><td><br></td>
  </tr>
  <tr>
    <td width="300" height="10px" valign="bottom">_____________________________________<br>Tandatangan Pelatih</td>
	<td>_____________________________________<br>Tandatangan Saksi</td>
  </tr>
  <tr>
    <!-- <td width="300">Tandatangan Pelatih<br>
      Nama : <?php echo $row_cetak->nama_penuh; ?><br>
      No. MyKad : <?php echo $row_cetak->no_mykad; ?><br>
      Tarikh :</td><td>Tarikh :
    </td><td>Tandatangan Saksi</td> -->
  </tr>
  <tr>
    <td width="300">Nama : <b><?php echo $row_cetak->nama_penuh; ?></b></td><td>Nama : </td>
  </tr>
  <tr>
    <td width="300">No. MyKad : <b><?php echo $row_cetak->no_mykad; ?></b></td><td>No. MyKad : </td>
  </tr>
  <tr>
    <td width="300">Tarikh :</td><td>Tarikh :</td>
  </tr>
</table>

<p>B. Untuk diisi oleh Pegawai Perubatan. <i>(Sila tandakan (/) untuk keputusan normal dan (X) sebaliknya)</i></p>
<table style="font-size:8px;" border="0">
  <tr align="left">

    <td width="5%">&nbsp;</td>
	<td width="5%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="8%" align="center">Kiri</td>
	<td width="8%" align="center">Kanan</td>
	<td width="8%">&nbsp;</td>
	<td width="5%">&nbsp;</td>
	<td width="5%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="8%" align="center">Ya</td>
	<td width="8%" align="center">Tidak</td>
  </tr>
  <tr align="left">
    <td>a.</td>
	<td colspan="2">Pemeriksaan Mata</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td></td>
	<td>e.</td>
	<td colspan="2">Sistem Pernafasan</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<td>i.</td>
	<td>Warna</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td></td>
	<td>f.</td>
	<td colspan="2">Sistem Sendi</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<td>ii.</td>
	<td>Reflek Cahaya</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td></td>
	<td>g.</td>
	<td colspan="2">Sistem Jantung</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
  </tr>
  <tr>
    <td>b.</td>
	<td colspan="2">Pemeriksaan Telinga</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td></td>
	<td></td>
	<td>i.</td>
	<td>Denyutan</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
  </tr>
  <tr>
    <td>c.</td>
	<td colspan="2">Pemeriksaan Payudara</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td></td>
	<td></td>
	<td>ii.</td>
	<td>Nadi</td>
	<td></td><td>/min</td>
  </tr>
  <tr>
    <td>d.</td>
	<td colspan="2">Ujian Air Kencing</td>
	<td align="center">(+)ve</td>
	<td align="center">(-)ve</td>
	<td></td>
	<td></td>
	<td>iii.</td>
	<td>Tekanan Darah</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
  </tr>
  <tr>
    <td></td>
	<td>i.</td>
	<td>Hamil</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td></td>
	<td>h.</td>
	<td colspan="2">Sistem Saraf</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
  </tr>
  <tr>
    <td></td>
	<td>ii.</td>
	<td>Morfin/Heroin</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td align="center">[&nbsp;&nbsp;&nbsp;]</td>
	<td colspan="5"></td>
  </tr>

</table>
<p><i>**Pemeriksaan X-ray tidak diperlukan memandangkan kursus bertempoh kurang dari 1 tahun</i><br><br>
  Saya mengaku telah memeriksa,</p>
<table style="font-size:8px;">
  <tr>
    <td>NAMA : <b> <?php echo $row_cetak->nama_penuh; ?></b></td><td>NO. MYKAD : <b><?php echo $row_cetak->no_mykad; ?></b></td>
  </tr>
  <tr>
    <td colspan="2">dan mendapati pelatih ini SIHAT/ TIDAK SIHAT untuk meneruskan latihan kemahiran di GIATMARA</td>
  </tr>
</table><br><br><br>
<table style="font-size:8px;">
  <tr><td width="60%"><br><br><br><br>_______________________________________<br>(Tandatangan Pegawai Perubatan Bertauliah)<br>Nama :<br>Tarikh :</td>
    <td width="40%">
    <table align="right" border="1" width="100%">
        <tr>
            <td style="height:70px; width: 160px; text-align: center;"><br><br><br><br><br><br>Cop Rasmi<br></td>
        </tr>
    </table>
  </td></tr>
  <tr><td width="60%"></td><td width="40%"></td></tr>

</table>

    </body>
</html>
