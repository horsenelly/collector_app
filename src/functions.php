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

function displayDreamDetails(array $dreams): string{
    $dreamOutput ='';
    foreach($dreams as $dream){
        $dreamOutput .="<h3>" . $dream['dream_title'] . "</h3>
        <h4>" . $dream['dream_or_nightmare'] . "</h4>
        <h4>" . $dream['dream_date'] . "</h4>
        <p>" . $dream['dream_description'] . 
        "</p>";
    } return $dreamOutput;
}
