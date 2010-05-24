<?php  
    
    require_once 'config.php';
    require_once 'config/dbconfig.php';
	require_once 'utils/Redirect.php';
	require_once 'models/DbTable.php';
	require_once 'helpers/Display.php';
	
	header('Content-Type: text/html; charset=UTF-8');
	session_start();    

	//$db = DbTable::getInstance();
    //$dbconfig = array('host'=>HOST, 'dbname'=>DBNAME, 'username'=>USERNAME, 'password'=>PASSWORD);	
    //$db = new DbTable($dbconfig);
	//$db->setConfig(array('host'=>'localhost', 'dbname'=>'uniweb_termek', 'username'=>'teszt', 'password'=>'teszt'));
	
	$flag = 0;

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