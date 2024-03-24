<?php
$theme = $_GET["theme"] ?? "light"; //inicializacia premennej $theme; ak je $_GET["theme"] == null alebo neexistuje (nie je nastavena na dark), zadefinuje sa default == light
?>
<section style="background-color: <?php echo $theme === "dark" ? "#AEAEAE" : "#F7F7F7"; ?>;" class="container"> <!-- section tag ak $theme je nastavena na dark zmeni pozadie stranky z farby #F7F7F7(svetlejsi odtien) na farbu #AEAEAE(tmavsi dotien) -->
    <div class="row">
        <div class="col-100 text-center">
            <?php pridajPozdrav(); ?>
            <p><strong><em>Elit culpa id mollit irure sit. Ex ut et ea esse culpa officia ea incididunt elit velit veniam qui. Mollit deserunt culpa incididunt laborum commodo in culpa.</em></strong></p>
        </div>
    </div>
