<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="POST">
    <input type="submit" name="submit" value="submit">
  </form>

  <?php
if(isset($_POST["submit"])){
try{
  $con = new PDO("mysql:host=localhost","root","");
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sq="CREATE DATABASE iphon12";
$con->exec($sq);
echo"create data";
}catch(PDOException $e){
  echo"erreur" . $e->getMessage();
}
}
  ?>
</body>
</html>