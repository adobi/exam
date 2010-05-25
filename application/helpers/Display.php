<?php  

    class Display 
    {
        
        public static function products($products, $isAdmin = false) 
        {
            
            if(empty($products)) {
                
                return '<em>no products</em>';
            }
            
            $html = '<table border="0" cellspacing="5" cellpadding="5" class = "list">';
            /*$html .=    '<thead>';
            $html .=     '<tr>';
            //$html .=        '<td></td>';
            $html .=        '<td></td>';
            $html .=        '<td class = "center">Product details</td>';
            //if($isAdmin) {
                $html .=        '<td></td>';
            //}
            $html .=                '</tr>';
            $html .=    '</thead>';
            */    
            $html .=    '<tbody>';
            
                    foreach($products as $p) {
                        
                        $html .= '<tr>';
                        $html .=  '<td> ';
                            if(!empty($p['image'])) {
                                    
                                    $html .= self::image($p['image']);
                            }
                            //$html .=  '</td> ';
                            //$html .=  '<td> ';
                            $html .= '</td>';
                            $html .= '<td class = "description"> ';
                            $html .= '<strong>Name: </strong>' . $p['name']. '<br />';
                                $html .= '<span class = "list-price">List price: '.$p['list_price']. ' HUF</span> <span class = "price">Price: '. $p['price'] .' HUF</span>';
                                $html .= '<br />';
                                $html .= '<strong>Description: </strong>';
                                $html .= empty($p['description']) ? '<em>no description</em>' : $p['description'];
                            $html .= '</td>';
                           
                                $html .= '<td class = "action">';
                                 if($isAdmin) {
                                    $html .= '<a href = "'.BASE_URL.'products/edit/'.$p['id'].'">Edit</a>';
                                    $html .= '<br />';
                                    $html .= '<a href = "'.BASE_URL.'products/delete/'. $p['id'].'">Delete</a>';
                                }
                                $html .= '</td>';
                            
                        $html .= '</tr>';
                    }    
                $html .= '</tbody>';
            $html .= '</table>';
            
            return $html;
        }
        
        public static function image($image, $float = 'left') 
        {
            $html  = '<a target = _blank href = "'.BASE_URL . '/' . FOTO_UPLOAD_DIR . $image . '">';
                $html .= '<img '.($float === 'right' ? ' class = "right"' : '').' src = "' . BASE_URL . THUMB_UPLOAD_DIR . $image.'" alt = ""/>';
            $html .= '</a>';
            
            return $html;
        }
    }
?>