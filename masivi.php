<?php

    $sadala = "PHP masivi";
    require "assets/header.php"; //drošāks ir require nekā include

?>

<main>
    <?php

        $komponentes = array("procesors","māresplate","videokarte","operatīvā atmiņa","barošanas bloks","patstāvīgā atmiņa");
       // echo "<p>Datorā esošie dati glabājas kompenentē, ko sauc par <b>$kompenentes[5]</b></p>";
        //var_dump($komponentes);

        $koki = array(
            array("Priede","skujkoks"),
            array("Kļava","lapukoks"),
            array("Egle","skujkoks")
            );

            //1. variants:

            echo "<p>*) ".$koki[0][0]." ir koks, kas skaitās ".$koki[0][1]."</p>";
            echo "<p>*) ".$koki[1][0]." ir koks, kas skaitās ".$koki[1][1]."</p>";
            echo "<p>*) ".$koki[2][0]." ir koks, kas skaitās ".$koki[2][1]."</p><br>";

            //2. variants:
            foreach($koki as $koks){
                echo "<p>*) ".$koks[0]." ir koks, kas skaitās ".$koks[1]."</p>";
            };

            $skoleni = array(
                array("vards"=>"Jānis","uzvards"=>"Ozoliņš","telefons"=>29876722),
                array("vards"=>"Pēters","uzvards"=>"Krūms","telefons"=>23432532),
                array("vards"=>"Intars","uzvards"=>"Voitkevičs","telefons"=>12232323),
                array("vards"=>"Naidžels","uzvards"=>"Šenvalds","telefons"=>32131323),
                array("vards"=>"Jānis pirmais","uzvards"=>"Jāniņš","telefons"=>45353433),
                array("vards"=>"Jānis otrais","uzvards"=>"Ozols","telefons"=>55555545),
            );


            echo "<table>
                <tr>
                    <th>Vārds</th>
                    <th>Uzvārds</th>
                    <th>Tālrunis</th>
                </tr>    
            ";

            foreach($skoleni as $skolens){
                 echo "
                <tr>
                    <td>".$skolens['vards']."</td>
                    <td>".$skolens['uzvards']."</td>
                    <td>".$skolens['telefons']."</td>
                </tr>    
            ";
            }
    ?>

    <?php
          foreach($skoleni as $skolens){
                 echo "
                <div class='box'>
                    ".$skolens['vards']." ".$skolens['uzvards']."<br>
                    <small>".$skolens['telefons']."</small>
                </div>    
            ";
            }
    ?>

    <hr>
    <h2>Patstāvīgais darbs</h2>

    <h4>1.Uzdevums:</h4>
    <?php

        $a = array(7,8,9,10,11,12,13,14,15);

        echo $a[7];

    ?>

    <h4>2.Uzdevums:</h4>
    <?php
    
        $b = array("viens" => 1, "divi" => 2, "trīs" => 3, "četri" => 4, "pieci" => 5);

            echo $b["trīs"];

    ?>

    <h4>3.Uzdevums:</h4>
    <?php
        $skaitli = [1, 2, 3, 4, 5, 6];
        $skaitli [] = 7;
        echo $skaitli[6];

    ?>

    <h4>4.Uzdevums:</h4>
    <?php
        $divdimensiju[1][] = "viens";
        $divdimensiju[1][] = "divi";
        $divdimensiju[1][] = "trīs";
        $divdimensiju[2][] = "četri";
        $divdimensiju[2][] = "pieci";
        $divdimensiju[2][] = "seši";

        echo $divdimensiju[1][2]."<br>";
        echo $divdimensiju[2][1];


    ?>

    <h4>5.Uzdevums:</h4>
    <?php

    $augusts = array();

    for($i=0;$i<=10;$i++){
        $augusts[$i] = rand(15, 30);
    }

    rsort($augusts);

    foreach($augusts as $value){
        
        echo "<p>".$value."</p>";
    }


        
    ?>

    <h4>6.Uzdevums:</h4>
    <?php
    


    ?>

    <h4>7.Uzdevums:</h4>
    <?php
    
    ?>


</main>
