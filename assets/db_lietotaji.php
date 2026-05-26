 <?php
 
 
 
 if(isset($_POST["pievienot"])){
        $id = (int)$_POST["statuss"];
        $sql = $savienojums->prepare("UPDATE php1_lietotaji SET statuss = 1  WHERE lietotajs_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $sql->close();
        $_SESSION["pazinojums"] = "Lietotājs veiksmīgi apstiprināts!";
        header("Location: lietotaji.php");
        exit;

    }

  if(isset($_POST["noliegt"])){
        $id = (int)$_POST["statuss"];
        $sql = $savienojums->prepare("UPDATE php1_lietotaji SET statuss = 0 WHERE lietotajs_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $sql->close();
        $_SESSION["pazinojums"] = "Lietotājs noliegts!";
        header("Location: lietotaji.php");
        exit;

    }

    
    
    
    
    ?>