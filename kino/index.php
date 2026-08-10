<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista aktorów | KinoTEKA</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <section id="bloknaglowkowy1">
            <a href="index.php"><h2>KinoTEKA</h2></a>
        </section>
        <section id="bloknaglowkowy2">
            <p><b>W naszej bazie znajdują się najlepsi aktorzy</b></p>
        </section> 
    </header>
    <main>
        <h1>Najlepsi aktorzy tylko w naszym kinie</h1>

        <section id="wszyscy_aktorzy">
        <?php
        $polaczenie = mysqli_connect("localhost", "root", "", "kino");

        $zapytanie3 = mysqli_query($polaczenie, "SELECT * FROM aktorzy ORDER BY nazwisko, imie ASC");

        while ($row = mysqli_fetch_assoc($zapytanie3)) {
            echo "<a href='aktor.php?id=" . $row['id_aktora'] . "'>";
            echo "<section class='pojedynczyaktor'>";
            echo "<img src='img/" . $row['plik_awatara'] . "' alt='" . $row['imie'] . " " . $row['nazwisko'] . "' title='" . $row['imie'] . " " . $row['nazwisko'] . "'>";
            echo "<p>" . $row['imie'] . " " . $row['nazwisko'] . "</p>";
            echo "</section>";
            echo "</a>";
        }

        mysqli_close($polaczenie);
        ?>
            
        </section>


    </main>
    <footer>
        <strong><p>Autor: Oskar</p></strong>
    </footer>
</body>
</html>