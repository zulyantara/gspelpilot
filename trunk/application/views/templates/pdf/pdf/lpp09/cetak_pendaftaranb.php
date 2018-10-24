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
       <br>
        <fieldset>
            <legend>Senarai Permohonan Pelatih</legend>
            
            <table class="table" id="tbl_senarai_kursus_lanjutan">
                 <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>NO KP</th>
                    <th>NAMA BANK</th>
                     <th>NO AKAUN</th>
                    <th>KELAYAKAN ELAUN</th>
                    <th>BULAN MULA ELAUN</th>
                    <th>BULAN TAMAT ELAUN</th>
                    
                   
                </tr>
                 </thead>
    <tbody>
        <?php
         // print_r($row_data_bank);die();
                                $ni=1;
                                $no =0;
                                if($row_data)
                                foreach($row_data as $r) : ?>
        <tr>
            <td><?php echo $ni; ?></td>
            <td><?php echo $r->nama_penuh; ?></td>
            <td><?php echo $r->no_mykad; ?></td>
            <td><?php echo $r->nama_bank; ?></td>
            <td><?php echo $r->no_akaun; ?> </td>
            <td><?php if ($r->layak_elaun == 1) {
                echo "LAYAK"; 
            } else {
                echo "TIDAK LAYAK"; 
            }
            
            ?></td>
           
              <td><?php echo $r->tarikh_mula_elauan; ?></td>
               <td><?php echo $r->tarikh_tamat_elaun; ?></td>
        <input type="hidden" name="idgiatmara[<?php echo $no; ?>]" value="<?php echo $r->idgiatmara; ?>">
         <input type="hidden" name="layak[<?php echo $no; ?>]" value="<?php echo $r->layak_elaun; ?>">
         <input type="hidden" name="mula[<?php echo $no; ?>]" value="<?php echo $r->tarikh_mula_elauan; ?>">
         <input type="hidden" name="tamat[<?php echo $no; ?>]" value="<?php echo $r->tarikh_tamat_elaun; ?>">
         <input type="hidden" name="bank2[<?php echo $no; ?>]" value="<?php echo $r->nama_bank; ?>">
        </tr>
        <?php    
                                    $no++;
                                    $ni++;
                                    endforeach; ?>
    </tbody>
            </table>

        </fieldset>
</body></html>
