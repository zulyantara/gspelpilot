<!-- div class="container" -->
  <div class="panel-body">
    <!-- div class="col-md-12" -->
    <table class="table table-stripped table-responsive">
    <tbody>
      <tr>
        <td><label>Tempat Tinggal</label></td>
        <td>
          <?php
          if ($res_tinggal[0]->tempat_tinggal) {
            echo "Atas Urusan Sendiri";
          } else {
            echo "Perlukan Tempat Tinggal";
          }
          ?>
        </td>
      </tr>
      <tr>
        <td><label>Pengangkutan</label></td>
        <td>
          <?php
          if ($res_tinggal[0]->pengangkutan) {
            echo "Ada Kenderaan Sendiri";
          } else {
            echo "Tiada Kenderaan";
          }
          ?>
        </td>
      </tr>
    </tbody>
    </table>

		<!-- /div -->
  </div>
<!-- /div -->
