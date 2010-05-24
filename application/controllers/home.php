<?php  

        require_once 'Product.php';
        
        $product = new Product(); 
        
        $products = $product->fetchAll();    

?>