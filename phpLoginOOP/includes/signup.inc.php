<?php
    echo "s inc";
    if(isset($_POST["submit"])){
        echo "s inc if";
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $userName = $_POST["userName"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeatPassword = $_POST["repeatPassword"];

        include "../classes/dbh.classes.php";
        include "../classes/signup.classes.php";
        include "../classes/signupController.classes.php"; 
        $signup = new SignupController($firstName, $lastName, $userName, $email, $password, $repeatPassword);
        $signup->signupUser();
        header("location: ../index.php?error=none");
    }
?>