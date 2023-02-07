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
    $dreams =  $query->fetchALL();
    return $dreams;
}

function addItemsToDb (PDO $db, array $newDream):bool {
    $dreamTitle = $newDream['dream_title'];
    $dreamOrNightmare = $newDream['dream_or_nightmare'];
    $dreamDescription = $newDream['dream_description'];
    $dreamDate = $newDream['dream_date'];
    $query = $db->prepare("INSERT INTO dreams (dream_title, dream_or_nightmare, dream_description, dream_date) VALUES ('$dreamTitle', '$dreamOrNightmre', '$dreamDescription', '$dreamDate')")
    $query->execute();
    return "success!";
}
