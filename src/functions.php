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

function santitizeDreamInput(array $newDream): array {

    $dreamTitle = $newDream['dream_title'];
    $dreamType = $newDream['dream_or_nightmare'];
    $dreamDescription = $newDream['dream_description'];
    $dreamDateTotal = $newDream['dream_date'];

    $sanitizedDreamTitle = trim($dreamTitle);
    $sanitizedDreamDescription = trim($dreamDescription);
    $sanitizedDateTotal = filter_var($dreamDateTotal, FILTER_SANITIZE_NUMBER_INT);
    
    $returnArray = [
        'dream_title' => $sanitizedDreamTitle,
        'dream_or_nightmare' => $dreamType,
        'dream_description' => $sanitizedDreamDescription,
        'dream_date' => $sanitizedDateTotal
    ];

    return $returnArray;
}

function validateDreamInput(array $newSanitizedDream): array {
    
    $dreamTitle = $newSanitizedDream['dream_title'];
    $dreamType = $newSanitizedDream['dream_or_nightmare'];
    $dreamDescription = $newSanitizedDream['dream_description'];
    $dreamDateTotal = $newSanitizedDream['dream_date'];

    $dreamYear = substr($dreamDateTotal,0,4); 
    $dreamMonth = substr($dreamDateTotal,5,2); 
    $dreamDay = substr($dreamDateTotal,8,2);

    $validateDreamTypeArray = ['Dream', 'Nightmare', 'Dream/Nightmare'];
    $validatedDreamOrNightmare = in_array($dreamType, $validateDreamTypeArray);
    $validateDreamDate = checkdate($dreamMonth, $dreamDay, $dreamYear);
    

    if ($validatedDreamOrNightmare && $validatedDreamOrNightmare && $dreamYear <= date("Y")) {
        $returnArray = [
            'dream_title' => $dreamTitle,
            'dream_or_nightmare' => $dreamType,
            'dream_description' => $dreamDescription,
            'dream_date' => $dreamDateTotal
        ];
        return $returnArray;
    } else {
        throw new Exception ('Validation failure - invalid data used');
    }
}

function displayDreamsForDelete(array $dreams): string {
    $dreamOutput ='';
    $dreamsReversedChronologically = array_reverse($dreams);
    foreach($dreamsReversedChronologically as $dream) {

        if(array_key_exists('dream_title', $dream) 
        && array_key_exists('dream_or_nightmare', $dream) 
        && array_key_exists('dream_date', $dream) 
        && array_key_exists('dream_description', $dream)
        && array_key_exists('id', $dream)) {

            $dreamOutput .="<div class=\"box-div\">"
            . "<h3>" . $dream['dream_title'] . "</h3>"
            . "<p>" . $dream['dream_date'] . "</p>"
            . "<div>"
            . "<label for=\"" . $dream['id'] . "\">Delete?</label>"
            . "<input type=\"checkbox\" id=\"" . $dream['id'] . "\" name=\"" . $dream['id'] . "\">"
            . "</div></div>";

        } else {
            throw new Exception('Invalid array keys');
        }
    }
    return $dreamOutput;    
}

