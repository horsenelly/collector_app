<?php
require 'src/functions.php';
require 'src/db.php';

$db = connectToDB('dreams');
$dreams = getAllDreams($db);
$displayedDreamsForDelete = displayDreamsForDelete($dreams);

if(!empty($_POST)) {
    $dreamsForDelete = $_POST;
    print_r ($_POST);
    foreach($dreamsForDelete as $dreamforDelete) {
        echo "$dreamforDelete";
    }
}
?>
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
        <h2>Select all dreams you would like to remove. When you are done, press the submit button at the bottom of the page!</h2>
        <form method="post">
        <?php echo $displayedDreamsForDelete; ?>
        <div>
            <input type="submit" value="Submit" class="delete-submit-button">
        </div>
        </form>
    </main>
</body>
<html>