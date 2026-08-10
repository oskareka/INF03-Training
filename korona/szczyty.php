<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korona gór polskich</title>
    <link rel="stylesheet" href="styl.css">
    
</head>
<body>

<header>
<section id="bloknaglowkowy1">    
    <img src="logo.png" alt="Logo">
</section>
<section id="bloknaglowkowy2">
    <h1>Korona Gór Polskich</h1>
</section>
</header>

<main>
    <?php
        $polaczenie = mysqli_connect("localhost", "root", "", "korona");
        $id = $_GET['id'];
        $zapytanie = mysqli_query($polaczenie, "SELECT s.plik, s.nazwa, s.wysokosc, s.pasmo, o.opis FROM szczyty AS s JOIN opis AS o ON s.id = o.id WHERE s.id =" . $id  . ";" );
        $wynik = mysqli_fetch_assoc($zapytanie);
        echo "<img src='" . $wynik['plik'] . "'>";
        echo "<h2>" . $wynik['nazwa'] . "</h2>";
        echo "<h3>wysokość: " . $wynik['wysokosc'] . " metrów n.p.m</h3>";
        echo "<h3>pasmo górskie: ". $wynik['pasmo'] . "</h3>";
        echo "<p>" . $wynik['opis'] . "</p>";

        mysqli_close($polaczenie);
        ?>
</main>

<section>
    <?php
        $polaczenie = mysqli_connect("localhost", "root", "", "korona");
        $zapytanie = mysqli_query($polaczenie, "SELECT plik, nazwa FROM szczyty LIMIT 10;");
    
        while ($row = mysqli_fetch_assoc($zapytanie)) {
            echo " <img class='miniatury' src=' " . $row['plik'] . "' alt='" . $row['nazwa'] . "'>"; 
        }

        mysqli_close($polaczenie);
    ?>
</section>

<footer>
<section  id="blokstopki1">
<h3>Kontakt</h3>
<ul>
    <li>Zadzwoń do nas: 111 222 333</li>
    <li><a href="mailto:korona@gory.pl">Napisz do nas</a></li>
</ul>
</section>

<section  id="blokstopki1">
    <h3>&copy; Wykonane przez: Oskar</h3>
</section>
</footer>

</body>
</html>