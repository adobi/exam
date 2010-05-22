<?php  
    
    require_once 'config.php';
	require_once 'utils/Redirect.php';
	
	header('Content-Type: text/html; charset=UTF-8');
	session_start();    


    
	$_template = '';
	$flag = 1;
	/*
	switch($controller) {
	    
	    case '':
	    
	        require_once 'controllers/home.php';
	        $flag = 1;
	        break;
	    case 'login':
	        
	        require_once 'controllers/login.php';
	        $flag = 1;
	        break;
	    case 'logout':
	        
	        require_once 'controllers/logout.php';
	        $flag = 1;
	        break;
	    case 'products':
	        if(isset($_SESSION['UserId'])) {
	            
    	        require_once 'controllers/products.php';
	        }
	        else {
	            
	            Redirect::to(BASE_URL . 'login/');
	        }
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
	*/
	if(!empty($controller) && file_exists(APPLICATION_PATH . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $controller . '.php')) {
	    
	    require_once 'controllers/' . $controller . '.php';
	    $flag = 1;
	}
	else {
	    
	    if(empty($controller)) {
	        
	        require_once 'controllers/home.php';
	        $flag = 1;
	    }
	    else {
	        $flag = 0;
	    }
	}
	
	if($controller === 'page-unavailable') {
	    
	    require_once 'controllers/404.php';
	    $flag = 1;
	}
	
	if(!$flag) {
	    
	    Redirect::to(BASE_URL . 'page-unavailable/');
	}
	
	//if(!empty($_template) && file_exists(APPLICATION_PATH . DIRECTORY_SEPARATOR . $_template)) {
	if(!isset($template)) {
	    
	    if(empty($controller)) {
	        
	        require_once 'views/home.php';
	    }
	    else {
	        require_once 'views/' . $controller . '.php';
	    }
	}
	elseif(file_exists(APPLICATION_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $template . '.php')) {
	    
	    require_once 'views/' . $template . '.php';
	}
	
?>