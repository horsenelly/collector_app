<?php
require 'src/functions.php';

$dbString = 'dreams';
$db = connectToDB($dbString);
$dreams = getAllDreams($db);
$displayedDreams = displayDreamDetails($dreams);

?>

<!DOCTYPE HTML>
<HTML>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
    <h1>Your Dream Diary</h1>
    <h2>Your dreams</h2>
    <?php echo $displayedDreams; ?>
</body>
</HTML>