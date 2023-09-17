<?php

class Signup extends Dbh{
    protected function checkUser($username, $email){
        $statement = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR userEmail = ?;');

        if(!$statement->execute(array($username, $email))){
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }

        $resultCheck;
        if($statement->rowCount() > 0){
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }
        return $resultCheck; 
    }

    public function setUser($firstName, $lastName, $username, $email, $password){
        $statement = $this->connect()->prepare('INSERT INTO users (username, userFirstname, userLastname, userEmail, userPassword) VALUES (?,?,?,?,?);');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$statement->execute(array($username, $firstName, $lastName, $email, $hashedPassword))){
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }
        $statement = null;
    }

}