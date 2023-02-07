<?php
require 'src/functions.php';
require 'src/db.php';

$db = connectToDB('dreams');
$dreams = getAllDreams($db);
$displayedDreams = displayDreamDetails($dreams);

?>

<!DOCTYPE HTML>
<HTML lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Dream Collection</title>
</head>
<body>
    <nav>
        <a href=newDream.php>Add new dream</a>
    </nav>
    <main>
        <h1>Your Dream Diary</h1>
        <h2>Your dreams</h2>
        <?php echo $displayedDreams; ?>
    </main>
</body>
</HTML>