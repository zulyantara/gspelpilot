<!-- div class="container" -->
  <div class="panel-body">
    <!-- div class="col-md-12" -->
				<table class="table table-stripped table-responsive">
				<tbody>
					<tr>
						<td><label>Nama Penuh</label></td>
						<td colspan="2"><?php echo $res_butir_peribadi[0]->nama_penuh ?></td>
						<td><label>No. MyKAD</label></td>
						<td colspan="2"><?php echo $res_butir_peribadi[0]->no_mykad ?></td>
					</tr>
					<tr>
						<td><label>Tarikh Lahir</label></td>
						<td colspan="2"><?php echo date('d-m-Y', strtotime($res_butir_peribadi[0]->tarikh_lahir)); ?></td>
						<td><label>Umur</label></td>
						<td colspan="2"><?php echo $res_butir_peribadi[0]->umur ?></td>
					</tr>
					<tr>
						<td><label>Kewarganegaraan</label></td>
						<td colspan="5"><?php echo $res_butir_peribadi[0]->kewarganegaraan ?></td>
					</tr>
					<tr>
						<td><label>No Telefon</label></td>
						<td colspan="2"><?php echo $res_butir_peribadi[0]->no_telefon ?></td>
						<td><label><!-- No Telefon Bimbit --></label></td>
						<td colspan="2">	<!-- <?php echo $res_butir_peribadi[0]->no_hp ?> --></td>
					</tr>
					<tr>
						<td><label>Alamat Surat Menyurat</label></td>
						<td colspan="5"><?php echo $res_butir_peribadi[0]->alamat ?></td>
					</tr>
					<tr>
						<td><label>Negeri</label></td>
						<td><?php echo $res_butir_peribadi[0]->nama_negeri ?><?php echo $res_butir_peribadi2['negeri_3'];?></td>
						<td><label>Bandar</label></td>
						<td><?php echo $res_butir_peribadi[0]->bandar ?><?php echo $res_butir_peribadi2['bandar_3'];?></td>
						<td><label>Poskod</label></td>
						<td><?php echo $res_butir_peribadi[0]->poskod ?><?php echo $res_butir_peribadi2['poskod_3'];?></td>
					</tr>
					<tr>
						<td><label>Emel</label></td>
						<td colspan="5"><?php echo $res_butir_peribadi[0]->emel ?></td>
					</tr>
					<tr>
						<td><label>Bangsa</label></td>
						<td><?php echo $res_butir_peribadi[0]->bangsa ?></td>
						<td><label><!-- bangsa--></label></td>
						<td><!-- <?php echo $res_butir_peribadi[0]->etnik ?> --></td>
						<td><label>Agama</label></td>
						<td><?php echo $res_butir_peribadi[0]->agama ?></td>
					</tr>
					<tr>
						<td><label>Taraf Perkahwinan</label></td>
						<td colspan="5"><?php echo $res_butir_peribadi[0]->taraf_perkahwinan ?></td>
					</tr>
					<tr>
						<td><label>Kategori Kelulusan</label></td>
						<td colspan="2"><?php echo $res_butir_peribadi[0]->kategori_kelulusan ?></td>
						<td><label>Kelulusan</label></td>
						<td colspan="2"><?php echo $res_butir_peribadi[0]->kelulusan ?></td>
					</tr>
					<tr>
						<td><label>Matlamat Selepas Kursus</label></td>
						<td colspan="2"><?php echo $res_butir_peribadi[0]->matlamat ?></td>
						<td><label>Kategori Pemohon</label></td>
						<td colspan="2"><?php echo $res_butir_peribadi[0]->kategori_pemohon ?></td>
					</tr>
				</tbody>
				</table>

		<!-- /div -->
	</div>
<!-- /div -->
