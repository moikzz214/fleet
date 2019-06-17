<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of General_callbacks
 * notes: check the API key from view function
 * 
 * @author Moikzz
 */
class Viewing_callbacks extends SS_Controller { 

    protected $data_pages;
    protected $lists = false;
    protected $studz = false;
    protected $query;
    protected $query_table;
    protected $_table_extras    = 'mz_extras_free AS extr';
    protected $_table_balances    = 'mz_balances AS bal';
    protected $_table_system    = 'mz_system AS sys';
    protected $_table_chat_conversation = 'mz_chat_conversation AS ctc';
    protected $_table_chat_session = 'mz_chat_session AS cts';
    protected $_table_persons = 'mz_persons AS pers';
    protected $_table_subprofile = 'mz_subprofile AS subp';
    protected $_table_profile = 'mz_profile AS prof';
    protected $_table_users_type = 'mz_users_type AS ust';
    protected $_table_users = 'mz_users AS uss'; 
    protected $_table_testimonials = 'mz_testimonials AS tes';
    protected $_table_orders = 'mz_orders AS ords';
    protected $_table_order_details = 'mz_orderdetails AS ordd'; 
    protected $_table_products = 'mz_products AS prod';
    protected $_table_categories = 'mz_categories AS cats'; 
    protected $_table_social_media = 'mz_social_media AS socm';
    protected $_table_postmain = 'mz_postmain AS post';
    protected $_table_orgsmeta = 'mz_orgsmeta AS orgm';
    protected $_table_organization = 'mz_organization AS orgs';
    protected $_table_media = 'mz_media AS med';
    protected $_table_history = 'mz_history AS hist';
    protected $_table_contactform = 'mz_contactform AS cont';
    protected $_table_comments = 'mz_comments AS comm';
    
    /*** QUERY string
      * 
      *    $query = array( 'fields_listing' => array('', '') - this is for datatable field to show
                            'fields' => array('',''),
                            'group_by' => '' ,
                            'where' => array('',''),
                            'likes' => array('',''),
                            'orlike' => array('',''),
                            'order_by' => '',
                            'order' => '',
                            'limit' => 5,
                            'offset' => 0);
    ***/  

    /* 
    * $_GET['p'] for Status
    * $_GET['s'] for parent ID
    * $_GET['x'] for  organization type ( school = sc / company = comp / department = dept / division = div / section = sec / grade etc...)
    */
    protected $userID = 2; // need to change to login user - temporary only
    function __construct(){  
        parent::__construct(); 
        $this->load->helper('url'); 
       // $this->session_activated();
    } 

    public function index(){

        $this->page_not_found();

    }

    public function view($page='404'){ 

        $key = '2zSM*(sOGkVs193201971Jq)Sk0*^%skdjDs3051Fz4AKz821Pq7053atK';//public_key();
        
        if(@$_GET['k'] == $key/*  && $this->input->is_ajax_request() */){
            if (!method_exists($this, $page)){
                $this->page_not_found();
                return false;
            }else{
                $this->links($page);
            }
        }else{
           
            echo 'Direct access is not allowed!';
            die();
            return false;  
        }
        
    } 

    private function links($p){
        $this->data_pages = $p;
        return $this->{$this->data_pages}();
    }

    private function _users_types(){
        global $_GET;
        $this->query_table = $this->_table_users_type;

        if(@$_GET['s']){
            $this->query =    array( 'where' =>  array('zid' => $_GET['s']));
        }else{ 
            $this->query = array( 'where' =>  'zid  != 1');
        }

        $this->jsons();
    }

    /* This is for ordered Menu */
    private function _mealOrders(){
        global $_GET;
        
        $datas = '';

        $id = $this->userID;  

        $this->query_table =  $this->_table_orders .' , '. $this->_table_order_details; 
        // Display specific student order
        if(@$_GET['s']){
            $datas = "ords.zauthor = ".$id." AND ords.zid = ordd.zorder_id AND ords.zorder_to =".$_GET['s'];
        }else{
            $datas = "ords.zauthor = ".$id;
        }

        $this->query = array( 'where' =>  $datas);

        $this->jsons();
    }
    
    private function get_meal_schedule($t,$w,$f){
        $getDate = $this->global_get_title($t,$w,$f); 
        return $getDate;
    }

    private function _site_settings(){
        $this->query_table =  $this->_table_system;
        $this->jsons();
    }

    private function _testimonials(){
        $this->query_table =  $this->_table_testimonials;
        $this->jsons();
    }

