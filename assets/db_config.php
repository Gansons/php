<?php

    $serveris = "localhost"; //ja ir savienots ar serveri tad tiaki localhost, savādāk https saide 
    $lietotajs = "grobina1_gansons";
    //$lietotajs = "root";
    //$parole = "";
    $parole = "4OcGLQE5Kk8@";
    //$datubaze = "php_piemeros";
    $datubaze = "grobina1_gansons";

    $savienojums = mysqli_connect($serveris, $lietotajs, $parole, $datubaze);

    if(!$savienojums){

        die("Nav izveidots savienojums!");

    }else{

       # echo "Savienojums ir veigsmīgi izveidots!";
    }


?>