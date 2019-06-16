<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Global_Model extends SS_Model { 

  function __construct() {
      
  } 

  function getAllDatabyField($t=null,$w=null,$ts) {
      if(!$t || $t == NULL || empty($t)){
        return false;
      }

      $this->table_name = $t;
      if(@$w['fields']){
        $this->fields = $w['fields'];      
      }

      if(@$w['likes']){
          $this->likes = $w['likes'];
          if( @$w['orlike']){
            $this->orlike = $w['orlike']; 
          }
      }

      if(@$w['order_by']){
          $this->orderby = $w['order_by'];
          $this->order = $w['order'];
      }

      if(@$w['limit']){
        
        $this->limit = $w['limit'];
        
        if(@$w['offset']){
            $this->offset = $w['offset'];
        }
      
      }

      if(@$w['group_by']){
          $this->group = $w['group_by'];
      }

      if(@$w['where']){
          $this->where = $w['where'];
      }

      // check ts for Tables - Lists on tables
      if($ts){
          if(@$w['fields_listing']){
            $this->fields_listings = $w['fields_listing'];
          }

          $this->make_query();
          if(@$_POST["length"] != -1){  
                $this->db->limit(@$_POST['length'], @$_POST['start']);  
          }
      }else{
          $this->makes();
      }

      $query = $this->db->get();

      if($ts){
        
        $fetch_data =  $query->result();

        $data = array();
        
        if($this->fields_listings){
          $lists = $this->fields_listings;
        }else{
          $lists = $this->fields;
        }
        
        foreach($fetch_data as $aRow){
              
              $row = array();
              
              foreach ($lists as $col) {
                  $row[] = $aRow->$col;
              }

              $data[] = $row;
        }

        $output = array(  
            "draw"                    =>     intval(@$_POST["draw"]),  
            "recordsTotal"          =>      $this->get_all_datas(),  
            "recordsFiltered"     =>     $this->get_filtered_data(),  
            "data"                    =>     $fetch_data  
        );

        return $output;
      }else{

            if($query->num_rows() > 0 ) {

              $return = $query->result();

            } else {

              $return = false;

            }

            return $return;
      }
  }

  function get_cd_list($t=null,$w=null){
        $this->table_name = $t; 
        
        $this->fields = $w['fields'];
        
        if(@$w['where']){
          $this->where = $w['where'];
        }
        
        $this->make_query();

        if(@$_POST["length"] != -1){  
              $this->db->limit(@$_POST['length'], @$_POST['start']);  
        }

        $query = $this->db->get();  
        
        $fetch_data =  $query->result();

        $data = array();  
        
        foreach($fetch_data as $aRow){  
              
              $row = array();
              
              foreach ($this->fields as $col) {
                  $row[] = $aRow->$col;
              }

              $data[] = $row;
        }

        $output = array(  
            "draw"                    =>     intval(@$_POST["draw"]),  
            "recordsTotal"          =>      $this->get_all_datas(),  
            "recordsFiltered"     =>     $this->get_filtered_data(),  
            "data"                    =>     $data  
        );

        return $output;
    }

  function new_batch_data($t,$data) {
    $this->table_name = $t;

    $id = $this->insert_batch_data($data);

    return $id;

  }

  function get_title($t,$where,$fields){ 
  	$this->db->select($fields);
  	$this->db->where($where);
  	$query = $this->db->get($t);
    return $query->result();
  }

  function data_update_batch($t,$data,$id) {
    $this->table_name = $t; 

    $id = $this->update_batch_data($data,$id);

    return $id;

  }  

	function insert_data($t,$data) {
    $this->table_name = $t; 

    $id = $this->new_single_insert($data);

    return $id;

  }  

  function update_data($t, $data, $w) {
    $this->table_name = $t;
    $this->where = $w;

    $record = $this->update_where_field($data);

    return $record;

  }  

} 
?>