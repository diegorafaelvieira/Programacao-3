<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Exercicio 3</title>
</head>
<body>
    <h2>Estados</h2>
    <form action="exercicio3.php" method="POST">
        <select name="estados[]" size="7" multiple="multiple">
            <option value="RS">RS</option>
            <option value="SC">SC</option>
            <option value="PR">PR</option>
            <option value="SP">SP</option>
            <option value="RJ">RJ</option>
            <option value="MG">MG</option>
            <option value="ES">ES</option>
        </select>
        <input type="submit" value="Enviar"  />
    </form>

    <?php
        if(!empty($_POST['estados'])) {
            foreach ($_POST['estados'] as $est) {
                echo $est. '<br>';
            }
        }
    ?>
</body>
</html>