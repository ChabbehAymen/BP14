<?php

class DBconf
{
    protected $pdo;
    public function __construct()
    {

        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=BP14;charset=UTF8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

}