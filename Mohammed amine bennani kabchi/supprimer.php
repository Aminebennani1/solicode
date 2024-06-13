<?php

$conn = new PDO("mysql:host=localhost;dbname=easytourbooking", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if($_SERVER['REQUEST_METHOD'] =="GET"){
    $id = $_GET["tour_id"];
    try {
        $stmt = $conn->prepare("DELETE  FROM tour WHERE tour_id=$id");
        $stmt->execute();
        header("location:./tours.php");
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }
}
?>