    private function _comments(){
        $this->query_table =  $this->_table_comments;
        $this->jsons();
    }

    private function _history(){
        $this->query_table =  $this->_table_history;
        $this->jsons();
    }

    private function _products(){
        global $_GET;

        $datas = '';
        $currentDate = date('Y-m-d');
        
        // Display published products
        if(@$_GET['p'] && @$_GET['p'] == 9 && @$_GET['o']){

            $this->query = array( 'where' =>  'cats.zid = prod.zcategory AND prod.zstatus = 9 AND cats.zstatus = 9 AND prod.zorganization = "'.$_GET['o'].'" AND cats.ztype = "product" AND prod.zdate_display >= "'.$currentDate.'"',
                                    'fields' => 'prod.*');
        
        // Display ALL draft, review, pending, published - all status except deleted (2)
        }elseif(@$_GET['p'] && @$_GET['p'] == 99 && @$_GET['o']){

            $this->query = array( 'where' =>  'cats.zid = prod.zcategory AND prod.zstatus != 2 AND prod.zorganization = "'.$_GET['o'].'" AND cats.zstatus = 9 AND cats.ztype = "product"',
                                    'fields' => 'prod.*');
        
        // Display EITHER draft, review, pending - specific
        }elseif(@$_GET['p'] && @$_GET['p'] <> 2 && @$_GET['o']){

            $this->query = array( 'where' =>  'cats.zid = prod.zcategory AND prod.zstatus = "'.$_GET['p'].'" AND prod.zorganization = "'.$_GET['o'].'" AND cats.zstatus = 9 AND cats.ztype = "product" AND prod.zdate_display >= "'.$currentDate.'"',
                                    'fields' => 'prod.*');
        
        }elseif(@$_GET['p'] && @$_GET['p'] == 'administrator'){
            
            // for admin
            // Display all products except deleted
            $this->query = array( 'where' => 'cats.zid = prod.zcategory AND prod.zstatus != 2 AND cats.ztype = "product"',
                                    'fields' => 'prod.*');
        }else{
            return false;
        }

        // prod, cats
        $this->query_table =  $this->_table_products .','. $this->_table_categories;
        $this->jsons();
    }

    private function _orders(){
            global $_GET;
            $this->query_table =  $this->_table_orders .' , '. $this->_table_order_details;
            $datas = ' AND ords.zstatus != 2';

            // Display specific student order
            if(@$_GET['s']){
                $datas .= " AND ords.zorder_to =".$_GET['s'];
            }

            // Display all orders from children
            if(@$_GET['x']){
                $datas = " AND ords.zauthor =".$_GET['x'];
            }

            $this->lists =  array(  'zorder_to',
                                    'zorganization',  
                                    'zproduct',
                                    'zprice',
                                    'zdate_published',
                                    'zstatus'
                            );

            $this->query = array( 'fields_listing' => array( 
                                                'zorder_to',
                                                'zorganization',  
                                                'zproduct',
                                                'zprice',
                                                'zdate_published',
                                                'zstatus'
                                                ),
                    'fields' => '*',
                    'where' =>  'ords.zid = ordd.zorder_id '.$datas,
                    'order_by' => 'LENGTH(zdate_published),zdate_published',
                                'order' => 'DESC'); 
            
            $this->jsons();
    }

    // Display All organization data
    private function _orgs($item=null,$fld=null){
            global $_GET;
            $this->query_table =  $this->_table_organization .' , '. $this->_table_orgsmeta;
            $datas = ' AND orgs.zstatus != 2';

            // Display specific organization data
            if(@$_GET['s']){
                $datas .= " AND orgs.zid =".$_GET['s'];
            }

            //For Admin - All by types - sc / comp / dept / pos / gr / sec / div
            if(@$_GET['x']){
                $datas .= ' AND orgs.ztype = "'.$_GET['x'].'"';
            }

            // For User/Client - Display published status
            if(@$_GET['p'] == 9){
                $datas .= ' AND orgs.zstatus = '.$_GET['p'];
            }

            $ntz = '';
            $gtz = '';

            if($item){
                $ntz = ' AND orgs.zid = '.$item;
                $fields = $fld;
                $order_by = $fld;
            }else{
                $fields = 'orgs.zid AS ID, orgs.ztitle AS title, orgs.zcontent AS content, orgs.zdate_published AS published_date, orgs.zauthor AS author, orgs.zparent AS parents, orgs.zstatus AS zstatus,
                orgm.zcountry AS country, orgm.zaddress AS address, orgm.zlink AS link, orgm.zcomp_license AS license, orgm.zcomp_vat AS vat';
                $order_by = 'LENGTH(title),title';
            }

            if(@$_GET['g']){
                $gtz = ' AND orgs.zparent = '.$_GET['g'];
            }

            $this->query = array( 'where' =>  'orgs.zid = orgm.zorganization '.$datas.$ntz.$gtz,
                                'fields' => $fields,
                                'order_by' => $order_by,
                                'order' => 'ASC');

            if($item){
                $data =  $this->global_func_query($this->query_table, $this->query);
                return $data[0]->$fields;
            }else{
                $this->jsons();
            }
    }

