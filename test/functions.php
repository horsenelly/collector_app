<?php
require 'src/functions.php';

use PHPUnit\Framework\TestCase;

class functions extends TestCase
{
    public function testDisplayDreamDetails ()
    {
        $array = [
            [
                'dream_title'=>'Finding nemo',
                'dream_or_nightmare'=>'Nightmare',
                'dream_description'=>'I was nemo, and no-one could find me!',
                'dream_date'=>'2023-01-01'
            ],
            [
                'dream_title'=>'Forrest Gump',
                'dream_or_nightmare'=>'Dream',
                'dream_description'=>'I just kept on running...',
                'dream_date'=>'1990-01-01'
            ]
        ];
        $expectedOutput = "<h3>Forrest Gump</h3>"
        . "<p>Dream</p>"
        . "<p>1990-01-01</p>"
        . "<p>I just kept on running...</p>"
        . "<h3>Finding nemo</h3>"
        . "<p>Nightmare</p>"
        . "<p>2023-01-01</p>"
        . "<p>I was nemo, and no-one could find me!</p>";
        $actualOutput = displayDreamDetails($array);
        $this->assertEquals($expectedOutput,$actualOutput);
    }


public function testFailureIncorrectArrayKeys() 
    {
        $array = [
            ['jacket_potato'=>'yummy'], 
            ['lasagne'=>'yummier']
        ];
        $this->expectException(Exception::class);
        displayDreamDetails($array);
    }


public function testSuccessDisplayDreamDetailsDelete ()
{
    $array = [
        [
            'dream_title'=>'Finding nemo',
            'dream_date'=>'2023-01-01',
            'id'=>'1',
            'dream_description'=>'Finding the little fish!',
            'dream_or_nightmare'=>'Nightmare'

        ],
        [
            'dream_title'=>'Forrest Gump',
            'dream_date'=>'1990-01-01',
            'id'=>'2',
            'dream_description'=>'Run Forrest Run!',
            'dream_or_nightmare'=>'Dream'
        ]
    ];
    $expectedOutput = "<div class=\"box-div\">"
    . "<h3>Forrest Gump</h3>"
    . "<p>1990-01-01</p>"
    . "<div>"
    . "<label for=\"2\">Delete?</label>"
    . "<input type=\"checkbox\" id=\"2\" name=\"2\">"
    . "</div></div>"
    ."<div class=\"box-div\">"
    . "<h3>Finding nemo</h3>"
    . "<p>2023-01-01</p>"
    . "<div>"
    . "<label for=\"1\">Delete?</label>"
    . "<input type=\"checkbox\" id=\"1\" name=\"1\">"
    . "</div></div>";
    $actualOutput = displayDreamsForDelete($array);
    $this->assertEquals($expectedOutput,$actualOutput);
}

public function testFailureDisplayDreamsForDelete() 
    {
        $array = [
            ['jacket_potato'=>'yummy'], 
            ['lasagne'=>'yummier']
        ];
        $this->expectException(Exception::class);
        displayDreamsForDelete($array);
    }
}

