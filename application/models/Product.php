<?php  

    class Product extends DbTable 
    {
        
        protected $_name = 'da1982_product';
        protected $_primary = 'id';
        
        public function __construct() {
            parent::__construct();
        }
    }

?>