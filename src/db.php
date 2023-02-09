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
    $dream_title = $dreamDetails['dream_title'];
    $dream_or_nightmare = $dreamDetails['dream_or_nightmare'];
    $dream_description = $dreamDetails['dream_description'];
    $dream_date = $dreamDetails['dream_date'];
    $query = $db->prepare("INSERT INTO dreams (dream_title, dream_or_nightmare, dream_description, dream_date) 
    VALUES (:dream_title, :dream_or_nightmare, :dream_description, :dream_date)");
    $query->execute([
        'dream_title' => $dream_title, 
        'dream_or_nightmare' => $dream_or_nightmare, 
        'dream_description' => $dream_description, 
        'dream_date' => $dream_date
    ]);
    return "<p<Your dreams have been added to the database! Please return to your dreams to see it in your collection.</p>";
}


function deleteItemFromDb(PDO $db, array $dreams): bool {
    $dreamIdsArray = array_keys($dreams);
    $numberOfQuestionMarks = sizeof($dreamIdsArray);
    $questionMarksString = "?";
    $questionMarksString .= str_repeat(", ?", $numberOfQuestionMarks-1);
    $query = $db->prepare("DELETE FROM dreams WHERE id IN ($questionMarksString);");
    $query->execute($dreamIdsArray);
    return "<p>Your dreams have been removed from the database!</p>";
}