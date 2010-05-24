<?php  
        
    if(isset($_SESSION['UserId'])) {
        
    
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
                    
                    echo '<pre>';
                    var_dump($_FILES);
                    if($_FILES['image']) {
                        
                        $filename = time() . '_' . $_FILES['image']['name'];
                        
                        $ext = strtolower(end(explode('.', $filename)));
                        
                        if(in_array($ext, $valid_exts)) {
                            
                            if(move_uploaded_file($_FILES['image']['tmp_name'], FOTO_UPLOAD_DIR . $filename)) {
                                
                                $_POST['image'] = $filename;
                                
                                require_once 'utils/Image.php';
                                
                                $image = new Image(FOTO_UPLOAD_DIR . $filename);
                                $image->setDestinationFullPath(FOTO_UPLOAD_DIR .$filename);
                                $image->resize(600, 450);
                                
                                $image = new Image(FOTO_UPLOAD_DIR .$filename);
                                $image->setDestinationFullPath(THUMB_UPLOAD_DIR .$filename);
                                $image->resize(150, 113);                                 
                            }                            
                        }
                        else {
                            $errors[] = 'Not a valid filetype';
                        }
                    }
                    //die;            
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
                    
                    $p = $product->find((int)$param);
                    
                    $product->delete((int)$param);
                    
                    if($p['image']) {
                        @unlink(FOTO_UPLOAD_DIR .$p['image']);
                        @unlink(THUMB_UPLOAD_DIR .$p['image']);
                    }
                    
                    Redirect::to(BASE_URL . 'products/list');
                }
                
                break;
        }
    }
    else {
        Redirect::to(BASE_URL . 'login');
    }

?>