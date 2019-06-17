<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of General_callbacks
 * notes: check the API key from view function
 * 
 * @author Moikzz
 */
class General_callbacks extends SS_Controller { 

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

      /* Saving cart to DB */
    private function sys_modules(){
        header('Content-type: application/json; charset=utf-8');
        $ID = $this->input->post('sys-id');
        if(!$ID){ return; }

        $success = false;
        
        $addelete    = @$this->input->post('addelete') ? $addelete = 'addelete' : $addelete = '';
        $view        = @$this->input->post('view') ? $view = 'view' : $view = '';
        $edit        = @$this->input->post('edit') ? $edit = 'edit' : $edit = '';

        $dashboard      = @$this->input->post('dashboard') ? $dashboard = 'dashboard' : $dashboard = '';
        $inquiries      = @$this->input->post('inquiries') ? $inquiries = 'inquiries' : $inquiries = '';
        $trucks         = @$this->input->post('trucks')  ? $trucks = 'trucks' : $trucks = '';
        $posts          = @$this->input->post('posts') ? $posts = 'posts' : $posts = '';
        $pages          = @$this->input->post('pages') ? $pages = 'pages' : $pages = '';
        $cf             = @$this->input->post('contact_form') ? $contact_form = 'contact_form' : $contact_form = '';
        $menus          = @$this->input->post('menus') ? $menus = 'menus' : $menus = '';
        $media          = @$this->input->post('media') ? $media = 'media' : $media = '';
        $settings       = @$this->input->post('settings') ? $settings = 'settings' : $settings = '';
        $testimonials   = @$this->input->post('testimonials') ? $testimonials = 'testimonials' : $testimonials = '';
        $products       = @$this->input->post('products') ? $products = 'products' : $products = '';
        $categories     = @$this->input->post('categories') ? $categories = 'categories' : $categories = '';
        $payments       = @$this->input->post('payments') ? $payments = 'payments' : $payments = '';
        $orders         = @$this->input->post('orders') ? $orders = 'orders' : $orders = '';
        $history        = @$this->input->post('history') ? $history = 'history' : $history = '';
        

        $item1 = array($dashboard, $inquiries, $trucks, $posts, $pages, $cf, $menus, $media, $settings, $testimonials, $products, $categories, $payments, $orders, $history);
        $item1 = array_values(array_filter($item1));
        
        $item2 = array($addelete, $edit, $view);
        $item2 = array_values(array_filter($item2));

        $data2  = array('pages' => $item1, 'options' => $item2);
        $data2 = serialize($data2);
        $data = array('zvalue' => $data2);
        $where = array('zid' => $ID);
        $query = $this->global_func_query('mz_users_type',$data, $where, 'update_single');

        if($query){
            $success = true;
        }

        echo json_encode(array('success'=>$query,'message'=>$data));
    }

    /* Saving cart to DB */
    private function cart_order_purchase(){
		header('Content-type: application/json; charset=utf-8');
        $meal_details = array();
        $order_details_ID = null;
        $success = false;
        $studentID = $this->input->post('student');
        if($studentID){ 

                $mealPrice = $this->input->post('mealPrice');
                $mealTotal = $this->input->post('totalPrice');
                $mealID = $this->input->post('mealID');
                $comps = $this->input->post('compliments');
                $prodSched = $this->input->post('prSched'); 

                $studentBalance =  $this->get_meal_schedule('mz_balances',array('zparent' => $studentID), 'zbalance');

                if($studentBalance < $mealTotal){
                    return false;
                }

                $public_data = array('student' => $studentID,
                                    'mealprice' => $mealPrice,
                                    'mealtotal' => $mealTotal,
                                    'meals' => $mealID);
                
                $cur_date = date('Y-m-d H:i:s');

                $data_1 = array('zauthor' => $this->userID, 'zorder_to' => $studentID, 'zstatus' => 9, 'zdate_published' => $cur_date,'znotes' => null, 'zad_ons' => null,'ztotal' => $mealTotal);
                $order_ID =  $this->global_func_query('mz_orders', $data_1,false, 'insert_single');

                if($order_ID){

                    foreach($mealID AS $k => $v){
                      
                        $meal_details[$k]['zorder_id'] = $order_ID;
                        $meal_details[$k]['zproduct'] = $v;
                        $meal_details[$k]['zprice'] = $mealPrice[$k];
                        $meal_details[$k]['zcomp'] = $comps[$k];
                        $meal_details[$k]['zdate_order'] = $prodSched[$k];
                    }

                    $order_details_ID =  $this->global_func_query('mz_orderdetails', $meal_details,false, 'insert_batch');
                    if($order_details_ID){
                        $updated_balance = (double)$studentBalance - (double)$mealTotal;
                        $updated_balance = number_format($updated_balance, 2);
                        $updated_balance = array('zbalance' => $updated_balance);
                        $where = array('zparent' => $studentID);
                        
                        $balance = $this->global_func_query('mz_balances', $updated_balance ,$where, 'update_single');

                        if($balance){
                                    $where2 = array('zid' => $studentID);
                                    $this->global_func_query('mz_subprofile', $updated_balance ,$where2, 'update_single');
                                    $success = true;
                        }

                    } 
                } 
        }
        echo json_encode(array('success'=>$success,'message'=>$meal_details));
         
    }

