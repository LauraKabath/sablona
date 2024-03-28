<!DOCTYPE html>
<html lang="sk">
<?php
include_once "parts/header.php";
?>
<?php
include_once "parts/nav.php";
?>
<main>
  <section class="banner">
    <div class="container text-white">
      <h1>Q&A</h1>
    </div>
  </section>
    <?php include_once "sectiondarktheme.php" ?>
  </section>
  <?php
    include_once "classes/QNA.php";
    use otazkaodpovede\QNA;

    $qna = new QNA();
    $qna->insertQnA();
  ?>
</main>
<?php
include_once "parts/footer.php";
?>
<script src="js/accordion.js"></script>
<script src="js/menu.js"></script>
</body>
</html>