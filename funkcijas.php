<?php

    $sadala = "PHP kontroles";
    require "assets/header.php"; //drošāks ir require nekā include

?>

<main>
    <?php
        function zinojums(){
            echo "<p>Sveika Pasaule</p>";
        }

        zinojums();
        zinojums();
        zinojums();
        zinojums();
        zinojums();


    ?>

    <h3>Funkcija ar parametriem:</h3>
    <?php
        function skoleni($vards, $uzvards, $kurss){
            echo "<p>$vards $uzvards mācās $kurss grupā.</p>";

        }

        skoleni("Intars","Voidkevičšs", "2BT");
        skoleni("Vektors","Krūms", "0.5PT");
        skoleni("Dans","Daniņs", "2GT");
        skoleni("Naidžels","Koks", "4BT");

    ?>

    <h3>Funkcija, kas atgriež vērtību:</h3>
    <?php
        function vid_aritm($masivs){
            $summa = array_sum($masivs);
            $skaits = count($masivs);
            return round(($summa / $skaits), 2);
        }
    ?>
    <p>Ievadi skaitļus savstarpēji atdalot tos ar komtu:</p>
    <form method="POST">
        <input type="text" name="skaitli">
        <button type="submit" name="aprekinat">Aprēķināt</button>
    <?php
        if(isset($_POST["aprekinat"])){
            $skaitli = $_POST["skaitli"];
            $masivs = explode(',', $skaitli);
            $rezultats = vid_aritm($masivs);
            echo "<p>Vidējais aritmētiskaits ir <b>$rezultats</b></p>";
        }
    ?>
    </form>
    
    

</main>
