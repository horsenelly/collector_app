<?php

function displayDreamDetails(array $dreams): string{
    $dreamOutput ='';
    foreach(array_reverse($dreams) as $dream) {

        if(array_key_exists('dream_title', $dream) 
        && array_key_exists('dream_or_nightmare', $dream) 
        && array_key_exists('dream_date', $dream) 
        && array_key_exists('dream_description', $dream)) {

                $dreamOutput .="<h3>" . $dream['dream_title'] . "</h3>"
                . "<h4>" . $dream['dream_or_nightmare'] . "</h4>"
                . "<h4>" . $dream['dream_date'] . "</h4>"
                . "<p>" . $dream['dream_description'] . "</p>";

        } else {

            throw new Exception('Invalid array keys');

        }
    }
    return $dreamOutput;    
}
