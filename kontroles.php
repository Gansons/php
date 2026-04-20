<?php

    $sadala = "PHP kontroles";
    require "assets/header.php"; //drošāks ir require nekā include

?>
<html>
<body>
    


<main>
    <h3>Norādi gadalaiku:</h3>
    <form method="POST">

        <select name="gadalaiks">
        <option hidden>Izvēle</option>
        <option value="Pavasaris">Pavasaris</option>
        <option value="Vasara">Vasara</option>
        <option value="Rudens">Rudnes</option>
        <option value="Ziema">Ziema</option>
        </select>
        <button type="submit" name="apskatit">Apskatīt</button>
        <p>
            <?php
                if(isset($_POST["apskatit"])){
                    $gadalaiks = $_POST["gadalaiks"];
                    $gadalaiks = strtolower($gadalaiks );
                    switch($gadalaiks){
                        case "ziema":
                            echo "Sniegs, Augstums, Ziemassvētki &#10052;";
                            break;
                        case "pavasaris":
                                 echo "Putni dzied, pumpuri un lapas plaukst &#10047;";
                            break;
                        case "vasara":
                                 echo "Brīvdienas, karstums un saule &#9728;";
                        break;
                        case "rudens":
                                 echo "Rudens lapas, dubļi un lietus &#9730;";
                         break;
                         default:
                         echo "Gadalaiks nav atpazīts";
                    }
                }
            ?>
        </p>
    </form>

    <br>

    <h3>Šaha laukuma izveide:</h3>
    <table class="square">
        <?php
            for($rinda = 1; $rinda <= 8; $rinda++){
                echo "<tr>";
                            for($kolonna=1; $kolonna <=8; $kolonna++){
                                $kopa = $rinda + $kolonna;
                                if($kopa%2==0){
                                    echo "<td class='white'></td>";
                                }else{
                                     echo "<td class='black'></td>";
                                }
                            }

                 echo "</tr>";
            }
        ?>
    </table>

    <h3>Reizrēķina tabula:</h3>
    <table class="square">           
         <?php
            for($rinda = 1; $rinda <= 10; $rinda++){
                echo "<tr>";
                for($kolonna=1; $kolonna <=10; $kolonna++){
                 $reizinajums = $rinda * $kolonna;
                     echo "<td>$reizinajums</td>";
                  }
                 echo "</tr>";
            }
        ?>
    </table>

    <br>

    <h3>Kalendars:</h3>
    <?php
        $menesis = $_GET["month"] ??  date("n");
        $gads = $_GET["year"] ?? date("Y");

    ?>

    <form method="GET">
        <label>
            <label>Menesis:</label>
                <select name="month">
                    <?php
                    $skaits = 0;
                        $menesi = array("Janvāris", "Februāris","Marts","Aprilis","maijs","Junijs","Julijs","Augusts","Septembris","Oktobris","Novembris","Decembris");
                        for( $m = 1 ; $m<=12 ; $m++){
                            $selected = ($menesis == $m) ? "selected" : "";
                            echo "<option value='$m' $selected>$menesi[$skaits]</option>";
                            $skaits++;
                        }
                        
                    ?>
                </select>
            <label>Gads:
                 <select name="year">
                    <?php
                        for( $g = 2026 ; $g<=2030 ; $g++){
                            $selected = ($gads == $g) ? "selected" : "";
                            echo "<option value='$g' $selected >$g</option>";
                        }
                    ?>
                </select>

            </label>
        </label>
        <button type="submit">parādīt</button>
    </form>

    <table class="square">
        <tr>
            <th>P</th>
            <th>O</th>
            <th>T</th>
            <th>C</th>
            <th>P</th>
            <th>S</th>
            <th>Sv</th>
        </tr>
        <tr>
            <?php
                $diena = 1;
                $pirmais_datums = new DateTime("$gads-$menesis-01"); // 2026-04-01
                $diena_nedela = $pirmais_datums->format("N"); //trešdiena 3
                $dienas_menesi =  $pirmais_datums->format("t"); //30 dienas

                for($t = 1; $t< $diena_nedela; $t++){ //Izveido tukšān sūnas pirms mēneša sākuma
                    echo "<td></td>";
                }

                while($diena <= $dienas_menesi){
                    if($diena_nedela == 7 || $diena_nedela == 6){
                         echo "<td class ='red'>$diena</td>";
                    }else{
                        echo "<td>$diena</td>";
                    }
                    if($diena_nedela == 7 && $diena != $dienas_menesi ){
                        
                    echo "<tr></tr>";
                    $diena_nedela = 1;
                    }else{
                        $diena_nedela++;
                    }
                    $diena++;
                    
                }
            ?>
        </tr>
    </table>
        


        <?php
        $jautajumi = array(
            array(
                "jautajums" => "kurš ir garākais SDLC posms?",
                "atbildes"=> array("Plānošana","Izstrāde","Testēšana", "Uzturēšana"),
                "pareiza"=> 3 //pareizēsās atbildes indekss 0, 1, 2, 3 <---
            ),
             array(
                "jautajums" => "Kā visbiežāk nosūta datus no formas?",
                "atbildes"=> array("Ar POST","Ar GET","Ar PUT", "Ar DELETE"),
                "pareiza"=> 2 //pareizēsās atbildes indekss 0, 1, 2, 3 <---
            ),
             array(
                "jautajums" => "JavaScript ir tas pats, kas Java?",
                "atbildes"=> array("Jā","Nē"),
                "pareiza"=> 1 //pareizēsās atbildes indekss 0, 1, 2, 3 <---
            ),
             array(
                "jautajums" => "Kuru tagu izmanto HTML dokument galvenē?",
                "atbildes"=> array("&lt;title&gt;","&lt;header&gt;","&lt;main&gt;", "&lt;div&gt;"),
                "pareiza"=> 0 //pareizēsās atbildes indekss 0, 1, 2, 3 <---
            )
        );

        $kopa = count($jautajumi);

        ?>

            <h3>Viktorīna:</h3>
            <?php
                if(isset($_POST["iesniegt"])):
                    $punkti = 0;
                    foreach($jautajumi as $i => $j){
                        $atbilde = $_POST["atbilde_".$i] ?? -1;
                        if($atbilde == $j["pareiza"]){
                            $punkti++;
                        }
                    }
            ?>

            <p>
                <?php
                    if($punkti == $kopa){
                        echo "Noveicās, ieguvi visas atbildes pareizas $punkti no $kopa";
                    }elseif($punkti >= $kopa/2){
                        echo "Galīgi pavirši, tikai $punkti no $kopa";
                    }else{
                        echo "Ļoti slikti, pazemojams esi, ieguvi tikai $punkti no $kopa";
                    }
                ?>
            </p>

            <a href="" class="btn">Mēģināt velreiz</a>

            <?php
                else:
            ?>
            
                <form method="POST">
                            <?php
                            foreach($jautajumi as $i => $j):
                            ?>

                            <h4><?= ($i+1).". ".$j["jautajums"]; ?></h4>
                            <?php
                                foreach($j["atbildes"] as $atbildes_i=> $atbilde):
                            ?>
                            <label>
                                <input type="radio" name="atbilde_<?=$i?>" value="<?=$atbildes_i?>">
                                <?= $atbilde ?>
                            </label>

                             <?php
                            endforeach;
                            ?>

                             <?php
                            endforeach;
                            ?>
                            <br>
                            <button type="submit" name="iesniegt">Iesneigt</button>
                </form>

                <?php
                    endif;
                ?>
            

</main>
</body>
</html>