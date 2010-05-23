<?php  
    
    require_once 'Product.php';
    
    $product = new Product();    

    $errors = array();
    
    switch($action) {
        
        case 'list':
        
            $products = $product->fetchAll();
        
            $template = 'products_list';
            break;
        case 'edit':
            
            if(isset($param) && !empty($param)) {
                
                $theProduct = $product->find((int)$param);
                
                if(!$theProduct) {
                    
                    $errors[] = 'Nothing found, please try something else!';
                }
                
            }
            
            if($_POST) {

                $wasError = 0;
                if(trim($_POST['name']) === '') {
                    $errors[] = 'Name is required';
                    $wasError = 1;
                }
                
                if(trim($_POST['list_price']) === '' || !is_numeric($_POST['list_price'])) {
                    $errors[] = 'List price is required and must be numeric';
                    $wasError = 1;
                }
                
                if(trim($_POST['price']) === '' || !is_numeric($_POST['price'])) {
                    $errors[] = 'Price is required and must be numeric';
                    $wasError = 1;
                }                
                if(!$wasError) {
                        
                    if(isset($param) && !empty($param)) {
                        
                        
                         //update
                         $product->update($_POST, (int)$param);
                         
                         $theProduct = $product->find((int)$param);
                    }
                    else {
                        //insert
                            $product->insert($_POST);
                            
                            Redirect::to(BASE_URL . 'products/list');
                    }
                }
                else {
                    $theProduct = $_POST;
                }                
            }
        
            $template = 'products_edit';
            break;
        case 'delete':
        
            if(isset($param) && !empty($param)) {
                
                $product->delete((int)$param);
                
                Redirect::to(BASE_URL . 'products/list');
            }
            
            break;
    }
?>