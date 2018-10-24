<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Zulyantara <zulyantara@gmail.com>
 * @author Rapelino <ninolooh@gmail.com>
 * Module Pelatih Lanjutan LPP09
 */
class Pelatih_lanjutan extends Admin_Controller
{
    var $pageTitle = "Permohonan Pelatih Lanjutan";

    function __construct()
    {
        parent::__construct();
        $this->mPageTitle = $this->pageTitle;
        $this->load->model("pelatih_lanjutan_model", "plm");
        $this->load->model("lpp04_model", "lpp04");
        $this->load->model('screen_dua_model', "sdm");
        $this->load->model('screen_empat_model', "mmodel");
        $this->load->model('screen_lima_model', "slm");
        $this->load->model('home_model', "hm");
        $this->load->model('pemohon_model', "pm");
        $this->load->model('pelatih_model', "pltm");
        $this->load->library('session');

    }

    public function index()
    {
        redirect('admin/pelatih_lanjutan/permohonan_baru');
    }


    public function senaraisesi($id) {
               // $hari = urldecode($this->uri->segment(3));
               //var_dump($kode);die();
               if($id==NULL) {
                 echo "fail";

                      echo "alert( Data Tidak Ada . Tidak Dapat Memproses Data)";
                   }
               else {
                  $data=$this->plm->getsesi($id)->result();
                //  var_dump($data);die();
                  if($data <> '' OR $data <> NULL ) {

                    echo '<select name="sesi" style="height:25px">';
                      foreach($data as $dat) {

                           echo '<option value="'.$dat->id_intake.'">'.$dat->nama_intake.'</opion>';

                        }
                        echo '</select>';
                   }
                  else {
                     echo "Data Tidak Ada ";
                   }
               }

    }


    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * LPP09 P1 Screen 1
     */
    public function permohonan_baru()
    {
        $this->render("pelatih_lanjutan/screen_1");
    }

