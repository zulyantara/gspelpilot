<script>

$( document ).ready( function () {

	$("#btn_save_dokumen").click(function(event){

		if ($("#form-dokumen").valid()) {
			event.preventDefault();

			var data = new FormData(document.getElementById("form-dokumen"));

			$.ajax({
				data: data,
				async: false,
				processData: false,
				contentType: false,
				url: "<?php echo site_url("admin/pelatih_lanjutan/dokumen"); ?>",
				type: "POST",
				// dataType: 'json',
				mimeType:"multipart/form-data",
				success: function(data) {
					$('#my-tab a[href="#tab_8"]').tab("show");
					$("#li_tab_8").removeClass("disabledTab");
				}
			})
		}

	});

	$("#btn_tbh_dokumen").click(function(){
								var count = $('#tbl-dokumen tr').length;
								$("#count_image").val(count);
        $("#tbl-dokumen").append("<tr id='baris"+count+"'><td>"+count+"</td><td><input type='text' name='nama_dokumen_"+count+"'></td><td><input type='file' name='dokumen_"+count+"' class='file'></td><td><input type='button' onclick='padamRow("+count+")' value='Padam' class='btn btn-flat btn-primary' id='padam_"+count+"'></td></tr>");
    });

});

function padamRow(nilai) {
	$('#baris'+nilai).remove();
}

</script>
<form enctype="multipart/form-data" name="form-dokumen" id="form-dokumen">
				<input type="hidden" name="count_image" id="count_image" value="1">
				<input type="hidden" name="no_mykad" id="no_mykad" value="<?php echo $no_mykad ?>">
				<input type="hidden" name="idBp" id="idBp" value="<?php echo $idBp ?>">
				<input type="hidden" name="idBpLast" id="idBpLast" value="<?php echo $idBpLast ?>">
    <table class="table" id="tbl-dokumen">
        <tr>
            <th>No</th>
            <th>Nama Dokumen *</th>
												<th>Upload File *</th>
        </tr>
        <tr>
            <td>1</td>
												<td><input type="text" name="nama_dokumen_1"></td>
            <td><input type="file" name="dokumen_1" class="file"></td>
        </tr>
    </table>
    <button type="button"  id="btn_tbh_dokumen" class="btn btn-flat btn-primary">Tambah Dokumen</button>
    <button type="button" name="btn_save_dokumen" id="btn_save_dokumen" class="btn btn-flat btn-primary">Simpan & Seterusnya</button> <br/><br/>
				<?php
						if(count($get_ds)>0){
							$x =1;
					?>
				<table class="table" id="tbl-dokumen-show">
        <tr>
            <th>No</th>
            <th>Nama Dokumen</th>
												<th>File</th>
        </tr>
								<?php foreach($get_ds as $ds) { ?>
        <tr>
            <td><?php echo $x ?></td>
												<td><?php echo $ds->nama_dokumen ?></td>
            <td><a href="../<?php echo $ds->path_dokumen ?>" target="_blank"><img src="../<?php echo $ds->path_dokumen ?>" width="50px" border="0"></a></td>
        </tr>
								<?php
									$x++;
									}
								?>
    </table>
			 <?php
					}
				?>
</form>

<script type="text/javascript">
$(document).ready(function(){
    $("#btn_tbh_dokumen").click(function(){
        var no = $(this).
        $('#tbl-dokumen').append("<tr><td>2</td><td><input type='file' name='txt_nama_dokumen'></td></tr");
    });
});
</script>
