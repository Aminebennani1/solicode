<?php

$conn = new PDO("mysql:host=localhost;dbname=amine", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if($_SERVER['REQUEST_METHOD'] =="GET"){
    $id = $_GET["id"];
    try {
        $stmt = $conn->prepare("SELECT amina,hs,svs FROM mytable WHERE id=$id");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }
}

if($_SERVER['REQUEST_METHOD'] =="POST"){
    $id = $_GET["id"];
    $Firstname = $_POST["Firstname"];
    $Lastname = $_POST["Lastname"];
    $Email = $_POST["Email"];
    try {
        $stmt = $conn->prepare("UPDATE mytable SET amina='$Firstname',hs='$Lastname' ,svs='$Email' WHERE id=$id ");
        $stmt->execute();
        header("location:./index.php");
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="all" method="POST">
        Firstname: <input value="<?php echo $result["amina"]?>" type="text" name="Firstname">
        <br><br>
        Lastname: <input value="<?php echo $result["hs"]?>" type="text" name="Lastname">
        <br><br>
        Email: <input value="<?php echo $result["svs"]?>" type="text" name="Email">
        <br><br>
        <input id="submit" type="submit" name="submit" value="submit">
    </form>
</body>
</html>