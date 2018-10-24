<!--<form name="frmRegistration" id="registration-form" action="<?php echo site_url(".home/nyoba"); ?>" method="post">-->
		<div class="w3-container">
			<div class="w3-container w3-blue">
				<h4>KURSUS-KURSUS PILIHAN</h4>
			</div>
			<div>
				<br/>
				<div class="row">
					<div align="right">Klik <u><a onclick="document.getElementById('id02').style.display='block'">di sini</a></u> untuk melihat senarai Pusat GIATMARA dan kursus yang ditawarkan</div> <br/>
							<div class="container col-md-12">
							<ul class="nav nav-tabs  col-md-12 ">
								<li class="active"><a data-toggle="tab" href="#menu1">Negeri</a></li>
							 <li><a data-toggle="tab" href="#home">Kursus</a></li>
							  </ul>
							  <div class="tab-content">
							    <div id="home" class="tab-pane fade ">
									 <h3>Sila Pilih Berdasarkan Kursus</h3>
									 <br>
										<!--<form action="<?php echo site_url("home/savekursusa"); ?>" method="post" id="form2">-->
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


									<!--</form>-->
						    			</div>
							    <div id="menu1" class="tab-pane fade in active">
										<br>
							      <h3>Sila Pilih Berdasarkan Negeri</h3>
										<br>
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
																											 		<<option value="" selected="selected">Sila Pilih</option>
									 																	 </select>
									 																 </div>
									 														 </td>
									 										 </tr>
									 									 </tbody>
									 				 </table>
									 			 </div>

							    </div>
							  </div>

<button type="button" value="add" onClick="updateForm();" class="btnAction"/>Add To Table</button>
<div style="text-align:center;" class="table-responsive">
	<table id="results" width="660" border="1"  align="center">
			<thead>
			<tr  >

					<th scope="col" width="520" style="text-align:center;">KURSUS</th>
					<th scope="col" width="520" style="text-align:center;">GIATMARA</th>
					<th scope="col" width="520" style="text-align:center;">AKSI</th>
			</tr>

			</thead>
	</table>
</div>
<!--
</form>

	<br>
<button type="button" id="somebutton">Nyoba</button>
-->
<script>

$('#somebutton').click(function() {
	var array = [];
	  var headers = [];
	  $('#results th').each(function(index, item) {
	      headers[index] = $(item).html();
	  });
	  $('#results tr').has('td').each(function() {
	      var arrayItem = {};
	      $('td', $(this)).each(function(index, item) {
	          arrayItem[headers[index]] = $(item).html();
	      });
	      array.push(arrayItem);
	  });

	//var table = $('#results').tableToJSON();
				//	console.log(table);
						$.ajax({
						url: '<?php echo base_url();?>home/nyoba',
						type: 'POST',
						data: {'submit':true},
						success: function (result) {
						 // alert("Your data has been saved");
						alert(JSON.stringify(array));
						}
				});

});

</script>
<!-- The Modal -->
<div id="id02" class="w3-modal">
<div class="w3-modal-content w3-animate-top w3-card-4">
<header class="w3-container w3-blue">
	<span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-large w3-blue w3-display-topright">&times;</span>
	<h3>Info Giatmara</h3>
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
				<tr>
				<?php
$data = array_filter($row_data['nyoba']);
$susah = array();
foreach($data as $r ) :?>
<td><?php echo $r->nama_kluster;?></td>
<td><?php echo $r->nama_kursus; ?></td>
<td><?php echo $r->nama_negeri; ?></td>
 <td><?php echo $r->nama_giatmara; ?></td>
    </tr>
<?php		# code...
	 endforeach; ?>

			</tbody>
		</table>
	</div>
	</div>
	</div>
	</div>


						</div>
      <div class="col-md-12 text-center">
      <ul class="pagination pagination-lg pager" id="myPager"></ul>
      </div>
				</div>
			</div>
		</div>

<!--</form>-->
<script>

var target = null;

