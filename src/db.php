<?php

function connectToDB(string $dbName): PDO {
    $connectionString ="mysql:host=db; dbname=$dbName";
    $db = new PDO($connectionString, 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

function getAllDreams(PDO $db): array {
    $query = $db->prepare('SELECT * FROM dreams;');
    $query->execute();
    $dreams =  $query->fetchAll();
    return $dreams;
}

function addItemToDb(PDO $db, array $dreamDetails): string {
    $query = $db->prepare("INSERT INTO dreams (dream_title, dream_or_nightmare, dream_description, dream_date) 
    VALUES (:dream_title, :dream_or_nightmare, :dream_description, :dream_date)");
    $query->execute($dreamDetails);
    return "<p<Your dreams have been added to the database! Please return to your dreams to see it in your collection.</p>";
}


function deleteItemFromDb(PDO $db, array $dreams): string {
    $dreamIdsArray = array_keys($dreams);
    $numberOfAdditionalQuestionMarks = sizeof($dreamIdsArray)-1;
    $questionMarksString = "?";
    $questionMarksString .= str_repeat(", ?", $numberOfAdditionalQuestionMarks);
    $query = $db->prepare("DELETE FROM dreams WHERE id IN ($questionMarksString);");
    $query->execute($dreamIdsArray);
    return "<p>Your dreams have been removed from the database!</p>";
}