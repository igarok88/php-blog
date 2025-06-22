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
    <?php
      require_once 'mysql_connect.php';

    $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
    $query = $pdo->query($sql);
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "<h2>$row->title</h2>
        <p>$row->intro</p>
        <p><b>Автор статьи:</b> <mark>$row->avtor</mark></p>
        <a href='/news.php?id=$row->id'>
          <button class='btn btn-warning mb-5'>Прочитать больше</button>
        </a>";
    }
    ?>
      </div>
      <?php require 'blocks/aside.php'; ?>
    </div>
  </main>
  <?php require 'blocks/footer.php'; ?>


  
</body>
</html>