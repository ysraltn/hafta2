<?php

    class SignupController extends Signup{
        private $firstName;
        private $lastName;
        private $userName;
        private $email;
        private $password;
        private $repeatPassword;

        public function __construct($firstName, $lastName, $userName, $email, $password, $repeatPassword)
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->userName = $userName;
            $this->email = $email;
            $this->password = $password;
            $this->repeatPassword = $repeatPassword;
        }

        public function signupUser(){
            if($this->emptyInput() == false){
                echo "empty i";
                header("location: ../index.php?error=emptyinput");
                exit();
            }
            if($this->invalidUserName() == false){
                header("location: ../index.php?error=emptyusername");
                exit();
            }
            if($this->invalidEmail() == false){
                header("location: ../index.php?error=invalidemail");
                exit();
            }
            if($this->passwordMatch() == false){
                header("location: ../index.php?error=passdontmatch");
                exit();
            }
            if($this->usernameTakenCheck() == false){
                header("location: ../index.php?error=usernameoremailtaken");
                exit();
            }

            $this->setUser($this->firstName, $this->lastName, $this->userName, $this->email, $this->password);
        }

        private function emptyInput(){
            $result;
            if(empty($this->firstName || $this->lastName || $this->userName || $this->email || $this->password || $this->repeatPassword)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function invalidUserName() {
            $result;
            if(!preg_match("/^[a-zA-Z0-9]*$/", $this->userName)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function invalidEmail(){
            $result;
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function passwordMatch(){
            if($this->password !== $this->repeatPassword){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function usernameTakenCheck(){
            if(!$this->checkUser($this->userName, $this->email)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }
    }