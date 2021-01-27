<?php

function dbConnect(){
    static $myDb = null;
    $dbName = "cfptBook";
    $dbUser = "root";
    $dbPass = "";
    if ($myDb === null) {
        try {
            $myDb = new PDO(
                "mysql:host=localhost;dbname=$dbName;charset=utf8",
                $dbUser,
                $dbPass,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false)
            );
        } catch (Exception $e) {
            die("Impossible de se connecter à la base ". $e->getMessage());
        }
    }
    return $myDb;
}
