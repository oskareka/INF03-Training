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
        $zapytanie = mysqli_query($polaczenie, "SELECT id, nazwa FROM szczyty ORDER BY wysokosc DESC;");
    
        while ($row = mysqli_fetch_assoc($zapytanie)) {
            echo "<span><a href='szczyty.php?id=" . $row['id'] . "'>" . $row['nazwa'] . "</a></span>";
        }


        mysqli_close($polaczenie);
    ?>


</main>

<section id="bloksekcji">

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