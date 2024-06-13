<?php
$dsn = "mysql:host=localhost;dbname=xml34";
try{
   $dsn= new PDO($dsn,"root",""); 
   $dsn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   echo "concect with DB" ;
}catch(PDOException $e){
echo "cann not concect with DB" . $e->getMessage();
}
?>