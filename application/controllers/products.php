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
                    
                    //echo '<pre>';
                    if($_FILES['image']) {
                        
                        $filename = time() . '_' . $_FILES['image']['name'];
                        
                        $_POST['image'] = $filename;
                        
                        $ext = end(explode('.', $filename));
                        
                        if(in_array($ext, $valid_exts)) {
                            
                            list($imgWidth, $imgHeight) = getimagesize($_FILES['image']['tmp_name']);
                            
                            $newWidth = 600; $newHeight = 450;
                            $thumbWidth = 150; $thumbHeight = 113;
                            
                            if(move_uploaded_file($_FILES['image']['tmp_name'], FOTO_UPLOAD_DIR . $filename)) {
                                
                                $img = imagecreatefromjpeg(BASE_URL.'/'. FOTO_UPLOAD_DIR .$filename);
                                
                                if(function_exists('imagecreatetruecolor')) {
                                    $create	= 'imagecreatetruecolor';
                        			$copy	= 'imagecopyresampled';
                        		}
                        		else {
                        			$create	= 'imagecreate';
                        			$copy	= 'imagecopyresized';
                        		} 
                                
                        		$newImage = $create($newWidth, $newHeight);
                        		$copy($newImage, $img, 0, 0, 0, 0, $newWidth, $newHeight, $imgWidth, $imgHeight);
                        		
                        		@imagejpeg($newImage, FOTO_UPLOAD_DIR.$filename);
                        		
                        		imagedestroy($newImage);
                        		
                        		$newImage = $create($thumbWidth, $thumbHeight);
                        		$copy($newImage, $img, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $imgWidth, $imgHeight);
                        		
                        		@imagejpeg($newImage, THUMB_UPLOAD_DIR .$filename);
                        		
		                        //imagedestroy($thumb);
                                imagedestroy($img);
		                        imagedestroy($newImage);
                            }                            
                        }
                        else {
                            $errors[] = 'Not a valid filetype';
                        }

                        //var_dump($_FILES);       
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
                    
                    $product->delete((int)$param);
                    
                    Redirect::to(BASE_URL . 'products/list');
                }
                
                break;
        }
    }
    else {
        Redirect::to(BASE_URL . 'login');
    }

?>