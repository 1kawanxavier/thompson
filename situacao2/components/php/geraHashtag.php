<?php

function gerarHashtags($frase) {
    $formatted = str_replace(' ', '', ucwords(strtolower($frase)));

    $formatted = str_replace(['Não', 'nao', 'não', 'Nao'], '', $formatted);

    $hashtags = [
        '#' . $formatted, 
        '#' . strtolower($formatted), 
        '#' . str_replace([' ', 'Não', 'nao', 'não', 'Nao'], '', $frase), 
        '#' . preg_replace('/\s+/', '', $frase), 
        '#' . preg_replace('/[^A-Za-z0-9]/', '', $formatted), 
    ];

    return $hashtags;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frase = $_POST["frase"];
    $hashtags = gerarHashtags($frase);
    
    echo "<h2>Hashtags geradas:</h2>";
    echo "<ul>";
    for ($i = 0; $i < 3; $i++) {
        echo "<p class='hashtag'>{$hashtags[$i]}</p><br>";
    }
    echo "</ul>";
}
?>
