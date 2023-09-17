<?php

    class Dbh{
        protected function connect(){
            try{
                $username = "root";
                $password = "";
                $dbh = new PDO('mysql:host=localhost;dbname=phpproject01', $username, $password);
                return $dbh;
            }
            catch(PDOException $exception){
                print "Error!: " . $exception->getMessage() . "<br/>";
                die();
            }
        }
    }