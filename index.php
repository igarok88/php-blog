<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
      $website_titel = 'PHP блог';
    require 'blocks/head.php';
    ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>
  <main class="container">
    <div class="row">
      <div class="col-md-8 mb-">
        Основная часть сайта
      </div>
      <?php require 'blocks/aside.php'; ?>
    </div>
  </main>
  <?php require 'blocks/footer.php'; ?>


  
</body>
</html>