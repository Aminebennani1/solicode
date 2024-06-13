<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link href="home.css" rel="stylesheet">
</head>

<body>
    <div class="container">
    <a href="add.html" class="btn_add"><img src="add_btn.png"></a>
    <?php
    $sdn = "mysql:host=localhost;dbname=schol";
    $username = "root";
    $paswsword = "";
    try {
        $con = new PDO($sdn, $username, $paswsword);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = ("SELECT * FROM student");
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        echo "<table class='mytable'>
        <th><tr>
<td>id</td<td>FIRSTAME</td><td>Lastname</td><td colspan='2'>Operation</td></tr></th>
</tr></th>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "
<td> {$row['id']}</td>
<td> {$row['username']}</td>
<td> {$row['email']}</td>
<td><a><img src='modifier.png'></a></td>
<td><a><img src='delete.png'></a></td>";

            echo "</tr>";
        }
        echo "</table>";

    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }
    ?>
</div>
</body>

</html>