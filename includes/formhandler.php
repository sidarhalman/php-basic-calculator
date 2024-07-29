<?php 



if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    
    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $pet = htmlspecialchars($_POST["pet"]);
    if(empty($firstname) || empty($lastname)) {
        header("Location: ../index.php");
        exit();
    }

    echo $firstname;
    echo "<br>";    
    echo $lastname;
    echo "<br>";
    echo $pet;

   
} else {
    header("Location: ../index.php");
}