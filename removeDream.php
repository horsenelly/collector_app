<?php
require 'src/functions.php';
require 'src/db.php';

$db = connectToDB('dreams');
$dreams = getAllDreams($db);
$displayedDreamsForDelete = displayDreamsForDelete($dreams);?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Remove a Dream</title>
</head>

<body>
    <main>
        <nav>
            <a href="index.php">Return to dreams</a>
        </nav>
        <h1>Remove a dream</h1>
       <?php echo $displayedDreamsForDelete; ?>
    </main>
</body>
<html>