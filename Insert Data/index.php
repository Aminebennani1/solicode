<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ::-webkit-scrollbar{
width:0
    }
        body{
            background-color:#F6E4AE;
        }
        .all{
            width:100vw;height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    text-align:center;
        }
    </style>
</head>
<body>
    <form class="all" method="POST"> 
    Firstname: <input type="text" name="Firstname" >
        <br><br>
        Lastname: <input type="text" name="Lastname">
        <br><br>
        Email: <input type="text" name="Email" >
      <br><br>
<input type="submit" name="submit" value="submit">
    </form>

<?php
$Firstname = $Lastname = $Email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Firstname = test_input($_POST["Firstname"]);
  $Lastname = test_input($_POST["Lastname"]);
  $Email = test_input($_POST["Email"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if(isset($_POST['submit'])){
try {
  $conn = new PDO("mysql:host=localhost;dbname=amine", "root", "");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "INSERT INTO lalistedesnon (FirstName, LastName,Email)
VALUES ('$Firstname','$Lastname','$Email')";
  $conn->exec($sql);
  echo "new isert created successfully";
} catch(PDOException $e) {
  echo "erore" ."<br>" . $e->getMessage();
}
}
$conn = null;
?>
</body>
</html>