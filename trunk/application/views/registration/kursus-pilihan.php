<style>
#registration-step{margin:0;padding:0;}
#registration-step li{list-style:none; float:left;padding:15px 15px;border-top:#EEE 1px solid;border-left:#EEE 1px solid;border-right:#EEE 1px solid;}
#registration-step li.highlight{background-color:#EEE;}
.demoInputBox{padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
.registration-error{color:#FF0000;}
.error{color:#FF0000;}
.message {color: #00FF00;font-weight: bold;width: 100%;padding: 10;}
.btnAction{padding: 5px 10px;background-color: #09F;border: 0;color: #FFF;cursor: pointer; margin-top:15px;}
</style>

<div class="container">
    <?php
    $data_h['id_pbp'] = $row_data['idBp'];
    $this->load->view('registration/header', $data_h);
    ?>
    <div class="row mt-2">
        <div class="col-md-12">
			<div class="w3-container" style="clear:both;border:1px #EEE solid;padding:20px; position:relative;">
				<div class="w3-container w3-blue">
					<h4>KURSUS-KURSUS PILIHAN</h4>
				</div>
				<div class="row">
                    <div class="col-md-6">
                        <b style="color: #ff0000;">Sila pilih minimum 1 kursus dan maksimum 3 kursus</b>
                    </div>
                    <div class="col-md-6">
    					<div align="right">
    						Klik <u><a onclick="document.getElementById('id02').style.display='block'">di sini</a></u>
    						untuk melihat senarai Pusat GIATMARA dan kursus yang ditawarkan
    					</div>
                    </div>

					<div class="container col-md-12">
						<!-- Tab Pilihan Negeri/Kursus -->
						<!-- <ul class="nav nav-tabs  col-md-12 ">
                            <li class="active"><a data-toggle="tab" href="#menu1">Negeri</a></li>
                            <li><a data-toggle="tab" href="#home">Kursus</a></li>
                        </ul> -->

                        <div class="tab-content">
                            <!-- Konten Negeri -->
                            <!-- <div id="home" class="tab-pane fade ">
                                <h3>Sila Pilih Berdasarkan Kursus</h3>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>PILIHAN KLUSTER</th>
                                                <th>PILIHAN KURSUS</th>
                                                <th>PILIHAN NEGERI</th>
                                                <th>PILIHAN GIATMARA</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <tr>
                                                <td>
                                                    <div class="form-group" style="width:200px">
                                                        <select name="city" class="form-control" style="width:200px" id="cityid">
                                                            <option value="">Sila Pilih</option>
                                                            <?php
                                                            if ( ! empty($row_data[ref_kluster]))
                                                            {
                                                                foreach ($row_data[ref_kluster] as $row)
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->nama_kluster; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group" tyle="width:200px">
                                                        <select name="city2" class="form-control" style="width:200px" id="cityid2">
                                                            <option value="">Sila Pilih</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group" tyle="width:200px">
                                                        <select name="city3" class="form-control" style="width:200px" id="cityid3" >
                                                            <option value="pilih">Sila Pilih</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group" tyle="width:200px">
                                                        <select name="city4" class="form-control" style="width:200px" id="cityid4">
                                                            <option value="">Sila Pilih</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> -->

							<!-- Konten Kursus -->
                            <div id="menu1" class="tab-pane fade in active">
                                <h3>Sila Pilih Berdasarkan Negeri</h3>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>PILIHAN NEGERI</th>
                                                <th>PILIHAN GIATMARA</th>
                                                <th>PILIHAN KLUSTER</th>
                                                <th>PILIHAN KURSUS</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <tr>
                                                <td>
                                                    <div class="form-group" tyle="width:200px">
                                                        <select name="coba" class="form-control" style="width:200px" id="cobaid">
                                                            <option value="" selected="selected">Sila Pilih</option>
                                                            <?php
                                                            if ( ! empty($row_data[ref_negeri]))
                                                            {
                                                                foreach ($row_data[ref_negeri] as $row)
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->nama_negeri; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group" tyle="width:200px">
                                                        <select name="coba2" class="form-control" style="width:200px" id="cobaid2">
                                                            <option value="" selected="selected">Sila Pilih</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group" tyle="width:200px">
                                                        <select name="coba3" class="form-control" style="width:200px" id="cobaid3" >
                                                            <option value="" selected="selected">Sila Pilih</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group" tyle="width:200px">
                                                        <select name="coba4" class="form-control" style="width:200px" id="cobaid4">
                                                            <option value="" selected="selected">Sila Pilih</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button type="button" value="add" onClick="updateForm();" class="btnAction"/>Simpan Pilihan Kursus</button>
                        </div>

						<div class="form-check">
							<span id="pilihan-error" style="color:red"></span>
						</div>

						<form name="form-kursus" id="form-kursus" method="post">
                            <input type="hidden" name="idBp" id="idBp" value="<?php echo $row_data['idBp']; ?>">
                            <input type="hidden" name="id" id="id" value="<?php echo $row_data['id']; ?>">
                            <div style="text-align:center; margin-top: 10px;" class="table-responsive">
                                <table id="results"  align="center" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="520" style="text-align:center;">KURSUS</th>
                                            <th scope="col" width="520" style="text-align:center;">GIATMARA</th>
                                            <th scope="col" width="520" style="text-align:center;">TINDAKAN</th>
                                        </tr>
                                        <?php
                                        if ($row_data['kursus']) {
                                            ?>
											<?php if(!empty($row_data['kursus']->kursus1)):?>
                                            <tr>
                                                <td>
                                                    <?php echo $row_data['kursus']->kursus1; ?>
																																																				<input type='hidden' name='kursus1' id='kursus1' value='<?php echo $row_data['kursus']->id_kursus1; ?>'>
                                                </td>
                                                <td><?php echo $row_data['kursus']->giatmara1; ?></td>
                                                <td><input type="button" value="Padam" class="btn btn-primary btn-sm" /></td>
																																																<!--
                                                <td><input type='hidden' name='kursus1' id='kursus1' value='<?php echo $row_data['kursus']->id_kursus1; ?>'></td>
																																																-->
                                            </tr>
											<?php endif;?>
											<?php if(!empty($row_data['kursus']->kursus2)):?>
                                            <tr>
                                                <td>
                                                    <?php echo $row_data['kursus']->kursus2; ?>
																																																				<input type='hidden' name='kursus2' id='kursus2' value='<?php echo $row_data['kursus']->id_kursus2; ?>'>
                                                </td>
                                                <td><?php echo $row_data['kursus']->giatmara2; ?></td>
                                                <td><input type="button" value="Padam" class="btn btn-primary btn-sm" /></td>
                                                <!--
																																																<td><input type='hidden' name='kursus2' id='kursus2' value='<?php echo $row_data['kursus']->id_kursus2; ?>'></td>
																																																-->
                                            </tr>
											<?php endif;?>
											<?php  if(!empty($row_data['kursus']->kursus3)):?>
                                            <tr>
                                                <td>
                                                    <?php echo $row_data['kursus']->kursus3; ?>
																																																				<input type='hidden' name='kursus3' id='kursus3' value='<?php echo $row_data['kursus']->id_kursus3; ?>'>
                                                </td>
                                                <td><?php echo $row_data['kursus']->giatmara3; ?></td>
                                                <td><input type="button" value="Padam" class="btn btn-primary btn-sm" /></td>
                                                <!--<td><input type='hidden' name='kursus3' id='kursus3' value='<?php echo $row_data['kursus']->id_kursus3; ?>'></td>-->
                                            </tr>
											<?php endif;?>
                                            <?php
                                        }
                                        ?>
                                    </thead>
                                </table>
                            </div>
                            <input class="btnAction btn btn-primary" type="button" name="next" id="next" value="Simpan &amp; Seterusnya" >
                        </form>
                    </div>
				</div>
			</div>

            <!-- The Modal -->
            <div id="id02" class="w3-modal">
                <div class="w3-modal-content w3-animate-top w3-card-4">
                    <header class="w3-container w3-blue">
                        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-large w3-blue w3-display-topright">&times;</span>
                        <h3>Kursus yang ditawarkan di GIATMARA</h3>
                    </header>
                    <div class="w3-container">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-hover datares">
                                <thead>
                                    <tr>
                                        <th>KLUSTER</th>
                                        <th>NAMA KURSUS</th>
                                        <th>NEGERI</th>
                                        <th>GIATMARA</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                    $data = array_filter($row_data['nyoba']);
                                    $susah = array();
                                    foreach($data as $r ) :
                                        ?>
                                        <tr>
                                            <td><?php echo $r->nama_kluster;?></td>
                                            <td><?php echo $r->nama_kursus; ?></td>
                                            <td><?php echo $r->nama_negeri; ?></td>
                                            <td><?php echo $r->nama_giatmara; ?></td>
                                        </tr>
                                        <?php		# code...
                                    endforeach;
									?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End modal -->

        </div>
        <div class="col-md-12 text-center">
            <ul class="pagination pagination-lg pager" id="myPager"></ul>
        </div>
	</div>
</div>

<script>
$('#next').click(function(event) {
    event.preventDefault();

    var rowCount = $('#results tr').length;
    var pilihan1 = $("#kursus1").val();
    var pilihan2 = $("#kursus2").val();
    var pilihan3 = $("#kursus3").val();
    //console.log($("#kursus3").val());
    /*if (($("#kursus1").val() == null || $("#kursus1").val() == "") ||
    ($("#kursus2").val() == null || $("#kursus2").val() == "") ||
    ($("#kursus3").val() == null || $("#kursus3").val() == "")) {*/
    if (rowCount<2) {  // sementara di remark, sampai ada konfirmasi benar boleh pilih 1 kursus
        // Jika lebih kecil dari 2, artinya hanya ada 1 row yaitu header table
        //console.log('Kurang dari 3');
        $("#pilihan-error").html("");
        $("#pilihan-error").html("Sila isikan minimum 1 pilihan kursus.");
    } else {
      $("#pilihan-error").html("");
		  $.ajax({
        data: $("#form-kursus").serialize(),
        url: '<?php echo base_url();?>registration/simpan_kursus',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
                if (data.status == 1) {
                    var loc = "<?php echo site_url('registration/penjaga/mykad/'); ?>";
                    window.location = loc + data.mykad;
                } else {
                    var loc = "<?php echo site_url('registration/kursus/mykad/'); ?>";
                   window.location = loc + data.mykad;
                }
            }
        });
    }
});

var target = null;

function tableclick(e) {
	if(!e)
	e = window.event;
	if(e.target.value == "Padam")
		deleteRow( e.target.parentNode.parentNode.rowIndex );
}

document.getElementById('results').addEventListener('click',tableclick,false);

function deleteRow(x) {
    document.getElementById("results").deleteRow(x);
}

$(function () {
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		target = $(e.target).attr("href");
	});
})

function updateForm() {
	var idl2 = document.getElementById("cobaid3");
	// var idl = document.getElementById("cityid3");
	// var id =document.getElementById("cityid3").value;
	// var kursus = document.getElementById('cityid2').options[document.getElementById('cityid2').selectedIndex].text;
	// var giatmara = document.getElementById('cityid4').options[document.getElementById('cityid4').selectedIndex].text;

	var id2 = document.getElementById("cobaid4").value;
	var kursus2 = document.getElementById('cobaid4').options[document.getElementById('cobaid4').selectedIndex].text;
	var giatmara2 = document.getElementById('cobaid2').options[document.getElementById('cobaid2').selectedIndex].text;

	// var id_nn =document.getElementById("cityid4").value;

  var pilihan1 = $("#kursus1").val();
  var pilihan2 = $("#kursus2").val();
  var pilihan3 = $("#kursus3").val();



	//alert(target);
	var table=document.getElementById("results");
	var num_rows = table.rows.length;

 if (target == "#home") {
		if (id_nn == "") {
				alert("Sila Pilih Kursus Berdasarkan Negeri / Kursus. ");
				return;
	 }

			if (pilihan1 === undefined) {

				}else if(pilihan1 == id_nn){
						alert('Pilihan sudah dipilih');
						return;
				}else if(pilihan2 == id_nn){
						alert('Pilihan sudah dipilih');
						return;
				}

	}else if (target == "#menu1") {
  if (id2 == "") {
				alert("Sila Pilih Kursus Berdasarkan Negeri / Kursus. ");
				return;
  }

		if (pilihan1 === undefined) {

				}else if(pilihan1 == id2){
						alert('Pilihan sudah dipilih');
						return;
				}else if(pilihan2 == id2){
						alert('Pilihan sudah dipilih');
						return;
				}

	}else{
			if (id2 == "") {
				alert("Sila Pilih Kursus Berdasarkan Negeri / Kursus. ");
				return;
  }

				if (pilihan1 === undefined) {

				}else if(pilihan1 == id2){
						alert('Pilihan sudah dipilih');
						return;
				}else if(pilihan2 == id2){
						alert('Pilihan sudah dipilih');
						return;
				}

	}


	if (num_rows > 3) {
        alert("Anda hanya boleh memilih maksimum 3 kursus sahaja");
        return;
    }


		/*
  if (id==pilihan1 || id==pilihan2 || id==pilihan3 ||
  id2==pilihan1 || id2==pilihan2 || id2== pilihan3) {
    alert('Pilihan sudah dipilih');
    return;
  }
*/

	var row=table.insertRow(-1);
	var cell1=row.insertCell(0);
	var cell2=row.insertCell(1);
	var cell3=row.insertCell(2);
	var cell4=row.insertCell(3);

	if (target == "#home") {
		//cell4.innerHTML="<td> <input type='hidden' name='kursus"+num_rows+"' id='kursus"+num_rows+"' value='"+id2+"'><td>";
		cell1.innerHTML="<td>"+kursus+" <input type='hidden' name='kursus"+num_rows+"' id='kursus"+num_rows+"' value='"+id_nn+"'><td>";
		cell2.innerHTML="<td>"+giatmara+"<td>";
		cell3.innerHTML="<td><input type='button' value='Padam' class='btn btn-primary' /><td>";
	} else if (target == "#menu1") {
		//cell4.innerHTML="<td><input type='hidden' name='kursus"+num_rows+"' id='kursus"+num_rows+"' value='"+id+"'><td>";
		cell1.innerHTML="<td>"+kursus2+" <input type='hidden' name='kursus"+num_rows+"' id='kursus"+num_rows+"' value='"+id2+"'><td>";
		cell2.innerHTML="<td>"+giatmara2+"<td>";
		cell3.innerHTML="<td><input type='button' value='Padam' class='btn btn-primary' /><td>";
	} else {
		//cell4.innerHTML="<td><input type='hidden' name='kursus"+num_rows+"' id='kursus"+num_rows+"' value='"+id2+"'><td>";
		cell1.innerHTML="<td>"+kursus2+" <input type='hidden' name='kursus"+num_rows+"' id='kursus"+num_rows+"' value='"+id2+"'><td>";
		cell2.innerHTML="<td>"+giatmara2+"<td>";
		cell3.innerHTML="<td><input type='button' value='Padam' class='btn btn-primary' /><td>";
	}
}

var defOption ='<option value=""> Sila Pilih</option>';

// PILIHAN UNTUK TAB KURSUS
// Pilihan Kluster
$(document).ready(function() {
	$('select[name="city"]').on('change', function() {
		var BASE_URL = "<?php echo base_url();?>";
		$('#cityid2').html(defOption );
		var stateID = $(this).val();
		var e = document.getElementById("cityid");
		if(stateID) {
			$.ajax({
				url: '<?php echo base_url();?>registration/ajax/'+stateID,
				type: "GET",
				dataType: "json",
				success:function(data) {
					// $('select[name="city2"]').empty();
					$.each(data, function(key, value) {
						$('select[name="city2"]').append('<option value="'+ value.id_kursus +'">'+ value.nama_kursus +'</option>');
						$('#cityid3').html(defOption );
						$('#cityid4').html(defOption );
					});
				}
			});
		} else {
			$('select[name="city"]').empty();
		}
	});

    // Pilihan Kursus
	$('select[name="city2"]').on('change', function() {
		var BASE_URL = "<?php echo base_url();?>";
		$('#cityid3').html(defOption );
		var stateIDCITY2 = $(this).val();
		//	var stateID = $('select[name="city2"]').val();
        // alert(stateIDCITY2);
		var e = document.getElementById("cityid");
		if(stateIDCITY2) {
			$.ajax({
				url: '<?php echo base_url();?>registration/ajaxkn/'+stateIDCITY2,
				type: "GET",
				dataType: "json",
				success:function(data) {
					// $('select[name="city3"]').empty();
					$.each(data, function(key, value) {
						$('select[name="city3"]').append('<option value="'+ value.id +'">'+ value.negeri +'</option>');
						$('#cityid4').html(defOption );
					});
				}
			});
		} else {
			$('select[name="city2"]').empty();
		}
	});

    // Pilihan Negeri
	$('select[name="city3"]').on('change', function() {
		var BASE_URL = "<?php echo base_url();?>";
		$('#cityid4').html(defOption );
		//var stateID = $(this).val();
		var courseID = $('select[name="city2"]').val();
    var stateID = $('select[name="city3"]').val();
		if(stateID) {
			$.ajax({
				url: '<?php echo base_url();?>registration/ajaxkx/'+courseID+'/'+stateID,
				type: "GET",
				dataType: "json",
				success:function(data) {
					$('select[name="city4"]').empty();
					$.each(data, function(key, value) {
						$('select[name="city4"]').append('<option value="'+ value.id +'">'+ value.giatmara +'</option>');
					});
				}
			});
		} else {
			$('select[name="city3"]').empty();
		}
	});

    // PILIHAN UNTUK TAB NEGERI
    // Pilihan Negeri
	$('select[name="coba"]').on('change', function() {
		var BASE_URL = "<?php echo base_url();?>";
		var stateID = $(this).val();
		$('#cobaid2').html(defOption );
		if(stateID) {
			$.ajax({
				url: '<?php echo base_url();?>registration/ajaxng/'+stateID,
				type: "GET",
				dataType: "json",
				success:function(data) {
					// $('select[name="coba2"]').empty();
					$.each(data, function(key, value) {
						$('select[name="coba2"]').append('<option value="'+ value.id +'">'+ value.nama_giatmara +'</option>');
						$('#cobaid3').html(defOption );
						$('#cobaid4').html(defOption );
					});
				}
			});
		} else {
			$('select[name="coba"]').empty();
		}
	});

    // Pilihan Giatmara
	$('select[name="coba2"]').on('change', function() {
		var BASE_URL = "<?php echo base_url();?>";
		var stateID = $(this).val();
		$('#cobaid3').html(defOption );
		if(stateID) {
			$.ajax({
				url: '<?php echo base_url();?>registration/ajaxnk/'+stateID,
				type: "GET",
				dataType: "json",
				success:function(data) {
					// $('select[name="coba3"]').empty();
					$.each(data, function(key, value) {
						$('select[name="coba3"]').append('<option value="'+ value.idkluster +'">'+ value.kluster +'</option>');
						$('#cobaid4').html(defOption );
					});
				}
			});
		} else {
			$('select[name="coba2"]').empty();
		}
	});

    // Pilihan Kluster
	$('select[name="coba3"]').on('change', function() {
		var BASE_URL = "<?php echo base_url();?>";
		$('#cobaid4').html(defOption );
		var stateID = $('select[name="coba2"]').val();
    var clusterID = $(this).val();
    // console.log("giatmara="+stateID+",cluster="+clusterID);
		if(stateID && clusterID) {
			$.ajax({
				url: '<?php echo base_url();?>registration/ajaxnkr/'+stateID+'/'+clusterID,
				type: "GET",
				dataType: "json",
				success:function(data) {
					$('select[name="coba4"]').empty();
					$.each(data, function(key, value) {
						$('select[name="coba4"]').append('<option value="'+ value.id_setting_penawaran_kursus +'">'+ value.nama_kursus + ' ('+value.kod_intake+')'+'</option>');
					});
				}
			});
		} else {
			$('select[name="coba3"]').empty();
		}
	});
});
</script>
