<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <img style="padding-left: 20px;" src="<?php echo FCPATH."assets/images/giatmara03.png"; ?>" height="100" /><br>
        <h2 style="text-align: center;">Senarai Permohonan Kursus</h2>
        <br><br>
        <fieldset>
            <legend>A. Butir Peribadi</legend>
            <table>
                <tr>
                    <td>Nama Penuh</td>
                    <td>:</td>
                    <td><b><?php echo $res_temudugatetapan[0]->nama;?></b></td>
                </tr>
                <tr>
                    <td>No MyKAD</td>
                    <td>:</td>
                    <td><?php echo $res_temudugatetapan[0]->no_mykad;?></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Kursus Yang Telah Dipilih</legend>
            <table>
                <tr>
                    <th>BIL</th>
                    <th>KLUSTER</th>
                    <th>KURSUS</th>
                    <th>NEGERI</th>
                    <th>GIATMARA</th>
                    <th>SESI</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><?php echo $res_temudugatetapan[0]->nama_kluster; ?></td>
                    <td><?php echo $res_temudugatetapan[0]->nama_kursus; ?></td>
                    <td><?php echo $res_temudugatetapan[0]->nama_negeri; ?></td>
                    <td><?php echo $res_temudugatetapan[0]->nama_giatmara; ?></td>
                    <td><?php echo $res_temudugatetapan[0]->nama_giatmara; ?></td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>Tempoh Kursus Dijalankan</legend>
            <table>
                <tr>
                    <td>TARIKH MULA KURSUS / ELAUN</td>
                    <td><?php echo date("d-m-Y", strtotime($res_temudugatetapan[0]->tawaran_mula_elaun)); ?></td>
                </tr>
                <tr>
                    <td>TARIKH TAMAT KURSUS/ELAUN</td>
                    <td><?php echo date("d-m-Y", strtotime($res_temudugatetapan[0]->tawaran_tamat_elaun)); ?></td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>Maklumat Bank</legend>
            <table>
                <tr>
                    <th>NAMA BANK</th>
                    <td><?php echo $res_temudugatetapan[0]->name_bank; ?></td>
                </tr>
                <tr>
                    <th>NO AKAUN</th>
                    <td><?php echo $res_temudugatetapan[0]->no_akaun; ?></td>
                </tr>
                <tr>
                    <th>CARA BAYARAN</th>
                    <td>AUTOPAY</td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>Maklumat Kombinasi Kod</legend>
            <table>
                <tr>
                    <th>Nama</th>
                    <!-- <td><?php echo $res_temudugatetapan[0]->name_kod_kombinasi; ?></td> -->
                    <td><?php echo $res_kod_kombinasi[0]->name; ?></td>

                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>Maklumat Potongan</legend>
            <table>
                <tr>
                    <th>Jenis</th><th></th>
                </tr>
                <?php
                if ($res_tetapan_potongan !== NULL)
                {
                    foreach ($res_tetapan_potongan as $val)
                    {
                        ?>
                        <tr>
                            <td></td><td><?php echo $val->name_potongan; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </fieldset>
    </body>
</html>
