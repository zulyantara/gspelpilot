<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div id="logo">
            <img style="padding-left: 20px;" src="<?php echo FCPATH."assets/images/giatmara03.png"; ?>" height="100" />
        </div>
        <div style="float: right; clear: both; display: block;">
            <b>No. Rujukan Permohonan : <?php echo $butir_peribadi["0"]['no_rujukan_permohonan']; ?></b>
        </div><br>
        <fieldset>
            <legend>A. Butir Peribadi</legend>
            <table>
                <tr>
                    <td>Nama Penuh</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["nama_penuh"];?></td>
                </tr>
                <tr>
                    <td>No MyKAD</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["no_mykad"];?></td>
                </tr>
                <tr>
                    <td>Tarikh Lahir</td>
                    <td>:</td>
                    <td><?php $tarikh_lahir = $butir_peribadi["0"]["tarikh_lahir"];//echo date("d-m-Y", strtotime($butir_peribadi["0"]["tarikh_lahir"]));?>
					<?php $str = explode('-',$tarikh_lahir); echo $str[2].'-'.$str[1].'-'.$str[0];?></td>
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
                <!--
                <tr>
                    <td>No Telefon</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["no_telefon"];?></td>
                </tr>
                -->
                <tr>
                    <td>No Telefon Bimbit</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["no_hp"];?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["alamat"];?></td>
                </tr>
                <tr>
                    <td>Poskod</td>
                    <td>:</td>
                    <td>
                      <?php
                      if ($butir_peribadi["0"]["poskod"] == "")
                      {
                        echo $butir_peribadi["0"]["poskod_3"];
                      }
                      else
                      {
                        echo $butir_peribadi["0"]["poskod"];
                      }
                      ?>
                    </td>
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
                <!--
                <tr>
                    <td>Kategori Kelulusan</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["kategori_kelulusan"];?></td>
                </tr>
                -->
                <tr>
                    <td>Kelulusan</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["kelulusan"];?></td>
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
                    <td><?php echo $butir_peribadi["0"]["media_cetak"] == 1 ? "Ya" : "Tidak";?></td>
                </tr>
                <tr>
                    <td>Media Elektronik</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["media_elektronik"] == 1 ? "Ya" : "Tidak";?></td>
                </tr>
                <tr>
                    <td>Internet</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["internet"] == 1 ? "Ya" : "Tidak";?></td>
                </tr>
                <tr>
                    <td>Media Sosial</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["media_sosial"] == 1 ? "Ya" : "Tidak";?></td>
                </tr>
                <tr>
                    <td>Rakan-rakan</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["rakan"] == 1 ? "Ya" : "Tidak";?></td>
                </tr>
                <tr>
                    <td>Keluarga</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["keluarga"] == 1 ? "Ya" : "Tidak";?></td>
                </tr>
                <tr>
                    <td>Pameran / Karnival / Pendidikan</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["pameran"] == 1 ? "Ya" : "Tidak";?></td>
                </tr>
                <tr>
                    <td>Lain-lain</td>
                    <td>:</td>
                    <td><?php echo $butir_peribadi["0"]["text_lain"];?></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>C. Kursus Pilihan</legend>
            <table border="1" width="100%" cellpadding="5" cellspacing="0">
                <tr>
                    <th align="center">No</th>
																				<th align="center">Kategori Pelatih</th>
                    <th align="center">Kursus</th>
                    <th align="center">GIATMARA</th>
                </tr>
																<?php
																	if($kursus_lpp09->kategori_program == "LL") $kat_program = "Latihan Lanjutan";
																	if($kursus_lpp09->kategori_program == "RN") $kat_program = "Rintis Niaga";
																	if($kursus_lpp09->kategori_program == "PP") $kat_program = "Program Pertandingan";
																	if($kursus_lpp09->kategori_program == "PK") $kat_program = "Program Khas";
																?>
                <tr>
                    <td align="center">1</td>
																				<td><?php echo $kat_program; ?></td>
                    <td><?php echo $kursus_lpp09->nama_kursus; ?></td>
                    <td><?php echo $kursus_lpp09->nama_giatmara; ?></td>
                </tr>
            </table>
        </fieldset>
        <div style="page-break-before: always;"></div>
        <fieldset>
            <legend>D. Maklumat Penjaga</legend>
            <table>
                <?php
                if ($butir_peribadi["0"]["b_nama_penuh"] != "")
                {
                    ?>
                    <tr>
                        <td>Nama Penuh Bapa</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_nama_penuh"];?></td>
                    </tr>
                    <tr>
                        <td>Jenis Pengenalan</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_jenis_pengenalan"];?></td>
                    </tr>
                    <tr>
                        <td>No MyKAD</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_mykad"];?></td>
                    </tr>
                    <tr>
                        <td>Kewarganegaraan</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_kewarganegaraan"];?></td>
                    </tr>
                    <!--
                    <tr>
                        <td>Kategori Penjaga</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_kategori_penjaga"];?></td>
                    </tr>
                    -->
                    <tr>
                        <td>No Telefon</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_no_tel"];?></td>
                    </tr>
                    <!--
                    <tr>
                        <td>No Telefon Bimbit</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_no_hp"];?></td>
                    </tr>
                    -->
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_agama"];?></td>
                    </tr>
                    <tr>
                        <td>Etnik</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_etnik"];?></td>
                    </tr>
                    <tr>
                        <td>Bangsa</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_bangsa"];?></td>
                    </tr>
                    <tr>
                        <td>Alamat Tetap</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_alamat"];?></td>
                    </tr>
                    <tr>
                        <td>Poskod</td>
                        <td>:</td>
                        <td>
                          <?php
                          $poskod = $butir_peribadi["0"]["b_poskod"] == "" ? $butir_peribadi["0"]["b_poskod2"] : $butir_peribadi["0"]["b_poskod"];
                          echo $poskod;
                          ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td><?php echo $res_pekerjaan->nama_pekerjaan;?></td>
                        <!-- <td><?php echo $butir_peribadi["0"]["b_pekerjaan"];?></td> -->
                    </tr>
                    <tr>
                        <td>Pendapatan</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_pendapatan"];?></td>
                    </tr>
                    <tr>
                        <td>Majikan</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_majikan"];?></td>
                    </tr>
                    <tr>
                        <td>No Telefon Pejabat</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_no_tel_pejabat"];?></td>
                    </tr>
                    <tr>
                        <td>Samb</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_samb"];?></td>
                    </tr>
                    <tr>
                        <td>Alamat Pejabat</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_alamat_pejabat"];?></td>
                    </tr>
                    <tr>
                        <td>Poskod</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_alamat_pejabat_poskod"];?></td>
                    </tr>
                    <tr>
                        <td>Bandar</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_alamat_pejabat_bandar2"];?></td>
                    </tr>
                    <tr>
                        <td>Negeri</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["b_alamat_pejabat_negeri2"];?></td>
                    </tr>
                    <tr>
                        <td>Nama Penuh Ibu</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_nama_penuh"];?></td>
                    </tr>
                    <tr>
                        <td>Jenis Pengenalan</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_jenis_pengenalan"];?></td>
                    </tr>
                    <tr>
                        <td>No. MyKAD</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_mykad"];?></td>
                    </tr>
                    <tr>
                        <td>Kewarganegaraan</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_kewarganegaraan"];?></td>
                    </tr>
                    <!--
                    <tr>
                        <td>Kategori Penjaga</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_kategori_penjaga"];?></td>
                    </tr>
                    -->
                    <tr>
                        <td>No Telefon</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_no_tel"];?></td>
                    </tr>
                    <!--
                    <tr>
                        <td>No Telefon Bimbit</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_no_hp"];?></td>
                    </tr>
                    -->
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_agama"];?></td>
                    </tr>
                    <tr>
                        <td>Etnik</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_etnik"];?></td>
                    </tr>
                    <tr>
                        <td>Bangsa</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_bangsa"];?></td>
                    </tr>
                    <tr>
                        <td>Alamat Tetap</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_alamat"];?></td>
                    </tr>
                    <tr>
                        <td>Poskod</td>
                        <td>:</td>
                        <td>
                          <?php
                          $poskod_c = $butir_peribadi["0"]["c_poskod"] == "" ? $butir_peribadi["0"]["c_poskod2"] : $butir_peribadi["0"]["c_poskod"];
                          echo $poskod_c;
                          ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td><?php echo $res_pekerjaanc->nama_pekerjaan;?></td>
                    </tr>
                    <tr>
                        <td>Pendapatan (RM)</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_pendapatan"];?></td>
                    </tr>
                    <tr>
                        <td>Majikan</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_majikan"];?></td>
                    </tr>
                    <tr>
                        <td>No Telefon Pejabat</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_no_tel_pejabat"];?></td>
                    </tr>
                    <tr>
                        <td>Samb</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_samb"];?></td>
                    </tr>
                    <tr>
                        <td>Alamat Pejabat</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_alamat_pejabat"];?></td>
                    </tr>
                    <tr>
                        <td>Poskod</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_alamat_pejabat_poskod"];?></td>
                    </tr>
                    <tr>
                        <td>Bandar</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_alamat_pejabat_bandar2"];?></td>
                    </tr>
                    <tr>
                        <td>Negeri</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["c_alamat_pejabat_negeri2"];?></td>
                    </tr>
                    <?php
                }
                if ($butir_peribadi["0"]["a_nama_penuh"] != "")
                {
                    ?>
                    <tr>
                        <td>Nama Penuh</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_nama_penuh"];?></td>
                    </tr>
                    <tr>
                        <td>Hubungan</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_hubungan"];?></td>
                    </tr>
                    <tr>
                        <td>Jenis Pengenalan</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_jenis_pengenalan"];?></td>
                    </tr>
                    <tr>
                        <td>No MyKAD</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_mykad"];?></td>
                    </tr>
                    <tr>
                        <td>Kewarganegaraan</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_kewarganegaraan"];?></td>
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
                        <td><?php echo $butir_peribadi["0"]["a_no_tel"];?></td>
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
                        <td><?php echo $butir_peribadi["0"]["a_agama"];?></td>
                    </tr>
                    <tr>
                        <td>Etnik</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_etnik"];?></td>
                    </tr>
                    <tr>
                        <td>Bangsa</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_bangsa"];?></td>
                    </tr>
                    <tr>
                        <td>Alamat Tetap</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_alamat"];?></td>
                    </tr>
                    <tr>
                        <td>Poskod</td>
                        <td>:</td>
                        <td>
                          <?php
                          $poskod_a = $butir_peribadi["0"]["a_poskod"] == "" ? $butir_peribadi["0"]["a_poskod2"] : $butir_peribadi["0"]["a_poskod"];
                          echo $poskod_a;
                          ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td><?php echo $res_pekerjaana->nama_pekerjaan;?></td>
                    </tr>
                    <tr>
                        <td>Pendapatan (RM)</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_pendapatan"];?></td>
                    </tr>
                    <tr>
                        <td>Majikan</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_majikan"];?></td>
                    </tr>
                    <tr>
                        <td>No Telefon Pejabat</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_no_tel_pejabat"];?></td>
                    </tr>
                    <tr>
                        <td>Samb</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_samb"];?></td>
                    </tr>
                    <tr>
                        <td>Alamat Pejabat</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_alamat_pejabat"];?></td>
                    </tr>
                    <tr>
                        <td>Poskod</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_alamat_pejabat_poskod"];?></td>
                    </tr>
                    <tr>
                        <td>Bandar</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_alamat_pejabat_bandar2"];?></td>
                    </tr>
                    <tr>
                        <td>Negeri</td>
                        <td>:</td>
                        <td><?php echo $butir_peribadi["0"]["a_alamat_pejabat_negeri2"];?></td>
                    </tr>
                    <?php
                }
                ?>
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
                <li>Saya mengesahkan bahawa semua butiran di dalam permohonan ini adalah benar. Jika didapati permohonan ini tidak lengkap atau tidak memenuhi mana-mana keperluan yang dinyatakan maka permohonan ini akan di tolak dan tidak akan di proses.</li>
                <li>Akta Kerahsiaan Data</li>
            </ul>
        </fieldset>
</body></html>
