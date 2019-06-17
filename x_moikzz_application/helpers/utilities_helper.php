<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	if (!function_exists('file_common_dir_back')) { 

		function file_common_dir_back( $file ){ 

			return  base_url().'x_moikzz_assets/back/'.$file; 

		} 
	} 

	if (!function_exists('file_common_dir_front')) { 

		function file_common_dir_front( $file ){ 

			return  base_url().'x_moikzz_assets/front/'.$file; 

		} 
	}

	if (!function_exists('imgs_dir')) {
		function imgs_dir( $file ){

			return base_url().'x_moikzz_assets/images/'.$file;

		}
	}

	if (!function_exists('plugins_dir')) {
		function plugins_dir( $file ){

			return base_url().'x_moikzz_assets/plugins/'.$file; 

		}  
	} 

	if (!function_exists('public_key')) { 

		function public_key(){ 
			$year = date('Y');
			$month = date('m');
			$day = date('d');
			//$key = '2zSM*(sOGkVs193'.$year.'71Jq)Sk0*^%skdjDs3'.$month.'1Fz4AKz821Pq7'.$day.'3atK'; 
			$key = '2zSM*(sOGkVs193201971Jq)Sk0*^%skdjDs3051Fz4AKz821Pq7053atK'; 
			return  $key;

		} 
	}

	if(!function_exists('page_not_found')) {
		function page_not_found($data=null) {
			$CI =&get_instance();
			 return $CI->template->load( 'front/template', 'errors/html/error_404',$data);
		}
	} 
	 
	if(!function_exists('current_uri_segments')) {
		function current_uri_segments($segments) {
			$CI =&get_instance();
			$uri = $CI->uri->segment(3);
			if( $uri == $segments ) {
				return 'active';
			} else {
				return $uri ."==". $segments;
			}
		}
	}

	if (!function_exists('get_global_custom_query')) {

		function get_global_custom_query($table,$whr, $fld=null,$field_name=null){

				$CI =&get_instance();  

			    $where = $whr;//array('zid' => $id); 

			    $fld==null ? $select="*" : $select = $fld;

				$CI->db->select($select);

				$CI->db->from($table);

				$CI->db->where($where);

				$query = $CI->db->get();

				if($query->num_rows() > 0) {
					if($field_name){
						$result = $query->result()[0]->$field_name;
					}else{
						$result = $query->result();
					}

					return $result;

				} else {
					return false;
				}
	    }
    }  


	if (!function_exists('user_info')) { 
		function user_info($key=null) { 

			$CI =&get_instance(); 

			$current_user = '';

			$session_data = $CI->session->userdata('logged_in');

			if( $session_data ) { 

				return $session_data;

			}

		} 

	} 

	if (!function_exists('get_current_url')) { 
		function get_current_url() { 

			$page = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 

			return $page; 

		} 

	} 


	if (!function_exists('get_page_referer')) { 
		function get_page_referer() { 

			$page = $_SERVER['HTTP_REFERER']; 

			$basename = basename($page); 

			return $basename; 

		} 

	} 



	if (!function_exists('status_info')) {



		function status_info($key) { 

			 

			switch($key){

			    case 1:

			        echo "Preview";

			        break;

			    case 2:

			        echo "<p class='text-danger msg-inline'>Deleted</p>";

			        break;

			    case 3:

			        echo "<p class='text-warning msg-inline'>Rejected</p>";

			        break;

			    case 4:  

			        echo "<p class='text-primary msg-inline'>Private</p>";

			        break;

			    case 5:

	                return "<p class='text-danger msg-inline'>Resigned</p>";

	                break;

	            case 6:

	                return "<p class='text-danger msg-inline'>Terminated</p>";

					break;

				case 7:

	                return "<p class='text-danger msg-inline'>Cancelled</p>";

	                break;
				case 8:

	                return "<p class='text-info msg-inline'>onHand</p>";

	                break;
		     	case 9:

                	echo "<p class='text-success msg-inline'>Published</p>";

                	break; 
				case 10:

	                return "<p class='text-success msg-inline'>Completed</p>";

					break;
				case 11:

	                return "<p class='text-success msg-inline'>Sold</p>";

					break;
				case 12:

	                return "<p class='text-success msg-inline'>On Going</p>";

					break;
				case 13:

	                return "<p class='text-warning msg-inline'>In Progress</p>";

					break;
				case 14:

	                return "<p class='text-primary msg-inline'>New</p>";

					break;
				case 15:

	                return "<p class='text-primary msg-inline'>Pending</p>";

					break;
				case 16:

	                return "<p class='text-danger msg-inline'>Delayed</p>";

	                break;	
			    default:

			        echo "Preview";

			        break;

			}  
		} 

	} 

	if (!function_exists('status_info_clean')) {  
		function status_info_clean($key) {   
			switch($key){ 
			    case 1:

			        return "Preview";

			        break;

			    case 2:

			        return "Deleted";

			        break;

			    case 3:

			        return "Rejected";

			        break;

			    case 4:  

			        return "Private";

			        break;

			    case 5:

	                return "Resigned";

	                break;

	            case 6:

	                return "Terminated";

					break;

				case 7:

	                return "Cancelled";

	                break;
				case 8:

	                return "onHand";

	                break;
		     	case 9:

                	return "Published";

                	break; 
				case 10:

	                return "Completed";

					break;
				case 11:

	                return "Sold";

					break;
				case 12:

	                return "On Going";

					break;
				case 13:

	                return "In Progress";

					break;
				case 14:

	                return "New";

					break;
				case 15:

	                return "Pending";

					break;
				case 16:

	                return "Delayed";

	                break;	
			    default:

			        return "Preview";

			        break;

			}  
		}  
	} 