    // get login profile
    private function _profile(){
        global $_GET;
        $callback = '';  

        $id = $this->userID;
        $stats = 0;
        if(@$_GET['p'] == 9){
            $stats = $_GET['p'];
        }
        /* Get single profile */
        $this->query = array( 'where' => array('zparent' => $id, 'zstatus' => $stats));
        $this->query_table =  $this->_table_profile;
        $this->jsons();
    }

    // display all users - profile
    private function _users(){
        global $_GET;

        if(@$_GET['tz'] <> 214){
            return false;
        }
        //uss - prof
        $this->query_table =  $this->_table_profile .' , '. $this->_table_users;
        $datas = '';

        // Display specific user data
        if(@$_GET['s']){
            $datas = " AND uss.zid =".$_GET['s'];
        }else{
            $datas = " AND uss.zid =".$this->userID;
        }

        $this->query = array( 'where' =>  'uss.zid = prof.zparent AND uss.zstatus != 2'.$datas);
        $this->jsons();
    } 

     // display all active complimentaries
     private function _xtras(){
        global $_GET;

        if(@$_GET['tz'] <> 214 && !$_GET['tp']){
            return false;
        }
        //uss - prof
        $this->query_table =  $this->_table_extras;
        $datas = array('zstatus' => 9,'ztype'=>$_GET['tp']); 

        $this->query = array( 'where' =>  $datas);
        $this->jsons();
    } 

    // display all students
    private function _students(){
        global $_GET;
        $callback = '';
        $datas = '';

        $this->studz = @$_GET['z']; // for datatables

        $id = $this->userID;

         // Display specific user data
        if(@$_GET['s']){ 
            $datas = 'zid = '.$_GET['s'].' AND zparent ='.$id.' AND zstatus != 2';
        }else{
            $datas = 'zparent ='.$id.' AND zstatus != 2';
        }

        $this->lists =  array(  'zid',
                                'zstatus',
                                'zfullname',
                                'zorganization',
                                'zgrade',
                                'zstate',
                                'zvalid_id',
                                'zbalance',
                                'zorgID',
                                'zdivision',
                                'zsection',
                                'zgradeID',
                                'zsectionID',
                                'zdivisionID'                               
                                
        );

        $this->query = array( 'fields_listing' => array( 
                                                        'zstatus',
                                                        'zfirstname',  
                                                        'zorganization',
                                                        'zgrade',
                                                        'zstate',
                                                        'zvalid_id',
                                                        'zbalance', 
                                                        'zorganization'
                                                        ),
                              'fields' => '*',
                              'where' => $datas);
        $this->query_table =  $this->_table_subprofile;
        $this->jsons();
    }

    private function jsons(){
        $data =  $this->global_func_query($this->query_table, $this->query, $this->lists);  
        $this->output( $data ); 
    }   

