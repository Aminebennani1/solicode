<?php
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    try{
        include_once 'connection.php';
        $true = $err = "";
    
        if(isset($_POST["ajouter"])){
            if(!empty($_POST["name"]) && !empty($_POST["prix"]) ){
                $name = validate($_POST["name"]);
                $prix = validate($_POST["prix"]);
                $description = validate($_POST["description"]);


                $stm = $db->prepare("INSERT INTO `tour`(`tour_name`, `tour_price`, `tour_description`) VALUES ( :nameT, :prix, :descriptionT)");
                $stm->bindParam(':nameT', $name);
                $stm->bindParam(':prix', $prix);
                $stm->bindParam(':descriptionT', $description);
                $stm->execute();
                header("location:./tours.php");
                $true = "Tour est bien ajoutee";
            }else{
                $err = "remplaire tous les champs";
            }
                
        }
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un nouveau Tour</title>
</head>
<body>

    <div class="box">
        <h2>Ajouter un nouveau tour</h2>
        <div class="reponce">
            <?php
                if(!empty($err)) echo "<div class='err'>$err</div>";
                if(!empty($true)) echo "<div class='true'>$true</div>";
            ?>
        </div>
        <form action="" method="POST">
                <input type="text" name="name" placeholder="*Entrez le nom de tour">
                <input type="number" name="prix" placeholder="*Entrez le prix de tour">
                <textarea name="description" placeholder="*Entrez le description de tour"></textarea>
                <div class="footer">
                    <div>
                        <button name="ajouter">Ajouter</button>
                    </div>
                </div>
        </form>
    </div>

</body>
</html>