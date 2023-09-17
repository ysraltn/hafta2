<?php

    if(isset($_POST["submit"])){
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $userName = $_POST["userName"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeatPassword = $_POST["repeatPassword"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputSignup($firstName, $lastName, $userName, $email, $password, $repeatPassword) !== false){
            header("location: ../signup.php?error=emptyinput");
            exit();
        }

        if(invalidUserName($userName) !== false){
            header("location: ../signup.php?error=invalidusername");
            exit();
        }

        if(invalidEmail($email) !== false){
            header("location: ../signup.php?error=invalidemail");
            exit();
        }

        if(passwordMatch($password, $repeatPassword) !== false){
            header("location: ../signup.php?error=passwordsdontmatch");
            exit();
        }

        if(userNameExists($connection, $userName, $email) !== false){
            header("location: ../signup.php?error=userexists");
            exit();
        }

        createUser($connection, $firstName, $lastName, $userName, $email, $password);

    }
    else{
        header("location: ../signup.php");
    }




?>