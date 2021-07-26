<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=pdofirma", 'root', '');
    //echo "veritabanı bağlantısı başarılı";
} catch (PDOExpception $e) {

    echo $e->getMessage();
}

?>
