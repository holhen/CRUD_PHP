<?php
require_once 'config.php';
class Dbh
{
    public static function connect(){

        $pdo = null;
        try {
            $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USERNAME,DB_PASSWORD);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo "Connection failed".$e->getMessage();
        };
        return $pdo;
}
}