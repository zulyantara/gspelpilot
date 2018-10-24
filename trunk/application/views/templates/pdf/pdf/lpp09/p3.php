<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Surat Temuduga</title>
    <link href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
    
    <style>
    /* DivTable.com */
    .divTable{
        display: table;
        width: 100%;
    }
    .divTableRow {
        display: table-row;
    }
    .divTableHeading {
        background-color: #EEE;
        display: table-header-group;
    }
    .divTableCell, .divTableHead {
        /* border: 1px solid #999999; */
        display: table-cell;
        padding: 3px 10px;
    }
    .divTableHeading {
        background-color: #EEE;
        display: table-header-group;
        font-weight: bold;
    }
    .divTableFoot {
        background-color: #EEE;
        display: table-footer-group;
        font-weight: bold;
    }
    .divTableBody {
        display: table-row-group;
    }
    </style>
</head>
<body>
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell"><img src="<?php echo FCPATH."assets/images/giatmara03.png"; ?>" alt="" width="300"></div>
            </div>

            <div class="divTableRow">
                <div class="divTableCell">&nbsp;</div>
                <div class="divTableCell">
                    <span class="clearfix">Rujukan kami: <b>GM/PEL-TMS-02</b></span>
                    Tarikh: <?php echo date("dd-mm-yyyy"); ?>
                </div>
            </div>

            <div class="divTableRow">
                <div class="divTableCell">
                    <?php echo $row_pemohon->nama_penuh; ?><br>
                    <?php echo $row_pemohon->no_mykad; ?><br>
                    <?php echo $row_pemohon->alamat_pemohon; ?><br>
                </div>
            </div>

            <div class="divTableRow">
                <div class="divTableCell">
                    Tuan/Puan,
                </div>
            </div>

            <div class="divTableRow">
                <div class="divTableCell">
                    <b>TEMUDUGA KEMASUKAN PROGRAM LATIHAN KEMAHIRAN GIATMARA<br>
                        KURSUS - <?php echo $row_pemohon->nama_kursus; ?><br>
                        <?php echo $row_pemohon->nama_giatmara." [".$row_pemohon->kod_giatmara."], ".$row_pemohon->nama_negeri; ?></b>
                </div>
            </div>

            <div class="divTableRow">
                <div class="divTableCell">
                    Dengan hormatnya perkara diatas adalah dirujuk.
                </div>
            </div>

            <div class="divTableRow">
                <div class="divTableCell">
                    Sukacita dimaklumkan Tuan/Puan telah terpilih untuk menghadiri temuduga bagi menjalani latihan kemahiran di GIATMARA. Butiran tersebut adalah seperti berikut:
                    <table>
                        <tr>
                            <td>Tarikh</td>
                            <td>:</td>
                            <td><b><?php echo $row_pemohon->tarikh_temuduga; ?></b></td>
                        </tr>
                        <tr>
                            <td>Kursus</td>
                            <td>:</td>
                            <td><b><?php echo $row_pemohon->nama_kursus; ?></b></td>
                        </tr>
                        <tr>
                            <td>Pusat</td>
                            <td>:</td>
                            <td><b><?php echo $row_pemohon->nama_giatmara; ?></b></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><b><?php echo $row_pemohon->alamat_giatmara; ?></b></td>
                        </tr>
                        <tr>
                            <td>Masa</td>
                            <td>:</td>
                            <td><?php echo $row_pemohon->tarikh_temuduga; ?></td>
                        </tr>
                        <tr>
                            <td>Pegawai Untuk Dihubungi</td>
                            <td>:</td>
                            <td><?php echo $row_pemohon->pegawai_dihubungi; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $row_pemohon->email_giatmara; ?></td>
                        </tr>
                        <tr>
                            <td>No. Telefon</td>
                            <td>:</td>
                            <td><?php echo $row_pemohon->telefon_giatmara; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- DivTable.com -->
</body>
</html>