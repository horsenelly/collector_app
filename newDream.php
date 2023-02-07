<?php
$postMessage = '';
$newDream = [];

if(isset($_POST['dream_title']) 
    && isset($_POST['dream_or_nightmare']) 
    && isset($_POST['dream_description']) 
    && isset($_POST['dream_date'])
    ) {
        $newDream = [
            'dream_title'=> $_POST['dream_title'],
            'dream_or_nightmare'=>$_POST['dream_or_nightmare'],
            'dream_description'=>$_POST['dream_description'],
            'dream_date'=>$_POST['dream_date'],
        ];
        addItemsToDb($newDream);
        $postMessage = "success!";
}   else {
        $postMessage = "This didnt work!";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Dream Collection</title>
</head>
<body>
    <main>
        <nav>
            <a href="index.php">Return to dreams</a>
        </nav>
        <h1>Add new Dream</h1>
        <div id="newDreamContainer">
            <form method="post">
                <label for="dream_title" >Dream Title</label>
                <input type="text" id="dream_title" name="dream_title">
                <label for="dream">Dream</label>
                <input type="radio" name="dream_or_nightmare" value="Dream" id="dream">
                <label for="nightmare">Nightmare</label>
                <input type="radio" name="dream_or_nightmare" value="Nightmare" id="nightmare">
                <label for="dream/nightmare">Dream/Nightmare</label>
                <input type="radio" name="dream_or_nightmare" value="Dream/Nightmare" id="dream/nightmare">
                <label>Dream Description</label>
                <input type="textarea" name="dream_description">
                <label>Date of dream</label>
                <input type="date" name="dream_date">
                <input type="submit" value="Submit">
            </form>
        </div> 
        <?php echo $postMessage ?>
    </main>
</body>
<html>