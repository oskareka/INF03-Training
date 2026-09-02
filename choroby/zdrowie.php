<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wykaz chorób</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Informacja o chorobach w Polsce</h1>
    </header>
    <nav>
        <a href="https://szpitale.pl" target="_blank">Szpitale</a>
        <a href="https://www.przychodnie.pl" target="_blank">Przychodnie</a>
        <a href="https://www.nfz.gov.pl" target="_blank">NFZ</a>    
    </nav>


    <main>
    <section id="left">
        <h2>Choroby zakaźne</h2>
        <ol>
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'choroby');
                $zapytanie = mysqli_query($polaczenie, 'SELECT * from choroby where zakazna = "T" GROUP BY nazwa;');

                while ($row = mysqli_fetch_assoc($zapytanie)) {
                    
                    echo '<li>' . $row['nazwa'] . "</li>";
                }
                mysqli_close($polaczenie);
            ?>
        <ol>
    </section>
    <section id="right">
        <h2>Objawy chorób</h2>
        <form action="zdrowie.php" method="post">
            <select name="lista" id="lista">
                
                <?php
                    $polaczenie = mysqli_connect("localhost", "root", "", "choroby");
                    $zapytanie = mysqli_query($polaczenie, "SELECT id, nazwa FROM choroby;");
                    while ($row = mysqli_fetch_assoc($zapytanie)) {
                        echo '<option value="' . $row['id'] . '">' . $row['nazwa'] . '</option>';


                    }

                    mysqli_close($polaczenie);

                ?>
            </select>
            <button type="submit">Sprawdź</button>
        </form>
        <section id="wynik">
            <?php
            
                $polaczenie = mysqli_connect('localhost', 'root', '', 'choroby');
                $opcja = $_POST['lista'] ?? $opcja = 0;
                $zapytanie = mysqli_query($polaczenie, "SELECT objawy.nazwa FROM objawy JOIN choroby_objawy ON id_objawy = objawy.id JOIN choroby ON choroby.id = choroby_objawy.id_choroby WHERE choroby.id = $opcja;");
                while ($row = mysqli_fetch_assoc($zapytanie)) {
                    echo "<span> " . $row["nazwa"] . " </span>";
                } 
                
                mysqli_close($polaczenie);
            ?>
        </section>
    </section>
    </main>
    <footer><p>Strone opracowal: Oskar</p></footer>
    <img src="zdrowia.png" alt="Życzymy zdrowia!">
</body>
</html>


