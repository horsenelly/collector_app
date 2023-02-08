<?php

function displayDreamDetails(array $dreams): string {
    $dreamOutput ='';
    $dreamsReversedChronologically = array_reverse($dreams);
    foreach($dreamsReversedChronologically as $dream) {

        if(array_key_exists('dream_title', $dream) 
        && array_key_exists('dream_or_nightmare', $dream) 
        && array_key_exists('dream_date', $dream) 
        && array_key_exists('dream_description', $dream)) {

            $dreamOutput .="<h3>" . $dream['dream_title'] . "</h3>"
            . "<p>" . $dream['dream_or_nightmare'] . "</p>"
            . "<p>" . $dream['dream_date'] . "</p>"
            . "<p>" . $dream['dream_description'] . "</p>";

        } else {
            throw new Exception('Invalid array keys');
        }
    }
    return $dreamOutput;    
}

function checkDreamData (array $newDream): bool {
    
    $dreamTitle = $newDream['dream_title'];
    $dreamOrNightmare = $newDream['dream_or_nightmare'];
    $dreamDescription = $newDream['dream_description'];
    $dreamDay = substr($newDream['dream_date'], -2);
    $dreamMonth = substr($newDream['dream_date'], -5, 2);
    $dreamYear = substr($newDream['dream_date'], -10, 4);
    
    if(
    (is_string($dreamTitle) && strlen($dreamTitle) <= 255)
    && (is_string($dreamOrNightmare) && strlen($dreamOrNightmare) <= 255)
    && (is_string($dreamDescription) && strlen($dreamDescription) <= 1000)
    && checkDate($dreamMonth, $dreamDay, $dreamYear)) {
        return true;
    } else {
        return false;
    }
}
