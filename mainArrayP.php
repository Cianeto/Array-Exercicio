<!DOCTYPE html>
<html>
<head>
    <title>Adicionar String ao Array</title>
</head>
<body>
    <h2>Adicionar String ao Array</h2>

    <form method="post" action="">
        <label for="string">Digite uma string:</label>
        <input type="text" id="string" name="string" required><br><br>

        <input type="submit" value="Adicionar à Lista">
    </form>

    <?php
	session_start();
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém a string enviada pelo formulário
        $novaString = $_POST["string"];

        // Inicializa o array (vazio caso seja a primeira vez)
        $arrayStrings = [];

        // Verifica se o array já existe na sessão
        if (isset($_SESSION["arrayStrings"])) {
            // Se existir, atribui o valor atual para a variável
            $arrayStrings = $_SESSION["arrayStrings"];
        }

        // Adiciona a nova string ao array
        $arrayStrings[] = $novaString;

        // Armazena o array atualizado na sessão
        $_SESSION["arrayStrings"] = $arrayStrings;

        // Exibe o conteúdo do array
        echo "<h3>Lista de Strings:</h3>";
        echo "<ul>";
        foreach ($arrayStrings as $string) {
            echo "<li>" . htmlspecialchars($string) . "</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
