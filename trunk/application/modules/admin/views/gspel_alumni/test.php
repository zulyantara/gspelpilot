<style type="text/css">
  
  .panel-custom-horrible-red {
    border-color:  #000063 ;
}
.panel-custom-horrible-red > .panel-heading {
    background:  #000063 ; 
    color:  #000063 ;
    border-color:  #000063  ;


}


.panel-custom-horrible-orange {
    border-color:  orange ;
}
.panel-custom-horrible-orange > .panel-heading {
    background:  orange ; 
    color:  orange ;
    border-color:  orange  ;
    }

    .panel-custom-horrible-black {
    border-color:  black ;
}
.panel-custom-horrible-black > .panel-heading {
    background:  black ; 
    color:  black ;
    border-color: black ;
    }
</style>
<div class="row">

	<div class="col-md-12">
		<div class="box ">
				<div class="panel panel-custom-horrible-red"  >
				<div class="panel-heading " >
					<h4 style="color: white">BAHAGIAN A : MAKLUMAT PERIBADI</h4>
				</div>
  				<div class="panel-body" >

  		            <div class ="table table-responsive">

      <form class="form-horizontal col-md-12" action="<?php echo site_url('');?>" method="post">
        <fieldset>
       <!--  <table> -->
          
            <div class="col-md-9">
        <!-- <div class="form-horizontal"> -->
        <div class="form-group">
            <label class="col-md-4">Nama Penuh</label>
              <div class="col-md-6">
                 <input type="text" style="width:138%" name="nama" >
            </div>
          </div>

        <div class="form-group">
          <label class="col-md-4">No. K/P @ Passport </label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="passport" >
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-4">Jantina</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="jantina" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4">Alamat Tetap</label>
          <div class="col-md-6">
          <textarea type="text" style="width:138%" name="alamat" ></textarea>
          </div>
        </div>

       <div class="form-group">
          <label class="col-md-4">No. Telefon (R)</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="telpr" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4">No. Telefon (P)</label>
          <div class="col-md-6">
          <input  type="text" style="width:138%" name="telpp" >
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-4">No. Telefon (B)</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="telpb" >
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-4">Alamat Emel</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="email" >
          </div>
        </div>
          <!-- </div> -->
</div>

<div class="col-md-3">
         <!-- <div class="form-horizontal"> -->
        <div class="form-group">
            <!-- <label class="col-md-4"></label> -->
              <div class="col-md-8">
                <!-- div class="thumbnail"> -->
                 <img src="" class="thumbnail" style="width: 200px;height: 300px">
                 <font>Gambar Berukuran Passport</font>
               <!-- </div> -->
            </div>
          </div>
       
  <input type="hidden" name="idSeq" value="<?php echo $idSeq; ?>">
      
    </div>


        </fieldset>
        </form>

          </div>
			</div>
		</div>

</div>

	</div>


<div class="col-md-12">
    <div class="box ">
        <div class="panel panel-custom-horrible-red"  >
        <div class="panel-heading " >
          <h4 style="color: white">BAHAGIAN B : MAKLUMAT LATIHAN</h4>
        </div>
          <div class="panel-body" >

                  <div class ="table table-responsive">

      <form class="form-horizontal col-md-12" action="<?php echo site_url('admin/Konfigurasi_kurikulum/storekursus');?>" method="post">
        <fieldset>
       <!--  <table> -->
          
            <div class="col-md-12">
        <!-- <div class="form-horizontal"> -->
        <div class="form-group">
            <label class="col-md-2">Tahun Latihan </label>
              <div class="col-md-6">
                 <input type="text" style="width:138%" name="nama" >
            </div>
          </div>

        <div class="form-group">
          <label class="col-md-2">Kursus Yang Diikuti </label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="passport" >
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-2">GIATMARA</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="jantina" >
          </div>
        </div>

       
</div>




        </fieldset>
        </form>

          </div>
      </div>
    </div>

