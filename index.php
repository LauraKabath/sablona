<!DOCTYPE html>
<html lang="en">
<?php 
  $file_path = "parts/header.php";
  if(!require($file_path)) {
    echo"Failed to include $file_path";}
?>
<?php include_once "parts/nav.php"; ?>
    <main>
      <section class="slides-container">
        <?php
          include_once "parts/functions.php";
            generateSlides("img/banner");
        ?>
        
      </section>
      <?php include_once "sectiondarktheme.php" ?> <!-- zahrnie subor sectiondarktheme.php odkial zoberie podmienku pre light/dark theme a tiez prida novu sekciu s pozdravom -->
      </section>
      <section class="container">
        <div class="row">
          <div class="col-50">
            <h2>Mollit cupidatat velit quis irure non eiusmod culpa cillum velit magna est aliquip.</h2>
            <?php pridajPozdrav(); ?>
          </div>
          <div class="col-50">
            <p>Nulla dolore sit esse pariatur culpa sint nulla fugiat nulla ut. Sit adipisicing fugiat id consequat qui est. Nulla ea aliquip culpa nulla mollit do excepteur ex ullamco consequat tempor consectetur. Tempor et ea voluptate irure est magna magna reprehenderit qui non dolore. Consequat id ad cillum do qui. Proident ipsum enim eiusmod fugiat quis anim consequat ullamco mollit excepteur. Eiusmod eu ad irure anim velit laborum commodo nostrud pariatur id ea ad.</p>
            <p>Incididunt pariatur ipsum in culpa sit cillum consequat nostrud do. Esse commodo ad qui ea. Pariatur elit mollit deserunt aute do culpa eu veniam pariatur in adipisicing qui adipisicing irure. Est minim sint ipsum nulla eiusmod. Amet do officia consectetur labore. Id aute labore culpa aliquip. Adipisicing mollit excepteur Lorem quis elit ipsum irure quis occaecat qui consectetur ad irure dolor.</p>
            <?php pridajPozdrav(); ?>
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
    <script src="js/slider.js"></script>
</body>
</html>