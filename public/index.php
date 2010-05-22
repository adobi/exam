<?php  
    
    require_once 'config.php';
	require_once 'utils/Redirect.php';
	
	header('Content-Type: text/html; charset=UTF-8');
	session_start();    


    
	$_template = '';
	$flag = 1;

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
	
	if(!$flag) {
	    
	    Redirect::to(BASE_URL . '404/');
	}
	
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