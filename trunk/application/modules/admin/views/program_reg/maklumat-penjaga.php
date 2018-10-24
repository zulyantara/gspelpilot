<div class="panel-body">
  <div class="panel-heading panel-heading-custom" style="color:#fff; background-color:#3c8dbc; font-size:18;">
  <?php
  if ($res_penjaga[0]->jenis_maklumat==1) {
    echo "<font size='3'>Bapa</font>";
  } else {
    echo "<font size='3'>Penjaga/Waris</font>";
  }
  ?>
  </div>
  <table class="table table-stripped table-responsive">
  <tbody>
    <?php
    if ($res_penjaga[0]->jenis_maklumat==1) {
    ?>
    <tr>
      <td><label>Nama Penuh</label></td>
      <td colspan="5"><?php echo $res_penjaga[0]->nama_penuh_bapak ?></td>
    </tr>
    <tr>
      <td><label>Jenis Pengenalan</label></td>
      <td colspan="2"><?php echo $res_penjaga[0]->jenis_pengenalan_bapak ?></td>
      <td><label>No. MyKAD</label></td>
      <td colspan="2"><?php echo $res_penjaga[0]->mykad_bapak ?></td>
    </tr>
    <tr>
      <td><label>Kewarganegaraan</label></td>
      <td colspan="2"><?php echo $res_penjaga[0]->kewarganegaraan_bapak ?></td>
      <td><label><!-- Kategori Penjaga --></label></td>
      <td colspan="2"><!-- <?php echo $res_penjaga[0]->kategori_penjaga_bapak ?> --></td>
    </tr>
    <tr>
      <td><label>No Telefon</label></td>
      <td colspan="2"><?php echo $res_penjaga[0]->no_tel_bapak ?></td>
      <td><label> </label></td>
      <td colspan="2">	 </td>
    </tr>
    <tr>
      <td><label>Bangsa</label></td>
      <td><?php echo $res_penjaga[0]->bangsa_bapak ?></td>
      <td><label><!-- bangsa --></label></td>
      <td><!-- <?php echo $res_penjaga[0]->etnik_bapak ?> --></td>
      <td><label>Agama</label></td>
      <td><?php echo $res_penjaga[0]->agama_bapak ?></td>
    </tr>
    <tr>
      <td><label>Alamat Surat Menyurat</label></td>
      <td colspan="5"><?php echo $res_penjaga[0]->alamat_bapak ?></td>
    </tr>
    <tr>
      <td><label>Negeri</label></td>
      <td>
        <?php
        $res_bandar_negeri = $this->pemohon->get_bandar_negeri_by_poskod($res_penjaga[0]->poskod_bapak);
        echo $res_bandar_negeri[0]->nama_negeri;
        ?>
      </td>
      <td><label>Bandar</label></td>
      <td><?php echo $res_bandar_negeri[0]->bandar; ?></td>
      <td><label>Poskod</label></td>
      <td><?php echo $res_penjaga[0]->poskod_bapak ?></td>
    </tr>
    <tr>
      <td><label>Pekerjaan</label></td>
      <td colspan="2"><?php echo isset($row_pekerjaan_bapak) ? $row_pekerjaan_bapak->nama_pekerjaan : ""; ?></td>
      <td><label>Pendapatan (RM)</label></td>
      <td colspan="2">	<?php echo $res_penjaga[0]->pendapatan_bapak ?></td>
    </tr>
    <tr>
      <td><label>Majikan</label></td>
      <td><?php echo $res_penjaga[0]->majikan_bapak ?></td>
      <td><label>No Telefon Pejabat</label></td>
      <td><?php echo $res_penjaga[0]->no_tel_pejabat_bapak ?></td>
      <td><label>Samb</label></td>
      <td><?php echo $res_penjaga[0]->samb_bapak ?></td>
    </tr>
    <tr>
      <td><label>Alamat Pejabat</label></td>
      <td colspan="5"><?php echo $res_penjaga[0]->alamat_pejabat_bapak ?></td>
    </tr>
	 <tr>
    <td><label>Poskod</label></td>
    <td colspan="5"><?php echo $res_penjaga[0]->b_alamat_pejabat_poskod ?></td>
  </tr>
    <tr>
    <td><label>Bandar</label></td>
    <td colspan="5"><?php echo $res_penjaga[0]->b_alamat_pejabat_bandar2 ?></td>
  </tr>  <tr>
    <td><label>Negeri</label></td>
    <td colspan="5"><?php echo $res_penjaga[0]->b_alamat_pejabat_negeri ?></td>
  </tr>
	
    <?php
    } else {
    ?>
    <tr>
      <td><label>Nama Penuh</label></td>
      <td colspan="2"><?php echo $res_penjaga[0]->nama_penuh_waris ?></td>
      <td><label>Hubungan</label></td>
      <td colspan="2"><?php echo $res_penjaga[0]->hubungan_waris ?></td>
    </tr>
    <tr>
      <td><label>Jenis Pengenalan</label></td>
      <td colspan="2"><?php echo $res_penjaga[0]->jenis_pengenalan_waris ?></td>
      <td><label>No. MyKAD</label></td>
      <td colspan="2"><?php echo $res_penjaga[0]->mykad_waris ?></td>
    </tr>
    <tr>
      <td><label>Kewarganegaraan</label></td>
      <td colspan="2"><?php echo $res_penjaga[0]->kewarganegaraan_waris ?></td>
      <td><label>Kategori Penjaga</label></td>
      <td colspan="2"><?php echo $res_penjaga[0]->kategori_penjaga_waris ?></td>
    </tr>
    <tr>
      <td><label>No Telefon</label></td>
      <td colspan="2"><?php echo $res_penjaga[0]->no_tel_waris ?></td>
      <td><label> </label></td>
      <td colspan="2">	 </td>
    </tr>
    <tr>
      <td><label>Bangsa</label></td>
      <td><?php echo $res_penjaga[0]->bangsa_waris ?></td>
      <td><label><!-- bangsa --></label></td>
      <td><!-- <?php echo $res_penjaga[0]->etnik_waris ?> --></td>
      <td><label>Agama</label></td>
      <td><?php echo $res_penjaga[0]->agama_waris ?></td>
    </tr>
    <tr>
      <td><label>Alamat Surat Menyurat</label></td>
      <td colspan="5"><?php echo $res_penjaga[0]->alamat_waris ?></td>
    </tr>
    <tr>
      <td><label>Negeri</label></td>
      <td>
        <?php
        $res_bandar_negeri = $this->pemohon->get_bandar_negeri_by_poskod($res_penjaga[0]->poskod_waris);
        echo $res_bandar_negeri[0]->nama_negeri;
        ?><?php echo $res_penjaga2['a_negeri2']; ?>
      </td>
      <td><label>Bandar</label></td>
      <td><?php echo $res_bandar_negeri[0]->bandar; ?><?php echo $res_penjaga2['a_bandar2']; ?></td>
      <td><label>Poskod</label></td>
      <td><?php echo $res_penjaga[0]->poskod_waris ?><?php echo $res_penjaga2['a_poskod']; ?></td>
    </tr>
    <tr>
      <td><label>Pekerjaan</label></td>
      <td colspan="2"><?php echo isset($row_pekerjaan_waris) ? $row_pekerjaan_waris->nama_pekerjaan : ""; ?></td>
      <td><label>Pendapatan (RM)</label></td>
      <td colspan="2">	<?php echo $res_penjaga[0]->pendapatan_waris ?></td>
    </tr>
    <tr>
      <td><label>Majikan</label></td>
      <td><?php echo $res_penjaga[0]->majikan_waris ?></td>
      <td><label>No Telefon Pejabat</label></td>
      <td><?php echo $res_penjaga[0]->no_tel_pejabat_waris ?></td>
      <td><label>Samb</label></td>
      <td><?php echo $res_penjaga[0]->samb_waris ?></td>
    </tr>
    <tr>
      <td><label>Alamat Pejabat</label></td>
      <td colspan="5"><?php echo $res_penjaga[0]->alamat_pejabat_waris ?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
  </table>
  <br/>
  <?php
  if ($res_penjaga[0]->jenis_maklumat==1) {
  ?>
  <div class="panel-heading panel-heading-custom" style="color:#fff; background-color:#3c8dbc; font-size:18;">
    <font size="3">Ibu</font>
  </div>
  <table class="table table-stripped table-responsive">
  <tbody>
  <tr>
    <td><label>Nama Penuh</label></td>
    <td colspan="5"><?php echo $res_penjaga[0]->nama_penuh_ibu ?></td>
  </tr>
  <tr>
    <td><label>Jenis Pengenalan</label></td>
    <td colspan="2"><?php echo $res_penjaga[0]->jenis_pengenalan_ibu ?></td>
    <td><label>No. MyKAD</label></td>
    <td colspan="2"><?php echo $res_penjaga[0]->mykad_ibu ?></td>
  </tr>
  <tr>
    <td><label>Kewarganegaraan</label></td>
    <td colspan="2"><?php echo $res_penjaga[0]->kewarganegaraan_ibu ?></td>
    <td><label><!-- Kategori Penjaga--></label></td>
    <td colspan="2"><!-- <?php echo $res_penjaga[0]->kategori_penjaga_ibu ?>--></td>
  </tr>
  <tr>
    <td><label>No Telefon</label></td>
    <td colspan="2"><?php echo $res_penjaga[0]->no_tel_ibu ?></td>
    <td><label> </label></td>
    <td colspan="2">	 </td>
  </tr>
  <tr>
    <td><label>Bangsa</label></td>
    <td><?php echo $res_penjaga[0]->bangsa_ibu ?></td>
    <td><label><!-- bangsa --></label></td>
    <td><!-- <?php echo $res_penjaga[0]->etnik_ibu ?> --></td>
    <td><label>Agama</label></td>
    <td><?php echo $res_penjaga[0]->agama_ibu ?></td>
  </tr>
  <tr>
    <td><label>Alamat Surat Menyurat</label></td>
    <td colspan="5"><?php echo $res_penjaga[0]->alamat_ibu ?></td>
  </tr>
  <tr>
    <td><label>Negeri</label></td>
    <td>
      <?php
      $res_bandar_negeri = $this->pemohon->get_bandar_negeri_by_poskod($res_penjaga[0]->poskod_ibu);
      echo $res_bandar_negeri[0]->nama_negeri;
      ?>
    </td>
    <td><label>Bandar</label></td>
    <td><?php echo $res_bandar_negeri[0]->bandar; ?></td>
    <td><label>Poskod</label></td>
    <td><?php echo $res_penjaga[0]->poskod_ibu ?></td>
  </tr>
  <tr>
    <td><label>Pekerjaan</label></td>
    <td colspan="2"><!-- <?php echo $res_penjaga[0]->pekerjaan_ibu ?>--><?php echo $res_penjaga2['pekerjaan_ibu'];?></td>
    <td><label>Pendapatan (RM)</label></td>
    <td colspan="2">	<?php echo $res_penjaga[0]->pendapatan_ibu ?></td>
  </tr>
  <tr>
    <td><label>Majikan</label></td>
    <td><?php echo $res_penjaga[0]->majikan_ibu ?></td>
    <td><label>No Telefon Pejabat</label></td>
    <td><?php echo $res_penjaga[0]->no_tel_pejabat_ibu ?></td>
    <td><label>Samb</label></td>
    <td><?php echo $res_penjaga[0]->samb_ibu ?></td>
  </tr>
  <tr>
    <td><label>Alamat Pejabat</label></td>
    <td colspan="5"><?php echo $res_penjaga[0]->alamat_pejabat_ibu ?></td>
  </tr>
  <tr>
    <td><label>Poskod</label></td>
    <td colspan="5"><?php echo $res_penjaga[0]->poskod_ibu ?></td>
  </tr>
    <tr>
    <td><label>Bandar</label></td>
    <td colspan="5"><?php echo $res_penjaga[0]->bandar_ibu ?></td>
  </tr>  <tr>
    <td><label>Negeri</label></td>
    <td colspan="5"><?php echo $res_penjaga[0]->nama_negeri_ibu ?></td>
  </tr>
  <?php
  }
  ?>
</tbody>
</table>
</div>
