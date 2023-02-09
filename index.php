<?php
require 'src/functions.php';
require 'src/db.php';

$db = connectToDB('dreams');
$dreams = getAllDreams($db);
try {
    $displayedDreams = displayDreamDetails($dreams);
} catch (Exception $exception) {
    error_log($exception->getMessage(), 3, 'serverlog.log');
}

try {
    $badArray = [
        ['jacket_potato'=>'yummy'], 
        ['lasagne'=>'yummier']
    ];
    displayDreamDetails($badArray);
} catch (Exception $exception) {
    error_log($exception->getMessage() . "\n", 3, 'serverlog.log');
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
        <a href="newDream.php">Add new dream</a>
        <a href="removeDream.php">Remove a dream</a>
        <h1>Your Dream Diary</h1>
        <h2>Your dreams</h2>
        <?php echo $displayedDreams; ?>
    </main>
</body>
</html>