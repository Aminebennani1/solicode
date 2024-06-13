<?php

$conn = new PDO("mysql:host=localhost;dbname=amine", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if($_SERVER['REQUEST_METHOD'] =="GET"){
    $id = $_GET["id"];
    try {
        $stmt = $conn->prepare("DELETE  FROM mytable WHERE id=$id");
        $stmt->execute();
        header("location:./index.php");
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }
}
?>