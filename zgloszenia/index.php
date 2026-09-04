<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZGŁOSZENIA</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header><h1>Zgłoszenia wydarzeń</h1></header>
    <main>
    <section id="left">
        <h2>Personel</h2>

        <form action="" method="POST">
            <label for="wybor"></label>
            <input type="radio" name="wybor" id="policjant" value="policjant" checked>Policjant</input>
            <input type="radio" name="wybor" id="ratownik" value="ratownik">Ratownik</input>
            <button type="submit" name="pokaz">Pokaż</button>
            

        </form>
        <table>
            <tr><th>Id</th><th>Imię</th><th>Nazwisko</th></tr>
            
            <?php
                $polaczenie = mysqli_connect("localhost", "root", "", "zgloszenia");
                $wybor = "policjant";
                if (isset($_POST['pokaz'])) {
                    $wybor = $_POST['wybor'];
                    $zapytanie = mysqli_query($polaczenie, "SELECT id, imie, nazwisko FROM personel WHERE status = '$wybor';");
                    echo "<h3> Wybrano opcję: " . $wybor;
                    while ($row = mysqli_fetch_assoc($zapytanie)) {
                        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['imie'] . "</td><td>" . $row['nazwisko'] . "</td></tr>";
                    }
                }
                mysqli_close($polaczenie);

            ?>
            
        </table>

    </section>
    <section id="right">
        <h2>Nowe Zgłoszenie</h2>
        <ol>
            <?php
                $polaczenie = mysqli_connect("localhost", "root", "", "zgloszenia");
                $zapytanie = mysqli_query($polaczenie, "SELECT id, nazwisko FROM personel WHERE id NOT IN (SELECT id_personel FROM rejestr GROUP BY id);");
                while ($row = mysqli_fetch_array($zapytanie)) {
                    echo "<li>" . $row['id'] . " " . $row['nazwisko'] . "</li>";
                }
                mysqli_close($polaczenie);
            ?>
        </ol>

        <form method="POST">
            <label for="id_osoby">Wybierz id osoby z listy: </label>
            <input type="number" name="numer" id="id_osoby"></input>
            <button type="submit" name="dodajzgloszenie">Dodaj zgłoszenie</button>
        </form>

        <?php
            $polaczenie = mysqli_connect("localhost", "root", "", "zgloszenia");
            if (isset($_POST['dodajzgloszenie'])) {
                $personel = $_POST['numer'];
                $zapytanie = mysqli_query($polaczenie, "INSERT INTO rejestr (data, id_personel, id_pojazd) VALUES ( CURRENT_DATE, '$personel', 14 );");
            }
            


            mysqli_close($polaczenie);
        ?>






    </seciton>
    </main>

    <footer>Stronę wykonał: Oskar</footer>
    
</body>
</html>