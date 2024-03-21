<!DOCTYPE html>
<html>
<head>
    <title>Hitung KDA</title>
    <style>
        .kda {
            width: 500px;
            border: 3px inset #008000;
            font-family: 'Nunito Sans', sans-serif;
            background-color: #98FB98;
            border-radius: 20px;
        }

        .yrkd {
            background-color: greenyellow;
            border-radius: 10px;
        }

        #kill, #death, #assist {
            border-radius: 9px;
            background-color: lawngreen;
        }
    </style>
</head>
<body>
    <?php
    $kill = $death = $assist = $kda = 0;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $kill = $_POST['kill'];
        $death = $_POST['death'];
        $assist = $_POST['assist'];

        if ($death > 0) {
            $kda = ($kill + $assist) / $death;
        }
    }

    $kdaPercentage = ($kda / 5) * 100; // Skala KDA hingga 5
    $message = "";

    if ($kdaPercentage > 99) {
        $message = "You surpassed 99% of the players in the world !!!!";
    } elseif ($kdaPercentage > 85) {
        $message = "You surpassed 85% of the players in the world !!!!";
    } elseif ($kdaPercentage > 65) {
        $message = "You surpassed 65% of the players in the world !!!!";
    } elseif ($kdaPercentage > 50) {
        $message = "You surpassed 50% of the players in the world !!!!";
    } else {
        $message = "?";
    }
    ?>

    <center>
        <div class="kda"><br><br><h2>How pro are you ?</h2><h5>This KDA calculator was made by @Jonathan</h5><br>
            <form method="post">
                <label for="kill">Total Kill: </label><br><br>
                <input type="number" name="kill" id="kill" required><br><br><br>

                <label for="death">Total Death: </label><br><br>
                <input type="number" name="death" id="death" required><br><br><br>

                <label for="assist">Total Assist: </label><br><br>
                <input type="number" name="assist" id="assist" required><br><br><br><br>

                <button type="submit" class="yrkd"><h4>Calculate</h4></button><br><br>
            </form>
            <div id="hasil">
                <?php
                echo "Kill: $kill<br>";
                echo "Death: $death<br>";
                echo "Assist: $assist<br>";
                echo "KDA: " . number_format($kda, 2) . "<br>";
                echo $message;
                ?>
            </div><br><br>
        </div>
    </center>
</body>
</html>