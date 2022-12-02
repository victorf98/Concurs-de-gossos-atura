<?php
session_start();
require_once "bd_utils.php";

if (!isset($_SESSION["usuari"])) {
    header("Location: index.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="ca">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ADMIN - Concurs Internacional de Gossos d'Atura</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="wrapper medium">
            <header>ADMINISTRADOR - Concurs Internacional de Gossos d'Atura</header>
            <div class="admin">
                <div class="admin-row">
                    <h1> Resultat parcial: Fase 1 </h1>
                    <div class="gossos">
                        <img class="dog" alt="Musclo" title="Musclo 15%" src="img/g1.png">
                        <img class="dog" alt="Jingo" title="Jingo 45%" src="img/g2.png">
                        <img class="dog" alt="Xuia" title="Xuia 4%" src="img/g3.png">
                        <img class="dog" alt="Bruc" title="Bruc 3%" src="img/g4.png">
                        <img class="dog" alt="Mango" title="Mango 13%" src="img/g5.png">
                        <img class="dog" alt="Fluski" title="Fluski 12 %" src="img/g6.png">
                        <img class="dog" alt="Fonoll" title="Fonoll 5%" src="img/g7.png">
                        <img class="dog" alt="Swing" title="Swing 2%" src="img/g8.png">
                        <img class="dog eliminat" alt="Coloma" title="Coloma 1%" src="img/g9.png">
                    </div>
                </div>
                <div class="admin-row">
                    <h1> Nou usuari: </h1>
                    <form action="process_crear_admin.php" method="POST">
                        <input type="text" name="usuari" placeholder="Nom">
                        <input type="password" name="contrasenya" placeholder="Contrassenya">
                        <input type="submit" value="Crea usuari">
                    </form>
                </div>
                <div class="admin-row">
                    <h1> Fases: </h1>
                    <form class="fase-row" action="process_fase.php" method="POST">
                        Fase <input type="number" name="nFase" value="1" style="width: 3em">
                        del <input type="date" name="dataInici" value="<?php if(obtenirFase(1) != null) echo obtenirFase(1)["dataInici"]?>" placeholder="Inici">
                        al <input type="date" name="dataFi" value="<?php if(obtenirFase(1) != null) echo obtenirFase(1)["dataFi"]?>" placeholder="Fi">
                        <input type="submit" value="Modifica">
                    </form>

                    <form class="fase-row" action="process_fase.php" method="POST">
                        Fase <input type="number" name="nFase" value="2" style="width: 3em">
                        del <input type="date" name="dataInici"  value="<?php if(obtenirFase(2) != null)echo obtenirFase(2)["dataInici"]?>" placeholder="Inici">
                        al <input type="date" name="dataFi" value="<?php if(obtenirFase(2) != null)echo obtenirFase(2)["dataFi"]?>" placeholder="Fi">
                        <input type="submit" value="Modifica">
                    </form>

                    <form class="fase-row" action="process_fase.php" method="POST">
                        Fase <input type="number" name="nFase" value="3" style="width: 3em">
                        del <input type="date" name="dataInici"  value="<?php if(obtenirFase(3) != null)echo obtenirFase(3)["dataInici"]?>" placeholder="Inici">
                        al <input type="date" name="dataFi" value="<?php if(obtenirFase(3) != null)echo obtenirFase(3)["dataFi"]?>" placeholder="Fi">
                        <input type="submit" value="Modifica">
                    </form>

                    <form class="fase-row" action="process_fase.php" method="POST">
                        Fase <input type="number" name="nFase" value="4" style="width: 3em">
                        del <input type="date" name="dataInici"  value="<?php if(obtenirFase(4) != null)echo obtenirFase(4)["dataInici"]?>" placeholder="Inici">
                        al <input type="date" name="dataFi" value="<?php if(obtenirFase(4) != null)echo obtenirFase(4)["dataFi"]?>" placeholder="Fi">
                        <input type="submit" value="Modifica">
                    </form>

                    <form class="fase-row" action="process_fase.php" method="POST">
                        Fase <input type="number" name="nFase" value="5" style="width: 3em">
                        del <input type="date" name="dataInici"  value="<?php if(obtenirFase(5) != null)echo obtenirFase(5)["dataInici"]?>" placeholder="Inici">
                        al <input type="date" name="dataFi" value="<?php if(obtenirFase(5) != null)echo obtenirFase(5)["dataFi"]?>" placeholder="Fi">
                        <input type="submit" value="Modifica">
                    </form>

                    <form class="fase-row" action="process_fase.php" method="POST">
                        Fase <input type="number" name="nFase" value="6" style="width: 3em">
                        del <input type="date" name="dataInici"  value="<?php if(obtenirFase(6) != null)echo obtenirFase(6)["dataInici"]?>" placeholder="Inici">
                        al <input type="date" name="dataFi" value="<?php if(obtenirFase(6) != null)echo obtenirFase(6)["dataFi"]?>" placeholder="Fi">
                        <input type="submit" value="Modifica">
                    </form>

                    <form class="fase-row" action="process_fase.php" method="POST">
                        Fase <input type="number" name="nFase" value="7" style="width: 3em">
                        del <input type="date" name="dataInici"  value="<?php if(obtenirFase(7) != null)echo obtenirFase(7)["dataInici"]?>" placeholder="Inici">
                        al <input type="date" name="dataFi" value="<?php if(obtenirFase(7) != null)echo obtenirFase(7)["dataFi"]?>" placeholder="Fi">
                        <input type="submit" value="Modifica">
                    </form>

                    <form class="fase-row" action="process_fase.php" method="POST">
                        Fase <input type="number" name="nFase" value="8" style="width: 3em">
                        del <input type="date" name="dataInici"  value="<?php if(obtenirFase(8) != null)echo obtenirFase(8)["dataInici"]?>" placeholder="Inici">
                        al <input type="date" name="dataFi" value="<?php if(obtenirFase(8) != null)echo obtenirFase(8)["dataFi"]?>" placeholder="Fi">
                        <input type="submit" value="Modifica">
                    </form>

                </div>

                <div class="admin-row">
                    <h1> Concursants: </h1>
                    <form>
                        <input type="text" placeholder="Nom" value="Musclo">
                        <input type="text" placeholder="Imatge" value="img/g1.png">
                        <input type="text" placeholder="Amo" value="Joan Pere Arnau">
                        <input type="text" placeholder="Raça" value="Husky Siberià">
                        <input type="button" value="Modifica">
                    </form>

                    <form>
                        <input type="text" placeholder="Nom">
                        <input type="text" placeholder="Imatge">
                        <input type="text" placeholder="Amo">
                        <input type="text" placeholder="Raça">
                        <input type="button" value="Afegeix">
                    </form>
                </div>

                <div class="admin-row">
                    <h1> Altres operacions: </h1>
                    <form>
                        Esborra els vots de la fase
                        <input type="number" placeholder="Fase" value="">
                        <input type="button" value="Esborra">
                    </form>
                    <form>
                        Esborra tots els vots
                        <input type="button" value="Esborra">
                    </form>
                </div>
            </div>
        </div>

    </body>

    </html>
<?php
}
?>