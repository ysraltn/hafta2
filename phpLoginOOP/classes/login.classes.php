<?php

class Login extends Dbh{
    protected function getUser($username, $password){
        $statement = $this->connect()->prepare('SELECT userPassword FROM users WHERE username = ? OR userEmail = ?;');

        if(!$statement->execute(array($username, $username))){
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }

        if($statement->rowCount() == 0){
            $statement = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $passwordHashed = $statement->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed[0]["userPassword"]);

        if($checkPassword == false){
            $statement = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        elseif($checkPassword == true){
            $statement = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR userEmail = ? AND userPassword = ?;');
            if(!$statement->execute(array($username, $username, $password))){
                $statement = null;
                header("location: ../index.php?error=statementfailed");
                exit();
            }
            if($statement->rowCount() == 0){
                $statement = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }
            $user = $statement->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["userid"] = $user[0]["userId"];
            $_SESSION["username"] = $user[0]["username"];
            $_SESSION["firstName"] = $user[0]["userFirstname"];


        }




        else{
            $resultCheck = true;
        }
        return $resultCheck; 
    }

    public function setUser($firstName, $lastName, $username, $email, $password){
        $statement = $this->connect()->prepare('INSERT INTO users (username, userFirstname, userLastname, userEmail, userPassword) VALUES (?,?,?,?,?);');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$statement->execute(array($firstName, $lastName, $username, $email, $hashedPassword))){
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }
        $statement = null;
    }

}