function tableclick(e) {
    if(!e)
     e = window.event;
    if(e.target.value == "Delete")
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
			var idl = document.getElementById("cityid3");
			var id =document.getElementById("cityid3").value;
			var kursus = document.getElementById('cityid2').options[document.getElementById('cityid2').selectedIndex].text;
			var giatmara = document.getElementById('cityid4').options[document.getElementById('cityid4').selectedIndex].text;
			var id2 =document.getElementById("cobaid3").value;
			var kursus2 = document.getElementById('cobaid4').options[document.getElementById('cobaid4').selectedIndex].text;
			var giatmara2 = document.getElementById('cobaid2').options[document.getElementById('cobaid2').selectedIndex].text;


			if (id2 =="pilih") {
				alert("Sila Pilih Kursus Berdasarkan Negeri / Kursus. ");
				return;
			}

			//alert(target);
			var table=document.getElementById("results");
						var num_rows = table.rows.length;
						if (num_rows > 3) return;

						var row=table.insertRow(-1);
						var cell1=row.insertCell(0);
						var cell2=row.insertCell(1);
						var cell3=row.insertCell(2);
						var cell4=row.insertCell(3);

							if (target == "#menu1") {
							cell4.innerHTML="<td> <input type='hidden' name='kursus"+num_rows+"' id='kursus"+num_rows+"' value='"+id2+"'><td>";
							cell1.innerHTML="<td>"+kursus2+"<td>";
							cell2.innerHTML="<td>"+giatmara2+"<td>";
							cell3.innerHTML="<td><input type='button' value='Delete' /><td>";

						}else if (target == "#home") {
							cell4.innerHTML="<td><input type='hidden' name='kursus"+num_rows+"' id='kursus"+num_rows+"' value='"+id+"'><td>";
							cell1.innerHTML="<td>"+kursus+"<td>";
							cell2.innerHTML="<td>"+giatmara+"<td>";
							cell3.innerHTML="<td><input type='button' value='Delete' /><td>";
							}else {
								cell4.innerHTML="<td><input type='hidden' name='kursus"+num_rows+"' id='kursus"+num_rows+"' value='"+id2+"'><td>";
								cell1.innerHTML="<td>"+kursus2+"<td>";
								cell2.innerHTML="<td>"+giatmara2+"<td>";
								cell3.innerHTML="<td><input type='button' value='Delete' /><td>";

							}

}

	var defOption ='<option value=""> Sila Pilih</option>';
    $(document).ready(function() {
        $('select[name="city"]').on('change', function() {
						var BASE_URL = "<?php echo base_url();?>";
						$('#cityid2').html(defOption );
            var stateID = $(this).val();
						var e = document.getElementById("cityid");
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url();?>home/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
											$('select[name="city2"]').empty();
	                    $.each(data, function(key, value) {
											$('select[name="city2"]').append('<option value="'+ value.id +'">'+ value.nama_kursus +'</option>');
											$('#cityid3').html(defOption );
											$('#cityid4').html(defOption );
										});

                    }
              	});
            }else{
              $('select[name="city"]').empty();

            }
        });
    });

		$(document).ready(function() {
				$('select[name="city2"]').on('change', function() {
						var BASE_URL = "<?php echo base_url();?>";
							$('#cityid3').html(defOption );
						var stateID = $(this).val();
						//	var stateID = $('select[name="city2"]').val();
						var e = document.getElementById("cityid");
						if(stateID) {
								$.ajax({
										url: '<?php echo base_url();?>home/ajaxkn/'+stateID,
										type: "GET",
										dataType: "json",
										success:function(data) {
										$('select[name="city3"]').empty();
										$.each(data, function(key, value) {
									 $('select[name="city3"]').append('<option value="'+ value.id +'">'+ value.negeri +'</option>');
									$('#cityid4').html(defOption );
										});
										}
								});
						}else{
								$('select[name="city2"]').empty();
						}
				});
		});

		$(document).ready(function() {
				$('select[name="city3"]').on('change', function() {
						var BASE_URL = "<?php echo base_url();?>";
						$('#cityid4').html(defOption );
						//var stateID = $(this).val();
						var stateID = $('select[name="city2"]').val();
									if(stateID) {
								$.ajax({
										url: '<?php echo base_url();?>home/ajaxkg/'+stateID,
										type: "GET",
										dataType: "json",
										success:function(data) {
										$('select[name="city4"]').empty();
										$.each(data, function(key, value) {
									 $('select[name="city4"]').append('<option value="'+ value.id +'">'+ value.giatmara +'</option>');
										});
										}
								});
						}else{
							$('select[name="city3"]').empty();
						}
				});
		});

				$(document).ready(function() {
						$('select[name="coba"]').on('change', function() {
								var BASE_URL = "<?php echo base_url();?>";
								var stateID = $(this).val();
									$('#cobaid2').html(defOption );
											if(stateID) {
										$.ajax({
												url: '<?php echo base_url();?>home/ajaxng/'+stateID,
												type: "GET",
												dataType: "json",
												success:function(data) {
												$('select[name="coba2"]').empty();
												$.each(data, function(key, value) {
											 	$('select[name="coba2"]').append('<option value="'+ value.id +'">'+ value.nama_giatmara +'</option>');
											 	$('#cobaid3').html(defOption );
												$('#cobaid4').html(defOption );
												});
												}
										});
								}else{
									$('select[name="coba"]').empty();
								}
						});
				});

				$(document).ready(function() {
						$('select[name="coba2"]').on('change', function() {
								var BASE_URL = "<?php echo base_url();?>";
								var stateID = $(this).val();
									$('#cobaid3').html(defOption );
											if(stateID) {
										$.ajax({
												url: '<?php echo base_url();?>home/ajaxnk/'+stateID,
												type: "GET",
												dataType: "json",
												success:function(data) {
												$('select[name="coba3"]').empty();
												$.each(data, function(key, value) {
											 	$('select[name="coba3"]').append('<option value="'+ value.id +'">'+ value.kluster +'</option>');
												$('#cobaid4').html(defOption );
												});
												}
										});
								}else{
									$('select[name="coba2"]').empty();
								}
						});
				});

				$(document).ready(function() {
						$('select[name="coba3"]').on('change', function() {
								var BASE_URL = "<?php echo base_url();?>";
									$('#cobaid4').html(defOption );
								//	var stateID = $(this).val();
									var stateID = $('select[name="coba2"]').val();
											if(stateID) {
										$.ajax({
												url: '<?php echo base_url();?>home/ajaxnkr/'+stateID,
												type: "GET",
												dataType: "json",
												success:function(data) {
												$('select[name="coba4"]').empty();
												$.each(data, function(key, value) {
											 $('select[name="coba4"]').append('<option value="'+ value.id +'">'+ value.nama_kursus +'</option>');
												});
												}
										});
								}else{
									$('select[name="coba3"]').empty();
								}
						});
				});



</script>
