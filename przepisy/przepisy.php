<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog kulinarny</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<main>
    <section id="blokboczny">
        <a href="przepisy.php?id=1">Sernik</a><br>
        <a href="przepisy.php?id=2">Sałatka</a><br>
        <a href="przepisy.php?id=3">Pankejki</a><br>
        <a href="przepisy.php?id=4">Nugetsy</a><br>
        <a href="przepisy.php?id=5">Łosoś</a><br>
        <a href="przepisy.php?id=6">Kociołek</a><br>
        <a href="przepisy.php?id=7">Jagnięcina</a><br>
        <a href="przepisy.php?id=8">Hamburgery</a><br>
        <a href="przepisy.php?id=9">Eklerki</a><br>
        <a href="przepisy.php?id=10">Churros</a><br>
        <p>Autor: Oskar</p>
    </section>

    <section id="blokglowny">
        <h1>
            <?php
                $polaczenie = mysqli_connect("localhost", "root", "", "przepisy");
                $id = $_GET['id'] ?? 7;
                $zapytanie = mysqli_query($polaczenie, "SELECT p.nazwa, r.rodzaj FROM potrawy as p JOIN rodzaje as r ON p.idRodzaje = r.idRodzaje " . "where idPotrawy=" . $id . ";");

                $wynik = mysqli_fetch_assoc($zapytanie);
                echo $wynik['rodzaj'];

                

                mysqli_close($polaczenie);
            ?>
        </h1>
            <?php
                $polaczenie = mysqli_connect("localhost", "root", "", "przepisy");
                $id = $_GET['id'] ?? 7;
                $zapytanie = mysqli_query($polaczenie, "SELECT nazwa, trudnosc, kalorie FROM potrawy WHERE idPotrawy=" . $id . ";");
                $wynik = mysqli_fetch_assoc($zapytanie);
                $trudnosc = " ";
                if ($wynik['trudnosc'] == 1) {
                    $trudnosc = "łatwe";
                
                } elseif ($wynik['trudnosc'] == 2) {
                    $trudnosc = "średnie";
                

                } else {
                    $trudnosc = "trudne";
                }
                

                echo "<h2>" . $wynik['nazwa'] . "</h2>";
                echo "<p>Trudność: " . $trudnosc . ", Kalorie: " . $wynik['kalorie'] . "</p>";
                mysqli_close($polaczenie);

            ?>

        <img src="separator.png" alt="przepis">


            <?php
                $polaczenie = mysqli_connect("localhost", "root", "", "przepisy");
                $id = $_GET['id'];
                $zapytanie = mysqli_query($polaczenie, "SELECT alergeny.alergen FROM alergeny JOIN lista_alergenow ON lista_alergenow.idAlergeny = alergeny.idAlergeny JOIN potrawy ON potrawy.idPotrawy = lista_alergenow.idPotrawy WHERE potrawy.idPotrawy=" . $id . ";");
                echo "<p>Alergeny: ";

                while ($row = mysqli_fetch_assoc($zapytanie)) {
                    echo $row['alergen'] . " ";
                
                }
                echo "</p>";
                mysqli_close($polaczenie);

            
            ?>



        <h2>Składniki</h2>
        <ul>
            <li>Lorem 1 kg</li>
            <li>Ipsum 2 szt.</li>
            <li>Dolor 200 g</li>
            <li>Sit amet (szczypta)</li>
        </ul>
        <?php
            $polaczenie = mysqli_connect("localhost", "root", "", "przepisy");
            $id = $_GET['id'];
            $zapytanie = mysqli_query($polaczenie, "SELECT plik, przepis FROM potrawy WHERE idPotrawy = " . $id);
            $wynik = mysqli_fetch_assoc($zapytanie);
            $nazwa_obrazu = $wynik['plik'];
            $przepis = $wynik['przepis'];
            echo "<p>" . $przepis . "</p>";
            mysqli_close($polaczenie);
        ?>


    </section>






    <section id="bloksekcji" style="background-image: url('<?php echo $nazwa_obrazu; ?>');">
        <h1>Blog Kulinarny</h1>
    </section>
</main>
</body>
</html>