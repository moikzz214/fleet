<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

/**
 * Description of cdmodel
 *
 * @author Moikzz
 */
class CdModel extends SS_Model {

    private $cds = 'x_cashless';
   
    private $order_column = array(
            'zid',
            'zname',
            'zcompany',
            'zemail',
            'zamount',
            'zclosingdate',
            'zdate_published'
            ); 
    function __construct() {
        
    } 
       
    function make_query(){
           $this->db->select($this->order_column);  
           $this->db->from($this->cds);  

           $this->db->where(array('zcompany' => 'GAC'));

           if(isset($_POST["search"]["value"])){  
                $this->db->like("zname", $_POST["search"]["value"]);  
                $this->db->or_like("zcompany", $_POST["search"]["value"]);  
                $this->db->or_like("zemail", $_POST["search"]["value"]);  
                $this->db->or_like("zclosingdate", $_POST["search"]["value"]);  
                $this->db->or_like("zdate_published", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"])){  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else{  
                $this->db->order_by('zid', 'DESC');  
           }  
      }
      
      function get_cd_list(){
           $this->make_query();  
           if(@$_POST["length"] != -1){  
                $this->db->limit(@$_POST['length'], @$_POST['start']);  
           } 
           $query = $this->db->get();  
           $fetch_data =  $query->result();

           $data = array();  
           foreach($fetch_data as $aRow){  
                $row = array();
                foreach ($this->order_column as $col) {
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

      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_datas(){  
           $this->db->select("*");  
           $this->db->from($this->cds);  
           $this->db->where(array('zcompany' => 'GAC'));
           return $this->db->count_all_results();  
      }  
}

/* End of file cdmodel.php */
/* Location: ./application/models/cdmodel.php */