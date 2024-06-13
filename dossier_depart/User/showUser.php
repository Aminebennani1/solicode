<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main>
    <div class="link_container">
        <a href="addUser.php"></a>
    </div>
    <table>
        <?php
        include_once "../connect_ddb.php";
        $sql = "SELECT * FROM users";
        $result=mysqli_query(($conn,$sql));
        if(mysqli_num_rows($result))
        ?>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Modifier</th>
                <th>Suprimer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>text</td>
                <td>text</td>
                <td class="image"><a href="modifyUser.php"><img src="../images/write.png" alt=""></a></td>
                <td class="image"><a href="deleteUser.php"><img src="../images/remove.png" alt=""></a></td>
            </tr>
        </tbody>
    </table>
</main>
</body>
</html>