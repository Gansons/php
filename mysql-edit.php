<?php

    $sadala = "PHP mysql";
    require "assets/header.php"; //drošāks ir require nekā include
    require "assets/db_preces.php";

    $sql = $savienojums->prepare("SELECT * FROM php1_preces WHERE prece_uuid = ?");
    $sql->bind_param("s", $_GET["id"]);
    $sql->execute();
    $prece = $sql->get_result()->fetch_assoc();

    if(!$prece){
        header("Location: mysql.php");
        exit;
    }
?>

<main>

    <table>
        <h3>Preces rediģēšanana: <?= $prece['prece_nosaukums']?></h3>
            <form method="POST">
                <label>Preces nosaukums:</label>
                <input type="text" name="prece" placeholder="Preces nosaukums" value="<?= $prece['prece_nosaukums']?>" required>
                <label>Skaits:</label>
                <input type="number" name="skaits" min="0" max="9999" placeholder="skaits" value="<?= $prece['prece_daudzums']?>" required>
                <label>cena:</label>
                <input type="number" name="cena" step="0.01" placeholder="Cena" value="<?= $prece['prece_cena']?>" required>
                <button type="submit" name="rediget">
                    Rediģēt
                </button>
            </form>

</main>
