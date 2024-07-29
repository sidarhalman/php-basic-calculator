<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #888;
        }
    </style>
</head>
<body  >
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input  type="number" name="numOne" placeholder="number one">
        <select  name="operator" id="">
                <option value="add"> + </option>
                <option value="subtract"> - </option>
                <option value="multiply"> x </option>
                <option value="divide"> / </option>
        </select>
        <input  type="number" name="numTwo" placeholder="number two">
        <button> Calculate </button>
    </form>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numOne = filter_input(INPUT_POST, "numOne", FILTER_SANITIZE_NUMBER_FLOAT);
            $numTwo = filter_input(INPUT_POST, "numTwo", FILTER_SANITIZE_NUMBER_FLOAT);
            $operator = htmlspecialchars($_POST["operator"]);

            $error = false;

            if (empty($numOne) || empty($numTwo) ){
                echo "<p style='font:bold; color:red'>Fill in all fields!</p>";
                $error = true;
            }

            if (!is_numeric($numOne) or !is_numeric($numTwo)) {
                echo "<p style='font:bold; color:red'>Fill in all fields!</p>";
                $error = true;
            }
            if(!$error){
                $value = 0;
                switch ($operator) {
                    case "add":
                        $value = $numOne + $numTwo;
                        break;
                    case "subtract":
                        $value = $numOne - $numTwo;
                        break;
                    case "multiply":
                        $value = $numOne * $numTwo;
                        break;
                    case "divide":
                        $value = $numOne / $numTwo;
                        break;
                    default :
                   echo"<p style='font:bold; color:red'>Somethin ist wrong</p>";
                    
                }
                echo "<p style='font:bold; color:green'>". $value . "</p>";
            }
        }
    ?>
</body>
</html>






