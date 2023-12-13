<?php
    $vote = $_POST['vote'];

    $results = file_get_contents('votes.txt');
    $resultsArray = json_decode($results, true);
    $resultsArray[$vote] = isset($resultsArray[$vote]) ? $resultsArray[$vote] + 1 : 1;

    file_put_contents('votes.txt', json_encode($resultsArray));
    header('Location: results.php');