if (!function_exists('secondsToTime')) {

	function secondsToTime($inputSeconds) {



	    $secondsInAMinute = 60;

	    $secondsInAnHour  = 60 * $secondsInAMinute;

	    $secondsInADay    = 24 * $secondsInAnHour;



	    // extract days

	    $days = floor($inputSeconds / $secondsInADay);



	    // extract hours

	    $hourSeconds = $inputSeconds % $secondsInADay;

	    $hours = floor($hourSeconds / $secondsInAnHour);



	    // extract minutes

	    $minuteSeconds = $hourSeconds % $secondsInAnHour;

	    $minutes = floor($minuteSeconds / $secondsInAMinute);



	    // extract the remaining seconds

	    $remainingSeconds = $minuteSeconds % $secondsInAMinute;

	    $seconds = ceil($remainingSeconds);



	    // return the final array

	    $obj = array(

	        'd' => (int) $days,

	        'h' => (int) $hours,

	        'm' => (int) $minutes,

	        's' => (int) $seconds,

	    );

	    return $obj;

	}

}    

	if (!function_exists('clean_date')) {



		function clean_date($date) {  

			 echo date('m/d/Y', strtotime($date));

		} 

	}


	if (!function_exists('is_loggged_in')) { 

		function is_loggged_in() { 

			$CI =&get_instance(); 

			return ($CI->session->userdata('logged_in')) ? true : false; 

		} 
	} 



	if(!function_exists('activate_menu')) {



	  function activate_menu($basename) {



	  	$current_url = current_url();



			$current_basename = basename($current_url);



	    return ($current_basename == $basename) ? 'current-menu' : '';



	  }
	}
	if(!function_exists('delete_all_between')) {
		function delete_all_between($beginning, $end, $string) {
			$beginningPos = strpos($string, $beginning);
			$endPos = strpos($string, $end);
			if ($beginningPos === false || $endPos === false) {
			return $string;
			}

			$textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

			return delete_all_between($beginning, $end, str_replace($textToDelete, '', $string)); // recursion to ensure all occurrences are replaced
		}
	}
?>