<?php  
    
    require_once 'config.php';
	
	header('Content-Type: text/html; charset=UTF-8');
	session_start();    


    
	$_template = '';
	$flag = 1;
	switch($page) {
	    
	    case '':
	    
	        require_once 'controllers/home.php';
	        $flag = 1;
	        break;
        case 'page-unavailable':
            
            require_once 'controllers/404.php';
        	$flag = 1;
        	break;
        default:
        	$flag = 0;
        	break;	    
	}
	
	if(!$flag) {
	    
	    require_once 'utils/Redirect.php';
	    
	    Redirect::to(BASE_URL . 'page-unavailable/');
	}
	
	if(!empty($_template)) {
	    
	    require_once $_template;
	}
	
?>