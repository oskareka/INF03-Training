<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacje o aktorze | KinoTEKA</title>
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
        <?php
// 1. Najpierw połączenie z bazą
            $polaczenie = mysqli_connect("localhost", "root", "", "kino");

// 2. Pobranie ID
            $id = $_GET['id'];

// 3. Wykonanie zapytania
            $zapytanie2 = mysqli_query($polaczenie, "SELECT imie, nazwisko, plik_awatara FROM aktorzy WHERE id_aktora = $id");

// 4. Pobranie wiersza
            $row = mysqli_fetch_assoc($zapytanie2);

// 5. Wyświetlenie
            if ($row) {
                echo "<section class='pojedynczyaktor'>";
                echo "<img src='img/" . $row['plik_awatara'] . "' alt='" . $row['imie'] . " " . $row['nazwisko'] . "' title='" . $row['imie'] . " " . $row['nazwisko'] . "'>";
                echo "<h1>" . $row['imie'] . " " . $row['nazwisko'] . "</h1>";
                echo "</section>";
            }

// 6. Zamknięcie połączenia
            mysqli_close($polaczenie);
            ?>
    </main>
    <footer>
        <strong><p>Autor: Oskar</p></strong>
    </footer>
</body>
</html>