<?php
$newDream = [];

require 'src/functions.php';
require 'src/db.php';

if(isset($_POST['dream_title']) 
    && isset($_POST['dream_or_nightmare']) 
    && isset($_POST['dream_description']) 
    && isset($_POST['dream_date'])) {
        $newDream = [
            'dream_title'=> $_POST['dream_title'],
            'dream_or_nightmare'=>$_POST['dream_or_nightmare'],
            'dream_description'=>$_POST['dream_description'],
            'dream_date'=>$_POST['dream_date'],
        ];
    $db = connectToDB('dreams');
    if(validateDreamData($newDream)) {
        addItemToDb($db, $newDream);
        header('Location: dreamSuccessMessage.php');
    } else {
        throw new Exception('Invalid data used for new dream in dataset!');
    }
    
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Add New Dream</title>
</head>
<body>
    <main>
        <nav>
            <a href="index.php">Return to dreams</a>
        </nav>
        <h1>Add new Dream</h1>
        <div id="newDreamContainer">
            <form method="post">
                <div>
                    <label for="dream_title" >Dream Title</label>
                    <input type="text" id="dream_title" name="dream_title">
                </div>
                <p>Select dream type:  </p>
                <div>
                    <label for="dream">Dream</label>
                    <input type="radio" name="dream_or_nightmare" value="Dream" id="dream">
                </div>
                <div>
                    <label for="nightmare">Nightmare</label>
                    <input type="radio" name="dream_or_nightmare" value="Nightmare" id="nightmare">
                </div>
                <div>
                    <label for="dream/nightmare">Dream/Nightmare</label>
                    <input type="radio" name="dream_or_nightmare" value="Dream/Nightmare" id="dream/nightmare">
                </div>
                <div>
                    <label for="dream_description">Dream Description (1000 characters max): </label>
                    <textarea name="dream_description" id="dream_description"></textarea>
                </div>
                <div>
                    <label for="dream_date">Date of dream: </label>
                    <input type="date" name="dream_date" id="dream_date">
                </div>
                <div>
                    <input type="submit" value="Submit">
                </div> 
            </form>
        </div> 
    </main>
</body>
<html>