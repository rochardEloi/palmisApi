<?php
try {
    $db = new PDO('mysql:host=localhost; dbname=palmis','root','');
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    define("APP_NAME", "Palmis API");
} catch (Exception $e) {
  
}

 ?>