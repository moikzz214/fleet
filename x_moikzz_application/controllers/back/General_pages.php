<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of General_pages
 *
 * @author Moikzz
 */
class General_pages extends SS_Controller { 

    protected $pg; 
    protected $pages;
    protected $namespace;
    protected $breadcrumbs;
    protected $pageTitle;
    protected $pageHeaderz;
    protected $bodyClass;
    protected $pageClass;
    protected $data_pages;
    protected $lang_z = 'en';
    protected $filter = array();
    protected $jsCustom = false;
    protected $userID = 2; // need to change to login user - temporary only
    
	function __construct(){ 

	    parent::__construct();  

	    $this->load->helper('form','url');
        $this->lang_z = 'en';
        //$this->session_activated();  
      
	} 

	public function index(){
        
		$this->page_not_found();

	}
 
    public function view($page='dashboard'){
           
        if (!method_exists($this, $page)){
            $this->page_not_found();
            return false;
        }else{
            $this->pg = $page;
            $this->links();
        }
    }

    private function links(){
        $this->data_pages = $this->pg;
        return $this->{$this->data_pages}(); 
    }

    

    private function dashboard(){
        
        // graph , table, form, modal - CSS and JS
        $this->filter = array('');
        
        $this->namespace = 'dashboard';
        $this->pageTitle = 'Dashboard';
        $this->bodyClass = 'lists-dashboard';
        $this->pageClass = 'lists-dashboard';  
        $this->page = 'templates/contents/back/'.$this->namespace;
        
        $this->template_display();
        
    } 

    private function students(){
        
        // graph , table, form, modal - CSS and JS
        $this->filter = array('table');
        $this->namespace = 'students';
        $this->pageTitle = 'Student Information';
        $this->bodyClass = 'lists-students';
        $this->pageClass = 'lists-students';  
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->jsCustom = 1; 
        $this->template_display(); 
    } 

    private function orders(){ 
        $this->filter = array('table');
        $this->namespace = 'orders';
        $this->pageTitle = 'Order Meals';
        $this->bodyClass = 'lists-orders';
        $this->pageClass = 'lists-orders';  
        $this->jsCustom = 1;
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->template_display();  
    } 

    private function payments(){
        $this->filter = array('table'); 
        $this->namespace = 'payments';
        $this->pageTitle = 'Payment History';
        $this->bodyClass = 'lists-payments';
        $this->pageClass = 'lists-payments';  
        $this->jsCustom = 1;
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->template_display();
    } 

    private function profile(){ 
        
        $this->namespace = 'profile';
        $this->pageTitle = 'My Account Information';
        $this->bodyClass = 'lists-profile';
        $this->pageClass = 'lists-profile';  
        $this->jsCustom = 2; 
        $this->pageHeaderz = "Account's Details";
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->template_display(); 
    }

    private function inquiries(){
        
        // graph , table, form, modal - CSS and JS
        $this->filter = array('table');
        $this->namespace = 'students';
        $this->pageTitle = 'Student Information';
        $this->bodyClass = 'lists-students';
        $this->pageClass = 'lists-students';  
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->jsCustom = 1; 
        $this->template_display(); 
    } 

    private function trucks(){
        
        // graph , table, form, modal - CSS and JS
        $this->filter = array('table');
        $this->namespace = 'students';
        $this->pageTitle = 'Student Information';
        $this->bodyClass = 'lists-students';
        $this->pageClass = 'lists-students';  
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->jsCustom = 1;
        $this->template_display();
    } 

    private function settings(){
        $this->namespace = 'settings';
        $this->pageTitle = 'System Settings';
        $this->bodyClass = 'lists-settings';
        $this->pageClass = 'lists-settings';  
        $this->jsCustom = 1; 
        $this->pageHeaderz = "Web Information";
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->template_display(); 
    } 

    private function system(){
        $this->namespace = 'system';
        $this->pageTitle = 'Admin System Settings';
        $this->bodyClass = 'sys-settings';
        $this->pageClass = 'sys-settings';  
        $this->jsCustom = 9; 
        $this->pageHeaderz = "Web Information";
        $this->page = 'templates/contents/back/'.$this->namespace;
        $this->template_display(); 
    }

    private function template_display(){ 
        $data['breadcrumbs'] = '<li class="breadcrumb-item active">'.ucfirst($this->namespace).'</li>';
        $data['filter_css_js'] = $this->filter;
        $data['pages'] =  $this->namespace;
        $data['title'] = $this->pageTitle;
        $data['pagetitle'] = $this->pageTitle;
        $data['bodyClass'] = $this->bodyClass;
        $data['pageclass'] = $this->pageClass;
        $data['pageHeader'] = $this->pageHeaderz;
        
        $data['jsCustom'] = $this->jsCustom;
        $data['system'] = 'Moikzz Application';
      
        $this->template->load( 'back/template', $this->page, $data); 
    }
    
}