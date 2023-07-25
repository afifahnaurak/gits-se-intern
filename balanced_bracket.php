<!DOCTYPE html>
<html>
<head>
    <title>Check Balanced Brackets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label, button {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"] {
            justify-content: center;
            align-items: center;
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px; 
        }

        input[type="text"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        button {
            cursor: pointer;
            background-color: #3385ff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #003d99;
        }

        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Check Balanced Brackets</h1>
        <form method="post">
            <label for="bracket_input">Input Brackets:</label>
            <input type="text" id="bracket_input" name="brackets" required>
            <button type="submit">Check</button>
        </form>
        <?php
        function isBalanced($input) {
            $stack = [];
            $openingBrackets = ['(', '{', '['];
            $closingBrackets = [')', '}', ']'];
            $bracketPairs = ['(' => ')', '{' => '}', '[' => ']'];
        
            for ($i = 0; $i < strlen($input); $i++) {
                $currentBracket = $input[$i];
        
                if (in_array($currentBracket, $openingBrackets)) {
                    array_push($stack, $currentBracket);
                } elseif (in_array($currentBracket, $closingBrackets)) {
                    if (empty($stack)) {
                        return "NO";
                    }
        
                    $lastBracket = array_pop($stack);
        
                    if ($bracketPairs[$lastBracket] !== $currentBracket) {
                        return "NO";
                    }
                }
            }
        
            return empty($stack) ? "YES" : "NO";
        }        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputBrackets = $_POST["brackets"];
            $result = isBalanced($inputBrackets);
        }
        ?>

        <?php if(isset($result)): ?>
        <div class="result">
            <p>Output: <?php echo $result; ?></p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
