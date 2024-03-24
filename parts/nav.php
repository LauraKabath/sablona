<?php
include_once "parts/functions.php";
$menu = getMenuData("header");
$theme = $_GET["theme"] ?? "light"; //inicializacia premennej $theme; ak je $_GET["theme"] == null alebo neexistuje (nie je nastavena na dark), zadefinuje sa default == light
?>
<body style="background-color: <?php echo $theme === "dark" ? "grey" : "white"; ?>;"> <!-- body tag: ak $theme je nastavena na dark zmeni pozadie stranky z farby white(svetlejsi odtien) na farbu grey (tmavsi dotien) -->
    <header style="background-color: <?php echo $theme === "dark" ? "grey" : "white"; ?>" class="container main-header"> <!-- to iste pre tag header -->
        <div class="logo-holder">
            <a href="index.php">
                <img alt="img" src="img/logo.png" height="40">
            </a>
        </div>
        <nav class="main-nav">
            <ul class="main-menu" id="main-menu container">
                <li><a href=<?php echo $theme === "dark" ? "?theme=light":"?theme=dark"; ?>> Light/Dark </a> </li>
                <?php printMenu($menu); ?>
            </ul>
            <a class="hamburger" id="hamburger">
                <i class="fa fa-bars"></i>
            </a>
        </nav>
    </header>