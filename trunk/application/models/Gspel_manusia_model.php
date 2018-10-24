<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Zulyantara <zulyantara@gmail.com>
 * Modul untuk Modul Sumber Manusia
 */
class Gspel_manusia_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @author Zulyantara <zulyantara@gmail.com>
     *
     */
    function get_res_negeri()
    {
        $qry = $this->db->get('ref_negeri');
        return $qry->result();
    }

    function get_res_agama($where)
    {
      if ($where !== NULL)
      {
          if (is_array($where))
          {
              foreach ($where as $key => $value)
              {
                  $this->db->where($key, $value);
              }
          }
          else
          {
              $this->db->where($where);
          }
      }
        $qry = $this->db->get('ref_agama');
        return $qry->result();
    }

    function get_res_bangsa($where)
    {
      if ($where !== NULL)
      {
          if (is_array($where))
          {
              foreach ($where as $key => $value)
              {
                  $this->db->where($key, $value);
              }
          }
          else
          {
              $this->db->where($where);
          }
      }
        $qry = $this->db->get('ref_bangsa');
        return $qry->result();
    }

    function get_res_perkahwinan($where)
    {
      if ($where !== NULL)
      {
          if (is_array($where))
          {
              foreach ($where as $key => $value)
              {
                  $this->db->where($key, $value);
              }
          }
          else
          {
              $this->db->where($where);
          }
      }
        $qry = $this->db->get('ref_taraf_perkahwinan');
        return $qry->result();
    }


    function get_res_giatmara($where=NULL)
    {
        if ($where !== NULL)
        {
            if (is_array($where))
            {
                foreach ($where as $key => $value)
                {
                    $this->db->where($key, $value);
                }
            }
            else
            {
                $this->db->where($where);
            }
        }
        // echo $this->db->get_compiled_select('ref_giatmara');exit;
        $qry = $this->db->get('ref_giatmara');
        return $qry->result();
    }

    function get_res_kursus($where = NULL)
    {
        if ($where !== NULL)
        {
            if (is_array($where))
            {
                foreach ($where as $key => $value)
                {
                    $this->db->where($key, $value);
                }
            }
            else
            {
                $this->db->where($where);
            }
        }

        $qry = $this->db->get('ref_kursus');
        return $qry->result();
    }

    function get_res_jabatan()
    {
        $qry = $this->db->get('ref_jabatan');
        return $qry->result();
    }

    function get_res_jawatan()
    {
        $qry = $this->db->get('ref_jawatan');
        return $qry->result();
    }

    function get_res_jenis_jawatan()
    {
        $qry = $this->db->get('ref_jenis_jawatan');
        return $qry->result();
    }

    function get_filter_staff($mykad = NULL, $nama = NULL, $gaji = NULL, $negeri = NULL, $giatmara = NULL, $kursus = NULL, $jabatan = NULL)
    {
        if ($mykad !== NULL)
        {
            $this->db->or_like('no_mykad', $mykad);
        }
        if ($nama !== NULL)
        {
            $this->db->or_like("nama", $nama);
        }
        if ($gaji !== NULL)
        {
            $this->db->or_like("no_gaji", $gaji);
        }
        if ($negeri !== NULL)
        {
            $this->db->or_like("id_negeri", $negeri);
        }
        if ($giatmara !== NULL)
        {
            $this->db->or_like("id_giatmara", $giatmara);
        }
        if ($kursus !== NULL)
        {
            $this->db->or_like("id_kursus", $kursus);
        }
        if ($jabatan !== NULL)
        {
            $this->db->or_like("id_jabatan", $jabatan);
        }
        // echo $this->db->get_compiled_select('v_staff');exit;
        $qry = $this->db->get('v_staff');
        return $qry->result();
    }

    function get_staff($type="result", $like = NULL, $where = NULL)
    {
        if ($like !== NULL)
        {
            foreach ($like as $key => $value)
            {
                $this->db->or_like($key, $value);
            }
        }

        if ($where !== NULl)
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
        // echo $this->db->get_compiled_select('staff');exit;
        $qry = $this->db->get('staff');
        if ($type === "result")
        {
            return $qry->result();
        }
        elseif ($type === "row")
        {
            return $qry->row();
        }
    }

    function get_staff_admin_users($type="result", $like = NULL, $where = NULL)
    {
        if ($like !== NULL)
        {
            foreach ($like as $key => $value)
            {
                $this->db->or_like($key, $value);
            }
        }

        if ($where !== NULl)
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
        // echo $this->db->get_compiled_select('staff');exit;
        $qry = $this->db->get('v_staff_admin_users');
        if ($type === "result")
        {
            return $qry->result();
        }
        elseif ($type === "row")
        {
            return $qry->row();
        }
    }

    function simpan_info_pangku_tugas($data)
    {
      // echo $this->db->get_compiled_select('staff');exit;
      $this->db->replace('staff_info_pangku_tugas', $data);

      if($this->db->affected_rows() >=0){
          $this->session->set_flashdata('flashSuccess', 'Data berhasil disimpan.');
        }else{
          $this->session->set_flashdata('flashError', 'Maaf ! Data TIDAK berhasil disimpan.');
        }

      //$this->db->insert('staff_info_pangku_tugas', $data);
      // redirect($_SERVER['HTTP_REFERER']);
    }

    function update_admin_groups($where = FALSE, $data)
    {
      if ($where !== FALSE)
      {
        foreach ($where as $key => $value)
        {
          $this->db->where($key, $value);
        }
      }
      $this->db->update("admin_users_groups", $data);
    }

    function hapus_info_pangku_tugas($where)
    {
        foreach ($where as $key => $value)
        {
            $this->db->where($key, $value);
        }
        $this->db->delete('staff_info_pangku_tugas');
    }

    function get_staff_info_pangku_tugas($type="result", $like = NULL, $where = NULL)
    {
        if ($like !== NULL)
        {
            foreach ($like as $key => $value)
            {
                $this->db->or_like($key, $value);
            }
        }

        if ($where !== NULl)
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
        // echo $this->db->get_compiled_select('staff');exit;
        $qry = $this->db->get('v_staff');
        if ($type === "result")
        {
            return $qry->result();
        }
        elseif ($type === "row")
        {
            return $qry->row();
        }
    }

    function update_staff_info_pangku_tugas($data)
    {
        $this->db->update('staff_info_pangku_tugas', $data);
    }

    function get_username_staff($id) {
      // ==
      // Parameter : id staff
      // Return : array Username (numrows,username)
      // ==

      // echo '<pre>'; print($id); echo '</pre>';
      // exit;
      $this->db->where('id', $id);
      // echo $this->db->get_compiled_select('v_staff_admin_users');
      $query = $this->db->get('v_staff_admin_users', $where);
      $result =$query->row();
      $numrows = $query->num_rows();
      $username = array("numrows" => $numrows, "username" => $result->username);

      // echo '<pre>'; print_r($username); echo '</pre>';
      // exit;
      // if ($numrows == 0) {
      //   $username = array("numrows" => $numrows, "username" => "No Username");
      // } else {
      //   $username = array("numrows" => $numrows, "username" => $result->username);
      // };
      return $username;
      // echo '<pre>'; print_r($where); echo '</pre>';
      // exit;
    }

    function update_staff($data)
    /* Toosa
    Function :
    Update
      * field di tabel staff dan
      field first_name di tabel admin_users
    */
    {
        $id = $data['id'];
        $this->db->where('id',$id);
        $this->db->update('staff', $data);
        //samakan staff.nama dan admin_users.first_name
        $first_name = $data['nama'];

        $this->db->where('id',$id);
        $qry = "select * from v_staff_admin_users where id=".(string)$id;

        $query = $this->db->query($qry);

        $hasil = $query->row();

        $id_ganti = $hasil->id_admin;
        // echo '<pre>'; print($id_ganti); echo '</pre>';
        // exit;
        $data_ganti = array(
              'first_name' => $first_name,
              'last_name' => '',
              // 'password' => 'password',
               );
        $this->ion_auth->update($id_ganti, $data_ganti);

        // Display success message
        $this->session->set_flashdata('flashSuccess', 'Data berhasil disimpan.');

        redirect($_SERVER['HTTP_REFERER']);
    }


    function delete_staff_model($id_staff)
    /* Toosa
    Function : delete
      * 1 record di tabel staff dan info pangku tugas dan
      * 1 record di tabel admin_users
    */
    {
        $this->db->where('id_staff', $id_staff);
        $this->db->delete('staff_info_pangku_tugas');

        $this->db->where('id', $id_staff);
        $this->db->delete('staff');


    }


    function add_staff($data)
    /* Toosa
    Function :
    Add
      * 1 record di tabel staff dan info pangku tugas dan
      * 1 record di tabel admin_users
    */
    {

       // $this->db->trans_start();

       // --Periksa apakah mykad sudah ada yang memakai di dalam sistem


        // eof Periksa

            $this->db->insert('staff', $data);


            // Setiap kali menambah staff baru,
            // secara default dibuatkan sebuah baris/data info pangku tugas kosong
            $new_id_staff = $this->db->insert_id();

            $where = array('id_staff' => $new_id_staff);
            // echo '<pre>'; print_r($where); echo '</pre>';exit;
            $this->db->insert('staff_info_pangku_tugas', $where);
                    //   $this->db->trans_complete();

                    // if(!$this->db->insert('staff_info_pangku_tugas', $where))
                    // {
                    //     $this->db->_error_message();
                    //     $this->db->_error_number();
                    // }

                    // redirect($_SERVER['HTTP_REFERER']);

        //samakan staff.nama dan admin_users.first_name
        $first_name = $data['nama'];
        $username = $data['mykad'];
        $email = $data['email'];
        $additional_data = array(
         			'id_staff' => $new_id_staff,
        			'last_name' => '',
                    'password' => 'password',
                    'id_staff' => $new_id_staff
         			 );
        // $carian = "select id_admin from v_staff_admin_users where id =".$id." LIMIT 1";
        // $query = $this->db->query($carian);
        // $hasil = $query->row();
        // $id_ganti = $hasil->id_admin;
        //
        // $data_baru = array(
        //  			'first_name' => $first_name,
        // 			'last_name' => '',
        //       'password' => 'password',
        //       'id_staff' => $new_id_staff
        //  			 );
        //$this->ion_auth->register($id_ganti, $data_baru);

        //$this->load->library('ion_auth');
        if($this->ion_auth->register($username,$password,$email,$additional_data))
            {
                $_SESSION['auth_message'] = 'The account has been created. You may now login.';
                $this->session->mark_as_flash('auth_message');
                //redirect('user/login');
            }
        else
            {
                $_SESSION['auth_message'] = $this->ion_auth->errors();
                $this->session->mark_as_flash('auth_message');
                //redirect('register');
            }
    }

    function update_reset_passwd_admin_users($data)
    /* Toosa */
    {
      foreach ($data as $val => $value) {
        //echo '<pre>'; print($value); echo '</pre>';
        $carian = "select id_admin from v_staff_admin_users where id =".$value." LIMIT 1";
        $query = $this->db->query($carian);
        $hasil = $query->row();
        $id_ganti = $hasil->id_admin;
        // echo '<pre>'; print($id_ganti); echo '</pre>';
        // exit;
        $data_ganti = array(
        // 			'first_name' => 'Ben',
        // 			'last_name' => 'Edmunds',
         			  'password' => 'password',
         			 );
        $this->ion_auth->update($id_ganti, $data_ganti);
        //echo '<pre>'; print($hasil->id); echo '</pre>';
      }
      // exit;
        // echo '<pre>'; print_r($cari); echo '</pre>';exit;
        //$this->db->select('id_admin');
        // $this->db->where_in('id_staff', $cari);
        // $query = $this->db->get('v_staff_admin_users');
    }

    function get_jawatan($where = FALSE)
    {
      if ($where !== FALSE)
      {
        foreach ($where as $key => $value)
        {
          $this->db->where($key, $value);
        }
      }
      return $this->db->get("ref_jawatan");
    }

    function get_admin_users($where = FALSE)
    {
      if ($where !== FALSE)
      {
        foreach ($where as $key => $value)
        {
          $this->db->where($key, $value);
        }
      }
      return $this->db->get("admin_users");
    }

    function get_group($where = FALSE)
    {
      if ($where !== FALSE)
      {
        if (is_array($where))
        {
          foreach ($where as $key => $value)
          {
            $this->db->where($key, $value);
          }
        }
        else
        {
          $this->db->where($where);
        }
      }
      return $this->db->get("admin_groups");
    }

    function get_admin_users_groups($where = FALSE)
    {
      if ($where !== FALSE)
      {
        if (is_array($where))
        {
          foreach ($where as $key => $value)
          {
            $this->db->where($key, $value);
          }
        }
        else
        {
          $this->db->where($where);
        }
      }
      // echo $this->db->get_compiled_select("admin_users_groups");
      return $this->db->get("admin_users_groups");
    }

    function update_admin_users_groups($data, $where = FALSE)
    {
      if ($where !== FALSE)
      {
        if (is_array($where))
        {
          foreach ($where as $key => $value)
          {
            $this->db->where($key, $value);
          }
        }
        else
        {
          $this->db->where($where);
        }
      }
      // echo $this->db->set($data)->get_compiled_update("admin_users_groups");exit;
      $this->db->update('admin_users_groups', $data);
    }

    function suspend_staff($id, $status)
    {
      $this->db->where('id_staff', $id);
      $data['status'] = $status;
      // echo $this->db->set($data)->get_compiled_update('staff_info_pangku_tugas');exit;
      $this->db->update('staff_info_pangku_tugas', $data);
    }
}