    public function updatesesi()
    {
        $id = $this->input->post("idsetting");
        $sesi = $this->input->post("sesi");
         $idSeq = $this->input->post("idseq");

        // var_dump($id);die();

        $data = array(
                     'id_intake' => $sesi
                    );

                $this->db->where('id',$id);
                $this->db->update('settings_tawaran_kursus',$data);
               // echo $this->db->last_query();exit();
                redirect('admin/pelatih_lanjutan/pengesahan/'.$idSeq);

    }


    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * proses check no_mykad di table pelatih
     */
    function check_nomykad()
    {
        $no_mykad = $this->input->post('txt_MyKAD');
        if ($this->input->post("txt_MyKAD") !== "")
        {
            $no_mykad = $this->input->post("txt_MyKAD");
        }
        else if ($this->input->post("txt_PASSPORT") !== "")
        {
            $no_mykad = $this->input->post("txt_PASSPORT");
        }
        else if ($this->input->post("txt_POLIS") !== "")
        {
            $no_mykad = $this->input->post("txt_POLIS");
        }
        else if ($this->input->post("txt_TENTERA") !== "")
        {
            $no_mykad = $this->input->post("txt_TENTERA");
        }

        $row_nomykad = $this->plm->check_no_mykad($no_mykad);
        // echo "<pre>";var_dump($row_nomykad);echo "</pre>";exit;

        // mengambil nama kursus
        $row_giatmara = $this->plm->get_giatmara_by_id($row_nomykad->id_giatmara);
        // var_dump($row_giatmara);exit;

        $row_temuduga_tetapan = $this->plm->check_temuduga_tetapan($row_nomykad->no_mykad);
        // var_dump($row_temuduga_tetapan);exit;
        if ($row_temuduga_tetapan->id > 0)
        {
            ?>
            <script type="text/javascript">
                alert("Pelatih ini sedang dalam proses permohonan LPP09 di GIATMARA <?php echo $row_giatmara->nama_giatmara; ?>");
                window.history.back();
            </script>
            <?php
        }

        // cek ke table markah_modul_status
        if ( ! empty($row_nomykad))
        {
            $jml_mms = $this->plm->check_mms($row_nomykad->id_pelatih);
            // echo $jml_mms;exit;
            if ($jml_mms == 0)
            {
                ?>
                <script type="text/javascript">
                    alert("Pelatih masih dalam proses pemarkahan LPP04");
                    window.history.back();
                </script>
                <?php
            }
        }

        // var_dump($row_nomykad);exit;
        // jika no_mykad ada di database

        //check dari permohonan butir peribadi
        // $where["no_mykad"] = $no_mykad;
        // $row_pbp_cek = $this->sdm->get_row_pbp($where);

        if($rownomykad !== NULL){
            $is_status = "go";
        }else{
            $is_status = "new";
        }

        if ( ! empty($row_nomykad))
        {
            redirect('admin/pelatih_lanjutan/form_permohonan_lanjutan/'.$row_nomykad->no_mykad,'refresh');
        }
        else
        {
            redirect('admin/pelatih_lanjutan/form_permohonan_lanjutan/'.$no_mykad.'/status/'.$is_status);
        }
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @author Rapelino <ninolooh@gmail.com>
     * LPP09 P1 Screen 2
     */
    function form_permohonan_lanjutan($no_mykad = FALSE)
    {
        $is_status = $this->uri->segment('6');

        //  get info user login
        $user = $this->ion_auth->user()->row();
        $user_staff = $user->id_staff;
        $row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);
        // echo "<pre>";var_dump($row_giatmara);echo "</pre>";exit;
        $giatmara_id = $row_giatmara->id_giatmara;
        $giatmara_type = $row_giatmara->id_type_giatmara;
        $giatmara_negeri = $row_giatmara->id_negeri;

        $this->mViewData["giatmara_type"] = $giatmara_type;

        $where_kluster["id_giatmara"] = $giatmara_id;
        $where_negeri["id_giatmara"] = $giatmara_id;
        $where_giatmara["id_giatmara"] = $giatmara_id;
        // $where_giatmara["id_negeri"] = $giatmara_negeri;
        // $where_giatmara["id_type_giatmara"] = 1;

        $this->mViewData["res_kewarganegaraan"] = $this->sdm->get_data("ref_kewarganegaraan");
        $this->mViewData["res_bangsa"] = $this->sdm->get_data("ref_bangsa");
        $this->mViewData["res_etnik"] = $this->sdm->get_data("ref_etnik");
        $this->mViewData["res_agama"] = $this->sdm->get_data("ref_agama");
        $this->mViewData["res_taraf_perkahwinan"] = $this->sdm->get_data("ref_taraf_perkahwinan");
        $this->mViewData["res_kelulusan"] = $this->sdm->get_data("ref_kelulusan");
        $this->mViewData["res_kelulusan_kemahiran"] = $this->sdm->get_data("ref_kemahiran");
        $this->mViewData["res_kategori_pemohon"] = $this->sdm->get_data("ref_kategori_pemohon");
        $this->mViewData["res_negeri"] = $this->sdm->get_data("ref_negeri");

        $this->mViewData["ref_kategori_penjaga"] = $this->slm->get_data("ref_kategori_penjaga");
        $this->mViewData["res_pendapatan"] = $this->slm->get_data("ref_pendapatan");
        $this->mViewData["res_pekerjaan"] = $this->slm->get_data2("ref_pekerjaan");
        $this->mViewData["ref_hubungan"] = $this->slm->get_data("ref_hubungan");

        $this->mViewData["res_pertandingan"] = $this->plm->get_pertandingan();
        $this->mViewData["res_program_kas"] = $this->plm->get_program_kas();
        $this->mViewData["res_kluster"] = $giatmara_type === "0" ? $this->plm->get_kluster() : $this->plm->get_v_giatmara_kursus($where_kluster, "result", "distinct", "id_kluster, nama_kluster");
        $this->mViewData["res_negeri_2"] = $giatmara_type === "0" ? $this->plm->get_negeri() : $this->plm->get_v_giatmara_kursus($where_negeri, "row", "distinct", "id_negeri, nama_negeri");
        $this->mViewData["res_giatmara"] = ($giatmara_type === "1") ? $this->plm->get_v_giatmara_kursus($where_giatmara, "result", "distinct", "id_giatmara, nama_giatmara") : "";

        $idBpLast = $this->session->userdata('idBpLast');
        $this->mViewData["idBpLast"] = $idBpLast;
        //$this->mViewData["idBpLast"] = 295; //sample

        if ($no_mykad !== FALSE && $is_status != 'new')
        {
            $row_nomykad = $this->plm->check_no_mykad($no_mykad);

            $idBp = $row_nomykad->id_bp;

            /* TAB 1 | Butir Peribadi */
            $where["no_mykad"] = $no_mykad;
            $row_pbp = $this->sdm->get_row_pbp($where);

            $cek_poskod = $this->sdm->get_v_poskod($row_pbp->poskod,"id");
            $this->mViewData["cek_poskod"] = $cek_poskod->poskod;
            $this->mViewData["bandar_poskod"] = $cek_poskod->bandar;
            $this->mViewData["nama_negeri"] = $cek_poskod->nama_negeri;

            $this->mViewData["idBp"] = $row_pbp->id;

            $this->mViewData["row_pbp"] = $row_pbp;
            /* END TAB 1 */

            /* TAB 2 */
            $this->mViewData["res_kursus_terdahulu"] = $this->plm->get_kursus_terdahulu($no_mykad);
            /* END TAB 2 */

            /* TAB 3 */
            if(empty($idBp)) $idBp = $row_pbp->id;
            $getAm = $this->plm->get_maklumat_am($idBp);
            $this->mViewData["get_am"] = $getAm;

            $getAm2 = $this->plm->get_maklumat_am2($idBp);
            $this->mViewData["get_am2"] = $getAm2;
            /* END TAB 3 */

            /* TAB 4 | Program Pilihan */
            //  get info user login
            $user = $this->ion_auth->user()->row();
            $user_staff = $user->id_staff;
            $row_staff = $this->plm->get_v_admin_users(array("id_staff" => $user_staff));
            $giatmara_id = $row_staff->id_giatmara;
            $negeri_id = $row_staff->id_negeri;
            $this->mViewData["id_giatmara_user"] = $giatmara_id;

            $get_permohonan_kursus_lpp09 = $this->plm->get_permohonan_kursus_lpp09($idBp);
            $this->mViewData["row_pk"] = $get_permohonan_kursus_lpp09;
            /* END TAB 4 */

            /* TAB 5 | Maklumat Penjaga */
            $row_mp = $this->slm->get_row_mp($where);
            $this->mViewData["row_mp"] = $row_mp;

            $cek_poskod_a = $this->sdm->get_v_poskod($row_mp->a_poskod,"poskod");
            $this->mViewData["id_poskod_a"] = $cek_poskod_a->id;
            $this->mViewData["cek_poskod_a"] = $cek_poskod_a->poskod;
            $this->mViewData["bandar_poskod_a"] = $cek_poskod_a->bandar;
            $this->mViewData["nama_negeri_a"] = $cek_poskod_a->nama_negeri;

            $cek_poskod_b = $this->sdm->get_v_poskod($row_mp->b_poskod,"poskod");
            $this->mViewData["id_poskod_b"] = $cek_poskod_b->id;
            $this->mViewData["cek_poskod_b"] = $cek_poskod_b->poskod;
            $this->mViewData["bandar_poskod_b"] = $cek_poskod_b->bandar;
            $this->mViewData["nama_negeri_b"] = $cek_poskod_b->nama_negeri;

            $cek_poskod_c = $this->sdm->get_v_poskod($row_mp->c_poskod,"poskod");
            $this->mViewData["id_poskod_c"] = $cek_poskod_c->id;
            $this->mViewData["cek_poskod_c"] = $cek_poskod_c->poskod;
            $this->mViewData["bandar_poskod_c"] = $cek_poskod_c->bandar;
            $this->mViewData["nama_negeri_c"] = $cek_poskod_c->nama_negeri;
            /* END TAB 5 */

            /* TAB 6 | Tempat Tinggal */
            $getTT = $this->plm->get_tempat_tinggal($idBp);
            $this->mViewData["get_tt"] = $getTT;
            /* END TAB 6 */

            /* TAB 7 | Dokumen Sokongan */
            $getDS = $this->plm->get_permohonan_dokumen($idBp);
            $this->mViewData["get_ds"] = $getDS;
            /* END TAB 7 */

            /* TAB 8 | Pengakuan */

            /* END TAB 8 */

            $this->mViewData["no_mykad"] = $no_mykad;
            $this->render("pelatih_lanjutan/screen_2");
        }
        else
        {
            //@redirect('admin/pelatih_lanjutan',FALSE);
            // $this->mViewData["no_mykad"] = $this->uri->segment('4');
            $this->mViewData["no_mykad"] = $no_mykad;
            $this->mViewData["tab_8"] = "hide";
            $this->render("pelatih_lanjutan/screen_2");
        }
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @author Rapelino <ninolooh@gmail.com>
     * LPP09 P1 Screen 1 Tab 2
     * Simpan Maklumat Am
     */
    function simpan_maklumat_am()
    {
        // var_dump($this->input->post());exit;
        $no_mykad = $this->input->post('ma_no_mykad');
        // ambil id permohonan_butir_peribadi
        $row_pbp = $this->plm->get_permohonan_butir_peribadi(array("no_mykad"=>$no_mykad), "row");
        $idBpLast = $this->input->post('idBpLast');
        $chk_sumber_media_cetak = $this->input->post("sumber_media_cetak") == 1 ? $this->input->post("sumber_media_cetak") : 0;
        $chk_sumber_media_elektronik = $this->input->post('sumber_media_elektronik') == 1 ? $this->input->post('sumber_media_elektronik') : 0;
        $chk_sumber_internet = $this->input->post('sumber_internet') == 1 ? $this->input->post('sumber_internet') : 0;
        $chk_sumber_media_sosial = $this->input->post('sumber_media_sosial') == 1 ? $this->input->post('sumber_media_sosial') : 0;
        $chk_sumber_rakan = $this->input->post('sumber_rakan') == 1 ? $this->input->post('sumber_rakan') : 0;
        $chk_sumber_keluarga = $this->input->post('sumber_keluarga') == 1 ? $this->input->post('sumber_keluarga') : 0;
        $chk_sumber_pameran = $this->input->post('sumber_pameran') == 1 ? $this->input->post('sumber_keluarga') : 0;
        $chk_sumber_lain = $this->input->post('sumber_lain') == 1 ? $this->input->post('sumber_lain') : 0;
        $txt_lain = $this->input->post('txt_lain');

        $chk_minat_sendiri = $this->input->post('minat_sendiri') == 1 ? $this->input->post('minat_sendiri') : 0;
        $chk_galakan_keluarga = $this->input->post('galakan_keluarga') == 1 ? $this->input->post('galakan_keluarga') : 0;
        $chk_galakan_rakan = $this->input->post('galakan_rakan') == 1 ? $this->input->post('galakan_rakan') : 0;
        $chk_keperluan_majikan = $this->input->post('keperluan_majikan') == 1 ? $this->input->post('keperluan_majikan') : 0;

        //$data["no_mykad"] = $no_mykad;
        $data["media_cetak"] = $chk_sumber_media_cetak;
        $data["media_elektronik"] = $chk_sumber_media_elektronik;
        $data["internet"] = $chk_sumber_internet;
        $data["media_sosial"] = $chk_sumber_media_sosial;
        $data["rakan"] = $chk_sumber_rakan;
        $data["keluarga"] = $chk_sumber_keluarga;
        $data["pameran"] = $chk_sumber_pameran;
        $data["lain"] = $chk_sumber_lain;
        $data["text_lain"] = $txt_lain;

        $data2["minat_sendiri"] = $chk_minat_sendiri;
        $data2["galakan_keluarga"] = $chk_galakan_keluarga;
        $data2["galakan_rakan"] = $chk_galakan_rakan;
        $data2["keperluan_majikan"] = $chk_keperluan_majikan;

        if(!empty($idBpLast)){
            // $data["id_permohonan"] = $idBpLast;
            $data["id_permohonan"] = $row_pbp->id;
            $data2["id_permohonan"] = $row_pbp->id;
            echo $this->plm->insert_maklumat_am($data);
            echo $this->plm->insert_maklumat_am2($data2);
        }else{
            $row_nomykad = $this->plm->check_no_mykad($no_mykad);
            echo $this->plm->update_maklumat_am($data,$row_nomykad->id_bp);
            echo $this->plm->update_maklumat_am2($data2,$row_nomykad->id_bp);
        }
    }

    /**
     * @author Rapelino <ninolooh@gmail.com>
     * LPP09 P1 Screen 1 Tab 3
     * Simpan Program Pilihan
     */
    function simpan_program_pilihan()
    {
        $no_mykad = $this->input->post('pp_no_mykad');
        $row_pbp = $this->plm->get_permohonan_butir_peribadi(array("no_mykad"=>$no_mykad), "row");
        $idBp = $row_pbp->id;
        // var_dump($row_pbp);exit;
        // $row_nomykad = $this->plm->check_no_mykad($no_mykad);
        // $idBp = $row_pbp->id_bp;
        $idBpLast = $this->input->post('idBpLast');

        if(empty($idBp)) $idBp = $idBpLast;
        // echo $idBp;exit;

        $kategori_pelatih = $this->input->post("opt_kategori_pelatih");
        $mengikut = $this->input->post("opt_mengikut_kursus");

        $lpk_kluster = $this->input->post("lpk_kluster");
        $lpk_kursus = $this->input->post("lpk_kursus");
        $lpk_negeri = $this->input->post("lpk_negeri");
        $lpk_giatmara = $this->input->post("lpk_giatmara");

        $lpn_kluster = $this->input->post("lpn_kluster");
        $lpn_kursus = $this->input->post("lpn_kursus");
        $lpn_negeri = $this->input->post("lpn_negeri");
        $lpn_giatmara = $this->input->post("lpn_giatmara");

        $tawaran_terus = $this->input->post("tawaran_terus");

        if($kategori_pelatih == "LL"){
            if($tawaran_terus == "on"){
                $status_tawaran_terus = 1;
            }else{
                $status_tawaran_terus = 0;
            }
        }else{
            $status_tawaran_terus = 1;
        }

        $opt_rn_kluster = $this->input->post("opt_rn_kluster");
        $no_ssm = $this->input->post("no_ssm");
        $alamat_perniagaan1 = $this->input->post("alamat_perniagaan1");

        $alamat_perniagaan = $alamat_perniagaan1;

        $nama_program = $this->input->post("nama_program");
        $nama_program_kas = $this->input->post("nama_program_kas");

        // if(strtolower($mengikut) == "kursus"){
        //  $getTawaranKursus = $this->plm->get_id_settings_tawaran_kursus("kursus",$lpk_kluster,$lpk_kursus,$lpk_negeri,$lpk_giatmara);
        // }else{
        //  $getTawaranKursus = $this->plm->get_id_settings_tawaran_kursus("negeri",$lpn_negeri,$lpn_giatmara,$lpn_kluster,$lpn_kursus);
        // }

        $getTawaranKursus = $this->plm->get_id_settings_tawaran_kursus("negeri",$lpn_negeri,$lpn_giatmara,$lpn_kluster,$lpn_kursus);

        $idSetting = $getTawaranKursus->id_setting_penawaran_kursus;
        if(empty($idSetting)) $idSetting = 0;

        if(empty($opt_rn_kluster)) $opt_rn_kluster = 0;
        if(empty($nama_program)) $nama_program = 0;
        if(empty($nama_program_kas)) $nama_program_kas = 0;

        // $data["id_permohonan"] = $idBp;
        $data["id_permohonan"] = $row_pbp->id;
        $data["kategori_program"] = $kategori_pelatih;
        // $data["id_settings_tawaran_kursus"] = $idSetting;
        if($kategori_pelatih == "LL"){
            $data["id_settings_tawaran_kursus"] = $lpn_kursus;
        }
        if($kategori_pelatih == "RN"){
            $data["id_kluster"] = $opt_rn_kluster;
            $data["no_ssm"] = $no_ssm;
            $data["alamat_perniagaan"] = $alamat_perniagaan;
            $data["id_giatmara"] = $this->input->post('pp_giatmara');
        }
        if($kategori_pelatih == "PP"){
            $data["id_program_pertandingan"] = $nama_program;
            $data["id_giatmara"] = $this->input->post('pp_giatmara');
        }
        if($kategori_pelatih == "PK"){
            $data["id_program_khas"] = $nama_program_kas;
            $data["id_giatmara"] = $this->input->post('pp_giatmara');
        }

        $data["tawaran_terus"] = $status_tawaran_terus;
        $data["status_pengesahan"] = 0;
        $data["status_pengakuan"] = 2;
        // var_dump($data);

        //check permohonan_kursus_lpp09
        $check = $this->plm->get_permohonan_kursus_lpp09($idBp);

        if(empty($check->id)){
            echo $this->plm->insert_program_pilihan($data);
        }else{
            echo $this->plm->update_program_pilihan($data,$idBp);
        }
    }

    /**
     * @author Rapelino <ninolooh@gmail.com>
     * LPP09 P3 Screen 1
     * Menu Pelatih Lanjutan > Simpan Butir Peribadi
     */
    function simpan_bp()
    {
        $status_insert = 1;
        #var_dump ($this->uri->uri_to_assoc());
        #var_dump($this->input->get());
        #var_dump($this->input->post());exit;

        $is_hantar = $this->uri->segment('4');
        if ($is_hantar === 'email') $is_hantar = $this->uri->segment('5');

        $id_pbp = $this->input->post('idBp');
        if ($id_pbp=="") $id_pbp = 0;
        $nama_penuh = html_escape($this->input->post('bp_nama_penuh'));
        $no_mykad = html_escape($this->input->post('bp_no_mykad'));
        $tarikh_lahir = $this->input->post('bp_tarikh_lahir');
        $kewarganegaraan = $this->input->post('bp_kewarganegaraan');
        $umur = html_escape($this->input->post('bp_umur'));
        $no_telefon = html_escape($this->input->post('bp_no_hp'));
        $no_hp = html_escape($this->input->post('bp_no_hp'));
        $alamat = html_escape($this->input->post('bp_alamat'));
        // $poskod = $this->input->post('bp_poskod_id');
        $poskod = $this->input->post('bp_poskod');
        $bandar = $this->input->post('bp_bandar');
        $negeri = $this->input->post('bp_negeri');
        $email = html_escape($this->input->post('bp_email'));
        $bangsa = $this->input->post('bp_bangsa');
        $etnik = $this->input->post('bp_etnik');
        $agama = $this->input->post('bp_agama');
        $taraf_perkahwinan = $this->input->post('bp_taraf_perkahwinan');
        $kategori_kelulusan = $this->input->post('bp_kategori_kelulusan');
        $kelulusan = $this->input->post('bp_kelulusan');
        $kemahiran = $this->input->post('bp_kemahiran');
        if($kategori_kelulusan == "Kemahiran") $kelulusan = 1;
        $matlamat_selepas_kursus = $this->input->post('bp_matlamat_selepas_kursus');
        $kategori_pemohon = $this->input->post('bp_kategori_pemohon');
        // echo $negeri;exit;

        // create auto no rujukan permohonan
        // hitung jumlah data di table permohonan_butir_peribadi
        $jml_data_pbp = $this->sdm->count_data();
        // jika lebih dari 0 maka sudah ada isi, maka ambil no_rujukan_permohonan yang terakhir
        if ($jml_data_pbp > 0 )
        {
            $row_pbp_no = $this->sdm->get_last_no_rujuk();
            $last_no_rujuk = substr($row_pbp_no->no_rujukan_permohonan,6,4);
            $new_no_rujuk = $last_no_rujuk + 1;
            if (strlen($new_no_rujuk)==4)
            {
                $nrp = $new_no_rujuk;
            }
            elseif (strlen($new_no_rujuk)==3)
            {
                $nrp = "0".$new_no_rujuk;
            }
            elseif (strlen($new_no_rujuk)==2)
            {
                $nrp = "00".$new_no_rujuk;
            }
            elseif (strlen($new_no_rujuk)==1)
            {
                $nrp = "000".$new_no_rujuk;
            }
            $no_rujukan_permohonan = date("Ym").$nrp;
        }
        else
        {
            $no_rujukan_permohonan = date("Ym")."0001";
        }

        if(empty($kelulusan)) $kelulusan = 1;
        if ($id_pbp!="" || $id_pbp!=0) {
            $data_p["id"] = $id_pbp;
            $status_insert = 0;
        }

        // create auto no rujukan permohonan
        // hitung jumlah data di table permohonan_butir_peribadi
        $jml_data_pbp = $this->sdm->count_data();
        // jika lebih dari 0 maka sudah ada isi, maka ambil no_rujukan_permohonan yang terakhir
        if ($jml_data_pbp > 0 )
        {
            $mydata = $this->hm->getKadByBP($id_pbp);
            $my_no_rujukan = $mydata->no_rujukan_permohonan;
            if ($my_no_rujukan) $no_rujukan_permohonan = $my_no_rujukan;
            else {
                $row_pbp_no = $this->sdm->get_last_no_rujuk();
                $last_no_rujuk = substr($row_pbp_no->no_rujukan_permohonan,6,4);
                $new_no_rujuk = $last_no_rujuk + 1;
                if (strlen($new_no_rujuk)==4)
                {
                    $nrp = $new_no_rujuk;
                }
                elseif (strlen($new_no_rujuk)==3)
                {
                    $nrp = "0".$new_no_rujuk;
                }
                elseif (strlen($new_no_rujuk)==2)
                {
                    $nrp = "00".$new_no_rujuk;
                }
                elseif (strlen($new_no_rujuk)==1)
                {
                    $nrp = "000".$new_no_rujuk;
                }
                $no_rujukan_permohonan = date("Ym").$nrp;
            }
        }
        else
        {
            $no_rujukan_permohonan = date("Ym")."0001";
        }

        $data_p["nama_penuh"] = strtoupper($nama_penuh);
        $data_p["no_mykad"] = $no_mykad;
        $data_p["tarikh_lahir"] = date("Y-m-d", strtotime($tarikh_lahir));
        $data_p["kewarganegaraan"] = $kewarganegaraan;
        $data_p["umur"] = $umur;
        // $data_p["no_telefon"] = $no_telefon; // Deprecated
        $data_p["no_hp"] = $no_hp;
        $data_p["alamat"] = strtoupper($alamat);
        $data_p["poskod_3"] = $poskod;
        $data_p["bandar_3"] = strtoupper($bandar);
        $data_p["negeri_3"] = strtoupper($negeri);
        $data_p["emel"] = $email;
        $data_p["bangsa"] = $bangsa;
        $data_p["etnik"] = $etnik;
        $data_p["agama"] = $agama;
        $data_p["taraf_perkahwinan"] = $taraf_perkahwinan;
        $data_p["kategori_kelulusan"] = $kategori_kelulusan;
        $data_p["kelulusan"] = $kelulusan;
        $data_p["kelulusan_kemahiran"] = $kemahiran;
        $data_p["matlamat"] = $matlamat_selepas_kursus;
        $data_p["kategori_pemohon"] = $kategori_pemohon;
        $data_p["pengesahan"] = 0;
        $data_p["pengakuan"] = 2;
        $data_p["no_rujukan_permohonan"] =$no_rujukan_permohonan;
        $data_p["tarikh_hantar"] = date("Y-m-d");
        $data_p["no_pelatih_record"] = "NN";

        echo $this->plm->save_butir_probadi($data_p, $status_insert);

        // send email
        /*
        if ($is_hantar != '0') {
            $this->hantarmail($data_p);
            $mykad = $this->hm->getKadByBP($id_pbp);
            $data['mykad'] = $mykad->no_mykad;
            echo json_encode($data);
        } else {
            $mykad = $this->hm->getKadByBP($s);
            $data['mykad'] = $mykad->no_mykad;
            echo json_encode($data);
        }
        */
    }

    function update_bp()
    {
        //  get info user login
        $user = $this->ion_auth->user()->row();
        $user_staff = $user->id_staff;
        $row_staff = $this->plm->get_v_admin_users(array("id_staff" => $user_staff));
        $giatmara_id = $row_staff->id_giatmara;

        $no_mykad = $this->input->post('no_mykad');
        $row_pbp = $this->plm->get_permohonan_butir_peribadi(array("no_mykad"=>$no_mykad), "row");
        $id_pbp = $this->input->post('idBp');

        $pengakuan_1 = $this->input->post('pengakuan_1');
        $pengakuan_2 = $this->input->post('pengakuan_2');
        $pengakuan_3 = $this->input->post('pengakuan_3');

        // $data["pengesahan"] = $pengakuan_1;
        // $data["pengakuan"] = $pengakuan_2;
        // $data["id"] = $id_pbp;
        // $data["id"] = $row_pbp->id;

        $data_lpp09["status_pengesahan"] = $pengakuan_1;
        $data_lpp09["status_pengakuan"] = $pengakuan_3;
        $data_lpp09["tarikh_mohon"] = date("Y-m-d");
        $data_lpp09["id_permohonan"] = $row_pbp->id;
        $data_lpp09["id_giatmara"] = $giatmara_id;
        // echo "<pre>";var_dump($data_lpp09);echo "</pre>";exit();

        //$data["pengakuan"] = $pengakuan_3;
        //echo "<pre>";print_r($data);echo "</pre>";

        // Jika checklist semua
        if ($pengakuan_1 == 1 AND $pengakuan_3 == 1)
        {
            $row_kl = $this->plm->get_permohonan_kursus_lpp09($row_pbp->id);
            $data_klpp09["id_permohonan"] = $row_pbp->id;
            $data_klpp09["id_permohonan_kursus_lpp09"] = $row_kl->id;
            $this->db->insert("kelulusan_lpp09", $data_klpp09);
        }

        echo $this->plm->update_kursus_lpp09($data_lpp09);
        // echo $this->plm->update_pendaftaran($data);
    }

    /**
     * @author Rapelino <ninolooh@gmail.com>
     * LPP09 P1 Screen 1 Tab 5
     * Simpan Maklumat Penjaga
     */
    function simpan_mp()
    {
        $idBpLast = $this->input->post('idBpLast');

        $no_mykad = $this->input->post('no_mykad');
        $row_pbp = $this->plm->get_permohonan_butir_peribadi(array("no_mykad"=>$no_mykad), "row");
        $maklumat = $this->input->post('maklumat');
        $a_nama_penuh = strtoupper($this->input->post('a_nama_penuh'));
        $a_hubungan = $this->input->post('a_hubungan');
        $a_jenis_pengenalan = $this->input->post('a_jenis_pengenalan');
        $a_mykad = $this->input->post('a_mykad');
        $a_kewarganegaraan = $this->input->post('a_kewarganegaraan');
        $a_kategori_penjaga = $this->input->post('a_kategori_penjaga');
        $a_no_tel = $this->input->post('a_no_tel');
        $a_no_hp = $this->input->post('a_no_hp');
        $a_agama = $this->input->post('a_agama');
        $a_etnik = $this->input->post('a_etnik');
        $a_bangsa = $this->input->post('a_bangsa');
        $a_alamat = strtoupper($this->input->post('a_alamat'));
        $a_poskod = $this->input->post('a_poskod');
        $a_bandar = $this->input->post('a_bandar');
        $a_pekerjaan = $this->input->post('a_pekerjaan');
        $a_pendapatan = $this->input->post('a_pendapatan');
        $a_majikan = strtoupper($this->input->post('a_majikan'));
        $a_no_tel_pejabat = $this->input->post('a_no_tel_pejabat');
        $a_samb = $this->input->post('a_samb');
        $a_alamat_pejabat = strtoupper($this->input->post('a_alamat_pejabat'));
        $a_alamat_pejabat_poskod = $this->input->post('a_poskod_majikan');
        $a_alamat_pejabat_bandar = $this->input->post('a_bandar_majikan');
        $a_alamat_pejabat_negeri = $this->input->post('a_negeri_majikan');
        $b_nama_penuh = strtoupper($this->input->post('b_nama_penuh'));
        $b_jenis_pengenalan = $this->input->post('b_jenis_pengenalan');
        $b_mykad = $this->input->post('b_mykad');
        $b_kewarganegaraan = $this->input->post('b_kewarganegaraan');
        $b_kategori_penjaga = $this->input->post('b_kategori_penjaga');
        $b_no_tel = $this->input->post('b_no_tel');
        $b_no_hp = $this->input->post('b_no_hp');
        $b_agama = $this->input->post('b_agama');
        $b_etnik = $this->input->post('b_etnik');
        $b_bangsa = $this->input->post('b_bangsa');
        $b_alamat = strtoupper($this->input->post('b_alamat'));
        $b_poskod = $this->input->post('b_poskod');
        $b_bandar = $this->input->post('b_bandar');
        $b_pekerjaan = $this->input->post('b_pekerjaan');
        $b_pendapatan = $this->input->post('b_pendapatan');
        $b_majikan = strtoupper($this->input->post('b_majikan'));
        $b_no_tel_pejabat = $this->input->post('b_no_tel_pejabat');
        $b_samb = $this->input->post('b_samb');
        $b_alamat_pejabat = strtoupper($this->input->post('b_alamat_pejabat'));
        $b_alamat_pejabat_poskod = $this->input->post('b_poskod_majikan');
        $b_alamat_pejabat_bandar = $this->input->post('b_bandar_majikan');
        $b_alamat_pejabat_negeri = $this->input->post('b_negeri_majikan');
        $c_nama_penuh = strtoupper($this->input->post('c_nama_penuh'));
        $c_jenis_pengenalan = $this->input->post('c_jenis_pengenalan');
        $c_mykad = $this->input->post('c_mykad');
        $c_kewarganegaraan = $this->input->post('c_kewarganegaraan');
        $c_kategori_penjaga = $this->input->post('c_kategori_penjaga');
        $c_no_tel = $this->input->post('c_no_tel');
        $c_no_hp = $this->input->post('c_no_hp');
        $c_agama = $this->input->post('c_agama');
        $c_etnik = $this->input->post('c_etnik');
        $c_bangsa = $this->input->post('c_bangsa');
        $c_alamat = strtoupper($this->input->post('c_alamat'));
        $c_poskod = $this->input->post('c_poskod');
        $c_bandar = $this->input->post('c_bandar');
        $c_pekerjaan = $this->input->post('c_pekerjaan');
        $c_pendapatan = $this->input->post('c_pendapatan');
        $c_majikan = strtoupper($this->input->post('c_majikan'));
        $c_no_tel_pejabat = $this->input->post('c_no_tel_pejabat');
        $c_samb = $this->input->post('c_samb');
        $c_alamat_pejabat = strtoupper($this->input->post('c_alamat_pejabat'));
        $c_alamat_pejabat_poskod = $this->input->post('c_poskod_majikan');
        $c_alamat_pejabat_bandar = $this->input->post('c_bandar_majikan');
        $c_alamat_pejabat_negeri = $this->input->post('c_negeri_majikan');

        if($a_hubungan == '') $a_hubungan = 0;
        if($a_kewarganegaraan == '') $a_kewarganegaraan = 0;
        if($a_kategori_penjaga == '') $a_kategori_penjaga = 0;
        if($a_agama == '') $a_agama = 0;
        if($a_etnik == '') $a_etnik = 0;
        if($a_bangsa == '') $a_bangsa = 0;
        if($a_pendapatan == '') $a_pendapatan = 0;
        if($a_alamat_pejabat_poskod == '') $a_alamat_pejabat_poskod = 0;
        if($a_alamat_pejabat_poskod2 == '') $a_alamat_pejabat_poskod2 = 0;
        if($a_alamat_pejabat_negeri2 == '') $a_alamat_pejabat_negeri2 = 0;
        if($b_kewarganegaraan == '') $b_kewarganegaraan = 0;
        if($b_kategori_penjaga == '') $b_kategori_penjaga = 0;
        if($b_agama == '') $b_agama = 0;
        if($b_etnik == '') $b_etnik = 0;
        if($b_bangsa == '') $b_bangsa = 0;
        if($b_pendapatan == '') $b_pendapatan = 0;
        if($b_alamat_pejabat_poskod == '') $b_alamat_pejabat_poskod = 0;
        if($b_alamat_pejabat_poskod2 == '') $b_alamat_pejabat_poskod2 = 0;
        if($c_kewarganegaraan == '') $c_kewarganegaraan = 0;
        if($c_kategori_penjaga == '') $c_kategori_penjaga = 0;
        if($c_agama == '') $c_agama = 0;
        if($c_etnik == '') $c_etnik = 0;
        if($c_bangsa == '') $c_bangsa = 0;
        if($c_negeri2 == '') $c_negeri2 = 0;
        if($c_pendapatan == '') $c_pendapatan = 0;
        if($c_alamat_pejabat_poskod == '') $c_alamat_pejabat_poskod = 0;
        if($c_alamat_pejabat_poskod2 == '') $c_alamat_pejabat_poskod2 = 0;
        if($c_alamat_pejabat_negeri2 == '') $c_alamat_pejabat_negeri2 = 0;
        // if($a_poskod2 == '') $a_poskod2 = 0;
        // if($b_poskod2 == '') $b_poskod2 = 0;
        // if($c_poskod2 == '') $c_poskod2 = 0;

        $data["maklumat"] = $maklumat;
        $data["a_nama_penuh"] = strtoupper($a_nama_penuh);
        $data["a_hubungan"] = $a_hubungan;
        $data["a_jenis_pengenalan"] = $a_jenis_pengenalan;
        $data["a_mykad"] = $a_mykad;
        $data["a_kewarganegaraan"] = $a_kewarganegaraan;
        $data["a_kategori_penjaga"] = $a_kategori_penjaga;
        $data["a_no_tel"] = $a_no_tel;
        $data["a_no_hp"] = $a_no_hp;
        $data["a_agama"] = $a_agama;
        $data["a_etnik"] = $a_etnik;
        $data["a_bangsa"] = $a_bangsa;
        $data["a_alamat"] = strtoupper($a_alamat);
        $data["a_poskod"] = $a_poskod;
        $data["a_pekerjaan"] = $a_pekerjaan;
        $data["a_pendapatan"] = $a_pendapatan;
        $data["a_majikan"] = strtoupper($a_majikan);
        $data["a_no_tel_pejabat"] = $a_no_tel_pejabat;
        $data["a_samb"] = $a_samb;
        $data["a_alamat_pejabat"] = strtoupper($a_alamat_pejabat);
        $data["a_alamat_pejabat_poskod"] = strtoupper($a_alamat_pejabat_poskod);
        $data["a_alamat_pejabat_poskod2"] = strtoupper($a_alamat_pejabat_poskod);
        $data["a_alamat_pejabat_bandar2"] = strtoupper($a_alamat_pejabat_bandar);
        $data["a_alamat_pejabat_negeri2"] = strtoupper($a_alamat_pejabat_negeri);
        $data["a_poskod2"] = $a_poskod;
        $data["a_bandar2"] = strtoupper($a_bandar);
        $data["b_nama_penuh"] = strtoupper($b_nama_penuh);
        $data["b_jenis_pengenalan"] = $b_jenis_pengenalan;
        $data["b_mykad"] = $b_mykad;
        $data["b_kewarganegaraan"] = $b_kewarganegaraan;
        $data["b_kategori_penjaga"] = $b_kategori_penjaga;
        $data["b_no_tel"] = $b_no_tel;
        $data["b_no_hp"] = $b_no_hp;
        $data["b_agama"] = $b_agama;
        $data["b_etnik"] = $b_etnik;
        $data["b_bangsa"] = $b_bangsa;
        $data["b_alamat"] = strtoupper($b_alamat);
        $data["b_poskod"] = $b_poskod;
        $data["b_pekerjaan"] = $b_pekerjaan;
        $data["b_pendapatan"] = $b_pendapatan;
        $data["b_majikan"] = strtoupper($b_majikan);
        $data["b_no_tel_pejabat"] = $b_no_tel_pejabat;
        $data["b_samb"] = $b_samb;
        $data["b_alamat_pejabat"] = strtoupper($b_alamat_pejabat);
        $data["b_alamat_pejabat_poskod"] = strtoupper($b_alamat_pejabat_poskod);
        $data["b_alamat_pejabat_poskod2"] = strtoupper($b_alamat_pejabat_poskod);
        $data["b_alamat_pejabat_bandar2"] = strtoupper($b_alamat_pejabat_bandar);
        $data["b_alamat_pejabat_negeri2"] = strtoupper($b_alamat_pejabat_negeri);
        $data["b_poskod2"] = $b_poskod;
        $data["b_bandar2"] = strtoupper($b_bandar);
        $data["c_nama_penuh"] = strtoupper($c_nama_penuh);
        $data["c_jenis_pengenalan"] = $c_jenis_pengenalan;
        $data["c_mykad"] = $c_mykad;
        $data["c_kewarganegaraan"] = $c_kewarganegaraan;
        $data["c_kategori_penjaga"] = $c_kategori_penjaga;
        $data["c_no_tel"] = $c_no_tel;
        $data["c_no_hp"] = $c_no_hp;
        $data["c_agama"] = $c_agama;
        $data["c_etnik"] = $c_etnik;
        $data["c_bangsa"] = $c_bangsa;
        $data["c_alamat"] = strtoupper($c_alamat);
        $data["c_poskod"] = $c_poskod;
        $data["c_pekerjaan"] = $c_pekerjaan;
        $data["c_pendapatan"] = $c_pendapatan;
        $data["c_majikan"] = strtoupper($c_majikan);
        $data["c_no_tel_pejabat"] = $c_no_tel_pejabat;
        $data["c_samb"] = $c_samb;
        $data["c_alamat_pejabat"] = strtoupper($c_alamat_pejabat);
        $data["c_alamat_pejabat_poskod"] = strtoupper($c_alamat_pejabat_poskod);
        $data["c_alamat_pejabat_poskod2"] = strtoupper($c_alamat_pejabat_poskod);
        $data["c_alamat_pejabat_bandar2"] = strtoupper($c_alamat_pejabat_bandar);
        $data["c_alamat_pejabat_negeri2"] = strtoupper($c_alamat_pejabat_negeri);
        $data["c_poskod2"] = $c_poskod;
        $data["c_bandar2"] = strtoupper($c_bandar);

        if(!empty($idBpLast)){
            // $data["id_permohonan"] = $idBpLast;
            $data["id_permohonan"] = $row_pbp->id;
            echo $this->plm->insert_maklumat_penjaga($data);
        }else{
            $row_nomykad = $this->plm->check_no_mykad($no_mykad);
            echo $this->plm->update_maklumat_penjaga($data,$row_nomykad->id_bp);
        }
    }

    function simpan_tempat()
    {
        $no_mykad = $this->input->post('no_mykad');
        $row_pbp = $this->plm->get_permohonan_butir_peribadi(array("no_mykad"=>$no_mykad), "row");
        $id_pbp = $this->input->post('idBp');
        $idBpLast = $this->input->post('idBpLast');
        if ($id_pbp=="") $id_pbp = $idBpLast;

        $data_p['tempat_tinggal'] = $this->input->post('keperluan_tempat');
        $data_p['pengangkutan'] = $this->input->post('keperluan_pengangkut');

        if(!empty($idBpLast)){
            // $data_p["id_permohonan"] = $idBpLast;
            $data_p["id_permohonan"] = $row_pbp->id;
            echo $this->plm->insert_tempat($data_p);
        }else{
            $row_nomykad = $this->plm->check_no_mykad($no_mykad);
            echo $this->plm->update_tempat($data_p,$row_nomykad->id_bp);
        }
    }

    function dokumen()
    {
        $no_mykad = $this->input->post('no_mykad');
        $row_pbp = $this->plm->get_permohonan_butir_peribadi(array("no_mykad"=>$no_mykad), "row");
        $id_pbp = $this->input->post('idBp');
        $idBpLast = $this->input->post('idBpLast');

        if($id_pbp == "") $id_pbp = $data_p["id_permohonan"] = $row_pbp->id;
        if($id_pbp=="") $id_pbp = $idBpLast;

        $count_image = $this->input->post('count_image');

        if(empty($count_image)) $count_image = 1;

        for($x=1;$x<=$count_image;$x++)
        {
            $config['upload_path']          = './uploads/lpp09/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']             = 10000;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $config['encrypt_name']                                 = TRUE;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('dokumen_'.$x))
            {
                $error = array('error' => $this->upload->display_errors());
                echo "errorny: ".$error;
            }
            else
            {
                $upload_data = $this->upload->data();
                $file_name = "./uploads/lpp09/".$upload_data['file_name'];

                $data_p["id_permohonan"] = $id_pbp;
                $data_p["nama_dokumen"] = $this->input->post('nama_dokumen_'.$x);
                $data_p["path_dokumen"] = $file_name;
                echo $this->plm->insert_dokumen($data_p);
            }
        }
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @return option untuk pilihan kursus
     * LPP09 P1 Screen 2 Tab Program Pilihan Bagian Latihan Lanjutan - Kursus ajax untuk combo box Pilihan Kluster
     */
    function ajax_kluster()
    {
        $kluster["id_kluster"] = $this->input->post('opt_kluster');
        // $res_kursus = $this->plm->get_kursus_by_kluster($kluster);
        $res_kursus = $this->plm->get_v_giatmara_kursus($kluster, "result", "distinct", "id_kursus, id_setting_penawaran_kursus, nama_kursus");
        if ($res_kursus !== NULL)
        {
            echo "<option>Sila Pilih</option>";
            foreach ($res_kursus as $val_kursus)
            {
                ?>
                <option value="<?php echo $val_kursus->id_setting_penawaran_kursus; ?>"><?php echo $val_kursus->nama_kursus; ?></option>
                <?php
            }
        }
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @return option untuk pilihan negeri
     * LPP09 P1 Screen 2 Tab Program Pilihan Bagian Latihan Lanjutan - Kursus ajax untuk combo box Pilihan Kursus
     */
    function ajax_kursus()
    {
        $kursus = $this->input->post('opt_kursus');
        $res_negeri = $this->plm->get_negeri_by_kursus($kursus);
        if ($res_negeri !== NULL)
        {
            echo "<option>Sila Pilih</option>";
            foreach ($res_negeri as $val_negeri)
            {
                ?>
                <option value="<?php echo $val_negeri->id_negeri; ?>"><?php echo $val_negeri->nama_negeri; ?></option>
                <?php
            }
        }
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * @return option untuk pilihan negeri
     * LPP09 P1 Screen 2 Tab Program Pilihan Bagian Latihan Lanjutan - Kursus ajax untuk combo box Pilihan Negeri
     */
    function ajax_negeri()
    {
        $negeri = $this->input->post('opt_negeri');
        $res_giatmara = $this->plm->get_giatmara_by_negeri($negeri);
        if ($res_giatmara !== NULL)
        {
            echo "<option>Sila Pilih</option>";
            foreach ($res_giatmara as $val_giatmara)
            {
                ?>
                <option value="<?php echo $val_giatmara->id; ?>"><?php echo $val_giatmara->nama_giatmara; ?></option>
                <?php
            }
        }
    }

    function ajax_poskod()
    {
        $poskod_ket = $this->input->post('poskod_ket');
        $poskod_id = $this->input->post('poskod_id');

        $poskod_ket != "" ? $w["poskod"] = $poskod_ket : "";
        $poskod_id != "" ? $w["id"] = $poskod_id : "";
        // echo $this->db->like(array("poskod"=>$poskod_ket))->get_compiled_select('ref_poskod_bandar_negeri');
        $row = $this->sdm->get_poskod($w);

        @$data["id_poskod"] = $row->id_poskod;
        @$data["bandar"] = $row->bandar;
        @$data["negeri"] = strtoupper($row->nama_negeri);
        echo json_encode($data);
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * LPP09 P2 Screen 1
     * Menu Pelatih Lanjutan > Temuduga > Tetapan Temuduga
     */
    function tetapan_temuduga()
    {
        //  get info user login
        $user = $this->ion_auth->user()->row();
        $user_staff = $user->id_staff;
        $row_staff = $this->plm->get_v_admin_users(array("id_staff" => $user_staff));
        $giatmara_id = $row_staff->id_giatmara;
        $negeri_id = $row_staff->id_negeri;
        // echo $this->ion_auth->get_users_groups()->row()->id;exit;

        switch ($this->ion_auth->get_users_groups()->row()->id) {
    			// admin
    			case '2':
    				$row_negeri = $this->lpp04->get_all_negeri();
    				// $row_negeri = $this->plm->get_ref_negeri(array("id"=>$negeri_id));
    				break;

    			// pelatih officer
    			default:
    				//$row_giatmara = $this->lpp04->get_giatmara($user_staff);
    				$row_giatmara = $this->lpp04->get_giatmara_pangku_tugas($user_staff);
    				#$giatmara_id = $row_giatmara['id'];
    				#$giatmara_negeri = $row_giatmara['id_negeri'];
    				$giatmara_id = $row_giatmara->id_giatmara;
    				$giatmara_negeri = $row_giatmara->id_negeri;

    				$row_negeri = $this->lpp04->get_negeri($giatmara_negeri);
    				$res_giatmara = $this->lpp04->get_giatmara_by_id($giatmara_id);

            // Data untuk combo box kursus
            // $this->mViewData["res_kursus"] = $this->plm->get_v_giatmara_kursus(array("id_giatmara"=>$row_giatmara->id));
            $this->mViewData["res_kursus"] = $this->plm->get_v_giatmara_kursus(array("id_giatmara"=>$row_giatmara->id_giatmara), "result", "distinct", "id_kursus, nama_kursus");

    				break;
    		}

        // Data untuk combox Negeri
        // $this->mViewData["res_negeri"] = $this->plm->get_ref_negeri(array("id"=>$negeri_id));
        $this->mViewData["res_negeri"] = $row_negeri;

        // Data untuk combo box giatmara
        // $row_giatmara = $this->plm->get_ref_giatmara(array("id"=>$giatmara_id), "row");
        $this->mViewData["row_giatmara"] = $row_giatmara;

        //  Data untuk combo box kewarganegaraan
        $this->mViewData["res_kewarganegaraan"] = $this->plm->get_ref_kewarganegaraan();

        // Filter Data
        $btn_tetapkan = $this->input->post('btn_tetapkan');
        if ($btn_tetapkan === "Tetapkan")
        {
            $opt_negeri = $this->input->post('opt_negeri');
            $opt_giatmara = $this->input->post('opt_giatmara');
            $opt_kursus = $this->input->post('opt_kursus');
            $opt_sesi_kemasukan = $this->input->post('opt_sesi_kemasukan');
            $opt_warganegara = $this->input->post('opt_warganegara');

            $this->session->set_tempdata("opt_negeri", $opt_negeri, 300);
            $this->session->set_tempdata("opt_giatmara", $opt_giatmara, 300);
            $this->session->set_tempdata("opt_kursus", $opt_kursus, 300);
            $this->session->set_tempdata("opt_sesi_kemasukan", $opt_sesi_kemasukan, 300);
            $this->session->set_tempdata("opt_warganegara", $opt_warganegara, 300);

            $where["id_negeri"] = $opt_negeri;
            $where["id_giatmara"] = $opt_giatmara;
            $where["id_kursus"] = $opt_kursus;
            $where["id_intake"] = $opt_sesi_kemasukan;
            $where["kewarganegaraan"] = $opt_warganegara;

            $res_tetapan_temuduga_lpp09 = $this->plm->get_tetapan_temuduga($where);
            // echo "<pre>";var_dump($res_tetapan_temuduga_lpp09);echo "</pre>";exit;
            $this->mViewData["res_tetapan_temuduga_lpp09"] = $res_tetapan_temuduga_lpp09;

            $user = $this->ion_auth->user()->row();
            $user_giatmara = $user->giatmara_id;
            $row_giatmara = $this->lpp04->get_giatmara($opt_giatmara);
            $giatmara_id = $row_giatmara->id;
            $giatmara_nama = $row_giatmara->nama_giatmara;
            $giatmara_email = $row_giatmara->email;
            $giatmara_telefon = $row_giatmara->tel_no;
            $giatmara_negeri = $row_giatmara->id_negeri;

            $res_staff = $this->lpp04->get_staff($giatmara_id);
            $this->mViewData["res_staff"] = $res_staff;
            $this->mViewData["id_giatmara"] = $giatmara_id;
            $this->mViewData["nama_giatmara"] = $giatmara_nama;
            $this->mViewData["email_giatmara"] = $giatmara_email;
            $this->mViewData["telefon_giatmara"] = $giatmara_telefon;
        }

        // Tetapkan Temuduga
        $btn_tetapkan_temuduga = $this->input->post('btn_tetapkan_temuduga');
        if ($btn_tetapkan_temuduga === "tetapkan temuduga")
        {
            // echo "<Pre>";var_dump($this->input->post());echo "</pre>";exit;
            $id_permohonan_kursus_lpp09 = $this->input->post('id_permohonan_kursus_lpp09');
            $id_giatmara = $this->input->post('id_giatmara');
            $chk_temuduga = $this->input->post('chk_temuduga');
            $tarikh_temuduga = $this->input->post('txt_tarikh_temuduga');
            $waktu_temuduga = $this->input->post('opt_masa').":".$this->input->post('opt_menit');
            $tempat_temuduga = $this->input->post('txt_tempat_temuduga');
            $id_pegawai = $this->input->post('opt_pegawai');
            $jawatan = $this->input->post('txt_jawatan');
            $email = $this->input->post('txt_email');
            $no_telefon = $this->input->post('txt_no_telefon');

            $date = new DateTime($tarikh_temuduga);
            $format_tarikh = $date->format('Y-m-d');

            if (isset($chk_temuduga) && is_array($chk_temuduga))
            {
                foreach ($chk_temuduga as $key => $value)
                {
                    // $data["id_permohonan"] = $key;
                    $data["id_giatmara"] = $id_giatmara;
                    $data["id_kursus"] = $value;
                    $data["tarikh_waktu"] = $format_tarikh." ".substr($waktu_temuduga, 0, 5);
                    $data["tempat"] = $tempat_temuduga;
                    $data["pegawai"] = $id_pegawai;
                    $data["jawatan"] = $jawatan;
                    $data["email"] = $email;
                    $data["no_telefon"] = $no_telefon;
                    $data["cetak"] = 0; // status sudah diprint
                    $data["keputusan_temuduga"] = 0;
                    $data["tukar_kursus"] = $value;
                    $data["jenis_pelatih"] = "LPP09";
                    $data["id_pemohon"] = $key;
                    $data["id_permohonan"] = $key;
                    $data["id_permohonan_kursus_lpp09"] = $id_permohonan_kursus_lpp09[$key];
                    #echo "<pre>";print_r($data);echo "</pre>";
                    #$simpan = 1;
                    $simpan = $this->plm->insert_temuduga_tetapan($data);
                    if ($simpan > 0)
                    {
                        $datax['simpan'] = $simpan;
                    }
                    else
                    {
                        $datax['simpan'] = 0;
                    }
                }
                /* echo $this->db->set($data)->get_compiled_insert("temuduga_tetapan");exit; */
            } else {
                $datax['simpan'] = 0;
            }
        }

        $this->mPageTitle = "Tetapan Temuduga";
        $this->render("pelatih_lanjutan/tetapan_temuduga");
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * LPP09 P2 Screen 2
     * Menu Pelatih Lanjutan > Temuduga > Cetakan Surat Temuduga
     */
    function cetakan_surat_temuduga()
    {
        //  get info user login
        $user = $this->ion_auth->user()->row();
        $user_staff = $user->id_staff;
        $row_staff = $this->plm->get_v_admin_users(array("id_staff" => $user_staff));
        $giatmara_id = $row_staff->id_giatmara;
        $negeri_id = $row_staff->id_negeri;

        // Data untuk combox Negeri
        $this->mViewData["res_negeri"] = $this->plm->get_ref_negeri(array("id"=>$negeri_id));

        // Data untuk combo box giatmara
        $row_giatmara = $this->plm->get_ref_giatmara(array("id"=>$giatmara_id), "row");
        $this->mViewData["row_giatmara"] = $row_giatmara;

        // Data untuk combo box kursus
        $this->mViewData["res_kursus"] = $this->plm->get_v_giatmara_kursus(array("id_giatmara"=>$row_giatmara->id), "result", "distinct", "id_kursus, nama_kursus");

        //  Data untuk combo box kewarganegaraan
        $this->mViewData["res_kewarganegaraan"] = $this->plm->get_ref_kewarganegaraan();

        /* proses filter */
        if ($this->input->post("btn_tetapkan") === "tetapkan")
        {
            $this->session->set_tempdata("opt_negeri", $this->input->post("opt_negeri"), 300);
            $this->session->set_tempdata("opt_giatmara", $this->input->post("opt_giatmara"), 300);
            $this->session->set_tempdata("opt_kursus", $this->input->post("opt_kursus"), 300);
            $this->session->set_tempdata("opt_sesi_kemasukan", $this->input->post("opt_sesi_kemasukan"), 300);
            $this->session->set_tempdata("opt_warganegara", $this->input->post("opt_warganegara"), 300);

            $where["id_negeri"] = $this->input->post("opt_negeri");
            $where["id_giatmara"] = $this->input->post("opt_giatmara");
            $where["id_kursus"] = $this->input->post("opt_kursus");
            $where["id_intake"] = $this->input->post("opt_sesi_kemasukan");
            $where["id_kewarganegaraan"] = $this->input->post("opt_warganegara");
            $this->mViewData["res_cetakan_temuduga"] = $this->plm->get_v_cetakan_surat_temuduga_lpp09($where);
        }
        /* end proses filter */

        /* cetak satu-satu */
        if ($this->uri->segment(4,0))
        {
            /* update table temuduga_tetapan, set status cetak = 1, tarikh cetak = now, keputusan temuduga = 1 */
            $id_temuduga_tetapan = $this->uri->segment(4,0);
            // echo $id_temuduga_tetapan;exit;
            $where["id"] = $id_temuduga_tetapan;
            $data["cetak"] = 1;
            $data["tarikh_cetak"] = date("y-m-d");
            $data["keputusan_temuduga"] = 1;
            $update = $this->plm->update_cetak_temuduga($data, $where);

            // ambil data pelatih
            $where = "id_temuduga_tetapan = ".$id_temuduga_tetapan;
            $data["row_pemohon"] = $this->plm->get_data_pemohon($where);

            /* cetak ke pdf menggunakan dompdf */
            $this->load->library('Pdfdom');
            $dompdf = new Pdfdom();

            $this->load->view("templates/pdf/lpp09/p3", $data);
            $html = $this->output->get_output();
            $name = "cetak_surat_temuduga.pdf";

            $dompdf->load_html($html);
            $dompdf->set_paper('A4');
            $dompdf->render();
            $dompdf->add_info('Author', 'Author Name');
            $dompdf->add_info('Title', $name);
            $dompdf->stream($name, array("Attachment" => 0));

            // clear buffer supaya pdf dapat digenerate dengan sempurna
            exit(0);
        }
        /* end cetak satu-satu */

        /* cetak checkbox */
        if($this->input->post("btn_cetak") === "cetak")
        {
            $id = $this->input->post("chk_temuduga");

            $this->load->library('Pdf');

            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Temuduga Cetak');
            $pdf->SetHeaderData(PDF_HEADER_LOGO, 13,"","");

            /******************************************************************************/
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(0);
            $pdf->SetAutoPageBreak(TRUE, 5);
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->SetFont('helvetica','',10);
            /******************************************************************************/

            foreach($id as $val)
            {
                //getdata
                /*indo $where = "id_temuduga_tetapan = ".$val;
                $data = $this->plm->get_data_pemohon($where);

                //update temuduga_tetapan
                $this->lpp04->update_temuduga_tetapan_cetak($val);

                $html = '';
                $html = "<img src=\"assets/images/giatmara03.png\" width=\"200px\"><br/>
                <table width=\"500px\" border=\"0\" style=\"text-align: justify;\">
                    <tr>
                        <td>&nbsp;</td>
                        <td align=\"right\">
                            <table border=\"0\" width=\"280px\" style=\"padding-left: 25px;\"><tr><td align=\"left\">
                            Rujukan kami : <b>GM/PEL-TMS-02</b> <br/>
                            Tarikh : ".date("d-m-Y")."
                            </td></tr></table>
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td>".$data->nama_penuh."</td>
                    </tr>
                    <tr>
                        <td>".$data->no_mykad."</td>>
                    </tr>
                    <tr>
                        <td>".$data->alamat1."</td/>
                    </tr>
                    <tr>
                        <td>".$data->poskod.", ".ucwords(strtolower($data->bandar))."</td>
                    </tr>
                    <tr>
                        <td>".ucwords(strtolower($data->negeri_poskod)).", ".$data->nama_negara."</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan=\"2\"><b>TAWARAN MENGHADIRI SESI TEMUDUGA KEMASUKAN <br>LATIHAN KEMAHIRAN GIATMARA SEPENUH MASA</b><br></td>
                    </tr>
                    <tr>
                        <td colspan=\"2\">
                            Sukacita dimaklumkan saudara / saudari telah dipilih untuk menghadiri sesi temuduga kemasukan ke Latihan Kemahiran GIATMARA Sepenuh Masa. Butiran temuduga adalah seperti berikut:
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width=\"100%\" border=\"0\" cellpadding=\"1px\">
                                <tr>
                                    <td width=\"60px\">&nbsp;</td>
                                    <td width=\"150px\">Tarikh Temuduga</td>
                                    <td align=\"center\" width=\"10px\">:</td>
                                    <td width=\"280px\">".date("d-m-Y", strtotime($data->tarikh_temuduga))."</td>
                                </tr>
                                <tr>
                                    <td width=\"60px\">&nbsp;</td>
                                    <td width=\"150px\">Pilihan Kursus</td>
                                    <td align=\"center\" width=\"10px\">:</td>
                                    <td width=\"280px\">".$data->nama_kursus."</td>
                                </tr>
                                <tr>
                                    <td width=\"60px\">&nbsp;</td>
                                    <td width=\"150px\">Tempat</td>
                                    <td align=\"center\" width=\"10px\">:</td>
                                    <td width=\"280px\">GIATMARA ".strtoupper($data->nama_giatmara)."<br>".$data->alamat_giatmara."</td>
                                </tr>
                                <tr>
                                    <td width=\"60px\">&nbsp;</td>
                                    <td width=\"150px\">Masa</td>
                                    <td align=\"center\" width=\"10px\">:</td>
                                    <td width=\"280px\">".date("h:i A", strtotime($data->tarikh_temuduga))."</td>
                                </tr>
                                <tr>
                                    <td width=\"60px\">&nbsp;</td>
                                    <td width=\"150px\">Pegawai Untuk Dihubungi</td>
                                    <td align=\"center\" width=\"10px\">:</td>
                                    <td width=\"280px\">".$data->pegawai_dihubungi."</td>
                                </tr>
                                <tr>
                                    <td width=\"60px\">&nbsp;</td>
                                    <td width=\"150px\">No. Telefon</td>
                                    <td align=\"center\" width=\"10px\">:</td>
                                    <td width=\"280px\">".$data->no_telefon."</td>
                                </tr>
                                <tr>
                                    <td colspan=\"4\">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=\"2\">
                            3. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dengan itu, saudara / saudari dikehendaki membawa bersama dokumen -dokumen dan sijil-sijil asal berkaitan permohonan sebagai rujukan GIATMARA ketika menghadiri sesi temuduga ini.
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=\"2\">
                            4. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GIATMARA akan beranggapan bahawa saudara / saudari tidak lagi berminat meneruskan permohonan sekiranya gagal untuk menepati keperluan temuduga serta kegagalan menghadirkan diri pada tarikh sesi temuduga yang ditetapkan.<br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=\"2\">GIATMARA Malaysia mengucapkan syabas dan selamat maju jaya.<br><br></td>
                    </tr>
                    <tr>
                        <td>Terima kasih.<br></td>
                    </tr>
                    <tr>
                        <td colspan=\"2\">
                            <b>'BERKHIDMAT UNTUK NEGARA'</b><br>
                            <b>'Membandarkan Luar Bandar'</b><br><br><br><br>
                            Pengarah<br>
                            Bahagian Pembangunan Pelatih & Kerjaya<br>
                            GIATMARA Sendirian Berhad<br>
                        </td>
                    </tr>

                    <tr>
                        <td colspan=\"2\" align=\"center\"><br><br><br><br><br><br><br><br><br>
                            <span style=\"font-size:9px;\">
                                <span style=\"font-weight: bold; font-style: italic;\">(Surat ini adalah janaan sistem dan dianggap telah ditandatangan)</span><br><br><br>
                                GIATMARA Malaysia, Wisma GIATMARA, No. 39 & 41 Jalan Medan Tuanku, 50300 Kuala Lumpur <br>
                                Tel: +603 2691 2690
                            </span>
                        </td>
                    </tr>
                </table>
                ";

                $pdf->AddPage();
                $pdf->writeHTML($html, true, false, true, false, '');*/

                //mmn add to display surat temuduga
                $data = $this->plm->getDataCetakanEmuduga($val);
                $dt = new DateTime($data[0]["tarikh_temuduga"]);
                //update temuduga_tetapan
                $this->lpp04->update_temuduga_tetapan_cetak($val);

                // $where_last_nomor_surat_tawaran["id"] = $val;
                $last_nomor_surat_temuduga = $this->plm->get_last_nomor_surat_temuduga()->row();
                // echo $last_nomor_surat_tawaran->nomor_surat_tawaran;exit;
                $running_number = str_pad($last_nomor_surat_temuduga->nomor_surat_temuduga+1,5,0, STR_PAD_LEFT);
                // echo $running_number;exit;

                $html = '';
                $html = "<img src=\"assets/images/giatmara03.png\" width=\"100px\"><br/>
                <table width=\"500px\" border=\"0\" style=\"text-align: justify;\">
                    <tr>
                        <td>&nbsp;</td>
                        <td align=\"right\">
                            <table border=\"0\" width=\"230px\" style=\"padding-right: 2px;\">
                                <tr>
                                    <td width=\"10%\">&nbsp;</td><td width=\"35%\" align=\"left\">Rujukan kami</td><td width=\"4%\">:</td><td width=\"58%\"  align=\"left\"><b>GM400/12/".date("Y")."/TMD/".$running_number."</b></td>
                                </tr>
                                <tr>
                                    <td width=\"10%\">&nbsp;</td><td width=\"35%\"  align=\"left\">Tarikh</td><td width=\"4%\">:</td><td width=\"58%\"  align=\"left\">".date("d-m-Y")."</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td>".strtoupper($data[0]["nama_penuh"])."</td>
                    </tr>
                    <tr>
                        <td>".$data[0]["no_mykad"]."</td>
                    </tr>
                    <tr>
                    <td>".strtoupper($data[0]["alamat_pemohon"])."</td>
                    </tr>
                    <tr>
                        <td>".$data[0]["poskod_3"]." ".strtoupper($data[0]["bandar_3"])."</td>
                    </tr>
                    <tr>
                        <td>".strtoupper($data[0]["negeri_3"]).", ".strtoupper($data[0]["nama_negara"])."</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan=\"2\"><b>TAWARAN MENGHADIRI SESI TEMUDUGA KEMASUKAN <br>LATIHAN KEMAHIRAN GIATMARA SEPENUH MASA</b><br></td>
                    </tr>
                    <tr>
                        <td colspan=\"2\">
                            <table width=\"100%\" border=\"0\" cellpadding=\"1px\">
                                <tr>
                                    <td>Sukacita dimaklumkan saudara / saudari telah dipilih untuk menghadiri sesi temuduga kemasukan ke Latihan Kemahiran GIATMARA Sepenuh Masa. Butiran temuduga adalah seperti berikut:</td>
                                </tr>
                            </table>
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width=\"100%\" border=\"0\" cellpadding=\"1px\">
                                <tr>
                                    <td width=\"60px\">&nbsp;</td>
                                    <td width=\"150px\">Tarikh Temuduga</td>
                                    <td align=\"center\" width=\"10px\">:</td>
                                    <td width=\"280px\">".$dt->format("d-m-Y")."</td>
                                </tr>
                                <tr>
                                    <td width=\"60px\">&nbsp;</td>
                                    <td width=\"150px\">Pilihan Kursus</td>
                                    <td align=\"center\" width=\"10px\">:</td>
                                    <td width=\"280px\">".$data[0]["nama_kursus"]."</td>
                                </tr>
                                <tr>
                                    <td width=\"60px\">&nbsp;</td>
                                    <td width=\"150px\">Tempat</td>
                                    <td align=\"center\" width=\"10px\">:</td>
                                    <td width=\"280px\">GIATMARA ".strtoupper($data[0]["nama_giatmara"])."<br>".$data[0]["alamat_giatmara"]."</td>
                                </tr>
                                <tr>
                                    <td width=\"60px\">&nbsp;</td>
                                    <td width=\"150px\">Masa</td>
                                    <td align=\"center\" width=\"10px\">:</td>
                                    <td width=\"280px\">".$dt->format("h:i A")."</td>
                                </tr>
                                <tr>
                                    <td width=\"60px\">&nbsp;</td>
                                    <td width=\"150px\">Pegawai Untuk Dihubungi</td>
                                    <td align=\"center\" width=\"10px\">:</td>
                                    <td width=\"280px\">".$data[0]["pegawai_dihubungi"]."</td>
                                </tr>
                                <tr>
                                    <td width=\"60px\">&nbsp;</td>
                                    <td width=\"150px\">No. Telefon</td>
                                    <td align=\"center\" width=\"10px\">:</td>
                                    <td width=\"280px\">".$data[0]["telefon_giatmara"]."</td>
                                </tr>
                                <tr>
                                    <td colspan=\"4\">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=\"2\">
                            2. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dengan itu, saudara / saudari dikehendaki membawa bersama dokumen-dokumen dan sijil-sijil asal berkaitan permohonan sebagai rujukan GIATMARA ketika menghadiri sesi temuduga ini.
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=\"2\">
                            3. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GIATMARA akan beranggapan bahawa saudara / saudari tidak lagi berminat meneruskan permohonan sekiranya gagal untuk menepati keperluan temuduga serta kegagalan menghadirkan diri pada tarikh sesi temuduga yang ditetapkan.<br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=\"2\">GIATMARA Malaysia mengucapkan syabas dan selamat maju jaya.<br><br></td>
                    </tr>
                    <tr>
                        <td>Terima kasih.<br></td>
                    </tr>
                    <tr>
                        <td colspan=\"2\">
                            <b>'BERKHIDMAT UNTUK NEGARA'</b><br>
                            <b>'Membandarkan Luar Bandar'</b><br><br><br><br>
                            Pengarah<br>
                            Bahagian Pembangunan Pelatih & Kerjaya<br>
                            GIATMARA Sendirian Berhad<br>
                        </td>
                    </tr>

                    <tr>
                        <td colspan=\"2\" align=\"center\"><br><br><br><br><br><br><br>
                            <span style=\"font-size:9px;\">
                                <span style=\"font-weight: bold; font-style: italic;\">(Surat ini adalah janaan sistem dan dianggap telah ditandatangan)</span><br><br><br>
                                GIATMARA Malaysia, Wisma GIATMARA, No. 39 & 41 Jalan Medan Tuanku, 50300 Kuala Lumpur <br>
                                Tel: +603 2691 2690
                            </span>
                        </td>
                    </tr>
                </table>
                ";

                $pdf->AddPage();
                $pdf->writeHTML($html, true, false, true, false, '');//mmn ends here
            }
            $pdf->Output('surat-temuduga.pdf', 'I');
        }
        /* end cetak checkbox */

        $this->mPageTitle = 'Cetakan Surat Temuduga';
        $this->render("pelatih_lanjutan/cetakan_surat_temuduga");
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * LPP09 P2 Screen 3
     * Menu Pelatih Lanjutan > Temuduga > Keputusan Temuduga
     */
    function keputusan_temuduga()
    {
        //  get info user login
        $user = $this->ion_auth->user()->row();
        $user_staff = $user->id_staff;
        $row_staff = $this->plm->get_v_admin_users(array("id_staff" => $user_staff));
        $giatmara_id = $row_staff->id_giatmara;
        $negeri_id = $row_staff->id_negeri;

        // Data untuk combox Negeri
        $this->mViewData["res_negeri"] = $this->plm->get_ref_negeri(array("id"=>$negeri_id));

        // Data untuk combo box giatmara
        $row_giatmara = $this->plm->get_ref_giatmara(array("id"=>$giatmara_id), "row");
        $this->mViewData["row_giatmara"] = $row_giatmara;

        // Data untuk combo box kursus
        $this->mViewData["res_kursus"] = $this->plm->get_v_giatmara_kursus(array("id_giatmara"=>$row_giatmara->id));

        //  Data untuk combo box kewarganegaraan
        $this->mViewData["res_kewarganegaraan"] = $this->plm->get_ref_kewarganegaraan();

        /* filter data */
        if ($this->input->post("btn_tetapkan") === "tetapkan")
        {
            $this->session->set_tempdata("opt_negeri", $this->input->post("opt_negeri"), 300);
            $this->session->set_tempdata("opt_giatmara", $this->input->post("opt_giatmara"), 300);
            $this->session->set_tempdata("opt_kursus", $this->input->post("opt_kursus"), 300);
            $this->session->set_tempdata("opt_warganegara", $this->input->post("opt_warganegara"), 300);

            $where["id_negeri"] = $this->input->post("opt_negeri");
            $where["id_giatmara"] = $this->input->post("opt_giatmara");
            $where["id_settings_tawaran_kursus"] = $this->input->post("opt_kursus");
            $where["id_warganegara"] = $this->input->post("opt_warganegara");

            $this->mViewData["res_keputusan_temuduga"] = $this->plm->get_keputusan_temuduga_lpp09($where);
            $this->mViewData["res_keputusan"] = $this->plm->get_keputusan();
            // $this->mViewData["res_kursus"] = $this->plm->get_settings_tawaran_kursus("id_giatmara=".$this->input->post("opt_giatmara"));

        }
        /* end filter data */

        /* update table temuduga_tetapan */
        if ($this->input->post("btn_tetapkan_tindakan") === "tetapkan_tindakan")
        {
            $opt_temuduga = $this->input->post("idtetapantemuduga");
            $opt_idsettingkursus = $this->input->post("idsettingstawarankursus");
            $opt_keputusan = $this->input->post("opt_keputusan");
            $opt_kursus = $this->input->post("opt_kursus");
            $opt_catatan = $this->input->post("txt_catatan");
            $opt_id_permohonan = $this->input->post('txt_id_permohonan');
            $opt_id_permohonan_kursus_lpp09 = $this->input->post('txt_id_permohonan_kursus_lpp09');
            $opt_nama_bank = $this->input->post('txt_nama_bank');
            $opt_no_akaun = $this->input->post('txt_no_akaun');

            foreach ($opt_temuduga as $idx => $val)
            {
                $data["id_permohonan"] = $opt_id_permohonan[$idx];
                $data["id_permohonan_kursus_lpp09"] = $opt_id_permohonan_kursus_lpp09[$idx];
                $data["nama_bank"] = $opt_nama_bank[$idx];
                $data["no_akaun"] = $opt_no_akaun[$idx];
                $data["keputusan_temuduga"] = (($opt_keputusan[$idx] == "") ? 1 : $opt_keputusan[$idx]);
                $data["id_kursus"] = (($opt_kursus[$idx] == "") ? $opt_idsettingkursus[$idx] : $opt_kursus[$idx]);
                $data["catatan"] = (($opt_catatan[$idx] == "") ? "" : $opt_catatan[$idx]);
                $data["id_kursus_sah"] = (($opt_kursus[$idx] == "") ? $opt_idsettingkursus[$idx] : $opt_kursus[$idx]);
                $where['id'] = $val;
                $this->plm->update_keputusan_temuduga($data, $where);
            }
            // exit;
        }
        /* end update table temuduga_tetapan */

        $this->mPageTitle = 'Keputusan Temuduga';
        $this->render("pelatih_lanjutan/keputusan_temuduga");
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     * LPP09 P2 Screen 4
     * Menu Pelatih Lanjutan > Temuduga > Senarai Gagal Temuduga
     */
    function gagal_temuduga()
    {
        //  get info user login
        $user = $this->ion_auth->user()->row();
        $user_staff = $user->id_staff;
        $row_staff = $this->plm->get_v_admin_users(array("id_staff" => $user_staff));
        $giatmara_id = $row_staff->id_giatmara;
        $negeri_id = $row_staff->id_negeri;

        // Data untuk combox Negeri
        $this->mViewData["res_negeri"] = $this->plm->get_ref_negeri(array("id"=>$negeri_id));

        // Data untuk combo box giatmara
        $row_giatmara = $this->plm->get_ref_giatmara(array("id"=>$giatmara_id), "row");
        $this->mViewData["row_giatmara"] = $row_giatmara;

        // Data untuk combo box kursus
        $this->mViewData["res_kursus"] = $this->plm->get_v_giatmara_kursus(array("id_giatmara"=>$row_giatmara->id));

        //  Data untuk combo box kewarganegaraan
        $this->mViewData["res_kewarganegaraan"] = $this->plm->get_ref_kewarganegaraan();

        if ($this->input->post('btn_tetapkan') === "tetapkan")
        {
            $this->session->set_tempdata("opt_negeri", $this->input->post("opt_negeri"), 300);
            $this->session->set_tempdata("opt_giatmara", $this->input->post("opt_giatmara"), 300);
            $this->session->set_tempdata("opt_kursus", $this->input->post("opt_kursus"), 300);
            $this->session->set_tempdata("opt_warganegara", $this->input->post("opt_warganegara"), 300);

            $opt_negeri = $this->input->post('opt_negeri');
            $opt_giatmara = $this->input->post('opt_giatmara');
            $opt_kursus = $this->input->post('opt_kursus');
            $opt_warganegara = $this->input->post('opt_warganegara');

            $where["id_negeri"] = $opt_negeri;
            $where["id_giatmara"] = $opt_giatmara;
            $where["id_settings_tawaran_kursus"] = $opt_kursus;
            $where["id_kewarganegaraan"] = $opt_warganegara;
            $res_gagal_temuduga = $this->plm->get_gagal_temuduga_lpp09($where);
            // echo "<pre>";var_dump($res_gagal_temuduga);echo "</pre>";
            $this->mViewData["res_gagal_temuduga"] = $res_gagal_temuduga;
        }

        $btn_tindakan = $this->input->post('btn_tindakan');
        if (is_array($btn_tindakan))
        {
            foreach ($btn_tindakan as $key => $value)
            {
                $where["id"] = $key;
                $data["keputusan_temuduga"] = 1;
                $this->plm->update_temuduga_tetapan($data, $where);
            }
        }

        $this->mPageTitle = 'Senarai Permohonan';
        $this->render("pelatih_lanjutan/gagal_temuduga");
    }


    public function pengesahan($id, $id_pk, $id_giatmara, $kelulusan)
    {
        $select = "pkl.id,
                    pbp.nama_penuh,
                    pbp.no_mykad,
                    p.no_pelatih,
                    pkl.kategori_program,
                    k2.nama_kursus AS nama_kursus2,
                    kls.nama_kluster,

                    stk.id as idsetting,
                    itk.id as id_intake,
                    k2.id as id_kursus,
                    k.nama_kursus,

                    kls2.nama_kluster AS nama_kluster2,
                    itk2.nama_intake as kod_intake2,
                    itk2.tarikh_mula as tarikh_mula_intake2,
                    itk2.tarikh_tamat as tarikh_tamat_intake2,
                    pkl.no_ssm,
                    pkl.alamat_perniagaan,
                    pp.nama_program AS nama_program_pertandingan,
                    lpk.nama_program AS nama_program_khas,
                    p.nama_bank,
                    p.no_akaun,
                    klsk.nama_kluster AS nama_kluster_kursus,
                    itk.nama_intake as kod_intake,
                    itk.tarikh_mula as tarikh_mula_intake,
                    itk.tarikh_tamat as tarikh_tamat_intake";
        $sql = "SELECT ".$select." FROM
        permohonan_butir_peribadi pbp
        LEFT JOIN temuduga_tetapan tt
            ON pbp.id=tt.id_permohonan AND tt.jenis_pelatih='LPP09'
        LEFT JOIN pelatih p
            ON pbp.id=p.id_permohonan AND p.jenis_pelatih='LPP04'
        LEFT JOIN settings_tawaran_kursus stk
            ON tt.id_kursus = stk.id
        LEFT JOIN ref_kursus k
            ON stk.id_kursus = k.id
        LEFT JOIN ref_kluster klsk
            ON k.id_kluster = klsk.id
        LEFT JOIN ref_intake itk
            ON stk.id_intake = itk.id
        LEFT JOIN permohonan_kursus_lpp09 pkl
            ON pbp.id = pkl.id_permohonan
        LEFT JOIN ref_kluster kls
            ON pkl.id_kluster = kls.id
        LEFT JOIN settings_tawaran_kursus stk2
            ON pkl.id_settings_tawaran_kursus = stk2.id
        LEFT JOIN ref_kursus k2
            ON stk2.id_kursus = k2.id
        LEFT JOIN ref_kluster kls2
            ON k2.id_kluster = kls2.id
        LEFT JOIN ref_intake itk2
            ON stk2.id_intake = itk2.id
        LEFT JOIN ref_lpp09_program_pertandingan pp
            ON pkl.id_program_pertandingan = pp.id
        LEFT JOIN ref_lpp09_program_khas lpk
            ON pkl.id_program_khas = lpk.id

        WHERE pbp.id=".$id." and pkl.id=".$id_pk;

         //echo $sql;exit;
        $row = $this->db->query($sql)->row();
        // echo "<pre>";var_dump($row);echo "</pre>";

        $this->mViewData["res_kursus_terdahulu"] = $this->plm->get_kursus_terdahulu($row->no_mykad);

        $sql_giatmara = "SELECT g.id AS id_giatmara, g.nama_giatmara, n.id AS id_negeri, n.nama_negeri FROM ref_giatmara g JOIN ref_negeri n ON g.id_negeri=n.id WHERE g.id=".$id_giatmara;
        $this->mViewData["row_giatmara"] = $this->db->query($sql_giatmara)->row();

        if ($row->kategori_program == "LL")
        {
            $kp = "LATIHAN LANJUTAN";

            $this->mViewData["nama_kluster"] = $row->nama_kluster == NULL ? $row->nama_kluster2 : $row->nama_kluster;
            $this->mViewData["kod_intake"] = $row->kod_intake == NULL ? $row->kod_intake2 : $row->kod_intake;

            $this->mViewData["id_settings_tawaran_kursus"] = $row->idsetting;
            $this->mViewData["id_intake"] = $row->id_intake;
            $this->mViewData["id_kursus"] = $row->id_kursus;
            $this->mViewData["nama_kursus"] = $row->nama_kursus == NULL ? $row->nama_kursus2 : $row->nama_kursus;

            $this->mViewData["tarikh_mula_intake"] = $row->tarikh_mula_intake == NULL ? $row->tarikh_mula_intake2 : $row->tarikh_mula_intake;
            $this->mViewData["tarikh_tamat_intake"] = $row->tarikh_tamat_intake == NULL ? $row->tarikh_tamat_intake2 : $row->tarikh_tamat_intake;

        }
        elseif ($row->kategori_program == "RN")
        {
            $kp = "RINTIS NIAGA";
            $this->mViewData["nama_kluster"] = $row->nama_kluster;
            $this->mViewData["no_ssm"] = $row->no_ssm;
            $this->mViewData["alamat_perniagaan"] = $row->alamat_perniagaan;

            $this->mViewData["id_settings_tawaran_kursus"] = $row->idsetting;
            $this->mViewData["id_intake"] = $row->id_intake;
            $this->mViewData["id_kursus"] = $row->id_kursus;
            $this->mViewData["nama_kursus"] = $row->nama_kursus == NULL ? $row->nama_kursus2 : $row->nama_kursus;

        }
        elseif ($row->kategori_program == "PP")
        {
            $kp = "PROGRAM PERTANDINGAN";
            $this->mViewData["nama_program_pertandingan"] = $row->nama_program_pertandingan;

            $this->mViewData["id_settings_tawaran_kursus"] = $row->idsetting;
            $this->mViewData["id_intake"] = $row->id_intake;
            $this->mViewData["id_kursus"] = $row->id_kursus;


        }
        elseif ($row->kategori_program == "PK")
        {
            $kp = "PROGRAM KHAS";
            $this->mViewData["nama_program_khas"] = $row->nama_program_khas;

            $this->mViewData["id_settings_tawaran_kursus"] = $row->idsetting;
            $this->mViewData["id_intake"] = $row->id_intake;
            $this->mViewData["id_kursus"] = $row->id_kursus;
        }

        $where_stk["id_giatmara"] = $id_giatmara;
        $where_stk["id_kursus"] = $row->id_kursus;
        $res_stk = $this->plm->get_settings_tawaran_kursus($where_stk)->result();
        $this->mViewData["res_stk"] = $res_stk;

        $this->mViewData["row"] = $row;
        $this->mViewData["id_giatmara"] = $id_giatmara;
        $this->mViewData["row_kp"] = $row_kp;
        $this->mViewData["kp"] = $kp;
        $this->mViewData["id_permohonan"] = $id;
        $this->mViewData["id_permohonan_kursus_lpp09"] = $id_pk;
        $this->mViewData["kelulusan"] = $kelulusan;
        $this->mViewData["idSeq"] = $id."/".$id_pk."/".$id_giatmara."/".$kelulusan;
        $this->mPageTitle = 'Pengesahan';
        $this->render("pelatih_lanjutan/pengesahan");
    }

    //mmn add
    function ajax_calc_dt_difference()
    {
        $todate = $this->uri->segment(4);
        $fromdate = $this->uri->segment(5);

        //$ca_data['start_elaun'] = $start_allo_dt = $this->input->post('start_elaun');
        //$ca_data['end_elaun'] = $end_allo_dt = $this->input->post('end_elaun');

        /*$date1 = new DateTime($todate);
        $date2 = new DateTime($fromdate);*/


        list($day1, $month1, $year1) = explode('-', $todate);
        $date1 = new DateTime($year1.'-'.$month1.'-'.$day1);

        list($day2, $month2, $year2) = explode('-', $fromdate);
        $date2 = new DateTime($year2.'-'.$month2.'-'.$day2);

/*echo "d1=".$date1 = $year1.'-'.$month1.'-'.$day1;
echo "<br>d2=".$date2 = $year2.'-'.$month2.'-'.$day2;
$interval = date_diff($date1, $date2);*/


        $interval = $date1->diff($date2);
        echo "JANGKAAN WAKTU: " . $interval->y . " TAHUN, " . $interval->m." BULAN, ".$interval->d." HARI ";
    }

    public function kelulusan_permohonan()
    {
        if(isset($_POST['submit']))
        {
            $negeri=  $this->input->post('opt_negeri');
            $giatmara=  $this->input->post('opt_giatmara');
            // $kategori = $this->input->post('opt_kategori');
            $data= $this->plm->get_data_kelulusan($negeri,$giatmara)->result();
            //var_dump($giatmara);die();
            $opt_negeri = $this->plm->getnegeri($negeri)->result();
            //var_dump($opt_negeri);die();
            $opt_giatmara = $this->plm->getgiatmara2($giatmara)->result();
            $this->mViewData["negeri"] = $opt_negeri;
            $this->mViewData["giatmara"] = $opt_giatmara;
            $this->mViewData["kategori"] = $kategori;
            $this->mViewData["row_data"] = $data;
            $this->mViewData["res_negeri"] = $this->plm->get_negeri();
        }
        else
        {
            $this->mViewData["res_negeri"] = $this->plm->get_negeri();
            $data= $this->plm->get_data_seluruhnya()->result();
            $this->mViewData["row_data"] = $data;
        }
        $this->mPageTitle = 'Kelulusan Permohonan';
        $this->render("pelatih_lanjutan/kelulusan_permohonan");
    }

    function kelulusan_permohonan_2()
    {
        if ($this->input->post('submit'))
        {
            $w["id_negeri"]=  $this->input->post('opt_negeri');
            $w["id_giatmara"]=  $this->input->post('opt_giatmara');
            $w["kategori_program"] = $this->input->post('opt_kategori');
            $data= $this->plm->get_data_kelulusan_2($w);
            //var_dump($giatmara);die();
            $opt_negeri = $this->plm->getnegeri($negeri)->result();
            //var_dump($opt_negeri);die();
            $opt_giatmara = $this->plm->getgiatmara2($giatmara)->result();
            $this->mViewData["negeri"] = $opt_negeri;
            $this->mViewData["giatmara"] = $opt_giatmara;
            $this->mViewData["kategori"] = $kategori;
            $this->mViewData["row_data"] = $data;
            $this->mViewData["res_negeri"] = $this->plm->get_negeri();
        }

        $this->mViewData["res_negeri"] = $this->plm->get_negeri();
        $data= $this->plm->get_data_kelulusan_2();
        $this->mViewData["row_data"] = $data;

        $this->mPageTitle = 'Kelulusan Tawaran Terus';
        $this->render("pelatih_lanjutan/kelulusan_permohonan_2");
    }

    public function buang_kelulusan()
    {
        $id = $this->uri->segment(4);
        $where = array(
            'id_permohonan' => $id,
            );
        $cek = $this->plm->cek_idpermohonan("kelulusan_lpp09",$where)->num_rows();
        if($cek > 0)
        {
            $data = array(
                'status_pengesahan' => 2,
                );

            $this->db->where('id_permohonan',$id);
            $this->db->update('kelulusan_lpp09',$data);

            redirect(base_url("admin/pelatih_lanjutan/kelulusan_permohonan"));
        }else{
            redirect(base_url("admin/pelatih_lanjutan/kelulusan_permohonan"));
        }
    }

    public function tarikh_kelulusan()
    {
        // echo "<pre>";var_dump($this->input->post());echo "</pre>";exit;
        $idpermohonan =  $this->input->post('id_permohonan');
        $idpermohonankursuslpp09 = $this->input->post('id_permohonan_kursus_lpp09');
        $mulakursus=  date("Y-m-d", strtotime($this->input->post('mulakursus')));
        $tamatkursus=  date("Y-m-d", strtotime($this->input->post('tamatkursus')));
        $sesi = $this->input->post('opt_sesi');
        // $mulasesi=  date("Y-m-d", strtotime($this->input->post('mulasesi')));
        // $tamatsesi=  date("Y-m-d", strtotime($this->input->post('tamatsesi')));
        if($this->input->post('mulaelaun')!=''){
            $mulaelaun = date("Y-m-d", strtotime($this->input->post('mulaelaun')));
        }else{
            $mulaelaun = 'NULL';
        }
        if($this->input->post('tamatelaun')!=''){
            $tamatelaun = date("Y-m-d", strtotime($this->input->post('tamatelaun')));
        }else{
            $tamatelaun = 'NULL';
        }
        $layakelaun = $this->input->post('layak');
        $iduser = $this->input->post('userid');
        $date = date("Y-m-d");

        $bank = $layakelaun == 1 ? $this->input->post('txt_bank') : "";
        $akaun = $layakelaun == 1 ? $this->input->post('txt_akaun') : "";

        $data = array(
            'status_pengesahan' => 1,
            'id_permohonan' =>$idpermohonan,
            'layak_elaun' => $layak,
            'tarikh_mula_elauan' => $mulaelaun,
            'tarikh_tamat_elaun' =>$tamatelaun,
            'tarikh_mula_kursus' => $mulakursus,
            'tarikh_tamat_kursus' =>$tamatkursus,
            'layak_elaun' => $layakelaun,
            'disahkan_oleh' => $iduser,
            'disahkan_pada' => $date,
            'nama_bank' => $bank,
            'no_akaun' => $akaun,
            'id_permohonan_kursus_lpp09' => $idpermohonankursuslpp09
        );

        $where["id_permohonan"] = $idpermohonan;
        $where["id_permohonan_kursus_lpp09"] = $idpermohonankursuslpp09;
       //code ori $cek = $this->plm->cek_idpermohonan("kelulusan_lpp09",$where)->num_rows();
        $cek = $this->plm->cek_idpermohonan($idpermohonan,$idpermohonankursuslpp09)->num_rows();

       //code asal if($cek > 0){

            // echo $this->db->set($data)->get_compiled_update("kelulusan_lpp09");exit;
            /*code asal $this->db->where('id_permohonan',$idpermohonan);
            $this->db->update('kelulusan_lpp09',$data);*/
        $query  ="select id from kelulusan_lpp09 WHERE id_permohonan = '".$idpermohonan."'
            AND id_permohonan_kursus_lpp09 ='".$idpermohonankursuslpp09."'";
        // echo $query;exit;
        $row = $this->db->query($query)->row();


            $qry = "UPDATE kelulusan_lpp09 SET
            status_pengesahan = 1,tarikh_mula_kursus = '".$mulakursus."',
            tarikh_tamat_kursus ='".$tamatkursus."',";

            $qry .= $sesi == "" ? "" : "id_settings_tawaran_kursus=".$sesi.",";

            if($this->input->post('layak')!='')
            {
                $qry .= " tarikh_mula_elauan = '".$mulaelaun."',
                            tarikh_tamat_elaun ='".$tamatelaun."',
                            layak_elaun = '".$layakelaun."',";
            }
            if($bank!='')
            {
              $qry .=" nama_bank = '".$bank."',";
            }
            if($akaun!='')
            {
              $qry .=" no_akaun = '".$akaun."',";
            }

            $qry .=" disahkan_oleh = '".$iduser."',
            disahkan_pada = '".$date."'
            WHERE id_permohonan = '".$idpermohonan."'
            AND id_permohonan_kursus_lpp09 ='".$idpermohonankursuslpp09."'
            AND id='".$row->id."'";
            // echo $qry;exit;
            $this->db->query($qry);

       /*code asal }else{
            // echo $this->db->set($data)->get_compiled_insert("kelulusan_lpp09");exit;
            $this->db->insert('kelulusan_lpp09',$data);
        }*/

        // redirect(base_url("admin/pelatih_lanjutan/pengesahan/".$idpermohonan));
        if ($this->input->post('txt_pengesahan') == "permohonan")
        {
            redirect("admin/pelatih_lanjutan/kelulusan_permohonan", refresh);

        }
        elseif ($this->input->post('txt_pengesahan')=="permohonan_2")
        {
            redirect("admin/pelatih_lanjutan/kelulusan_permohonan_2", refresh);
        }
    }

    public function pendaftaranb()
    {
        if(isset($_POST['submit']))
        {
            $negeri=  $this->input->post('opt_negeri');
            $giatmara=  $this->input->post('opt_giatmara');
            $kategori = $this->input->post('opt_kategori');

            $opt_negeri = $this->plm->getnegeri($negeri)->result();
            //var_dump($opt_negeri);die();
            $opt_giatmara = $this->plm->getgiatmara2($giatmara)->result();
            $this->mViewData["negeri"] = $opt_negeri;
            $this->mViewData["giatmara"] = $opt_giatmara;
            $this->mViewData["kategori"] = $kategori;
            $data= $this->plm->get_data_4b($negeri,$giatmara,$kategori)->result();
            $this->mViewData["row_data"] = $data;
            $data2= $this->plm->ref_bank()->result();
            $this->mViewData["row_data_bank"] = $data2;
            $this->mViewData["res_negeri"] = $this->plm->get_negeri();
        }
        else
        {
            $data= $this->plm->get_data_seluruh_4b_pendaftaran()->result();
            $this->mViewData["row_data"] = $data;
            $data2= $this->plm->ref_bank()->result();
            $this->mViewData["row_data_bank"] = $data2;
            $this->mViewData["res_negeri"] = $this->plm->get_negeri();
        }
        $this->mPageTitle = 'Pendaftaran Tawaran Terus';
        $this->render("pelatih_lanjutan/pendaftaranb");
    }

     public function senaraib()
    {
        if(isset($_POST['submit']))
        {
            $negeri=  $this->input->post('opt_negeri');
            $giatmara=  $this->input->post('opt_giatmara');
            $kategori = $this->input->post('opt_kategori');

            $opt_negeri = $this->plm->getnegeri($negeri)->result();
            //var_dump($opt_negeri);die();
            $opt_giatmara = $this->plm->getgiatmara2($giatmara)->result();
            $this->mViewData["negeri"] = $opt_negeri;
            $this->mViewData["giatmara"] = $opt_giatmara;
            $this->mViewData["kategori"] = $kategori;
            $data= $this->plm->get_data_4b($negeri,$giatmara,$kategori)->result();
            $this->mViewData["row_data"] = $data;
            $data2= $this->plm->ref_bank()->result();
            $this->mViewData["row_data_bank"] = $data2;
            $this->mViewData["res_negeri"] = $this->plm->get_negeri();
            $this->mPageTitle = 'Pendaftaran Program Lain';
            $this->render("pelatih_lanjutan/pendaftaranb");
        }
        else
        {
            $data= $this->plm->get_data_seluruh_4b()->result();
            $this->mViewData["row_data"] = $data;
            $data2= $this->plm->ref_bank()->result();
            $this->mViewData["row_data_bank"] = $data2;
            $this->mViewData["res_negeri"] = $this->plm->get_negeri();
            $this->mPageTitle = 'Pendaftaran Program Lain';
            $this->render("pelatih_lanjutan/pendaftaranb");
        }
    }

    function cetakan_surat_tawaran()
    {
        //  get info user login
        $user = $this->ion_auth->user()->row();
        $user_staff = $user->id_staff;
        $row_staff = $this->plm->get_v_admin_users(array("id_staff" => $user_staff));
        $giatmara_id = $row_staff->id_giatmara;
        $giatmara_type = $row_staff->id_type_giatmara;
        $negeri_id = $row_staff->id_negeri;

        $wn["id_giatmara"] = $giatmara_id;
        $res_negeri = $this->plm->get_v_giatmara_kursus($wn, "result", "distinct", "id_negeri, nama_negeri");
        $this->mViewData["res_negeri"] = $res_negeri;

        $wg["id_giatmara"] = $giatmara_id;
        $row_giatmara = $this->plm->get_v_giatmara_kursus($wg, "row", "distinct", "id_giatmara, nama_giatmara");
        $this->mViewData["row_giatmara"] = $row_giatmara;

        $wk["id_negeri"] = $negeri_id;
        $wk["id_giatmara"] = $giatmara_id;
        $res_kursus = $this->plm->get_v_giatmara_kursus($wk, "result", "distinct", "id_kursus, nama_kursus");
        $this->mViewData["res_kursus"] = $res_kursus;

        //$res_cetakan_temuduga = $this->plm->get_cetak_temuduga_lpp09();
        // Jika difilter
        if ($this->input->post('btn_tetapkan') === "tetapkan")
        {
            $filter_negeri = $this->input->post('opt_negeri');
            $filter_giatmara = $this->input->post('opt_giatmara');
            $filter_kursus = $this->input->post('opt_kursus');
            $filter_sesi = $this->input->post('opt_sesi');

            // ambil data berdasarkan filter
            $where["id_negeri"] = $filter_negeri;
            $where["id_giatmara"] = $filter_giatmara;
            $where["id_kursus"] = $filter_kursus;
            $where["id_intake"] = $filter_sesi;
            $res_cetakan_temuduga = $this->plm->get_cetak_temuduga_lpp09($where);
        }
        $this->mViewData["res_cetakan_temuduga"] = $res_cetakan_temuduga;

        $this->mPageTitle = "Cetakan Surat Tawaran";
        $this->render("pelatih_lanjutan/cetakan_surat_tawaran");
    }
//mmn add

function cetak_surat_tawaran_kursus($id)
{
    $post = $this->input->post();

    if($post){
      if(!empty($post["tawaran"])){
      // $updateData = $this->lpp04->update_temuduga_cetak($post["idPemohon"],$post["tawaran"]);

      $this->load->library('Pdf');

      $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
      $pdf->SetTitle('Surat Temuduga');
      $pdf->SetHeaderMargin(30);
      $pdf->SetTopMargin(20);
      $pdf->setFooterMargin(20);
      $pdf->SetAutoPageBreak(true);
      $pdf->SetAuthor('GIATMARA');
      $pdf->SetDisplayMode('real', 'default');

      foreach($post["tawaran"] as $key => $value)
      {
        $html = '';
        $pdf->AddPage();

        @$html .= "";
        $pdf->Write(5, $html);
      }

      $pdf->Output('cetak_surat_temuduga.pdf', 'I');

      }else{
        echo "
        <script>
          alert('Surat Tawaran tidak boleh kosong !');
          window.history.back(-1);
        </script>
        ";
        exit;
      }

    // Dari Link
    }
    else
    {
        // $updateData = $this->lpp04->update_temuduga_cetak($this->uri->segment(4));

        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Cetak Surat Temuduga');
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->setFont("helvetica", "", "9", "default", "true");
        $pdf->AddPage();

        $url_img = FCPATH."assets/images/giatmara03.png";
        $tgl_cetak = date("d-m-Y");


        // var_dump($row_cetak);

        // $where_last_nomor_surat_tawaran["id"] = $val;
        $last_nomor_surat_tawaran = $this->plm->get_last_nomor_surat_tawaran()->row();
        // echo $last_nomor_surat_tawaran->nomor_surat_tawaran;exit;
        $running_number = str_pad($last_nomor_surat_tawaran->nomor_surat_tawaran+1,5,0, STR_PAD_LEFT);
        // echo $running_number;exit;
        $data1["nomor_surat"] = $running_number;

        $data_1["url_img"] = FCPATH."assets/images/giatmara03.png";
        $data_1["tgl_cetak"] = date("d-m-Y");
        $where_ctk["id_pelatih"] = $this->uri->segment(4);
        // $data_1["row_cetak"] = $this->plm->get_cetak_tawaran_kursus($where_ctk);
        $data_1["row_cetak"] = $this->plm->get_cetak_tawaran_kursus_lpp09($where_ctk);
        // echo "<pre>";print_r($data_1["row_cetak"]);echo "</pre>"; exit;
        $this->load->view("templates/pdf/surat_tawaran_1", $data_1);
        $html = $this->output->get_output();

        $pdf->SetMargins(20, 5, 20, true);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->AddPage();

        $pdf->SetTopMargin(20);
        $data_2["row_cetak"] = $this->plm->get_cetak_tawaran_kursus_lpp09($where_ctk);
        $this->load->view("templates/pdf/surat_tawaran_2", $data_2);
        $html = $this->output->get_output();

        $pdf->SetMargins(20, 10, 20, true);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->AddPage();
        $pdf->SetTopMargin(20);
        $data_3["row_cetak"] = $this->plm->get_cetak_tawaran_kursus_lpp09($where_ctk);
        $this->load->view("templates/pdf/surat_tawaran_3", $data_3);
        $html = $this->output->get_output();

        $pdf->SetMargins(20, 10, 20, true);

        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->AddPage();
        $pdf->SetTopMargin(20);
        $data_4["row_cetak"] = $this->plm->get_cetak_tawaran_kursus_lpp09($where_ctk);
        $this->load->view("templates/pdf/surat_tawaran_4", $data_4);
        $html = $this->output->get_output();

        $pdf->SetMargins(20, 10, 20, true);

        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output('Surat-Tawaran.pdf', 'I');

    }

  }

    function cetak_surat_temuduga($id)
    {
        $post = $this->input->post();

        if($post){
            if(!empty($post["tawaran"])){
            // $updateData = $this->lpp04->update_temuduga_cetak($post["idPemohon"],$post["tawaran"]);

            $this->load->library('Pdf');

            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Surat Temuduga');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('GIATMARA');
            $pdf->SetDisplayMode('real', 'default');

            foreach($post["tawaran"] as $key => $value)
            {
                $html = '';
                $pdf->AddPage();

                @$html .= "";
                $pdf->Write(5, $html);
            }

            $pdf->Output('My-File-Name.pdf', 'I');

            }else{
                echo "
                <script>
                    alert('Surat Tawaran tidak boleh kosong !');
                    window.history.back(-1);
                </script>
                ";
                exit;
            }

        // Dari Link
        } else {
            // $updateData = $this->lpp04->update_temuduga_cetak($this->uri->segment(4));
//mmn add to print surat tawaran
$updateData = $this->lpp04->update_temuduga_cetak($this->uri->segment(4));

            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Surat-Tawaran');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->setFont("helvetica", "", "9", "default", "true");
            $pdf->AddPage();

            $data_1["url_img"] = FCPATH."assets/images/giatmara03.png";
            $data_1["tgl_cetak"] = date("d-m-Y");
            $where_ctk["id_tetapan_temuduga"] = $this->uri->segment(4);
            $data_1["row_cetak"] = $this->plm->get_cetak_tawaran_kursus($where_ctk);
            // var_dump($row_cetak);

            $this->load->view("templates/pdf/surat_tawaran_1", $data_1);
            $html = $this->output->get_output();

            $pdf->SetMargins(20, 5, 20, true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $pdf->AddPage();

            $pdf->SetTopMargin(20);
            $data_2["row_cetak"] = $this->plm->get_cetak_tawaran_kursus($where_ctk);
            $this->load->view("templates/pdf/surat_tawaran_2", $data_2);
            $html = $this->output->get_output();

            $pdf->SetMargins(20, 10, 20, true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $pdf->AddPage();
            $pdf->SetTopMargin(20);
            $data_3["row_cetak"] = $this->plm->get_cetak_tawaran_kursus($where_ctk);
            $this->load->view("templates/pdf/surat_tawaran_3", $data_3);
            $html = $this->output->get_output();

            $pdf->SetMargins(20, 10, 20, true);

            $pdf->writeHTML($html, true, false, true, false, '');

            $pdf->Output('Surat-Temuduga.pdf', 'I');
            /*indo $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('My Title');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->AddPage();

            $url_img = FCPATH."assets/images/giatmara03.png";
            $tgl_cetak = date("d-m-Y");

            $where_ctk["id_permohonan"] = $this->uri->segment(4);
            $row_cetak = $this->lpp04->get_cetak_tawaran_kursus($where);
            // var_dump($row_cetak);

            $html = <<<EOT
<img src="$url_img" height="50"><br>
<table width="75%" cellpadding="0" cellspacing="0">
<tr><td>Rujukan Kami</td><td width="10">:</td><td><b>[RUJUKAN SURAT]</b></td></tr>
<tr><td>Tarikh</td><td width="10">:</td><td><b>$tgl_cetak</b></td></tr>
</table><br><br>
<table>
<tr><td><b>$row_cetak->nama_penuh</b></td></tr>
<tr><td><b>$row_cetak->no_mykad</b></td></tr>
<tr><td><b>$row_cetak->alamat_permohonan_butir_peribadi</b></td></tr>
<tr><td><b>$row_cetak->poskod</b></td></tr>
</table><br><br>

<table>
<tr><td colspan="3"><b>TAWARAN MENGIKUTI LATIHAN KEMAHIRAN GIATMARA SEPENUH MASA</b></td></tr>
<tr><td>GIATMARA</td><td>:</td><td>$row_cetak->kod_giatmara $row_cetak->nama_giatmara</td></tr>
<tr><td>KURSUS</td><td>:</td><td>$row_cetak->nama_kursus</td></tr>
<tr><td>SESI</td><td>:</td><td>SESI</td></tr>
<tr><td>TEMPOH</td><td>:</td><td>TEMPOH</td></tr>
</table><br><br>

<table>
<tr><td><b>TAHNIAH</b></td></tr>
<tr><td>Sukacita dimaklumkan bahawa saudara / saudari telah dipilih untuk mengikuti latihan kemahiran secara sepenuh masa di GIATMARA seperti maklumat di atas.<br></td></tr>
<tr><td>2. Sehubungan dengan itu, saudara / saudari dikehendaki menghadirkan diri pada hari pendaftaran seperti butiran berikut:</td></tr>
<tr><td>
<table>
<tr><td>TARIKH PENDAFTARAN</td><td>:</td><td>TARIKH MELAPOR DIRI</td></tr>
<tr><td>TEMPAT</td><td>:</td><td>ALAMAT GIATMARA</td></tr>
<tr><td>MASA</td><td>:</td><td>MASA PENDAFTARAN</td></tr>
</table><br></td>
</tr>
<tr><td>3. Bagi tujuan pendaftaran, saudara / saudari perlu untuk melengkapi Borang Pelatih Profil, Borang Aku Janji Pelatih GIATMARA dan Borang Pemeriksa Kesihatan. Saudara / saudari juga perlu untuk membawa dokumen-dokumen asal asal bagi tujuan pengesahan, 1 salinan MyKAD, 1 salinan akuan bank peribadi yang aktif dan 2 keping gambar berukuran passport.<br></td></tr>
<tr><td>4. Kegagalan saudara / saudari untuk menepati keperluan pendaftaran serta kegagalan menghadirkan diri pada tarikh pendaftaran yang ditetapkan akan menyebabkan tawaran ini terbatal secara sendirinya.<br></td></tr>
<tr><td>GIATMARA Malaysia mengucapkan syabas dan selamat maju jaya.</td></tr>
<tr><td>Terima kasih.<br></td></tr>
<tr><td><b>'BERKHIDMAT UNTUK NEGARA'</b></td></tr>
<tr><td>'Membandarkan Luar Bandar'<br></td></tr>
<tr><td>Pengarah</td></tr>
<tr><td>Bahagian Pembangunan Pelatih & Kerjaya</td></tr>
<tr><td>GIATMARA Sendirian Berhad</td></tr>
</table><br><br>
<table align="center">
<tr><td>(Surat ini adalah janaan sistem dan dianggap telah ditandatangan)</td></tr>
<tr><td>GIATMARA Malaysia, Wisma GIATMARA, No. 39 & 41, Jalan Tuanku, 50300 Kuala Lumpur</td></tr>
<tr><td>Tel: +603 2691 2690</td></tr>
</table>
EOT;

            $pdf->writeHTML($html, true, false, true, false, '');

            $pdf->AddPage();
            $html = <<<EOT
<table>
</table>
EOT;

            $pdf->writeHTML($html, true, false, true, false, '');

            $pdf->AddPage();
            $html = <<<EOT
            KETUA PEGAWAI EKSEKUTIF<br>
            GIATMARA Sendirian Berhad<br>
            Wisma GIATMARA<br>
            Jalan Medan Tuanku<br>
            50300 Kuala Lumpur<br><br>
            Tuan<br><br>
            <b>AKU JANJI PELATIH GIATMARA</b><br><br>
            BAHAWASANYA SAYA, .GSPEL No.MyKad GSPEL yang beralamat di GSPEL bersetuju mengikuti latihan di GSPEL (selepas ini disebut sebagai “GIATMARA”) dan mengakujanji mematuhi segala peraturan dan syarat-syarat seperti berikut:-
            <ol>
                <li>Akan mengikuti dan dengan sesungguhnya meneruskan latihan kemahiran dan menduduki semua ujian atau peperiksaan atau yang disyaratkan oleh GIATMARA dan akan menamatkan latihan kemahiran yang tersebut itu dalam masa yang ditetapkan oleh GIATMARA atau dalam sesuatu masa yang lebih lama sebagaimana yang diluluskan oleh GIATMARA;</li>
                <li>Semasa dalam tempoh latihan kemahiran, akan mengekalkan prestasi pada tahap yang ditetapkan oleh GIATMARA;</li>
                <li>Semasa dalam tempoh latihan kemahiran itu, akan mematuhi apa-apa arahan statut, kaedah-kaedah dan peraturan, termasuklah peraturan-peraturan tatatertib, sebagaimana yang berkuatkuasa dari semasa ke semasa dalam GIATMARA atau di lain-lain tempat di bawah arahan GIATMARA di mana latihan kemahiran itu atau mana-mana bahagiannya mungkin dijalankan;</li>
                <li>Semasa dalam tempoh latihan kemahiran itu tidak akan menjadi ahli atau mengambil bahagian di dalam apa-apa aktiviti, parti politik, kesatuan sekerja, pertubuhan, badan atau kumpulan, sama ada di dalam atau di luar GIATMARA kecuali setelah mendapat kebenaran bertulis terlebih dahulu dari GIATMARA,</li>
                <li>Akan bertanggungjawab sepenuhnya membayar segala yuran pengajian dan apa-apa kos lain yang dikenakan oleh GIATMARA dari semasa ke semasa.
            </ol>
            Adalah dipersetujui dan diakui bahawa sekiranya saya melakukan pelanggaran terhadap mana-mana yang tersebut di atas, maka tindakan tatatertib boleh diambil ke atas diri saya tawaran latihan kemahiran di GSPEL adalah terbatal.<br><br><br><br><br><br>
            <table>
                <tr>
                    <td align="center">......................................................</td>
                    <td>Tarikh:................................</td>
                </tr>
                <tr>
                    <td align="center" style="font-style: italic;">(tandatangan)</td>
                    <td>&nbsp;</td>
                </tr>
            </table><br>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>GSPEL</td>
                </tr>
            </table><br><br>
            DI hadapan:<br><br>
            <table width="43%">
                <tr><td align="center">....................................................................</td></tr>
                <tr><td align="center" style="font-style: italic;">(tandatangan)</td></tr>
            </table>
            <table>
                <tr>
                    <td>Nama Saksi</td>
                    <td>:</td>
                    <td>Nama Pengurus GIATMARA</td>
                </tr>
                <tr>
                    <td>Jawatan</td>
                    <td>:</td>
                    <td>Pengurus</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>NAMA PUSAT GIATMARA</td>
                </tr>
            </table><br>
EOT;

            $pdf->writeHTML($html, true, false, true, false, '');

            $pdf->Output('My-File-Name.pdf', 'I');*/
        }

    }

    public function ajaxgiat($id)
    {
       $query = $this->plm->getgiatmara($id)->result();
        if ($query) {
            echo json_encode($query);
        }else {
            echo json_last_error_msg();
        }
    }

    public function savependaftaranb()
    {
        $simpan = $this->plm->save_pendaftaran_tawaran_terus($this->input->post());
        // echo $simpan;

        if ($simpan == "Berhasil")
        {
            redirect("admin/pelatih_lanjutan/pendaftaranb");
        }
        else
        {
            echo $simpan;
        }
    }

    function cetakpendaftaranb( $stream = true, $template = null)
    {
        $this->load->library('Pdfdom');

        $dompdf = new Pdfdom();

        $data["row_data"] = $this->plm->get_data_seluruh_4b()->result();

        $this->load->view("templates/pdf/lpp09/cetak_pendaftaranb", $data);
        $html = $this->output->get_output();
        $name = "GSPel Pendaftaran Program Lainnya.pdf";

        $dompdf->load_html($html);
        $dompdf->set_paper('A4');
        $dompdf->render();
        $dompdf->add_info('Author', 'Author Name');
        $dompdf->add_info('Title', $name);
        $dompdf->stream($name, array("Attachment" => 0));

        // clear buffer supaya pdf dapat digenerate dengan sempurna
        exit(0);

    }

    public function cetak_permohonan()
    {
        $noMykad = $this->uri->segment('4');
        if ($noMykad === 'mykad') $noMykad = $this->uri->segment('5');
        $where["no_mykad"] = $noMykad;
        $row_pbp = $this->sdm->get_row_pbp($where);
        if (!count($row_pbp)) {
            redirect('registration', true);
        }
        $this->mViewData["idBp"] = $row_pbp->id;
        $this->mViewData["id_permohonan"] = $row_pbp->id;
        $this->mViewData["no_rujukan_permohonan"] = $row_pbp->no_mykad;

        $this->render('pelatih_lanjutan/cetak_permohonan');
    }

    /*
     * modul untuk cetak pdf permohonan lpp09
     */
    function generate_pdf($id_permohonan, $stream = true, $template = null)
    {
        $this->load->library('Pdfdom');
        $dompdf = new Pdfdom();

        $data["butir_peribadi"] = $this->pltm->get_permohonan("a.id=".$id_permohonan);
        $data["kursus_lpp09"] = $this->pltm->get_kursus_lpp09($id_permohonan);
        $wpekerjaan["id"] = $data["butir_peribadi"][0]["b_pekerjaan"];
        $data["res_pekerjaan"] = $this->pm->get_pekerjaan($wpekerjaan)->row();
        $wpekerjaanc["id"] = $data["butir_peribadi"][0]["c_pekerjaan"];
        $data["res_pekerjaanc"] = $this->pm->get_pekerjaan($wpekerjaanc)->row();
        $wpekerjaana["id"] = $data["butir_peribadi"][0]["a_pekerjaan"];
        $data["res_pekerjaana"] = $this->pm->get_pekerjaan($wpekerjaana)->row();

        $this->load->view("templates/pdf/cetak_permohonan_lpp09", $data);
        $html = $this->output->get_output();
        $name = "GSPel_".$data["butir_peribadi"][0]["no_mykad"].".pdf";

        $dompdf->load_html($html);
        $dompdf->set_paper('A4');
        $dompdf->render();
        $dompdf->add_info('Author', 'Author Name');
        $dompdf->add_info('Title', $name);
        $dompdf->stream($name, array("Attachment" => 0));

        // clear buffer supaya pdf dapat digenerate dengan sempurna
        exit(0);
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * Pelatih Lanjutan (LPP09) - Pendaftaran (Latihan Lanjutan)
     * Date: 2017-09-27 10:14
     */
    function pendaftaran()
    {
        //  get info user login
        $user = $this->ion_auth->user()->row();
        $user_staff = $user->id_staff;
        $row_staff = $this->plm->get_v_admin_users(array("id_staff" => $user_staff));
        $giatmara_id = $row_staff->id_giatmara;
        $giatmara_type = $row_staff->id_type_giatmara;
        $negeri_id = $row_staff->id_negeri;

        // Data untuk combox Negeri
        // jika id_type_giatmara = 0 maka tampilkan semua negeri, jika tidak, tampilkan sesuai id_negeri yang ada di table ref_giatmara
        if ($giatmara_type == 0)
        {
            $this->mViewData["res_negeri"] = $this->plm->get_ref_negeri();
        }
        else
        {
            $this->mViewData["res_negeri"] = $this->plm->get_ref_negeri(array("id"=>$negeri_id));
        }

        // Data untuk combo box giatmara
        $row_giatmara = $this->plm->get_ref_giatmara(array("id"=>$giatmara_id), "row");
        $this->mViewData["row_giatmara"] = $row_giatmara;

        $whereK["id_negeri"] = $negeri_id;
        $whereK["id_giatmara"] = $giatmara_id;
        $res_kursus = $this->plm->get_v_giatmara_kursus($whereK, "result", "distinct", "id_setting_penawaran_kursus, nama_kursus");
        $this->mViewData["res_kursus"] = $res_kursus;

        // Data untuk combo box sesi
        $where_intake["id_giatmara"] = $row_giatmara->id;
        $this->mViewData["res_intake"] = $this->plm->get_v_giatmara_kursus($where_intake, "result", "distinct", "nama_intake");

        // Data untuk combo box kursus
        $this->mViewData["res_kursus"] = $this->plm->get_v_giatmara_kursus(array("id_giatmara"=>$row_giatmara->id));

        //  Data untuk combo box kewarganegaraan
        $this->mViewData["res_kewarganegaraan"] = $this->plm->get_ref_kewarganegaraan();

        // Filter data
        if ($this->input->post('btn_tetapkan') === "tetapkan")
        {
            // echo "<pre>";var_dump($this->input->post());echo "</pre>";exit;
            $where["id_negeri"] = $this->input->post('filter_negeri');
            $where["id_giatmara"] = $this->input->post('filter_giatmara');
            $where["id_intake"] = $this->input->post('filter_intake');
            //code asal $where["id_settings_tawaran_kursus"] = $this->input->post('filter_kursus');

            $this->mViewData["res_filter"] = $this->plm->get_lpp09_p4a($where);
            $this->mViewData["negeri_opt"] = $this->input->post('filter_negeri');
            $this->mViewData["giatmara_opt"] = $this->input->post('filter_giatmara');
            $this->mViewData["intake_opt"] = $this->input->post('filter_intake');
            $this->mViewData["kursus_opt"] = $this->input->post('filter_kursus');
        }

        // klo tombol sahkan diklik
        if ($this->input->post('btn_sahkan') === "Daftar")
        {
            $id_temuduga_tetapan = $this->input->post("id_temuduga_tetapan");
            $id_kursus = $this->input->post("id_kursus");
            $kelayakan_elaun = $this->input->post('opt_elaun');
            $sahkan = $this->input->post('opt_sah');
            #echo "id_temuduga_tetapan=";print_r($id_temuduga_tetapan);echo "<br/>";
            #echo "id_kursus=";print_r($id_kursus);echo "<br/>";
            #echo "kelayakan_elaun=";print_r($kelayakan_elaun);echo "<br/>";
            #echo "sahkan=";print_r($sahkan);echo "<br/>";
            #echo "<pre>";var_dump($this->input->post());echo "</pre>";exit;

            // here we go ...
            $this->plm->sahkan_lpp09($this->input->post());
            #die();
        }

        $this->mPageTitle = "Pendaftaran";
        $this->render("pelatih_lanjutan/pendaftaran");
    }

    function detail_bank($id) {
        if ($id != "")
        {
            $where["id_permohonan_butir_peribadi"] = $id;
            $this->mViewData["row_bank"] = $this->plm->get_lpp09_p4a($where, "row");
            $this->mViewData["id_permohonan"] = $id;
            $this->mViewData["res_bank"] = $this->plm->ref_bank()->result();
            $this->mPageTitle = "Pendaftaran";
            $this->render("pelatih_lanjutan/detail_bank");
        }
        else
        {
            redirect("admin/pelatih_lanjutan/pendaftaran", "refresh");
        }
    }

    function proses_bank()
    {
        $data["id_permohonan"] = $this->input->post('txt_id_permohonan');
        $data["nama_bank"] = $this->input->post('opt_bank');
        $data["no_akaun"] = $this->input->post('txt_no_akaun');
        $this->plm->update_bank($data);
        redirect("admin/pelatih_lanjutan/pendaftaran", "refresh");
    }

    /*
     * @author Zulyantara <zulyantar@gmail.com>
     * Senarai Permohonan LPP09
     */
    function senarai_permohonan()
    {
      //  get info user login
      $user = $this->ion_auth->user()->row();
      $user_staff = $user->id_staff;
      $row_staff = $this->plm->get_v_admin_users(array("id_staff" => $user_staff));
      $giatmara_id = $row_staff->id_giatmara;
      $giatmara_type = $row_staff->id_type_giatmara;
      $negeri_id = $row_staff->id_negeri;

      // Data untuk combox Negeri
      // jika id_type_giatmara = 0 maka tampilkan semua negeri, jika tidak, tampilkan sesuai id_negeri yang ada di table ref_giatmara
      if ($giatmara_type == 0)
      {
          $this->mViewData["res_negeri"] = $this->plm->get_ref_negeri();
      }
      else
      {
          $this->mViewData["res_negeri"] = $this->plm->get_ref_negeri(array("id"=>$negeri_id));
      }

      // Data untuk combo box giatmara
      $row_giatmara = $this->plm->get_ref_giatmara(array("id"=>$giatmara_id), "row");
      $this->mViewData["row_giatmara"] = $row_giatmara;

      $whereK["id_negeri"] = $negeri_id;
      $whereK["id_giatmara"] = $giatmara_id;
      $res_kursus = $this->plm->get_v_giatmara_kursus($whereK, "result", "distinct", "id_setting_penawaran_kursus, nama_kursus");
      $this->mViewData["res_kursus"] = $res_kursus;

      // Data untuk combo box sesi
      $where_intake["id_giatmara"] = $row_giatmara->id;
      $this->mViewData["res_intake"] = $this->plm->get_v_giatmara_kursus($where_intake, "result", "distinct", "nama_intake");

      // Data untuk combo box kursus
      $this->mViewData["res_kursus"] = $this->plm->get_v_giatmara_kursus(array("id_giatmara"=>$row_giatmara->id));

      //  Data untuk combo box kewarganegaraan
      $this->mViewData["res_kewarganegaraan"] = $this->plm->get_ref_kewarganegaraan();

      // Filter data
      if ($this->input->post('btn_tetapkan') === "tetapkan")
      {
          // echo "<pre>";var_dump($this->input->post());echo "</pre>";exit;
          $where["id_negeri"] = $this->input->post('filter_negeri');
          $where["id_giatmara"] = $this->input->post('filter_giatmara');
          // $where["id_intake"] = $this->input->post('filter_intake');
          //code asal $where["id_settings_tawaran_kursus"] = $this->input->post('filter_kursus');

          $this->mViewData["res_filter"] = $this->plm->get_senarai_permohonan_lpp09($where)->result();
          $this->mViewData["negeri_opt"] = $this->input->post('filter_negeri');
          $this->mViewData["giatmara_opt"] = $this->input->post('filter_giatmara');
          // $this->mViewData["intake_opt"] = $this->input->post('filter_intake');
          // $this->mViewData["kursus_opt"] = $this->input->post('filter_kursus');
      }
      else
      {
        $this->mViewData["res_filter"] = $this->plm->get_senarai_permohonan_lpp09()->result();
      }


      $this->mPageTitle = "Senarai Permohonan";
      $this->render("pelatih_lanjutan/senarai_permohonan");
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * Ajax Ketika Giatmara di menu Pendaftaran LPP09 P4a dipilih
     */
    function ajax_intake()
    {
        $where["id_giatmara"] = $this->input->post('id_giatmara');
        $result = $this->plm->get_v_giatmara_kursus($where, "result", "distinct", "id_intake, nama_intake");
        if ($result !== FALSE)
        {
            echo json_encode($result);
        }
        else
        {
            echo json_last_error_msg();
        }
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * Ajax Ketika Intake di menu Pendaftaran LPP09 P4a dipilih
     */
    function ajax_kursus2()
    {
        $where["id_negeri"] = $this->input->post('id_negeri');
        $where["id_giatmara"] = $this->input->post('id_giatmara');
        // $where["id_setting_penawaran_kursus"] = $this->input->post('id_kursus');
        $result = $this->plm->get_v_giatmara_kursus($where, "result", "distinct", "id_intake, nama_intake");
        if ($result !== FALSE)
        {
            echo json_encode($result);
        }
        else
        {
            echo json_last_error_msg();
        }
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * Ajax ketika Giatmara di LPP09 P1 tab kursus pilihan bagian negeri dipilih
     */
    function ajax_giatmara_p1()
    {
        $where["id_giatmara"] = $this->input->post('opt_giatmara');
        $res_giatmara = $this->plm->get_v_giatmara_kursus($where, "result", "distinct", "id_kluster, nama_kluster");
        echo "<option>Sila Pilih</option>";
        if ($res_giatmara !== FALSE)
        {
            foreach ($res_giatmara as $val)
            {
                ?>
                <option value="<?php echo $val->id_kluster; ?>"><?php echo $val->nama_kluster; ?></option>
                <?php
            }
        }
    }

    /*
     * @author Zulyantara <zulyantara@gmail.com>
     * Ajax ketika Kluster di LPP09 P1 tab kursus pilihan bagian negeri dipilih
     */
    function ajax_kursus_p1()
    {
        $where["id_negeri"] = $this->input->post("opt_negeri");
        $where["id_giatmara"] = $this->input->post('opt_giatmara');
        $where["id_kluster"] = $this->input->post('opt_kluster');
        $res_kursus = $this->plm->get_v_giatmara_kursus($where, "result", "distinct", "id_setting_penawaran_kursus, nama_kursus");
        echo "<option>Sila Pilih</option>";
        if ($res_kursus !== FALSE)
        {
            foreach ($res_kursus as $val)
            {
                ?>
                <option value="<?php echo $val->id_setting_penawaran_kursus; ?>"><?php echo $val->nama_kursus; ?></option>
                <?php
            }
        }
    }

    function ajax_poskod_majikan()
    {
        $where["poskod"] = $this->input->post("id_poskod");
        $res_poskod = $this->plm->get_v_poskod($where, "row");
        echo json_encode($res_poskod);
    }

    function ajax_sesi()
    {
        $where["id_giatmara"] = $this->input->post('id_giatmara');
        $where["id_kursus"] = $this->input->post('id_kursus');
        $res_sesi = $this->plm->get_v_giatmara_kursus($where, "result", "distinct", "id_intake, nama_intake");
        echo "<option value=\"\">Sila Pilih</pilih>";
        foreach ($res_sesi as $val)
        {
            ?>
            <option value="<?php echo $val->id_intake; ?>"><?php echo $val->nama_intake; ?></option>
            <?php
        }
    }

  function ajaxsesi()
  {
    $where["stk.id"] = $this->input->post('id');
    $res_stk = $this->plm->get_settings_tawaran_kursus($where)->row();
    // var_dump($res_stk);exit;
    $data["tarikh_mula"] = $res_stk->tarikh_mula;
    $data["tarikh_tamat"] = $res_stk->tarikh_tamat;
    echo json_encode($data);
  }
}
