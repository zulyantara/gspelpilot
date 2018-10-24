<?php $this->load->view('lpp04_header_1'); ?>
<div class="box box-solid box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Maklumat Permohonan</h3>
    </div>

    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="tbl_senarai_temuduga">
                <thead>
                    <tr>
                        <th valign="top" rowspan="2">No</th>
                        <th valign="top" rowspan="2">NAMA</th>
                        <th valign="top" rowspan="2">NO. KP</th>
                        <th valign="top" rowspan="2">NO PELATIH</th>
                        <th valign="top" rowspan="2">KURSUS</th>
                        <th valign="top" rowspan="2">GIATMARA</th>
                        <th valign="top" rowspan="2">JENIS PENGAMBILAN</th>
                        <th valign="top" colspan="3">TARIKH KURSUS</th>
                        <th valign="top" colspan="4">STATUS</th>
                    </tr>
                    <tr>
                        <th>Daftar</th>
                        <th>Mula</th>
                        <th>Tamat</th>
                        <th>Temuduga</th>
                        <th>Pendaftaran</th>
                        <th>Kurikulum</th>
                        <th>Kewangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=0;
                    foreach ($res_status_permohonan as $val_sp)
                    {
                        if ($val_sp->pendaftaran_status == 0)
                        {
                            $pendaftaran_status = "Tidak Sah";
                        }
                        elseif ($val_sp->pendaftaran_status == 1)
                        {
                            $pendaftaran_status = "Sah Senarai Permohonan";
                        }
                        elseif ($val_sp->pendaftaran_status == 2)
                        {
                            $pendaftaran_status = "Gugur";
                        }
                        elseif ($val_sp->pendaftaran_status == 3)
                        {
                            $pendaftaran_status = "Pengesahan Data";
                        }
                        elseif ($val_sp->pendaftaran_status == 4)
                        {
                            $pendaftaran_status = "Hantar Ke Pengurus";
                        }
                        elseif ($val_sp->pendaftaran_status == 5)
                        {
                            $pendaftaran_status = "Berdaftar";
                        }
                        ?>
                        <tr>
                            <td><?php echo $no += 1; ?></td>
                            <td><?php echo $val_sp->nama_penuh; ?></td>
                            <td><?php echo $val_sp->no_mykad; ?></td>
                            <td><?php echo $val_sp->no_pelatih; ?></td>
                            <td><?php echo $val_sp->nama_kursus; ?></td>
                            <td><?php echo $val_sp->nama_giatmara; ?></td>
                            <td><?php echo $val_sp->jenis_pelatih; ?></td>
                            <td><?php echo $val_sp->tawaran_tarikh_lapordiri; ?></td>
                            <td><?php echo $val_sp->tawaran_mula_elaun; ?></td>
                            <td><?php echo $val_sp->tawaran_tamat_elaun; ?></td>
                            <td><?php echo $val_sp->keputusan_temuduga; ?></td>
                            <td><?php if ($val_sp->keputusan_temuduga === "Proses Semakan") echo ""; else echo $pendaftaran_status; ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#tbl_senarai_temuduga").DataTable();
</script>
