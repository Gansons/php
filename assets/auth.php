<?php
   session_start();
    require "db_config.php";
    if(isset($_POST["autentificeties"])){
        $lietotajvards = $_POST["lietotajs"];
        $parole = $_POST["parole"];

        $sql = $savienojums->prepare("SELECT lietotajvards, parole FROM php1_lietotaji WHERE lietotajvards = ? LIMIT 1");
        $sql->bind_param("s", $lietotajvards);
        $sql->execute();
        

        $rezultats = $sql->get_result();

        if($rezultats->num_rows === 1){
            $lietotajs = $rezultats->fetch_assoc();
            if(password_verify($parole, $lietotajs['parole'] )){
                $_SESSION['lietotajvards_HSID'] = $lietotajs['lietotajvards'];
                header("Location: mysql.php");
                exit;
            }
        }

        $sql->close();
        echo "Nepareizs lietotajvards vai parole!";
    }



    if(isset($_POST["registreties"])){
        $lietotajs = $_POST["reglietotajs"];
        $vards = $_POST["vards"];
        $uzvards = $_POST["uzvards"];
        $epasts = $_POST["epasts"];
        $parole = $_POST["parole1"];
        $parole2 = $_POST["parole2"];
        

        if(!$parole === $parole2){
        echo "Ievadītās paroles nesakrīt";
        $sql->close();
        }
        $hash_pas = password_hash($parole, PASSWORD_DEFAULT);

        $sql = $savienojums->prepare("INSERT INTO php1_lietotaji(lietotajvards, parole, vards, uzvards, epasts) VALUES (?,?,?,?,?)");
        
        $sql->bind_param("sssss", $lietotajs, $hash_pas, $vards, $uzvards, $epasts);
        $_SESSION["pazinojums"] = "Konts tikai pievienots!";
        $sql->execute();
        
        //saglaba cookie sesion paziņojumu
        header("Location: mysql.php");
        exit;
         $sql->close();
        }
       // echo "Lietotajvārds jau eksistē!";
    
?>