    private function output( $o ){
        $this->output->set_content_type('application/json'); 
        $cur_date = date('Y-m-d');
        $fut_date = date('Y-m-d',strtotime('+30 days')) . PHP_EOL;
        $menu_chk = false;
        $arr_pop = false;
        $output = [];
        $qrt = [];
        $data1 = [];
        $data2 = [];
        $parZ =  $o;
        $tz = [];  
        
         /* Run on DataTables */
        if($o && $this->lists){
            foreach($o['data'] as $k => $aRow){ 
  
                $data1[] =  (object)$aRow;
            }

            $o =$data1;
        }
        
         /* Run on All */
         if($o){
          
                foreach($o AS $k => $v){ 
                    foreach($v AS $t => $z){
                        $output[$k][$t] = $v->$t; 
                    }
                    if(@$v->zvalue){
                        $data = @unserialize($v->zvalue);
                        if ($data !== false) { 
                            $output[$k]['zvalue'] = $data;
                        } else {
                            $output[$k]['zvalue'] = $v->zvalue;
                        }
                    }

                    if(@$v->zstatus){
                        $output[$k]['zstatus'] = status_info_clean($v->zstatus);
                    }else{
                        $output[$k]['zstatus'] = '';
                    }
                    if(@$v->zorganization){
                        $output[$k]['zorgID'] =  $v->zorganization;
                        $output[$k]['zorganization'] = $this->global_get_title('mz_organization',array('zid' => $v->zorganization),'ztitle');

                        /* For databales lists */
                        if($this->studz){
                            $output[$k]['zstate'] = $this->_orgs($v->zorganization, 'zstate');
                        } 
                    }else{
                        $output[$k]['zorganization'] = '';
                    }
                    
                    if(@$v->zorder_to){ 
                        $getName = $this->global_get_title('mz_subprofile',array('zid' => $v->zorder_to),array('zfirstname','zlastname'));
                        $output[$k]['zorder_to'] = $getName[0]->zfirstname. ' '. $getName[0]->zlastname;
                    }

                    if(@$v->zproduct){ 
                        $output[$k]['zproductID'] = $v->zproduct;
                        $output[$k]['zproduct'] =  $this->global_get_title('mz_products',array('zid' => $v->zproduct),'ztitle');
                    }

                    if(@$v->zgrade){
                        $output[$k]['zgradeID'] =  $v->zgrade;
                        $output[$k]['zgrade'] =  $this->global_get_title('mz_organization',array('zid' => $v->zgrade),'ztitle');
                    }else{
                        $output[$k]['zgrade'] = '';
                        $output[$k]['zgradeID'] = '';
                    }
                    if(@$v->zdivision){
                        $output[$k]['zdivisionID'] =  $v->zdivision;
                        $output[$k]['zdivision'] = $this->global_get_title('mz_organization',array('zid' => $v->zdivision),'ztitle');
                    }else{
                        $output[$k]['zdivision'] = '';
                        $output[$k]['zdivisionID'] = '';
                    }
                    if(@$v->zsection){
                        $output[$k]['zsectionID'] =  $v->zsection;
                        $output[$k]['zsection'] = $this->global_get_title('mz_organization',array('zid' => $v->zsection),'ztitle');
                    }else{
                        $output[$k]['zsection'] = '';
                        $output[$k]['zsectionID'] = '';
                    }
                    if(@$v->zcompany){
                        $output[$k]['zcompany'] = $this->global_get_title('mz_organization',array('zid' => $v->zcompany),'ztitle');
                    }else{
                        $output[$k]['zcompany'] = '';
                    }
                    if(@$v->zdepartment){
                        $output[$k]['zdepartment'] = $this->global_get_title('mz_organization',array('zid' => $v->zdepartment),'ztitle');
                    }else{
                        $output[$k]['zdepartment'] = '';
                    }
                    if(@$v->zposition){
                        $output[$k]['zposition'] = $this->global_get_title('mz_organization',array('zid' => $v->zposition),'ztitle');
                    }else{
                        $output[$k]['zposition'] = '';
                    }
                    if(@$v->zcategory){
                        $output[$k]['zcategory'] = $this->global_get_title('mz_categories',array('zid' => $v->zcategory),'ztitle');
                    }else{
                        $output[$k]['zcategory'] = '';
                    }
                    
                    if(@$v->zfirstname){ 
                        $output[$k]['zfullname'] =  ucwords($v->zfirstname . " ". $v->zlastname);
                    }
                   
                    if(@$v->zdate_display){
                        $newDate = json_decode($v->zdate_display);
                        foreach( $newDate AS $st => $v){
                            if($v >= $cur_date && $v < $fut_date){  
                                 $menu_chk = true; 
                              
                            }
                        }

                        if(!$menu_chk){
                            array_pop($output); 
                            $arr_pop = true; 
                        }

                    } 
                }

             
            }
        
        if($arr_pop){
            $output = array_values($output);
        }

        /* Run on DataTables */
        if($o && $this->lists){  
            
            foreach($output as $k => $aRow){
                
                 $row = array();
                
                foreach ($this->lists as $col) {
                    $row[] = $aRow[$col];
                }
    
                $data2[] = $row;
            }
           
            $output = array( "draw"             =>  $parZ['draw'],  
                            "recordsTotal"      =>  $parZ['recordsTotal'],  
                            "recordsFiltered"   =>  $parZ['recordsFiltered'],  
                            "data"              =>  $data2  );
        } 
        
        
        $json = json_encode($output);  
        echo $json;
        
    }
     
}