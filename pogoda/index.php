<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pogoda</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="headery">
    <header id="bloknaglowkowy1">
        <img src="slonce.png" alt="Slonecznie">
    </header>

    <header id="bloknaglowkowy2">
        <h1>Pogoda w Europie</h1>
    </header>
    </div>

    <main>
    <section id="left">
        <h2>Temperatury w lipcu</h2>

        <table>
        <tr><th>Miasto</th><th>Kraj</th><th>Temperatura</th><th>Pogoda</th></tr>

        <?php

            $polaczenie = mysqli_connect('localhost', 'root', '', 'pogoda');
            $zapytanie = mysqli_query( $polaczenie,'SELECT miejscowosc.nazwa, miejscowosc.kraj, pomiary.temperatura FROM miejscowosc JOIN pomiary ON miejscowosc.id = pomiary.id_miejscowosc WHERE pomiary.id_miesiac = 7');
            $obraz = '';
            while ($row = mysqli_fetch_assoc($zapytanie)) {
                if ($row['temperatura'] > 30) {
                    $obraz = 'slonce.png';
                } if ($row['temperatura'] < 26) {
                    $obraz = 'deszcz.png';
                } else {
                    $obraz = 'chmury.png';
                }

                echo '<tr><td>' . $row['nazwa'] . '</td><td>' . $row['kraj'] . '</td><td>' . $row['temperatura'] . '</td><td><img src="' . $obraz . '"></tr>';
            }
            


            mysqli_close($polaczenie);

        ?>





        </table>







    </section>

    <section id="right">
        <h2>Średnie temperatury w roku</h2>
        <a href="index.php?id=1">Styczeń</a>
        <a href="index.php?id=2">Luty</a>
        <a href="index.php?id=3">Marzec</a>
        <a href="index.php?id=4">Kwiecień</a>
        <a href="index.php?id=5">Maj</a>
        <a href="index.php?id=6">Czerwiec</a>
        <a href="index.php?id=7">Lipiec</a>
        <a href="index.php?id=8">Sierpień</a>
        <a href="index.php?id=9">Wrzeszeń</a>
        <a href="index.php?id=10">Październik</a>
        <a href="index.php?id=11">Listopad</a>
        <a href="index.php?id=12">Grudzień</a>
        
        <p>Średnia temperatura dla wybranego miesiąca wynosi</p>

        <?php
        $polaczenie = mysqli_connect('localhost', 'root', '', 'pogoda');
        $id = $_GET['id'];
        if ($id > 0) {
            $zapytanie = mysqli_query($polaczenie,"SELECT ROUND(AVG(temperatura), 2) AS temp FROM pomiary WHERE id_miesiac = $id;");
            $wynik = mysqli_fetch_assoc($zapytanie);
            echo "<h3>" . $wynik['temp'] . ' stopni </h3>';
        }

        mysqli_close($polaczenie);
        ?>

        
    </section>
    </main>

    <footer>
        <p>Numer zdającego: Oskar</p>
    </footer>
</body>
</html>