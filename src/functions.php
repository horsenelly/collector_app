<?php

function connectToDB(string$dbName): PDO {
    $connectionString ="mysql:host=db; dbname=$dbName";
    $db = new PDO($connectionString, 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

function getAllDreams(PDO $db): array {
    $query = $db->prepare(SELECT * FROM dreams);
    $query->execute;
    return  $query->fetchALL();
}

function displayDreamDetails(array $dreams){
    foreach($dreams as $dream);
    return "<h2 id=" . "dreams title" . ">Dreams you have had</h2>
    <h3 id=" . "dream title" . ">" . $dream['dream_title'] . "</h3>
    <h4 id=" . "dream or nightmare" . ">" . $dream['dream_or_nightmare'] . "</h4>
    <h4>01/01/1970</h4>
    <p id="dream description">I had a dream where I saw cracks appearing in the walls of my house, 
        that started to grow and grow. As they grew, they started to look like sponge cake,
         and fell away to reveal huge holes in the wall. How odd!! I spoke with my therapist about this,
         and she said it might be a metaphore about all of the things that I am learning, and feeling like 
         my brain almost doesn't have space to store it all! I'm not toally sure I agree with this, but who 
         knows, she is the pro....
    </p>"
}
