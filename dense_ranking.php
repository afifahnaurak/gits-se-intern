<!DOCTYPE html>
<html>
<head>
    <title>Dense Ranking</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Dense Ranking</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="player_scores">Daftar Skor Pemain (pisahkan dengan spasi):</label><br>
            <input type="text" id="player_scores" name="player_scores" value="<?php echo isset($_POST['player_scores']) ? $_POST['player_scores'] : ''; ?>"><br>

            <label for="gits_scores">Skor GITS (pisahkan dengan spasi):</label><br>
            <input type="text" id="gits_scores" name="gits_scores" value="<?php echo isset($_POST['gits_scores']) ? $_POST['gits_scores'] : ''; ?>"><br>

            <button type="submit">Hitung Peringkat</button>
        </form>

        <?php
        function denseRanking($playerScores, $gitsScores) {
            $allScores = array_merge($playerScores, $gitsScores);
            
            rsort($allScores);
            
            $ranks = array_combine($allScores, array_fill(0, count($allScores), 0));
            
            $rank = 1;
            foreach ($ranks as &$value) {
                $value = $rank++;
            }
            
            $gitsRanks = [];
            foreach ($gitsScores as $gitsScore) {
                $gitsRanks[] = $ranks[$gitsScore];
            }
            
            return $gitsRanks;
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['player_scores']) && isset($_POST['gits_scores'])) {
                $playerScores = array_map('intval', explode(' ', $_POST['player_scores']));
                $gitsScores = array_map('intval', explode(' ', $_POST['gits_scores']));

                $result = denseRanking($playerScores, $gitsScores);
                
                echo "<p>Hasil peringkat GITS:</p>";
                echo "<p>" . implode(' ', $result) . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>
