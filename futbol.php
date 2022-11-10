<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Rozgrywki futbolowe</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <div id="baner">
            <h2>Światowe rozgrywki piłkarskie</h2>
            <img src="obraz1.jpg" alt="boisko">
        </div>

        <div id="mecze">
            <?php
                $polaczenie = mysqli_connect('localhost','root','','egzamin1');
                
                $zap = "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1='EVG'";
                $wynik = mysqli_query($polaczenie,$zap);
                while($wiersz=mysqli_fetch_array($wynik)){
                    $z1 = $wiersz['zespol1'];
                    $z2 = $wiersz['zespol2'];
                    $w = $wiersz['wynik'];
                    $d = $wiersz['data_rozgrywki'];
                    echo '<div class="mecz">';
                    echo "<h3>$z1 - $z2</h3>";
                    echo "<h4>$w</h4>";
                    echo "<p>w dniu: $d</p>";
                    echo "</div>";
                }
	        ?>
        </div>

        <div id="glowny">
            <h2>Reprezentacja Polski</h2>
        </div>

        <div id="lewy">
            <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
            
            <form action="futbol.php" method="POST">
			<input type="number" name="numer">
			<input type="submit" value="Sprawdź" name="submit">
		    </form>

            <?php
                if(!empty($_POST['numer']))
                {
                    $nr = $_POST['numer'];
                    $zap = "SELECT imie,nazwisko FROM zawodnik WHERE pozycja_id=$nr";
                    $wynik = mysqli_query($polaczenie,$zap);
                    while($wiersz=mysqli_fetch_array($wynik)){
                        $imie = $wiersz['imie'];
                        $naz = $wiersz['nazwisko'];
                        echo "<ul>";
                        echo "<li><p>$imie $naz</p></li>";
                        echo "</ul>";
                    }
                }
                mysqli_close($polaczenie);
	        ?>
        </div>
        
        <div id="prawy">
            <img src="zad1.png" alt="piłkarz">
            <p> Autor: 21321321312 </p>
        </div>

        <div id="cb"></div>
    </body>
</html>
