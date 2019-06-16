<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Validate_Model extends SS_Model {
 
  	function __construct() {	    
	    $this->table_name = 'x_system_utility';
  	}

  	function check_table_exists($url=null){
  		$rs = false;
	  	if ($result = $this->db->query("SHOW TABLES LIKE '".$this->table_name."'")) {
		    if($result->num_rows() > 0) { 

		       	$where = array('fmc_system_type'=> 'site_url', 'fmc_system_value' => $url);
		        $this->db->select('fmc_system_value');
			     
			    $this->db->where($where);  
			   
			    $this->db->from($this->table_name);
			    $query = $this->db->get();
			    if($query->num_rows() > 0 ) {
			      $rs = true;
			    }  
		    }  
		}
		return $rs;
  	}
} 
?>