<?php

try{
$pdoUsers = new PDO("mysql:host=localhost;port=3306;dbname=usersys", "root", "");
$createUsers = $pdoUsers->prepare("CREATE TABLE usuarios (Nome varchar(50) NOT NULL, Email varchar(80) NOT NULL, Senha varchar(50) NOT NULL, User_Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT)");
$createUsers->execute();
header("location: index.php");
} catch (PDOException $e) {   
}