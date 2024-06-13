<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=easytourbooking", "root", "");
}catch(PDOException $e){
    echo $e->getMessage();
}
?>