<?php

function displayDreamDetails(array $dreams): string{
    $dreamOutput ='';
    foreach($dreams as $dream){
        $dreamOutput .="<h3>" . $dream['dream_title'] . "</h3>
        <h4>" . $dream['dream_or_nightmare'] . "</h4>
        <h4>" . $dream['dream_date'] . "</h4>
        <p>" . $dream['dream_description'] . 
        "</p>";
    } return $dreamOutput;
}
