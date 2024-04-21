<?php

// Зчитуємо результати з файлу
$results = file_get_contents('votes.txt');
$resultsArray = json_decode($results, true);

// Виводимо результати
echo '<h2>Результати голосування</h2>';
echo '<ul>';
foreach ($resultsArray as $option => $count) {
    echo '<li>' . $option . ': ' . $count . ' голосів</li>';
}
echo '</ul>';