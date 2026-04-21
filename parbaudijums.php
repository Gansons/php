<?php

    $sadala = "PHP parbaudijums";
    require "assets/header.php"; //drošāks ir require nekā include

?>

<main>

    <h3>Kalkulators</h3>
    <p>Veic matemātisko aprēķinu atkarībā no atlasītās darbības:</p>
    <form method="POST">
        <input type="text" placeholder="skaitlis 1" name="sk_1" size="6" required>
        <select name="veids">
            <option value="plus" default>+</option>
            <option value="minus">-</option>
            <option value="reiz">*</option>
            <option value="dalits">/</option>
        </select>
        <input type="text" placeholder="skaitlis 2" name="sk_2" size="6" required>
        <input type="text" placeholder="Rezultāts" name="rezultats" size="6" disabled> //placeholder = ?php? uz ievada rezultāta objektu kas satur vērtību
        <button name="Aprekinat">Aprēķināt</button> <br>

        <?php
            function aprekinat($sk1, $sk2, $veids){
                $rezultats = 0;
                if($veids == "plus"){
                  $rezultats = $sk1 + $sk2;
                  echo $rezultats;
                    
                }elseif($veids == "minus"){
                  $rezultats = $sk1 - $sk2;
                  echo $rezultats;
                    
                    
                }elseif($veids == "reiz"){
                  $rezultats = $sk1 * $sk2;
                  echo $rezultats;
                   
                }else{
                   $rezultats = $sk1/$sk2;
                   echo $rezultats;
                }

                
            }


            if(isset($_POST["Aprekinat"])){ 
                $veids = $_POST["veids"];
                $sk1 = $_POST["sk_1"];
                $sk2 = $_POST["sk_2"];
                $rezultats = "rezultāts";

                if(empty($sk1) || empty($sk2)){
                    echo "<p>Ievadi visus skaitļus!</p>";
                }elseif(!is_numeric($sk1) || !is_numeric($sk2)){
                    echo "<p>Ievadi derīgu skaitli!</p>";
                } else {
                   aprekinat($sk1, $sk2, $veids);
                }
            }
        
        ?>
        
    </form>




    <h3>Pārbaude "Skaitlis intervālā"</h3>
    <p>Noskaidro vai skaitlis atrodas intervālā:</p>
    <form method="POST">
        <input type="text" placeholder="sakumpunkts" name="sakums" required>
        <input type="text" placeholder="Skaitlis" name="izveletais" required>
        <input type="text" placeholder="Beigupunkts" name="beigas" required>
        <button name="Aiziet">Aiziet!</button> <br>
    
    <?php
        function parbaudit($sakums, $beigas, $izv){
            if($izv >= $sakums && $izv <= $beigas){
                echo "Skaitlis $izv atrodas intervālā no $sakums līdz $beigas!";
            }else{
                echo "Skaitlis $izv neatrodas intervālā no $sakums līdz $beigas!";
            }
        }


    if(isset($_POST["Aiziet"])){
        $sakums = $_POST["sakums"];
        $izv = $_POST["izveletais"];
        $beigas = $_POST["beigas"];

        if($sakums > $beigas){
        echo "Sākumpunkts nevar būt lielāks par Beigupunktu!";
        }elseif($sakums == $beigas){
        echo "Sākumpunkts nevar būt vienāds ar Beigupunktu!";
        }elseif(empty($sakums) || empty($beigas) || is_null($izv)){
                    echo "Ievadi visus skaitļus!";
                }elseif(!is_numeric($sakums) || !is_numeric($beigas) || !is_numeric($izv)){
                    echo "<p>Ievadi derīgs skaitļus!</p>";
                } else {
                    parbaudit($sakums, $beigas, $izv);
                }
    }
    
    
    ?>

    </form>


    <h3>Temperatūras pārveidotājs:</h3>
    <p>Pārkonvertē temperatūru no <sup>o</sup>C uz <sup>o</sup>F, vai otrādi:</p>

    <form method="POST">
        <input type="text" placeholder="Temperatūra C" name="temp" required>
        <button class="fa-solid fa-left-right" name="vieniba"></button>
        <button name="parveidot">Pārveidot</button><br>



        <?php

            function konvertet($temp, $i){
                if($i == 0){
                    $konvertets = $temp*2 +30;
                    echo "<p>Konvertējot no $temp <sup>o</sup>C iegūsti: $konvertets <sup>o</sup>F</p>";
                }else{
                    $konvertets = $temp/2 -30;
                    echo "<p>$konvertets</p>";
                }
                
            }

        if(isset($_POST["parveidot"])){
            $temp = $_POST["temp"];
            $i = 0;
            if(isset($_POST["vieniba"])){ //nav
                $i++;
            }

            if(is_null($temp)){
                        echo "Ievadi skaitli!";
                    }elseif(!is_numeric($temp)){
                        echo "<p>Ievadi derīgu skaitli!</p>";
                    } else {
                        konvertet($temp, $i);
                    }
            }
                    
        ?>

    </form>

</main>
