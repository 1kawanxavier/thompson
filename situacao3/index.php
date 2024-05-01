<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Serviço de E-mail</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="components/css/index.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Pesquisa de Serviço de E-mail</h1>
        <form action="components/php/pesquisa.php" method="post">
            <div class="form-group">
                <label for="emails">Digite os endereços de e-mail (separados por vírgula):</label>
                <textarea class="form-control" name="emails" id="emails" rows="5" cols="50"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if (isset($_GET['salvo']) && $_GET['salvo'] == 'true') {
            echo '<div class="alert alert-success mt-3" role="alert">Os resultados foram salvos com sucesso!</div>';
            $jsonFile = 'email/resultados_pesquisa.json';
            if (file_exists($jsonFile)) {
                $jsonContent = json_decode(file_get_contents($jsonFile), true);
                echo '<div class="mt-3"><h3>Resultados:</h3><ul>';
                foreach ($jsonContent as $dominio => $quantidade) {
                    echo '<li><strong>' . $dominio . ':</strong> ' . $quantidade . ' e-mail(s)</li>';
                }
                echo '</ul></div>';
            } else {
                echo '<div class="alert alert-danger mt-3" role="alert">O arquivo JSON não foi encontrado.</div>';
            }
        } elseif (isset($_GET['erro']) && $_GET['erro'] == 'true') {
            echo '<div class="alert alert-danger mt-3" role="alert">Erro ao processar os dados. Por favor, tente novamente.</div>';
        }
        ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
