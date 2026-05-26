<?php
require "db_config.php";


if(isset($_POST["pievienot"])){
    $prece = $_POST["prece"];
    $skaits = (int)$_POST["skaits"];
    $cena = (double)$_POST["cena"];

    $sql = $savienojums->prepare("INSERT INTO php1_preces(prece_nosaukums, prece_cena, prece_daudzums) VALUES (?,?,?)"); //nedrosš variants būtu ievietot piem $prece, $skaits u.t.t.

    $sql->bind_param("sdi", $prece, $cena, $skaits); // s - string , d - double, i - int
    $sql->execute();
    $sql->close();
    $_SESSION["pazinojums"] = "Prece veiksmīgi pievienota!"; //saglaba cookie sesion paziņojumu
    header("Location: mysql.php");
    exit;
    }

    if(isset($_POST["dzest"])){
        $id = (int)$_POST["dzest"];
        $sql = $savienojums->prepare("DELETE FROM php1_preces WHERE prece_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $sql->close();
        $_SESSION["pazinojums"] = "Prece veiksmīgi dzēsta!";
        header("Location: mysql.php");
        exit;

    }


    if(isset($_POST["rediget"])){
    $id = $_GET["id"];
    $prece = $_POST["prece"];
    $skaits = (int)$_POST["skaits"];
    $cena = (double)$_POST["cena"];

    $sql = $savienojums->prepare("UPDATE php1_preces SET prece_nosaukums = ?, prece_daudzums = ?, prece_cena = ? WHERE prece_uuid = ?"); //nedrosš variants būtu ievietot piem $prece, $skaits u.t.t.

    $sql->bind_param("sids", $prece, $skaits, $cena, $id); // s - string , d - double, i - int
    $sql->execute();
    $sql->close();
    $_SESSION["pazinojums"] = "Prece veiksmīgi rediģēta!"; //saglaba cookie sesion paziņojumu
    header("Location: mysql.php");
    exit;
    }

?>