<!DOCTYPE html>
<html lang="sk">
<?php
$file_path = "parts/header.php";
if(!require($file_path)) {
    echo"Failed to include $file_path";}
?>
<?php
include_once "parts/nav.php";
?>
  <main>
    <section class="banner">
      <div class="container text-white">
        <h1>Kontakt</h1>
      </div>
    </section>
      <?php include_once "sectiondarktheme.php" ?>
      </section>
    <section class="container">
      <div class="row">
        <div class="col-50"> 
          <h3>Máte otázky?</h3>
          <p>Incididunt mollit quis eiusmod tempor voluptate duis eu enim amet excepteur cupidatat magna velit. </p> 
          <p>Velit id ad laborum velit commodo.</p>
          <p>Consectetur laborum aliqua nulla anim cupidatat consectetur est veniam cupidatat.</p>
        </div>
        <div class="col-50 text-right">
          <h3>Napíšte nám</h3>
          <form id="contact" method="post" action="db/spracovanieFormulara.php">
            <input type="text" placeholder="Vaše meno" id ="meno"  required><br>
            <input type="email" placeholder="Váš email" id="email" required><br>
            <textarea name="" placeholder="Vaša správa" id="sprava"></textarea><br>
            <input type="checkbox" name="" id="" required>
            <label for=""> Súhlasím so spracovaním osobných údajov.</label><br>
            <input type="submit" value="Odoslať">
          </form>
        </div>
      </div>
    </section>
  </main>
    <?php
    $file_path = "parts/footer.php";
    if(!include($file_path)) {
        echo"Failed to include $file_path";}
    ?>
  <script src="js/menu.js"></script>
</body>
</html>