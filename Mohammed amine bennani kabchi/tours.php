<?php

$conn = new PDO("mysql:host=localhost;dbname=easytourbooking", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT tour_id,tour_name, tour_price,tour_description
FROM tour  ORDER BY tour_id DESC");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    
    <?php
    if (!empty($result)) {
        ?>
        <table>
            <tr>
                <th>Id</th>
                <th>nom</th>
                <th>prix</th>
                <th>description</th>
                <th>modifier</th>
                <th>supremi</th>
            </tr>
            <div class="data">
                <?php
                foreach ($result as $v) {
                    echo "<tr><th>" . $v["tour_id"] . "</th><th>" . $v["tour_name"] . "</th><th>" . $v["tour_price"] . "</th><th>" . $v["tour_description"] . "</th><th><a href='./editerTour.php?tour_id=" . $v["tour_id"] . "'>modifier</a></th><th> <a href='./supprimer.php?tour_id=" . $v["tour_id"] . "'>supremi</a></th></tr>";
                }

                ?>
            </div>

        </table>
    <?php } ?>
    <br>

    <a href="ordercroissant.php">orderby</a>
    <a href="reservation.php">reservation</a>
    <a href="nouveauTour.php">AJOUTER TOUR</a>
    <a href="search.php">SEARCH</a>
    
</body>

</html>