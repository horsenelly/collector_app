<?php
require 'src/functions.php';
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
    echo "The Post worked!";
}   else {
        header('Location: index.php');
    }