<?php

    $sadala = "sakums php";
    require "assets/header.php"; //drošāks ir require nekā include

?>

<main>

<?php
    echo "<p>Sveika Pasaule!</p>";
    print "<p>Sveika Pasaule!</p>";

    $zinojums = "Teksts mainīgajā";
    //Vienas rindiņas kometārs
    #Vienas rindiņas komentārs
    /*
        Vairāku
        Rindiņu 
        Komentārs
    */

        $lietotjvards = "Gansons";
        $dzim_gads = 2008;
        $esosais_gads = date("Y"); //date("d.m.Y")


        echo '<p>Mans lietotājvārds: $lietotjvards</p>';
        echo "<p>Mans lietotājvārds: $lietotjvards</p>"; 
        echo '<p>Mans lietotājvārds: '.$lietotjvards.'</p>'; // konkatenācija

        $vecums = $esosais_gads - $dzim_gads;

        echo "<p>Šogad man ir/būs $vecums gadi.</p>";

        echo date("d.m.Y");
        
        define("Pi", 3.14259); //Konstante PHP valodai

        echo "<p>Definētā konstante ".round(Pi,2)."</p>";


        $teksts = "Es tagad mācos PHP valodu!"; //burts ar garumzīmi ir = 2 string vērtības
        echo var_dump($teksts);

        $skaitlis = 33.7878785;
        echo var_dump($skaitlis);

        echo strlen($teksts);

        echo "<p>Nejaušs skaitlis: ".rand(10, 100)."</p>";

        
?>

<br>
    <h3>Ievadlauka pārbaude: </h3>
    <form method="POST"> <!--  method (POST vai GET), action (fails, kurš veiks formas apstrādi) -->
        <input type="text" maxlength="10" name="ievade" require>
        <button type="submit" name="parbaudit">Pārbaudīt</button>
        <p>
            <?php
            
                if(isset($_POST["parbaudit"])){ // pārbauda vai poga ir nospiesta
                   $ievadlauks = $_POST["ievade"];
                    if(is_numeric($ievadlauks)){
                        echo "$ievadlauks ir skaitlis!";
                    }else if(empty($ievadlauks)){
                        echo "Ievadlauks ir tukšs";
                    }else{
                        echo "$ievadlauks ir teksts";
                    }
                }
            
            ?>
        </p>
    </form>

    <h3>Laika konvertēšana: </h3>
    <form method="POST"> <!--  method (POST vai GET), action (fails, kurš veiks formas apstrādi) -->
        <input type="text" maxlength="10" name="laika_ievade" require>
        <button type="submit" name="konvertet">Pārbaudīt</button>
        <p>
            <?php

                $sekundes = 0;
                $minutes = 0;
                $stundas = 0;

                if(isset($_POST["konvertet"])){ // pārbauda vai poga ir nospiesta
                   $sekundes = $_POST["laika_ievade"];
                   echo $sekundes." sekundes = ";
                    if(is_numeric($sekundes)){
                        $stundas = intdiv($sekundes, 3600);
                        $minutes = intdiv($sekundes %3600, 60);
                        $sekundes = $sekundes %60;

                        echo round($stundas).' stundas, '.round($minutes).' minūtes, '.round($sekundes).' sekundes';
                    }else{
                        echo "nestrādā!";
                    }
                }
            
            ?>
        </p>
    </form>

    <br>
    <h3>Šifrēšana / atšifrēšana:</h3>
    <?php
        $nesifrets_teksts = "2PT ir slikta grupa! :(";
        $atslega = "Shi!Ir!Ljoti!Laba!Atslega@765";

        $sifrets_teksts = openssl_encrypt($nesifrets_teksts, "AES-128-ECB", $atslega);
        $atsifrets_teksts = openssl_decrypt($sifrets_teksts, "AES-128-ECB", $atslega);

        echo "<p>Teksta šifrs: $sifrets_teksts</p>";
        echo "<p>Atsifrets teksts: $atsifrets_teksts</p>";

    ?>

    <br>

     <h3>teksta šifrs: </h3>
    <form method="POST"> <!--  method (POST vai GET), action (fails, kurš veiks formas apstrādi) -->
        <input type="text" maxlength="10" name="teksta_ievade" require>
        <button type="submit" name="sifret">Pārbaudīt</button>
        <p>
            <?php

            if(isset($_POST["sifret"])){ // pārbauda vai poga ir nospiesta
                   $teksts = $_POST["teksta_ievade"];
                   $atslega = "Shi!Ir!Ljoti!Laba!Atslega@765";
                    $sifr_teksts = openssl_encrypt($teksts, "AES-128-ECB", $atslega);

                        
                        echo "<p>Teksta šifrs: $sifr_teksts</p>";
                    
                       
                    }
                
            
            ?>
        </p>
    </form>

    <br>

    <h3>teksta atšifrs: </h3>
    <form method="POST"> <!--  method (POST vai GET), action (fails, kurš veiks formas apstrādi) -->
        <input type="text" maxlength="10" name="atsifrs_ievade" require>
        <button type="submit" name="atsifret">Pārbaudīt</button>
        <p>
            <?php

               
            if(isset($_POST["atsifret"])){ // pārbauda vai poga ir nospiesta
                   $teksts_ievade= $_POST["atsifrs_ievade"];
                   $atslega = "Shi!Ir!Ljoti!Laba!Atslega@765";
                    $teksts_atsifr = openssl_decrypt($teksts_ievade, "AES-128-ECB", $atslega);

                        
                        echo "<p>Teksta šifrs: $teksts_atsifr</p>";
                    
                       
                    }
            
            ?>
        </p>
    </form>



    
<!-- <p><?php echo $zinojums; ?>  1.variants</p> -->
<!-- <p><?= $zinojums; ?> 2.variants </p> -->
</main>
</body>
</html>