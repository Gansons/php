<?php

    $sadala = "PHP mysql";
    require "assets/header.php"; //drošāks ir require nekā include
    require "assets/db_preces.php";

?>

<main>

    <table>
        <tr>
            <th>ID</th>
            <th>Nosaukums</th>
            <th>Cena</th>
            <th>Daudzums</th>
            <th></th>
        </tr>
        <?php
            $sql = $savienojums->prepare("SELECT prece_id, prece_nosaukums, prece_cena, prece_daudzums, prece_uuid FROM php1_preces ORDER BY prece_id ASC");
            $sql ->execute();
            $preces = $sql->get_result();
            while($prece = $preces->fetch_assoc()):
        ?>
                <!--Aizsargā visus string datus no XSS uzbrukuma -->
        <tr>
            <td><?= $prece["prece_id"]?></td>
            <td><?= htmlspecialchars($prece["prece_nosaukums"])?></td> 
            <td><?= $prece["prece_cena"]?></td>
            <td><?= $prece["prece_daudzums"]?></td>
            <td>
                <a href="mysql-edit.php?id=<?= $prece["prece_uuid"]?>" class="btn">
                    <i class="fa-solid fa-pen"></i>
                </a>

                <form method="POST" class="form-button">
                    <button  type="submit" name="dzest" value="<?= $prece["prece_id"]?>">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>

            </td>
        </tr>


        <?php
        
            endwhile;
        ?>
    </table>

            <h3>Jaunas preces pievienošana:</h3>
            <form method="POST">
                <input type="text" name="prece" placeholder="Preces nosaukums" required>
                <input type="number" name="skaits" min="0" max="9999" placeholder="skaits" required>
                <input type="number" name="cena" step="0.01" placeholder="Cena" required>
                <button type="submit" name="pievienot">
                    <i class="fas fa-add"></i>
                </button>
            </form>



</main>
