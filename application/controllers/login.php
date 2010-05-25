<?php  
    $errors = array();
    if($_POST) {
        
        require_once 'config/adminconfig.php';
        
        if(isset($_POST['username']) && $_POST['username'] === ADMIN_USERNAME && isset($_POST['password']) && md5($_POST['password']) === ADMIN_PASSWORD) {
            
            $_SESSION['UserId'] = 1;
            
            Redirect::to(BASE_URL . 'products/list');
        }
        else {
            
            $errors[] = "Invalid Username/Password";
        }
    }
?>