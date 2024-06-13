<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
      <button name="croissant" class="but">order croissant</button>  
      <button name="decroissant" class="but">order decroissant</button>  
    </form>
    <table>
            <tr>
                <th>Id</th>
                <th>nom</th>
                <th>prix</th>
                <th>description</th>
                <th>modifier</th>
                <th>supremi</th>
            </tr>
            <?php
if(isset($_POST["croissant"])){
    try{
        include_once "connection.php";
        $stm = $db->prepare("SELECT * FROM `tour`  ORDER BY `tour_price` ASC");
        $stm->execute();
        $rep = $stm->fetchAll();
    
        foreach($rep as $row){
            echo   "<tr>
                        <td>{$row['tour_id']}</td>
                        <td>{$row['tour_name']}</td>
                        <td>{$row['tour_price']}</td>";
                        if($row['tour_description'] == NULL){
                        echo  "<td>Rien</td>";
                        }else{
                        echo  "<td>{$row['tour_description']}</td>";
                        }
                        echo "<td><a href='editerTour.php?tour_id={$row['tour_id']}'>medifier</a></td>
                        <td><a href='deleteTour.php?tour_id={$row['tour_id']}'>suprimi</a></td>
                    </tr>";  
        }
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
if(isset($_POST["decroissant"])){
    try{
        include_once "connection.php";
        $stm = $db->prepare("SELECT * FROM `tour`  ORDER BY `tour_price` DESC");
        $stm->execute();
        $rep = $stm->fetchAll();
    
        foreach($rep as $row){
            echo   "<tr>
                        <td>{$row['tour_id']}</td>
                        <td>{$row['tour_name']}</td>
                        <td>{$row['tour_price']}</td>";
                        if($row['tour_description'] == NULL){
                        echo  "<td>Rien</td>";
                        }else{
                        echo  "<td>{$row['tour_description']}</td>";
                        }
                    echo "<td><a href='editerTour.php?tour_id={$row['tour_id']}'>medifier</a></td>
                        <td><a href='deleteTour.php?tour_id={$row['tour_id']}'>suprimi</a></td>
                    </tr>";  
        }
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
    ?>
</table>
   
</body>
</html>