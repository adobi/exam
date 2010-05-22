<?php  
    
    $errors = array();
    switch($action) {
        
        case 'list':
        
            require_once 'Product.php';
            
            $product = new Product();
            $products = $product->fetchAll();
        
            $template = 'products_list';
            break;
        case 'edit':
            require_once 'Product.php';
            
            $product = new Product();
                
            if(isset($param)) {
                
                $theProduct = $product->find((int)$param);
                
                if(!$theProduct) {
                    
                    $errors[] = 'Nothing found, please try something else!';
                }
                
            }
            
            if($_POST) {
                
                if(isset($param)) {
                    
                    
                     //update
                     $product->update($_POST, (int)$param);
                }
                else {
                    //insert
                    $product->insert($_POST);
                }
            }
        
            $template = 'products_edit';
            break;
        case 'delete':
            
            break;
    }
?>