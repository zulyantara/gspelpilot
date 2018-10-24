            <table class="table table-bordered table-striped table-hover"  id="tbl_surat_temuduga">
                <thead>
				<Tr><td colspan="5"><td colspan="2"><input type=text name="cari" value="<?php echo $this->input->post('cari');?>" ><td><input type=submit value="Search" name="search" >
                    <tr>
                        <th>No</th>
                        <th>NAMA<br>No MyKAD</th>
                        <th>NO TELEFON YANG BOLEH DIHUBUNGI</th>
                        <th>TARIKH TEMUDUGA</th>
                        <th>TEMPAT TEMUDUGA</th>
                        <th>PEGAWAI DIHUBUNGI</th>
                        <th><input type="checkbox" id="chk_all_sp"> SURAT TEMUDUGA</th>
                        <th>TARIKH CETAKAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ( ! empty($res_senarai_permohonan))
                    {
                        $no=0;
                        foreach ($res_senarai_permohonan as $val_sp)
                        {

                    ?>
                    <tr>
                        <td>
                          <?php echo $no += 1; ?>
                          <input type="hidden" name="id_kursus" value="<?php echo $val_sp->id_kursus; ?>">
                          <input type="hidden" name="idtetapantemuduga[]" id="idtetapantemuduga" value="<?php echo $val_sp->id_temuduga_tetapan;?>" >
                        </td>
                        <td><?php echo $val_sp->nama_penuh; ?><br><?php echo $val_sp->no_mykad; ?></td>
                        <td><?php echo $val_sp->no_hp; ?></td>
                        <td><?php echo $val_sp->tarikh_temuduga; ?></td>
                        <td><?php echo $val_sp->tempat_temuduga; ?></td>
                        <td><?php echo $val_sp->pegawai_dihubungi; ?></td>
                        <td align=center>
                            <input type="checkbox" name="chk_temuduga[<?php echo $val_sp->id_temuduga_tetapan; ?>]" value="<?php echo $val_sp->id_temuduga_tetapan; ?>">
                            <!-- <button type="button" onclick="window.open('<?php # echo site_url("admin/lpp04/tetapkan_cetakan_temuduga_cetak/id/".$val_sp->id_temuduga_tetapan); ?>', 'newwindow',windth=900,height=900);" class="btn btn-sm btn-flat btn-primary" id="btn-cetak">CETAK</button> -->
                            <!-- <a href="<?php echo site_url("admin/lpp04/tetapkan_cetakan_temuduga_cetak/id/".$val_sp->id_temuduga_tetapan); ?>" onclick="window.open('<?php echo site_url("admin/lpp04/tetapkan_cetakan_temuduga_cetak/id/".$val_sp->id_temuduga_tetapan); ?>', 'newwindow',windth=900,height=900);">CETAK</a> -->
                        </td>
                        <?php
                        if ($val_sp->tarikh_cetakan != "")
                        {
                            $myDateTime = new DateTime($val_sp->tarikh_cetakan);
                            $newDateString = $myDateTime->format('d-m-Y H:i');
                        }
                        else
                        {
                            $newDateString = "";
                        }
                        ?>
                        <!-- <td><?php #echo $val_sp->tarikh_cetakan; ?></td> -->
                        <td><?php echo $newDateString; ?></td>
                    </tr>
                    <?php
                        }
						?>
					<tr><td colspan=5>
					<td><input type=submit name=prev value="Previous" class="btn btn-flat">
					<td><input type=text name=hal value="<?php echo $hal;?>" readonly size=3>
					<td><input type=submit name=next value="Next" class="btn btn-flat">
						<?php
                    }
                    ?>
                </tbody>
            </table>

