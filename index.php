<?php 

    require __DIR__ .'/vendor/autoload.php';
    $phrase = isset($_GET['text']) ? $_GET['text'] : 'football vs soccer';
    require __DIR__ . '/common.php';


    $phraseAnalyser = new Meminuygur\Analyzer\Analyzer();

    $phraseAnalyser->setPhrase($phrase);
    inc("index", [
        'phrase'    => $phrase,
        'stats'     => $phraseAnalyser,
    ]);






?>