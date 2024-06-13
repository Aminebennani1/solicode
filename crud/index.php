<?php

$conn = new PDO("mysql:host=localhost;dbname=amine", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!empty($_POST)) {
    $Firstname = $_POST["Firstname"];
    $Lastname = $_POST["Lastname"];
    $Email = $_POST["Email"];

    try {
        $insurt_stmt = $conn->prepare("INSERT INTO mytable(amina,hs,svs) VALUES ('$Firstname','$Lastname','$Email') ");
        $insurt_stmt->execute();
        // print_r($result);
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }

}

$stmt = $conn->prepare("SELECT id,amina,svs,hs 
FROM mytable  ORDER BY id DESC");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>

<body>
    <?php
    if (!empty($result)) {
        ?>
        <table>
            <tr>
                <th>Id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>modifier</th>
                <th>supremi</th>
            </tr>

            <?php
            foreach ($result as $v) {
                echo "<tr><th>" . $v["id"] . "</th><th>" . $v["amina"] . "</th><th>" . $v["hs"] . "</th><th>" . $v["svs"] . "</th><th><a href='./md.php?id=".$v["id"]."'>modifier</a></th><th> <a href='./sup.php?id=".$v["id"]."'>supremi</a></th></tr>";
            }
            ?>
        </table>
    <?php } ?>
    <form class="all" method="POST">
        Firstname: <input type="text" name="Firstname">
        <br><br>
        Lastname: <input type="text" name="Lastname">
        <br><br>
        Email: <input type="text" name="Email">
        <br><br>
        <input id="submit" type="submit" name="submit" value="submit">
    </form>
</body>

</html>