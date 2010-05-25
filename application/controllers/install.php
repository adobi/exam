<?php  

    require_once 'models/DbTable.php';
    
    $db = new DbTable();
    
    $createTable = file_get_contents(APPLICATION_PATH . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'da1982_termek.sql');
    
    $db->query($createTable);
    
    Redirect::to(BASE_URL);
?>