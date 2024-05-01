<?php

function contarDominiosEmail($emails) {
    $dominios = [];
    $listaEmails = explode(",", $emails);

    foreach ($listaEmails as $email) {
        $email = trim($email);
        $dominio = explode("@", $email)[1];
        if (array_key_exists($dominio, $dominios)) {
            $dominios[$dominio]++;
        } else {
            $dominios[$dominio] = 1;
        }
    }

    arsort($dominios);
    return $dominios;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["emails"])) {
        $listaEmails = $_POST["emails"];
        $contagemDominios = contarDominiosEmail($listaEmails);
        
        $jsonFilename = 'resultados_pesquisa.json';
        $jsonFilePath = '../../email/' . $jsonFilename;
        file_put_contents($jsonFilePath, json_encode($contagemDominios));

        header("Location: ../../index.php?salvo=true");
        exit();
    } else {
        echo "Nenhum endereço de e-mail fornecido.";
    }
}
?>
