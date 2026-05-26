<?php
    session_start();  //ļauj uzsākt session cookie izvadi 
    //Šeit būs drošības pārbaude lietotāja autentifikācijai

    if(!isset($_SESSION["lietotajvards_HSID"])){
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP valoda - </title>
    <link rel="stylesheet" href="assets/style.css?v=0.1">
    <script src="assets/script.js?v=1.0" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <?php
    if(isset($_SESSION['pazinojums'])){
        echo "<div class='notification'>{$_SESSION['pazinojums']}</div>";
        unset($_SESSION['pazinojums']); //Uzreiz pēc attēlošanas - dzēšam!
    }
    ?>

    <header>
        <i class="fa-solid fa-bars menu-toggle"></i>
        <p>Nosaukums</p>
        <a href="logout.php" class="btn">
            <?= $_SESSION["lietotajvards_HSID"] ?>
            <i class="fa-solid fa-power-off"></i>
        </a>
    </header>

    <aside>
        <div class="aside-header">
            <h1>PHP piemēros</h1>
            <i class="fa-solid fa-xmark aside-close"></i>
        </div>

        <nav>
            <a href="./">Ievads PHP</a>
            <a href="masivi.php">PHP masīvi</a>
            <a href="kontroles.php">PHP kontroles struktūras</a>
            <a href="funkcijas.php">PHP funkcijas</a>
            <a href="parbaudijums.php">PHP pārbaudījums</a>
            <a href="mysql.php">PHP un MySQL</a>
            <a href="lietotaji.php">Lietotāji</a>
        </nav>
    </aside>

    <main>
</body>
</html>