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
    
<h3>Uzmini skaitli</h3>
<form method="POST">
    <label>Minimālais skaitlis:</label>
    <input type="number" name="min" required><br><br>

    <label>Maksimālais skaitlis:</label>
    <input type="number" name="max" required><br><br>

    <label>Tavs minējums:</label>
    <input type="number" name="skaitlis" required><br><br>

    <button type="submit" name="minet">Minēt</button>

<?php
function guess_numb($min, $max, $minejums){
    $random = rand($min, $max);

    if($minejums == $random){
        echo "<p>Pareizi! Tu uzminēji skaitli!</p>";
    } else {
        echo "<p>Nepareizi. Pareizais skaitlis bija <b>$random</b></p>";
    }
}

if(isset($_POST["minet"])){
    $min = $_POST["min"];
    $max = $_POST["max"];
    $skaitlis = $_POST["skaitlis"];

    // Validācija
    if($min > $max){
        echo "<p>Minimālais skaitlis nevar būt lielāks par maksimālo!</p>";
    } elseif(!is_numeric($skaitlis)){
        echo "<p>Ievadi derīgu skaitli!</p>";
    } else {
        guess_numb($min, $max, $skaitlis);
    }
}
?>
</form>

<h3>Paroles pārbaude</h3>
<form method="POST">
    <label>Parole:</label>
    <input type="password" name="parole"><br><br>

    <label>Atkārtot paroli:</label>
    <input type="password" name="parole2"><br><br>

    <button type="submit" name="check">Pārbaudīt</button>

<?php
function parbaudit_paroli($p1, $p2){
    if($p1 === $p2){
        echo "<p>Paroles sakrīt!</p>";
    } else {
        echo "<p>Paroles nesakrīt!</p>";
    }
}

if(isset($_POST["check"])){
    $p1 = $_POST["parole"];
    $p2 = $_POST["parole2"];

    if(empty($p1) || empty($p2)){
        echo "<p>Ievadi abas paroles!</p>";
    } else {
        parbaudit_paroli($p1, $p2);
    }
}
?>



</form>

<h3>Sveiciens</h3>
<form method="POST">
    <label>Vārds:</label>
    <input type="text" name="vards"><br>

    <label>Uzvārds:</label>
    <input type="text" name="uzvards"><br>

    <label>Dzimums:</label>
    <select name="dzimums">
        <option value="virietis">Vīrietis</option>
        <option value="sieviete">Sieviete</option>
    </select><br>

    <button type="submit" name="sveikt">Sveikt</button>

<?php
function sveiciens($vards, $uzvards, $dzimums){
    if($dzimums == "virietis"){
        echo "<p>Labdien, varenais $vards $uzvards!</p>";
    } else {
        echo "<p>Labdien, varenā $vards $uzvards!</p>";
    }
}

if(isset($_POST["sveikt"])){
    $vards = $_POST["vards"];
    $uzvards = $_POST["uzvards"];
    $dzimums = $_POST["dzimums"];

    if(empty($vards)){
        echo "<p>Ievadi vārdu!</p>";
    } else {
        sveiciens($vards, $uzvards, $dzimums);
    }
}
?>
</form>


</main>
