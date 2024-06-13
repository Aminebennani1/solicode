<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
<form method="POST">
  <input type="text" name="where" >
  <input type="submit" name="submit">
</form>
    <?php
   echo "<table style='border: solid 1px black;'>";
   echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";
   
   class TableRows extends RecursiveIteratorIterator {
     function __construct($it) {
       parent::__construct($it, self::LEAVES_ONLY);
     }
   
     function current() {
       return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
     }
   
     function beginChildren() {
       echo "<tr>";
     }
   
     function endChildren() {
       echo "</tr>" . "\n";
     }
   }
   
   $servername = "localhost";
   $username = "root";
   $password = "";
   
   $where =$_POST["where"];
   
   try {
     $conn = new PDO("mysql:host=$servername;dbname=amine", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT id, amina,hs,svs FROM mytable ORDER BY  hs='$where'");
     $stmt->execute();
   
     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
       echo $v;
     }
   } catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
   }
   $conn = null;
   echo "</table>";
    ?>
</body>

</html>