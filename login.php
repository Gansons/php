

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>autentifikācijai sistēmā</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <div  id="Login" class="login">
            <div class="title">Autentificēties sistēmā</div>
            <div class="info">
                <?php
                   require "assets/auth.php";
                ?>
            </div>

            <form  method="POST">
                
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" name="lietotajs", placeholder="Lietotajvards" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="parole", placeholder="Parole" required>
                </div>
                <div class="row">
                    <button type="submit" name="autentificeties">Autentificēties</button>
                </div>
                <div class="register">
                    Neesi lietotājs? <a href="#CreateAccount" id="linkCreateAccount">Reģistrējies!</a>
                </div>
            </form>
         </div>

        <div id="Login" class="login" >
            <div class="login--hidden"  id="CreateAccount" >
                <div class="title">Reģistrēties sistēmā</div>
                <div class="info">
                    <?php
                    require "assets/auth.php";
                    ?>
                </div>

                <form   method="POST">
                    
                    <div class="row">
                        <i class="fas fa-user"></i>
                        <input type="text" name="reglietotajs", placeholder="Lietotajvards" required>
                    </div>

                    <div class="row">
                        <i class="fa-solid fa-circle-user"></i>
                        <input type="text" name="vards", placeholder="Vārds" required>
                    </div>

                    <div class="row">
                        <i class="fa-solid fa-circle-user"></i>
                        <input type="text" name="uzvards", placeholder="Uzvārds" required>
                    </div>

                    <div class="row">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" name="epasts", placeholder="E-pasts" required>
                    </div>

                    <div class="row">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="parole1", placeholder="Parole" required>
                    </div>

                    <div class="row">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="parole2", placeholder="Parole (atkārtoti)" required>
                    </div>

                    <div class="row">
                        <button type="submit" name="registreties">Reģistrēties</button>
                    </div>

                    <div class="register">
                        Esi jau lietotājs? <a  href="#ChangeLogin" id="linkLogin">Ielogojies!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

            document.addEventListener("DOMContentLoaded", function() {
        var create = document.getElementById("linkCreateAccount");
        var haveAcc = document.getElementById("linkLogin");
        var formLogin = document.getElementById("Login");
        var formCreateAcc = document.getElementById("CreateAccount");

        create.addEventListener("click", function(e) {
            e.preventDefault();

            hide(formLogin);
            show(formCreateAcc);
        });

        haveAcc.addEventListener("click", function(e) {
            e.preventDefault();

            show(formLogin);
            hide(formCreateAcc);
        });
        });

        function hide(elem) {
            elem.classList.add("login--hidden");
            elem.classList.remove("login--unhidden");
        }

        function show(elem) {
        elem.classList.add("login--unhidden");
        elem.classList.remove("login--hidden");
        }
    </script>
</body>
</html>