<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ::-webkit-scrollbar {
            width: 0
        }

        body {
            background-color: #F6E4AE;
        }

        .all {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>

<body>
    <form class="all" method="POST">
        <div>
            Firstname: <input type="text" name="Firstname1">
            <br><br>
            Lastname: <input type="text" name="Lastname1">
            <br><br>
            Email: <input type="text" name="Email1">
            <br><br>
            <br><br>
            <br>
        </div>
        <div>
            Firstname: <input type="text" name="Firstname2">
            <br><br>
            Lastname: <input type="text" name="Lastname2">
            <br><br>
            Email: <input type="text" name="Email2">
            <br><br>
            <br><br>

            <input type="submit" name="submit" value="submit">
        </div>
    </form>

    <?php
    $Firstname1 = $Lastname1 = $Email1 = $Firstname2 = $Lastname2 = $Email2 = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Firstname1 = test_input($_POST["Firstname1"]);
        $Lastname1 = test_input($_POST["Lastname1"]);
        $Email1 = test_input($_POST["Email1"]);
        $Firstname2= test_input($_POST["Firstname2"]);
        $Lastname2 = test_input($_POST["Lastname2"]);
        $Email2 = test_input($_POST["Email2"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    if (isset($_POST['submit'])) {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=amine", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->beginTransaction();
            // our SQL statements
            $conn->exec("INSERT INTO mytable (amina, hs, svs)
            VALUES (' $Firstname1', ' $Lastname1', '  $Email1')");
            $conn->exec("INSERT INTO mytable (amina, hs, svs)
             VALUES (' $Firstname2', ' $Lastname2', '  $Email2')");

            $conn->commit();
            echo "created succefully deux ";
        } catch (PDOException $e) {
            echo "erore" . "<br>" . $e->getMessage();
        }
    }
    $conn = null;
    ?>
</body>

</html>