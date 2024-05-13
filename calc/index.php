<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    <!-- using PHP for the form action gets the server address quickly
    however, you should always reference another php specific page for
    your actions that should be in a private folder -->
    <fieldset name ="my stupid calculator">
        <form action="<?php echo htmlspecialchars($_SERVER
        ["PHP_SELF"]); ?>" method="post">
            <input type="number" name="num01"
            placeholder="Number one" required>
            <select name="operator">
                <option value="add">+</option>
                <option value="subtract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
            </select>
            <input type="number" name="num02"
            placeholder="Number two" required>
            <button>Calculate</button>
    </form>
    </fieldset>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // using filter_input is a security measure to prevent code injection
        $num01 = filter_input(INPUT_POST, "num01",
        FILTER_SANITIZE_NUMBER_FLOAT);
        $num02 = filter_input(INPUT_POST, "num02",
        FILTER_SANITIZE_NUMBER_FLOAT);
        // the htmlspecialchars is to prevent code injection
        $operator = htmlspecialchars($_POST["operator"]);

        // Error handlers
        $errors = false;
        
        // check for empty inputs
        if (empty($num01) || empty($num02) || empty($operator)) {
            echo "<p class='calc-error'>
            Please fill in all fields!</p>";
            $errors = true;
        }

        if (!is_numeric($num01) || !is_numeric($num02)) {
            echo "<p class='calc-error'>
            Numbers only please! (decimals are OK)</p>";
            $errors = true;
        }

        if ($operator == "divide" && $num02 == 0) {
            echo "<p class='calc-error'>
            Can't divide by zero!</p>";
        }

        // Calculate if no errors

        if (!$errors) {
            $value = 0;
            switch ($operator) {
                case "add":
                    $value = $num01 + $num02;
                    break;
                case "subtract":
                    $value = $num01 - $num02;
                    break;
                case "multiply":
                    $value = $num01 * $num02;
                    break;
                case "divide":
                    $value = $num01 / $num02;
                    break;
                default:
                echo "<p class='calc-error'>
                SOMEHTING WENT HORRIBLY WRONG!</p>";
            }
            // Provide the result
            echo "<p class'calc-result'>Result = " . $value . "</p>";
        }
    }
    ?>
</body>

</html>