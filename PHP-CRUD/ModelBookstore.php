<?php
/**
 * Created by PhpStorm.
 * User: holhe
 * Date: 2018. 11. 29.
 * Time: 7:53
 */

class ModelBookstore
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $dbname = 'crud';

    protected function connect(){
        $pdo = null;
        try {
            $pdo = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo "Connection failed".$e->getMessage();
        };
        return $pdo;
}
}