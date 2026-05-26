<?php

    $sadala = "Lietotaji";
    require "assets/header.php"; //drošāks ir require nekā include
    require "assets/db_config.php";
    require "assets/db_lietotaji.php";

?>
<main>
<table>
        <tr>
            <th>ID</th>
            <th>lietotajvards</th>
            <th>vards</th>
            <th>uzvards</th>
            <th>e-pasts</th>
            <th>statuss</th>
            <th></th>
        </tr>
        <?php
            $sql = $savienojums->prepare("SELECT lietotajs_id, lietotajvards, vards, uzvards, epasts, statuss FROM php1_lietotaji ORDER BY lietotajs_id ASC");
            $sql ->execute();
            $lietotajs = $sql->get_result();
            while($lietotaji = $lietotajs->fetch_assoc()):
        ?>
                <!--Aizsargā visus string datus no XSS uzbrukuma -->
        <tr>
            <td><?= $lietotaji["lietotajs_id"]?></td> 
            <td><?= $lietotaji["lietotajvards"]?></td>
            <td><?= $lietotaji["vards"]?></td>
            <td><?= $lietotaji["uzvards"]?></td>
            <td><?= $lietotaji["epasts"]?></td>
            <td><?php if($lietotaji["statuss"] == 1){
                echo "Apstiprināts";
            }else{
                echo "Neapstiprināts";
            }?></td>
            <td>
                <form method="POST" >
                    <button  type="submit" name="pievienot"  value="<?= $lietotaji["lietotajs_id"]?>">
                        <i class="fa-solid fa-check"></i>
                    </button>
                   
                </form>
                <form method="POST" >
                     <button type="submit"  name="noliegt"  value="<?= $lietotaji["lietotajs_id"]?>">
                       <i class="fa-solid fa-minus"></i>
                    </button>
                </form>

            </td>
        </tr>

        <?php
            endwhile;
        ?>

    </table>

    
</main>