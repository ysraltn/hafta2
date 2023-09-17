<?php
    function emptyInputSignup($firstName, $lastName, $userName, $email, $password, $repeatPassword){
        $result;
        if(empty($firstName) || empty($lastName) || empty($userName) || empty($email) || empty($password) || empty($repeatPassword) ){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function invalidUserName($userName) {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $userName)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email) {
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function passwordMatch($password, $repeatPassword) {
        $result;
        if($password != $repeatPassword){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function userNameExists($connection, $userName, $email){
        $sql = "SELECT * FROM users WHERE userName = ? OR userEmail = ?;";
        $statement = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../signup.php?error=statementfailed");
            exit();
        }
        mysqli_stmt_bind_param($statement, "ss", $userName, $email);
        mysqli_stmt_execute($statement);
        $resultData = mysqli_stmt_get_result($statement);
        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($statement);
    }

    function createUser($connection, $firstName, $lastName, $userName, $email, $password){
        $sql = "INSERT INTO users(username, userFirstname, userLastname, userEmail, userPassword) VALUES (?, ?, ?, ?, ?);";
        $statement = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../signup.php?error=statementfailed");
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($statement, "sssss", $userName, $firstName, $lastName, $email, $hashedPassword);
        mysqli_stmt_execute($statement); 
        mysqli_stmt_close($statement);
        header("location: ../index.php?error=none");
        exit();
    }

    function emptyInputLogin($userName, $password){
        $result;
        if(empty($userName) || empty($password)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function loginUser($connection, $userName, $password){
        $credentialsArray = userNameExists($connection, $userName, $userName);     

        if($credentialsArray === false){
            header("location: ../login.php?error=wrongcredentials");
            exit();
        }

        $hashedPassword = $credentialsArray["userPassword"];
        $checkPassword = password_verify($password, $hashedPassword);

        if($checkPassword === false){
            header("location: ../login.php?error=wrongcredentials");
            exit();
        }
        else if($checkPassword === true){
            session_start();
            $_SESSION["userId"] = $credentialsArray["userId"];
            $_SESSION["userName"] = $credentialsArray["username"];
            header("location: ../index.php");
            exit();
        }
    }

?>