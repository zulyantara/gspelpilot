<?php

	$title = "temuduga_excel";
	header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=$title.xls");
 header("Pragma: no-cache");
 header("Expires: 0");
 
?>
<table>
	<tr>
		<th align="center">No</th>
		<th align="center">Nama <br/>No MyKAD</th>
		<th align="center">No Hp</th>
		<th align="center">Tarikh Temuduga</th>
		<th align="center">Pegawai Dihubungi</th>
		<th align="center">Tarikh Cetakan</th>
	</tr>
	
<?php
	$x=1;
	foreach($idtetapantemuduga as $row){
	 $qry = "SELECT *, c.alamat as alamat1 FROM v_cetakan_surat_temuduga a,permohonan_kursus b, permohonan_butir_peribadi c, ref_giatmara d
                     WHERE a.id_temuduga_tetapan=$row AND
                     a.id_permohonan_kursus = b.id AND
                     b.id_permohonan = c.id AND
                     a.id_giatmara = d.id
            ";
												
    $data = $this->db->query($qry);
    $dataArr = $data->result_array();
				
?>
	<tr>
		<td><?php echo $x?></td>
		<td><?php echo $dataArr[0]["nama_penuh"]."<br/>".$dataArr[0]["no_mykad"] ?></td>
		<td><?php echo $dataArr[0]["no_hp"] ?></td>
		<td><?php echo $dataArr[0]["tarikh_temuduga"] ?></td>
		<td><?php echo $dataArr[0]["pegawai_dihubungi"] ?></td>
		<td><?php echo $dataArr[0]["tarikh_cetakan"] ?></td>
	</tr>
	
<?php
	$x++;
	}
?>
</table>