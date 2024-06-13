<?php
// $sdn = "mysql:host=localhost;dbname=insetuser";
// $username = "root";
// $password = "";
// try {
//     $con = new PDO($sdn, $username, $password);
//     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "connect";
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         $name = $_POST["name"];
//         $sql = "INSERT INTO users(name) value(:name)";

//         $sd = $con->prepare($sql);
//         $sd->bindParam(':name', $name, PDO::PARAM_STR);
//         $sd->execute();
//     }
// } catch (PDOException $e) {
//     echo "error" . $e->getMessage();
// }

$dsn= "mysql:host=localhost;dbname=insertuser";
?>