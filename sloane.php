<!DOCTYPE html>
<html>
<head>
    <title>Rumus A000124 of Sloane's OEIS</title>
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
        
        .output {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>A000124 of Sloane's OEIS</h2>
        <form action="" method="post">
            <label for="inputNumber">Input angka:</label>
            <input type="number" name="inputNumber" id="inputNumber" required>
            <button type="submit">Hitung</button>
        </form>
        <div class="output">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["inputNumber"])) {
                    $inputNumber = (int)$_POST["inputNumber"];
                    $output = calculateA000124($inputNumber);
                    echo "Output: " . implode("-", $output);
                }
            }

            function calculateA000124($n) {
                $result = [];
                $currentNumber = 1;
                for ($i = 1; $i <= $n; $i++) {
                    $result[] = $currentNumber;
                    $currentNumber += $i;
                }
                return $result;
            }
            ?>
        </div>
    </div>
</body>
</html>
