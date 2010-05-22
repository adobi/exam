<?php  
    $errors = array();
    if($_POST) {
        
        if(isset($_POST['username']) && $_POST['username'] === 'admin' && isset($_POST['password']) && $_POST['password'] === 'adminjelszo') {
            
            $_SESSION['UserId'] = 1;
            
            Redirect::to(BASE_URL . 'products/list');
        }
        else {
            
            $errors[] = "Invalid Username/Password";
        }
    }
?>