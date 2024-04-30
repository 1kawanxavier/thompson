<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = $_POST["peso"];

    function classificar_pacote($peso) {
        if ($peso <= 3) {
            return "Leve";
        } elseif ($peso <= 10) {
            return "Médio";
        } elseif ($peso <= 100) {
            return "Pesado";
        } else {
            return "Muito Pesado";
        }
    }

    $classificacao = classificar_pacote($peso);

    header("Location: ../../index.html?classificacao=" . urlencode($classificacao));
    exit; 
}
?>
