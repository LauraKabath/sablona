<!DOCTYPE html>
<html lang="en">
<?php
$file_path = "parts/header.php";
if(!require($file_path)) {
    echo"Failed to include $file_path";}
$theme = $_GET["theme"] ?? "light";
?>
<?php
include_once "parts/nav.php";
?>
    <main>
      <section class="banner">
        <div class="container text-white">
          <h1>Ďakujeme</h1>
        </div>
      </section>
      <section style="background-color: <?php echo $theme === "dark" ? "#AEAEAE" : "#F7F7F7"; ?>;" class="container">
        <div class="row">
          <div class="col-100 text-center">
              <h2>Ďakujeme za vyplnenie formulára</h2>
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