</div>

  </div>




  <div class="col-md-12">
    <div class="box ">
        <div class="panel panel-custom-horrible-red"  >
        <div class="panel-heading " >
          <h4 style="color: white">BAHAGIAN C : STATUS TERKINI</h4>
        </div>
          <div class="panel-body" >

                  <div class ="table table-responsive">

      <form class="form-horizontal col-md-12" action="<?php echo site_url('');?>" method="post">
        <fieldset>
       <!--  <table> -->
          
            <div class="col-md-6">
              <div class="panel panel-custom-horrible-orange"  >
        <div class="panel-heading " >
          <h4 style="color: white"><input  type="checkbox"  name="telpp"> &nbsp; BEKERJA</h4>
        </div>
          <div class="panel-body" >

        
        <div class="form-group">
            <label class="col-md-4">Jawatan</label>
              <div class="col-md-6">
                 <input type="text" style="width:138%" name="nama" >
            </div>
          </div>

        <div class="form-group">
          <label class="col-md-4">Nama Majikan</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="passport" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4">Alamat Majikan</label>
          <div class="col-md-6">
          <textarea type="text" style="width:138%" name="alamat" ></textarea>
          </div>
        </div>

       <div class="form-group">
          <label class="col-md-4">Tempoh Berkhidmat</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="telpr" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4">Pendapatan Bulanan</label>
          <div class="col-md-6">
          <input  type="checkbox"  name="telpp" > &nbsp; RM 500 ke bawah </br>
          <input  type="checkbox"  name="telpp" > &nbsp; RM 501 ke RM 1,000 </br>
          <input  type="checkbox"  name="telpp" > &nbsp; RM 1,001 ke RM 1,500 </br>
          <input  type="checkbox"  name="telpp" > &nbsp; RM 1,501 ke RM 2,000 </br>
          <input  type="checkbox"  name="telpp" > &nbsp; RM 2,001 ke atas 
          </div>
        </div>

      </div>
    </div>


 <div class="panel panel-custom-horrible-orange"  >
        <div class="panel-heading " >
          <h4 style="color: white"><input  type="checkbox"  name="telpp"> &nbsp; MELANJUTKAN PELAJARAN</h4>
        </div>
          <div class="panel-body" >

         <div class="form-group">
          <label class="col-md-4">Institusi</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="telpb" >
          </div>
        </div>

         <div class="form-group">
          <label class="col-md-4">Bidang</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="email" >
          </div>
        </div>
      </div>
     </div>    

</div>

<div class="col-md-6">
     <div class="panel panel-custom-horrible-orange"  >
        <div class="panel-heading " >
          <h4 style="color: white"><input  type="checkbox"  name="telpp"> &nbsp; USAHAWAN</h4>
        </div>
          <div class="panel-body" >

        
        <div class="form-group">
            <label class="col-md-4">Nama Perniagaan</label>
              <div class="col-md-6">
                 <input type="text" style="width:138%" name="nama" >
            </div>
          </div>

        <div class="form-group">
          <label class="col-md-4">Alamat Perniagaan</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="passport" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4">Tahun Operasi</label>
          <div class="col-md-6">
          <textarea type="text" style="width:138%" name="alamat" ></textarea>
          </div>
        </div>

       <div class="form-group">
          <label class="col-md-4">Tempoh Berkhidmat</label>
          <div class="col-md-6">
          <input type="text" style="width:138%" name="telpr" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4">Pendapatan Bulanan</label>
          <div class="col-md-6">
          <input  type="checkbox"  name="telpp" > &nbsp; RM 500 ke bawah </br>
          <input  type="checkbox"  name="telpp" > &nbsp; RM 501 ke RM 1,000 </br>
          <input  type="checkbox"  name="telpp" > &nbsp; RM 1,001 ke RM 1,500 </br>
          <input  type="checkbox"  name="telpp" > &nbsp; RM 1,501 ke RM 2,000 </br>
          <input  type="checkbox"  name="telpp" > &nbsp; RM 2,001 ke atas 
          </div>
        </div>

      </div>
    </div>


 <div class="panel panel-custom-horrible-orange"  >
        <div class="panel-heading " >
          <h4 style="color: white"><input  type="checkbox"  name="telpp"> &nbsp; TIDAK / BELUM BEKERJA</h4>
        </div>
          <div class="panel-body" >

        
      </div>
     </div>    
</div>

</DIV>



<div class="col-md-12">
   
   
            <div class="col-md-6">
              <div class="panel panel-custom-horrible-red"  >
        <div class="panel-heading " >
          <h4 style="color: white">BAHAGIAN D : STATUS TERKINI</h4>
        </div>
          <div class="panel-body" >
<font>Saya mengakui bahwa maklumat yang diberikan adalah benar</font><br><br><br><br><br>

<table style="border:5px solid white">
  <tr><td style="text-align: center"> _______________________________&nbsp;&nbsp;&nbsp;<br>
  <font>Tanda Tangan Pemohon</font></td>
<td style="text-align: center">

  _______________________________<br>
  <font>Tarikh</font>
</td>
</tr>
</table>
 
       </div>
    </div>
</div>

<div class="col-md-4">
     <div class="panel panel-custom-horrible-black"  >
        <div class="panel-heading " >
          <h4 style="color: white;text-align: center" >UNTUK KEGUNAAN PEJABAT</h4>
        </div>
          <div class="panel-body" >

        

<table style="border:5px solid white">
  <tr><td ><font>Permohonan ini : </font>&nbsp;&nbsp;&nbsp;<font style="bold">DITERIMA / DITOLAK</font>
  </td>

</tr>

<tr><td ><font>No Keahlian : </font>
</td>

</tr>

<tr>
  <td  style="text-align: center">
<br><br><br>
    <font>_______________________________</font> <br>
  <font style="text-align: center">Tandatangan Urusetia Alumni</font>   </td>
</tr>
</table>
     

      </div>
    </div>
</div>



</div>

</DIV>

