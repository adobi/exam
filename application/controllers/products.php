<?php  

    switch($action) {
        
        case 'list':
        
            require_once 'Product.php';
            
            $product = new Product();
            
            //echo '<pre>';
            //var_dump($product->delete(1)); 
            //var_dump($product->fetchAll()); 
            die;
        
            $template = 'products_list';
            break;
        case 'edit':
        
            $template = 'products_edit';
            break;
        case 'delete':
            
            break;
    }
?>