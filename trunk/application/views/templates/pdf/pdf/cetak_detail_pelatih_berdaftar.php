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
            <legend>B. Kursus yang dipilih</legend>
            <!-- <table class ="table table-bordered table-striped table-hover" id ="myTable"> -->
            <table border="0">
              <!-- <thead style="background-color:#b3b3b3"> -->

              <tbody>
                <tr>
                  <td><font size="2">BIL</font></td>
                  <td><font size="2">KLUSTER</font></td>
                  <td><font size="2">KURSUS</font></td>
                  <td><font size="2">NEGERI</font></td>
                  <td><font size="2">GIATMARA</font></td>
                  <td><font size="2">SESI</font></td>
                </tr>
                <tr>
                  <td><font size="2">1</td>
                  <td><font size="2"><?php echo $res_temudugatetapan[0]->nama_kluster; ?></font></td>
                  <td><font size="2"><?php echo $res_temudugatetapan[0]->nama_kursus; ?></font></td>
                  <td><font size="2"><?php echo $res_temudugatetapan[0]->nama_negeri; ?></font></td>
                  <td><font size="2"><?php echo $res_temudugatetapan[0]->nama_giatmara; ?></font></td>
                  <td><font size="2"><?php echo $res_temudugatetapan[0]->sesi; ?></font></td>
                </tr>
              </tbody>
            </table>
        </fieldset>

        <fieldset>
            <legend>C. Tempoh Kursus Dijalankan</legend>
            <!-- <table class ="table table-bordered table-striped table-hover" id ="myTable"> -->
            <table>
              <tr>
                <td><font size ="2"><b>TARIKH MULA KURSUS/ELAUN&nbsp;&nbsp;&nbsp;</b></font></td>
                <td class ="col-xs-5">

                   <input type="text" name="tarikh_mula" id="tarikh_mula" value ="<?php echo ($res_temudugatetapan[0]->tawaran_mula_elaun) ? date('d-m-Y', strtotime($res_temudugatetapan[0]->tawaran_mula_elaun)) : date('d-m-Y'); ?>" disabled />

                </td>
                <td></td>
                <td><font size ="2"><b>TARIKH TAMAT KURSUS/ELAUN*&nbsp;&nbsp;&nbsp;</b></font></td>
                <td class ="col-xs-6">

                    <input class="form-control col-xs-12" type="text" name="tarikh_tamat" id="tarikh_tamat" value ="<?php echo ($res_temudugatetapan[0]->tawaran_tamat_elaun) ? date('d-m-Y', strtotime($res_temudugatetapan[0]->tawaran_tamat_elaun)) : date('d-m-Y'); ?>" disabled/>

                </td>
              </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>D. Maklumat Bank</legend>
            <table class ="col-xs-12">
              <tr><td>&nbsp;</td></tr>
              <tr>
                <td class = "col-xs-2"><font size="2"><b>NAMA BANK*</b></font></td>
                <td class = "col-xs-2"><?php echo $res_temudugatetapan[0]->nama_bank; ?>
                </td>
                <td colspan="2"></td>
              </tr>

              <tr><td>&nbsp;</td></tr>
              <tr>
                <td class = "col-xs-2"><font size="2"><b>NO AKAUN*</b></font></td>
                <td class = "col-xs-2"><?php echo $res_temudugatetapan[0]->no_akaun;?></td>
                <td colspan="2"></td>
              </tr>

              <tr><td>&nbsp;</td></tr>
              <tr>
                <td class = "col-xs-2"><font size="2"><b>CARA BAYARAN*</b></font></td>
                <td class = "col-xs-2"><font size="2"><b>AUTOPAY</b></font></td>
                <td colspan="2"></td>
              </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>E. Maklumat Bank</legend>
            <table>
              <tr>
                <td><font size="2"><b>Kod Kombinasi</b>&nbsp;</font></td>
                <td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name." (".$res_kod_kombinasi[0]->code_combination_name.")"; ?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <td><font size="2"><b>Dana</b>&nbsp;</font></td>
                <td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_dana." (".$res_kod_kombinasi[0]->kod_dana.")"; ?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <td><font size="2"><b>Program</b>&nbsp;</font></td>
                <td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_program." (".$res_kod_kombinasi[0]->kod_program.")"; ?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <td><font size="2"><b>Peringkat</b>&nbsp;</font></td>
                <td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_peringkat." (".$res_kod_kombinasi[0]->kod_peringkat.")"; ?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <td><font size="2"><b>Negara</b>&nbsp;</font></td>
                <td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_negara." (".$res_kod_kombinasi[0]->kod_negara.")"; ?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <td><font size="2"><b>Elaun</b>&nbsp;</font></td>
                <td>:&nbsp;<?php echo $res_kod_kombinasi[0]->name_elaun." (".$res_kod_kombinasi[0]->kod_elaun.")"; ?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
            </table>
          </fieldset>

          <fieldset>
              <legend>F. Maklumat Bank</legend>
              <table>
                <thead>

                </thead>
                <tbody>
                  <tr><td><font size="3"><b>Jenis</b>&nbsp;</font></td><td></td></tr>
                  <?php
                  if (count($res_tetapan_potongan>0)) {
                    foreach ($res_tetapan_potongan as $tetapan_potongan) {
                  ?>
                  <tr>
                    <td></td><td class="col-xs-12"><?php echo $tetapan_potongan->name_potongan; ?></td>
                  </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
          </fieldset>

</body></html>
