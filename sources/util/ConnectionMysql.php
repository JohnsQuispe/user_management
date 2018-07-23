<?php

class ConnectionMysql{
    
    protected $connection;

    public static function getConnection(){

        $user = "root";
        $pass = "";        
        $host = "localhost";
        $database = "users_management";
        
        return new PDO("mysql:host={$host};dbname={$database}", $user, $pass);
        
    }
    
}