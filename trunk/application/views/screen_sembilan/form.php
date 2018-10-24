<div class="card">
    <h3 class="card-header">Senarai Pusat GIATMARA dan kursus yang ditawarkan</h3>
	<div class="card-block">
      <form method="post" action="<?php echo site_url("screen_empat"); ?>">
    <div class="row">
      <div class="table-responsive">
        <table class="table table-hover">
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
												
												if (!empty($ref_kluster)){
																foreach ($ref_kluster as $kluster){
																$ref_kursus = $this->mmodel->get_kursus($kluster->id);
												?>
            <tr>
              <td rowspan="<?php echo count($ref_kursus) ?>"><?php echo $kluster->nama_kluster; ?></td>
												  
																<?php
																				$x=1;
																				foreach ($ref_kursus as $kursus)
																								{
																								  if($x == count($ref_kursus)) echo "</tr><tr>";
																											echo "<td>".$kursus->nama_kursus."</td>";
																											echo "<td></td>";
																											echo "<td></td>";
																									$x++;		
																								}
																?>
												</tr>
												<?php
																				}
																}
												?>
            </tr>
          </tbody>
        </table>   
      </div>
      <div class="col-md-12 text-center">
      <ul class="pagination pagination-lg pager" id="myPager"></ul>
      </div>
	</div>
            <div class="btn-group float-right" role="group">
                <button type="submit" name="btn_simpan" value="simpan_seterusnya" class="btn btn-primary">Close</button>
            </div>
    </form>
	</div>
</div>
