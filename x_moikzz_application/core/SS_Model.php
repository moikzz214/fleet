<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SS_Model extends CI_Model { 

	protected $table_name; 
	protected $fields; 
	protected $fields_listings; 
	protected $orderby; 
	protected $order; 
	protected $limit; 
	protected $offset; 
	protected $where; 
	protected $group; 
	protected $field_like; 
	protected $likes;  
	protected $orlike; 

	function makes(){
	 	$this->fields==null ? $select="*" : $select = $this->fields;

	    $this->db->select($select);

	    $this->db->from($this->table_name);

	    if( $this->orderby && $this->order ) {
	      	$this->db->order_by($this->orderby, $this->order); 
	    } 

	    if($this->limit){
	      	$this->callbylimit();
	    } 

	    if($this->where){
	       $this->callbywhere();
	    } 

	    if($this->group){
	      $this->callbygroup();
	    }
	}

	function callbywhere(){
		if($this->where){
			$this->db->where($this->where);	
		} 
		if($this->likes){
			
			$this->db->like($this->likes);
			
			if($this->orlike){
            	$this->db->or_like($this->orlike);  
        	}
		}
	}

	function callbylimit(){
		if($this->offset){
     		$this->db->limit($this->limit,$this->offset);
      	}elseif($this->limit){
        	$this->db->limit($this->limit);
      	}else{
      		return;
      	}
	}

	function callbygroup(){
		$this->db->group_by($this->group);   
	}

	/* List DataTables */
	function make_query(){
	    $this->db->select($this->fields);  
	    $this->db->from($this->table_name);

	    if($this->where){
			$this->db->where($this->where);
		}

		if($this->fields_listings){
    		$lists = $this->fields_listings;
		 	$fieldCnt = count($this->fields_listings);
    	}else{
    		$lists = $this->fields;
		 	$fieldCnt = count($this->fields);
    	}
	   
	    if(isset($_POST["search"]["value"])){
	        $this->db->like($this->fields[0], $_POST["search"]["value"]);
	        if($fieldCnt>1){ 
	        	
	        	foreach($lists AS $k => $v){
	        		$this->db->or_like($v, $_POST["search"]["value"]);   
	        	}
	    	}
	    }  

	    if(isset($_POST["order"])){
	        $this->db->order_by($lists[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
	    }  
	    else{  
	        $this->db->order_by($this->orderby, $this->order);  
	    }  
	}

	function get_filtered_data(){  
		$this->make_query();  
		$query = $this->db->get();  
		return $query->num_rows();  
  	}       
  	
  	function get_all_datas(){  
		$this->db->select("*");  
		$this->db->from($this->table_name);  
		$this->callbywhere();
		$this->callbylimit();
		return $this->db->count_all_results();  
  	}  

  	/* End of List DataTables */

  	function insert_batch_data($data) { 
		$this->db->insert_batch($this->table_name, $data); 
		$rs = $this->db->insert_id();
		if($rs){
			return $rs;
		}

		return false;
	}

	function update_batch_data($data, $ids) {

		$rs = $this->db->update_batch($this->table_name, $data, $ids);
		if($rs){
			return $rs; 
		}

		return false;
	}

	function new_single_insert($data) { 

		$this->db->insert($this->table_name,$data); 
		$id = $this->db->insert_id(); 
		if($id){
			return $id; 
		}

		return false;
	} 

	function update_where_field($data) { 

		$this->db->where($this->where); 

		$this->db->update($this->table_name, $data);

		return $this->db->affected_rows(); 
	} 

	function delete() { 

		$this->db->where($this->where); 

		$result = $this->db->delete($this->table_name); 

		if(!$result){
			return false;
		}
		return true;
	} 


 	function is_record_exist($field1,$field2) {

	    $this->db->select('*');

	    $this->db->where($field1);

	    $this->db->or_where($field2);

	    $query = $this->db->get($this->table_name);

	    return $query->result();

  } 

   function is_validating( ) {

  	$this->db->select($this->fields);

  	$this->db->where($this->where);

  	$this->db->from($this->table_name);

	$query = $this->db->get();

	return $query->result();	

  }
}