<?php

class Group_model extends MY_Model {

  function __construct() {
    parent::__construct();
  }

  function coba()
	{
		 $query ="select*from ref_giatmara";
		return $this->db->query($query);
	}

  	function get_negeri()
  	{
  		 $query  ="select * from ref_negeri";
  		return $this->db->query($query);
  	}


}
