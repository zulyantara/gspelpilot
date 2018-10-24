<?php $this->load->view('lpp04_header_1'); ?>
<div class="box box-solid box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Maklumat Pelatih</h3>
    </div>

    <div class="box-body">

        <table class="table table-bordered table-striped table-hover" id="tbl_senarai_temuduga">
            <thead>
                <tr>
                    <th valign="top" rowspan="2">No</th>
                    <th valign="top" rowspan="2">NAMA</th>
                    <th valign="top" rowspan="2">NO. MYKAD</th>
                    <th valign="top" rowspan="2">NO PELATIH</th>
                    <th valign="top" rowspan="2">KURSUS</th>
                    <th valign="top" rowspan="2">GIATMARA</th>
                    <th valign="top" rowspan="2">JENIS PELATIH</th>
                    <th valign="top" colspan="3">TARIKH KURSUS</th>
                    <th valign="top" colspan="4">STATUS</th>
                </tr>
                <tr>
                    <th>DAFTAR</th>
                    <th>MULA</th>
                    <th>TAMAT</th>
                    <th>PELATIH</th>
                    <th>ELAUN</th>
                    
					<th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ( ! empty($res_status_permohonan))
                {
                    $no=0;
                    foreach ($res_status_permohonan as $val_sp)
                    {
                        ?>
                        <tr>
                            <td><?php echo $no += 1; ?></td>
                            <td><?php echo $val_sp->nama_penuh; ?></td>
                            <td><?php echo $val_sp->no_mykad; ?></td>
                            <td><?php echo $val_sp->no_pelatih; ?></td>
                            <td><?php echo $val_sp->nama_kursus; ?></td>
                            <td><?php echo $val_sp->nama_giatmara; ?></td>
                            <td><?php echo $val_sp->jenis_pengambilan; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($val_sp->daftar)); ?></td>
                            <td><?php echo date('d-m-Y', strtotime($val_sp->mula)); ?></td>
                            <td><?php echo date('d-m-Y', strtotime($val_sp->tamat)); ?></td>
                            <td><?php echo $val_sp->status_temuduga; ?></td>
                            <td><?php echo $val_sp->kelayakanelaun; ?></td>
                           
							<td><a href="<?php echo site_url("admin/lpp04/".'x'.$url); ?>/<?php echo $val_sp->id_pelatih; ?>">Open</a></td>
                        </tr>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <tr>
                        <th colspan="14">DATA KOSONG</th>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
