<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calculatrice ismail</title>
</head>
<body>
    <h2>Calculatrice </h2>
    <form method="post">
        <label>Nombre 1 : <input type="number" name="num1" step="any" required></label><br><br>
        <label>Nombre 2 : <input type="number" name="num2" step="any" required></label><br><br>
        <label>Opération :
            <select name="operation" required>
                <option value="add">Addition (+)</option>
                <option value="sub">Soustraction (-)</option>
                <option value="mul">Multiplication (×)</option>
                <option value="div">Division (÷)</option>
            </select>
        </label><br><br>
        <input type="submit" value="Calculer">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        $resultat = '';

        switch ($operation) {
            case 'add':
                $resultat = $num1 + $num2;
                $op = '+';
                break;
            case 'sub':
                $resultat = $num1 - $num2;
                $op = '-';
                break;
            case 'mul':
                $resultat = $num1 * $num2;
                $op = '×';
                break;
            case 'div':
                if ($num2 == 0) {
                    $resultat = "Erreur : Division par zéro impossible.";
                    $op = '÷';
                } else {
                    $resultat = $num1 / $num2;
                    $op = '÷';
                }
                break;
            default:
                $resultat = "Opération inconnue.";
                $op = '';
        }

        echo "<h3>Résultat :</h3>";
        if (is_numeric($resultat)) {
            echo "<p>$num1 $op $num2 = $resultat</p>";
        } else {
            echo "<p>$resultat</p>";
        }
    }
    ?>
</body>
</html>