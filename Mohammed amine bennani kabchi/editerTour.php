<?php

$conn = new PDO("mysql:host=localhost;dbname=easytourbooking", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if($_SERVER['REQUEST_METHOD'] =="GET"){
    $tour_id = $_GET["tour_id"];
    try {
        $stmt = $conn->prepare("SELECT tour_name, tour_price,tour_description FROM tour WHERE tour_id=$tour_id");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }
}

if($_SERVER['REQUEST_METHOD'] =="POST"){
    $tour_id = $_GET["tour_id"];
    $tour_name = $_POST["tour_name"];
    $tour_price = $_POST["tour_price"];
    $tour_description = $_POST["tour_description"];
    try {
        $stmt = $conn->prepare("UPDATE tour SET tour_name='$tour_name',tour_price='$tour_price' ,tour_description='$tour_description' WHERE tour_id=$tour_id ");
        $stmt->execute();
        header("location:./tours.php");
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
        tour_name: <input value="<?php echo $result["tour_name"]?>" type="text" name="tour_name">
        <br><br>
        tour_price: <input value="<?php echo $result["tour_price"]?>" type="text" name="tour_price">
        <br><br>
        tour_description: <input value="<?php echo $result["tour_description"]?>" type="text" name="tour_description">
        <br><br>
        <input id="submit" type="submit" name="submit" value="submit">
    </form>
</body>
</html>