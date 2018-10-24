<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <table border="0" width="100%" colspan="0" rowspan="0">
            <tr>
                <td style="width: 70%;">
                    <table border="0" style="width:600px">
                        <tr>
                            <td width="100">GIATMARA</td>
                            <td width="5">:</td>
                            <td><?php echo strtoupper($row_cetak->nama_giatmara); ?></td>
                        </tr>
                        <tr>
                            <td>KOD</td>
                            <td>:</td>
                            <td><?php echo strtoupper($row_cetak->kod_kursus); ?></td>
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
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 30%;">
                    <table align="right" border="1" width="100%">
                        <tr>
                            <td style="height:130px; width: 130px; text-align: center;"><br><br><br><br><br><br>Sila Lekatkan <br>Gambar berukuran passport</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
<hr>
<p><h2>PROFIL PELATIH</h2></p>
        <table border="0" colspan="0" rowspan="0">
            <tr>
                <td width="85%">

                    <table border="0" cellspacing="5">
                        <tr>
                            <td width="45%">Nama Penuh</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->nama_penuh; ?></td>
                        </tr>
                        <tr>
                            <td width="45%">No MyKAD</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->no_mykad; ?></td>
                        </tr>
                        <tr>
                            <td width="45%">Tarikh lahir</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo date("d-m-Y", strtotime($row_cetak->tarikh_lahir));?></td>
                        </tr>
                        <tr>
                            <td width="45%">Kewarganegaraan</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->kewarganegaraan; ?></td>
                        </tr>
                        <tr>
                            <td width="45%">Umur</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->umur; ?></td>
                        </tr>
                        <tr>
                            <td width="45%">No telefon</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->no_hp; ?></td>
                        </tr>
                        <tr>
                            <td width="45%">Alamat Tetap</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->alamat_permohonan_butir_peribadi.", ".$row_cetak->poskod_3." ".$row_cetak->bandar_3." ".$row_cetak->negeri_3; ?></td>
                        </tr>
                        <tr>
                            <td width="45%">Jantina</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->Name_exp_54;?></td>
                        </tr>
                        <tr>
                            <td width="45%">Bangsa</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->bangsa; ?></td>
                        </tr>
                        <tr>
                            <td width="45%">Etnik</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->etnik; ?></td>
                        </tr>
                        <tr>
                            <td width="45%">Agama</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->agama; ?></td>
                        </tr>
                        <tr>
                            <td width="45%">Taraf perkahwinan</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->taraf_perkahwinan; ?></td>
                        </tr>

                        <tr>
                            <td width="45%">Emel</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->emel; ?></td>
                        </tr>
                        <tr>
                            <td width="45%">Kelulusan Akademik</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->kelulusan; ?></td>
                        </tr>
                        <tr>
                            <td width="45%">Kelulusan Kemahiran</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->kemahiran; ?></td>
                        </tr>
                        <tr>
                            <td width="45%">Matlamat Selepas Kursus</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->matlamat; ?></td>
                        </tr>
                        <tr>
                            <td width="45%">Kategori Pemohon</td>
                            <td width="5%">:</td>
                            <td width="50%"><?php echo $row_cetak->kategori_pemohon; ?></td>
                        </tr>
                    </table>

                </td>
                <td></td>
            </tr>
        </table>
    </body>
</html>
