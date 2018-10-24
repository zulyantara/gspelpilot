<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 <h3 align="center">Sijil <?php echo strtoupper($sijil); ?></H3>
  <BR>
<table class ="table table-hover table-striped table-bordered" id = "myTable" style="margin: 0px auto;">
                    <thead style ="background-color:#b3b3b3">
                      <tr>

                        <th>Bil</th>
                        <th>No Sijil</th>
                        <th>Nama</th>
                        <th>No MyKAD</th>
                         <th>Jenis Sijil</th>
                         <th>Nama Giatmara</th>
                        <th>Kursus</th>
                        <th>GCPA</th>
                        
                        
                      
                        <!-- <th rowspan = "2">Pilih <input type="checkbox" name=""></th> -->
                      </tr>
                      
                      
                        
                    </thead>
                    <tbody>
                      <?php
                  // var_dump($moduldetail);die();
                    $ni=1;
                    $no=0;
                  foreach($moduldetail->result() as $r) :
                  ?>
                  <tr>
                    <td><?php echo $ni++; ?></td>
                    <td><?php //echo $r->no_sijil; ?></td>
                    <td><?php echo strtoupper($r->nama) ?></td>
                    <td><?php
                    $singkatan = substr($r->no_mykad, 0, 1);
                    if ($singkatan == "0") {
                      echo "&nbsp;".$r->no_mykad; 
                    } else {
                     echo $r->no_mykad; 
                    }
                      
                    ?></td>
                     <td><?php echo strtoupper($sijil); ?></td>
                      <td><?php echo strtoupper($r->giatmara); ?></td>
                    <td><?php echo strtoupper($r->kursus); ?></td>
                     <td><?php echo $r->gcpa; ?></td>
                  
                   
                  
                  </tr>
                   <?php    
                  $no++;
                  $ni++;
                  endforeach; ?>
                    </tbody>
                  </table>