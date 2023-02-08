<?php

function connectToDB(string $dbName): PDO {
    $connectionString ="mysql:host=db; dbname=$dbName";
    $db = new PDO($connectionString, 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

function getAllDreams(PDO $db): array {
    $query = $db->prepare('SELECT * FROM dreams;');
    $query->execute();
    $dreams =  $query->fetchAll();
    return $dreams;
}