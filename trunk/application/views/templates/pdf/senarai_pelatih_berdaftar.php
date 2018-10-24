<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <style media="screen">
            body, h1 {
                font-family: Arial;
                font-size: 12px;
            }
        </style>
    </head>
    <body>
        <img style="padding-left: 20px; margin-bottom: 10px;" src="<?php echo FCPATH."assets/images/giatmara03.png"; ?>" height="80" />
        <h1>SENARAI PELATIH BERDAFTAR</h1>
        <table border="1" cellspacing="0" cellpadding="2">
            <tr>
                <th>BIL</th>
                <th>NAMA</th>
                <th>NO. KP</th>
                <th>NO PELATIH</th>
                <th>ELAUN</th>
                <th>SESI</th>
                <th>TARIKH DAFTAR</th>
                <th>TARIKH MULA</th>
                <th>TARIKH TAMAT</th>
            </tr>
            <?php
            if ( ! empty($res_senarai_penawaran_kursus))
            {
                $no=0;
                foreach ($res_senarai_penawaran_kursus as $val_sp)
                {
                    ?>
                    <tr>
                        <td><?php echo $no += 1; ?></td>
                        <td><?php echo strtoupper(strtolower($val_sp->nama)); ?></td>
                        <td><?php echo $val_sp->no_mykad; ?></td>
                        <td><?php echo $val_sp->no_pelatih; ?></td>
                        <td><?php echo $val_sp->kelayakan_elaun == 1 ? "Layak" : "Tidak Layak"; ?></td>
                        <td><?php echo $val_sp->sesi; ?></td>
                        <td><?php echo date("d-m-Y", strtotime($val_sp->tawaran_tarikh_lapordiri)); ?></td>
                        <td><?php echo date("d-m-Y", strtotime($val_sp->tawaran_mula_elaun)); ?></td>
                        <td><?php echo date("d-m-Y",strtotime($val_sp->tawaran_tamat_elaun)); ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </body>
</html>
