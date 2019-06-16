<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compress extends CI_Controller { 

	function __construct() {
		parent::__construct(); 
	}

	public function index() {} 

	public function clear_cache(){
        header('Content-type: application/json; charset=utf-8');
        $update = true;
        $css1 = file_get_contents(plugins_dir('bootstrap/css/bootstrap.min.css'));
        $css2 = file_get_contents(plugins_dir('morrisjs/morris.css')); 
        $css3 = file_get_contents(file_common_dir_back('css/gag-admin.css')); 
        
        /*  Style.css cannot be added */
         
        $css =  $css1; 
        $css .= "\n"; 
        $css .=  $css2;    
        
        $css =  trim(preg_replace('/(?![ ])\s+/', ' ', $css));  
        $css .= "\n"; 
        $css .=  $css3;

        $css_folder = getcwd().'/x_moikzz_assets/back/css';
        $file = 'master.css';
        $contents = $css;
         
        if($update)
        file_put_contents($css_folder.'/'. $file, $contents);
         
        /* JavaScript */
        $folder = getcwd().'/x_moikzz_assets/back/js';
        /* Default JS */
                $update = false;
               /*  $js1 = file_get_contents(plugins_dir('jquery/jquery.min.js')); */
                $js2 = file_get_contents(plugins_dir('bootstrap/js/popper.min.js'));
                $js3 = file_get_contents(plugins_dir('bootstrap/js/bootstrap.min.js'));
                $js4 = file_get_contents(file_common_dir_back('js/jquery.slimscroll.js'));
                $js5 = file_get_contents(file_common_dir_back('js/waves.js'));
                $js6 = file_get_contents(file_common_dir_back('js/sidebarmenu.js'));
                $js7 = file_get_contents(plugins_dir('sticky-kit-master/dist/sticky-kit.min.js'));
                $js8 = file_get_contents(file_common_dir_back('js/custom.min.js'));
                $js9 = file_get_contents(file_common_dir_back('js/gag-admin.js'));  
                
                $jsq =   $js4." ".$js5." ".$js6." ".$js7." ".$js8;
                
                $jsq =  trim(preg_replace('/(?![ ])\s+/', ' ', $jsq)); 

               /*  $js = $js1;
                $js .= "\n"; */
                $js = $js2;
                $js .= "\n";
                $js .= $js3;
                $js .= "\n";
                $js .= $jsq;
                $js .= "\n";

                $jsq9 =  trim(preg_replace('~//?\s*\*[\s\S]*?\*\s*//?~', '', $js9)); 
                $jsq9 =  preg_replace('/(?![ ])\s+/', ' ', $jsq9); 

                //$js .= $jsq9;  
                $file = 'master.js';
                $contents = $js;
                if($update)
                    file_put_contents($folder.'/'. $file, $contents); 
        /* End Default */ 

        /* Datatables JS */
            $update = false;
            $js1 = file_get_contents(plugins_dir('datatables/jquery.dataTables.min.js'));
            $js2 = file_get_contents("https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js");
            $js3 = file_get_contents("https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js");
            $js4 = file_get_contents("https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js");
            $js5 = file_get_contents("https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js");
            $js6 = file_get_contents("https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js");
            $js7 = file_get_contents("https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js");
            $js8 = file_get_contents("https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js");

            $jsq2 =   $js1." ".$js2." ".$js3." ".$js4." ".$js5." ".$js6." ".$js7." ".$js8;
                
            $js2 =  trim(preg_replace('/(?![ ])\s+/', ' ', $jsq2));
            
            $file = 'datatables.js';
            $contents = $js2; 
            if($update) 
            file_put_contents($folder.'/'. $file, $contents); 
        /* End Datatables */
        
        /* Graph JS */
            $update = false;
            $js1 = file_get_contents(plugins_dir('sparkline/jquery.sparkline.min.js'));
            $js2 = file_get_contents(plugins_dir('raphael/raphael-min.js'));
            $js3 = file_get_contents(plugins_dir('morrisjs/morris.min.js'));
            $jsq3 =   $js1." ".$js2." ".$js3;

            $js3 =  trim(preg_replace('/(?![ ])\s+/', ' ', $jsq3));
                
            $file = 'graph.js';
            $contents = $js3; 
            if($update)     
            file_put_contents($folder.'/'. $file, $contents); 
    }
}