    /* Update Profile Information to DB */
    private function profileInfos(){
		header('Content-type: application/json; charset=utf-8');
        
        $success = false;
        $studID = false;
        $user = $this->input->post('username');
        if($user){

                $pass = $this->input->post('password');

                $fname = $this->input->post('fname');
                $lname = $this->input->post('lname');
                $web = $this->input->post('website');
                $img1 = $this->input->post('image1');
                $phone = $this->input->post('phone'); 
                $cnty = $this->input->post('country'); 
                $state = $this->input->post('state');

                $postal = $this->input->post('postal');
                
                $division = $this->input->post('division');
                $status = $this->input->post('status');
                $section = $this->input->post('section');
                $userID = $this->input->post('userID');

                $cur_date = date('Y-m-d H:i:s');
                
                if($status == 'new'){
                    $data = array('zusername' => $user, 'zpassword' => $pass, 'ztype' => 4, 'zstatus' => 9);
                    
                    $parentID =  $this->global_func_query('mz_users', $data,false, 'insert_single');

                    if($parentID){
                        $data1 = array('zparent' => $parentID, 'zstatus' => 9, 'zfirstname' => $fname, 'zlastname' => $lname, 'zdate_published' => $cur_date,
                                        'zwebsite' => $web, 'zimage1' => $img1, 'zphone_num' => $phone, 'zcountry' => $cnty, 'zstate' => $state, 'zpostal_code' => $postal);
                            $rs =  $this->global_func_query('mz_profile', $data1,false, 'insert_single');
                            $success = true;
                    }
                }else{
                    $user = $this->userID;

                    $data = array('zstatus' => $status, 'zfirstname' => $fname, 'zlastname' => $lname, 
                                    'zorganization' => $school, 'zstate' => $state, 'zdivision' => $division, 'zsection' => $section, 'zgrade' => $grade, 'zvalid_id' => $scID);
                    
                    $where = array('zid' => $userID);
                    $this->global_func_query('mz_subprofile', $data, $where, 'update_single');
                    $studID = $userID;
                    $success = true;
                }

        }        
        echo json_encode(array('success'=>$success,'id'=>$studID)); 
    }

    /* Update Student Information to DB */
    private function studentInfos(){
		header('Content-type: application/json; charset=utf-8');
        
        $success = false;
        $studID = false;
        $scID = $this->input->post('schoolID');
        if($scID){ 

                $fname = $this->input->post('fname');
                $lname = $this->input->post('lname');
                $school = $this->input->post('school');
                $country = $this->input->post('country');
                $state = $this->input->post('state');
                $grade = $this->input->post('grade');
                $division = $this->input->post('division');
                $status = $this->input->post('status');
                $section = $this->input->post('section');
                $userID = $this->input->post('userID');

                $cur_date = date('Y-m-d H:i:s');
                
                if($status == 'new'){
                    $data = array('zparent' => $this->userID, 'zstatus' => 9, 'zfirstname' => $fname, 'zlastname' => $lname, 'zdate_published' => $cur_date, 
                                    'zorganization' => $school, 'zstate' => $state, 'zbalance' => 0, 'zdivision' => $division, 'zsection' => $section, 'zgrade' => $grade, 'zvalid_id' => $scID);
                    
                    $studID =  $this->global_func_query('mz_subprofile', $data,false, 'insert_single');

                    if($studID){
                        $data1 = array('zparent' => $studID, 'zbalance' => 0);
                            $rs =  $this->global_func_query('mz_balances', $data1,false, 'insert_single');
                            $success = true;
                    }
                }else{
                    $data = array('zstatus' => $status, 'zfirstname' => $fname, 'zlastname' => $lname, 
                                    'zorganization' => $school, 'zstate' => $state, 'zdivision' => $division, 'zsection' => $section, 'zgrade' => $grade, 'zvalid_id' => $scID);
                    
                    $where = array('zid' => $userID);
                    $this->global_func_query('mz_subprofile', $data, $where, 'update_single');
                    $studID = $userID;
                    $success = true;
                }

        }        
        echo json_encode(array('success'=>$success,'id'=>$studID)); 
    } 
     
}