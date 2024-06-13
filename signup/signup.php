<?php
$username = $password = $email = "";

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

if (isset($_POST["submit"])) {
    if (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);
        $email = test_input($_POST["email"]);
    
        try {
            $conn = new PDO("mysql:host=localhost;dbname=amine", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
            $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES (:username, :email, :password)");

            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            echo "New insert created successfully";
        } catch (PDOException $e) {
            echo "Error" . "<br>" . $e->getMessage();
        }
        $conn = null;
    }else{
        echo "please fill in all inputs";
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container right-panel-active">
        <!-- Sign Up -->
        <div class="container__form container--signup">
            <form method="POST" class="form" id="form1">
                <h2 class="form__title">Sign Up</h2>
                <input type="text" name="username" placeholder="User" class="input" />
                <input type="email" name="email" placeholder="Email" class="input" />
                <input type="password" name="password" placeholder="Password" class="input" />
                <button type="submit" name="submit" value="submit" class="btn">Sign Up</button>
            </form>
        </div>

        <!-- Sign In -->
        <!-- <div class="container__form container--signin">
            <form action="#" class="form" id="form2">
                <h2 class="form__title">Sign In</h2>
                <input type="email" placeholder="Email" class="input" />
                <input type="password" placeholder="Password" class="input" />
                <a href="#" class="link">Forgot your password?</a>
                <button class="btn">Sign In</button>
            </form>
        </div> -->

        <!-- Overlay -->
        <div class="container__overlay">
            <div class="overlay">
                <div class="overlay__panel overlay--left">
                    <button class="btn" id="signIn">Sign In</button>
                </div>
                <div class="overlay__panel overlay--right">
                    <button type="submit" class="btn" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const signInBtn = document.getElementById("signIn");
        const signUpBtn = document.getElementById("signUp");
        const fistForm = document.getElementById("form1");
        const secondForm = document.getElementById("form2");
        const container = document.querySelector(".container");

        signInBtn.addEventListener("click", () => {
            container.classList.remove("right-panel-active");
        });

        signUpBtn.addEventListener("click", () => {
            container.classList.add("right-panel-active");
        });

   

    </script>


</body>
</html>