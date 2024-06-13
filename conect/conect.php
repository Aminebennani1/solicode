<?php
$result = $resultt = "";

if (isset($_POST["submit"])) {
    try {
        $con = new PDO("mysql:host=localhost;dbname=amine", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = "connected";
    } catch (PDOException $e) {
        $resultt = "error" . $e->getMessage();
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <form method="POST">

        <input type="submit" name="submit" value="submit">
        <p class="re">
            <?php echo $result ?>
        </p>
        <p class="re">
            <?php echo $resultt ?>
        </p>

    </form>
    <style>
        .re {
            color: red;
        }
    </style>
</head>

<body>

</body>

</html>